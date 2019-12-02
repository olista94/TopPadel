<?php

session_start();
//Incluye la funciones que se encuentran en los siguientes ficheros:
include_once "../Views/MESSAGE.php";
include_once "../Functions/Authentication.php";

if(!IsAuthenticated()){
	//Si no esta autenticado en la aplicacion se muestra un mensaje de que no puede verlo
	new MESSAGE('No puedes ver nada sin loguearte','../index.php');
}else{
	//Incluye la funciones que se encuentran en los siguientes ficheros:
	include_once "../Models/Torneos_Model.php";
	include_once "../Views/Torneos_SHOWALL_View.php";
	include_once "../Views/Torneos_SHOWALL_Admin_View.php";
	include_once "../Views/Torneos_ADD_View.php";
	include_once "../Views/Torneos_SEARCH_View.php";
	include_once "../Views/Torneos_EDIT_View.php";
	include_once "../Views/Torneos_SHOWCURRENT_View.php";
	include_once "../Views/Torneos_SHOWTORNEO_View.php";
	include_once "../Views/Torneos_SHOWTORNEO_Generado_View.php";
	include_once "../Views/Torneos_SHOWTORNEO_Generado_Cuartos_View.php";
	include_once "../Views/Torneos_DELETE_View.php";
	include_once "../Models/Inscripcion_Model.php";
	include_once "../Models/Partidos_Model.php";
	include_once "../Models/Parejas_has_Partidos_Model.php";

	/* RECOGE LOS DATOS DEL FORMULARIO */
	function getDataForm(){
		
		if(isset($_REQUEST['ID_Torneo'])){
				$ID_Torneo = $_REQUEST['ID_Torneo'];//Identificador de la categoria
				
			}
			else{
				$ID_Torneo = "";
			}
		
		
		$nombre = $_REQUEST['nombre'];//Recoge el campo email
		$categoria = $_REQUEST['categoria'];//Recoge el campo categoria
		$edicion = $_REQUEST['edicion'];//Recoge el campo edicion
		$fecha = $_REQUEST['fecha'];//Recoge el campo fecha
		$nivel = $_REQUEST['nivel'];
		
		//Construye el objeto torneo con los parámetros
		$torneo = new Torneos_Model ($ID_Torneo,$nombre,$categoria,$edicion,$fecha,$nivel);
		
		//Devuelve el objeto torneo
		return $torneo;
	}
	
	function numeroGrupos($numParejas){
		$min = 99;
		$resultados = Array();
		$cocienteMenor = 99;
		
		if($numParejas < 8){
			return -1;
		}
		else if($numParejas == 13 || $numParejas == 14 || $numParejas == 15){
			$cocienteMenor=1;
			return $cocienteMenor;
		}
		else{
			for($i = 8; $i < 13; $i++){
				$cociente = $numParejas / $i;
				$resto = $numParejas % $i;
					if($resto + $i <= 12 && $cociente + $resto < $min && $cociente <= $cocienteMenor){
						$min = $cociente + $resto;
						$cocienteMenor = $cociente;
						array_push($resultados,$cociente);
					}
			}
			return $cocienteMenor;
		}
		
	}
	
	function generarGrupos($parejasApuntadas,$partido,$idtorneo){


		$numGrupos = numeroGrupos(count($parejasApuntadas));
		$tam = count($parejasApuntadas);
		

		if ($numGrupos==-1) {
			return -1;
		}
		else if($tam >= 8 && $tam <=12) {
				for ($i=0; $i < $tam; $i++) { 
					$partido -> insertarGrupo($parejasApuntadas[$i],0,$idtorneo);
				}
		}
		else if($tam >= 13 && $tam <=15) {
				for ($i=0; $i < 12; $i++) { 
					$partido -> insertarGrupo($parejasApuntadas[$i],0,$idtorneo);
				}
		}
		else{
			$resto = count($parejasApuntadas)%$numGrupos;
			$tope = count($parejasApuntadas);
			
			for ($i=$tope; $i > $tope-$resto; $i--) { 
			$partido -> borrarParejaSobrante($parejasApuntadas[$i-1]);
				unset($parejasApuntadas[$i-1]);
				
			}
			
			$numGrupos = numeroGrupos(count($parejasApuntadas));
		
			$tope = count($parejasApuntadas);
			
			$apuntados = $tope;
			

			$contInicio = 0;
			$contFin = ($apuntados/$numGrupos);
				for($i = 0; $i < $numGrupos; $i++){
					
					//echo $numGrupos;
					for($j = $contInicio; $j < $contFin; $j++){
						$partido -> insertarGrupo($parejasApuntadas[$j],$i,$idtorneo);
					}
						$contInicio = $contFin;
						$contFin = $contFin + ($apuntados/$numGrupos);
						
				}
		}
		//echo $numGrupos;
	}
	
	function generarEnfrentamientos($parejasApuntadas,$idtorneo,$partido,$enfrentamiento){
		
		$numGrupos = numeroGrupos(count($parejasApuntadas));
		//$partido = new Partidos_Model('','','','','','','','','','','','','','','');
		
			for($k = 0; $k < $numGrupos ; $k++){
				$apun = $partido -> parejasCadaGrupo($idtorneo,$k);
				$parejasArray = Array();
				
				while($apun1 = $apun->fetch_array()[0]){
					array_push($parejasArray,$apun1);
				}
				$longitud = count($parejasArray);
					
				for ($i = 0; $i < $longitud; $i++) {
					for ($j = $i+1; $j < $longitud; $j++) {
						//echo "$parejasArray[$i] vs $parejasArray[$j] --";
						$mensaje = $partido -> add();
						$partido1 = new Partidos_Model('','','','','','','','','','','','','');
						$idpartido = $partido1 -> DevolverID();
						
						$mensaje1 = $enfrentamiento -> add($idpartido,$idtorneo,$parejasArray[$i],$parejasArray[$j]);
						//$mensaje1 = $enfrentamiento -> add($idpartido,$parejasArray[$j]);
						
					}
				}
			}
	}
	
	function generarCuartos($clasificados,$idtorneo,$partido,$enfrentamiento){
		$j = 0;
		$h = 7;
		for ($i = 0; $i < 4; $i++) {	
			$mensaje = $partido -> addCuartos();
			$partido1 = new Partidos_Model('','','','','','','','','','','','','');
			$idpartido = $partido1 -> DevolverID();	
					$mensaje1 = $enfrentamiento -> add($idpartido,$idtorneo,$clasificados[$j],$clasificados[$h]);	
					$j++;
					$h--;
		}
	}


	//Comprueba si hay una accion seleccionada desde la vista
	if(!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

	//Accioneas a realizar según la acción que venga de la vista
	
	switch ($_REQUEST['action']){
		//Añadir un torneo desde el showall
		case 'Confirmar_ADD':
			//Si no se le están pasando datos entonces crea una vista para añadir
			if(count($_REQUEST) < 4 ){					
				new Torneos_ADD('../Controllers/Torneos_Controller.php'); //Crea la vista de añadir torneo
			//Si se le pasan datos entonces los recoge
			}else{				
				$torneo = getDataForm(); //Asigna los datos recogidos al objeto torneo
				$mensaje = $torneo-> add(); //Llama al modelo para añadirlo y le pasa la respuesta a MESSAGE
				new MESSAGE($mensaje,'../Controllers/Torneos_Controller.php'); //Devuelve el mensaje de la inserción
			}
			
		break;
		
		//Accion Editar un torneo
		case 'Confirmar_EDIT':
			//Si no se le están pasando datos entonces crea una vista para editar
			if(count($_REQUEST) < 4 ){
				$torneo = new Torneos_Model($_REQUEST['ID_Torneo'],'','','','',''); //Crea la vista de editar torneo
				$datos = $torneo->rellenadatos(); //Rellena la variable datos con los datos actuales del torneo
				new Torneos_EDIT($datos,'../Controllers/Torneos_Controller.php'); //
			//Si se le pasan datos entonces los recoge
			}else{					
				$torneo = getDataForm(); //Asigna los datos recogidos al objeto torneo
				$mensaje = $torneo-> edit(); //Llama al modelo para editar y le pasa la respuesta a MESSAGE
				new MESSAGE($mensaje,'../Controllers/Torneos_Controller.php'); //Devuelve el mensaje de la inserción
			}
		break;

		//Accion buscar un torneo
		case 'Confirmar_SEARCH1':
			//Muestra el form de SEARCH
				new Torneos_SEARCH('../Controllers/Torneos_Controller.php');
			break;
			
			//Confirma el SEARCH pista tras rellenar el form search
			case 'Confirmar_SEARCH2':
			//Recoge los datos
				$torneo = getDataForm();
				//Muestra las pistas tras aplicar la busqueda con una vista de Showall
				$datos = $torneo-> search();
				new Torneos_SHOWALL($datos,'../Controllers/Torneos_Controller.php');
			break;

		//Accion ver un torneo para borrarlo
		case 'Confirmar_DELETE1':				
				$torneo = new Torneos_Model($_REQUEST['ID_Torneo'],'','','','',''); //Se construye el objeto torneo con el email
				
				$datos = $torneo->rellenadatos(); //se le pasan los datos obtenidos del modelo
				
				new Torneos_DELETE($datos,'../Controllers/Torneos_Controller.php'); //se crea la vista con estos datos
		break;
		
		//Accion borrar un torneo
		case 'Confirmar_DELETE2':					
				$torneo = new Torneos_Model($_REQUEST['ID_Torneo'],'','','','',''); //Se construye el objeto torneo con el email
				$mensaje = $torneo-> delete(); //se llama al modelo para borrarlo y se devuelve el mensaje
				new MESSAGE($mensaje,'../Controllers/Torneos_Controller.php'); //se muestra el mensaje de borrado
		break;

		//Mostrar los datos de un torneo concreto
		case 'Confirmar_SHOWCURRENT':
			// Si no se le estan pasando datos entonces se crea la vista
			if(count($_REQUEST) < 4 ){
				$torneo = new Torneos_Model($_REQUEST['ID_Torneo'],'','','','',''); //Se construye el objeto torneo con el email
				$datos = $torneo->rellenadatos(); //se le pasan los datos obtenidos del modelo
				new Torneos_SHOWCURRENT($datos,'../Controllers/Torneos_Controller.php'); //Se muestran los datos en una vista SHOWCURRENT
			}
		break;
		
		case 'Generar_Ranking':
			
			
		break;
		
		case 'Confirmar_SHOWTORNEO':
				
				$torneo1 = new Torneos_Model($_REQUEST['ID_Torneo'],'','','','','');
				$generado = $torneo1 -> comprobarGenerado();
				
				if($generado == true){
				
					$idtorneo = $_REQUEST['ID_Torneo'];
					$torneo = new Parejas_has_Partidos_Model('',$_REQUEST['ID_Torneo'],'',''); 
					$datos1 = $torneo->partidosPareja();

					$inscripcion = new Inscripcion_Model('',$idtorneo);
					$clasificacion = $inscripcion -> DevolverClasificacionInicial();
				
					$apuntados = new Inscripcion_Model('','');
					$apuntados1 = $apuntados -> DevolverParejasGrupo($idtorneo,0);
					$grupos = $apuntados ->DevolverGruposTorneo($idtorneo);

					new Torneos_SHOWTORNEO_Generado($datos1,$clasificacion,$apuntados1,$idtorneo,$grupos,'','../Controllers/Torneos_Controller.php'); //Se muestran los datos en una vista SHOWCURRENT
				}
				else{
					$idtorneo = $_REQUEST['ID_Torneo'];
					$torneo = new Parejas_has_Partidos_Model('',$_REQUEST['ID_Torneo'],'',''); 
					$datos1 = $torneo->partidosPareja();
					
					$inscripcion = new Inscripcion_Model('',$idtorneo);
					$clasificacion = $inscripcion -> DevolverParejas($_REQUEST['ID_Torneo']);
				
					$apuntados = new Inscripcion_Model('','');
					$apuntados1 = $apuntados -> DevolverParejasGrupo($idtorneo,0);
					

					new Torneos_SHOWTORNEO($datos1,$clasificacion,$apuntados1,$idtorneo,'../Controllers/Torneos_Controller.php'); //Se muestran los datos en una vista SHOWCURRENT
				}
				
		break;
		
		case 'Generar_Calendario':
			
				$idtorneo = $_REQUEST['ID_Torneo'];
				$torneo = new Torneos_Model($_REQUEST['ID_Torneo'],'','','','','');
				$datos = $torneo->rellenadatos();//DEVUELVE LOS DATOS DE UN TORNEO
				
				
				$inscripcion = new Inscripcion_Model('',$_REQUEST['ID_Torneo']);
				$clasificacion = $inscripcion -> DevolverClasificacionInicial();//DEVUELVE LA CLASIFICACION DE UN TORNEO
				
				$inscripcion = new Inscripcion_Model('',$_REQUEST['ID_Torneo']);
				$apuntados1 = $inscripcion -> DevolverIDParejas($_REQUEST['ID_Torneo']);//DEVUELVE LOS IDS DE LAS PAREJAS APUNTADAS A UN TORNEO
				
				$partido = new Partidos_Model('','','','','','','','','','','','','');
				$enfrentamiento = new Parejas_has_partidos_Model('','','','');
					

				$parejasArray = Array();
			
				
				 while($apun = $apuntados1->fetch_array()[0]){
					array_push($parejasArray,$apun);
			
				} 
				
				
				$partido = new Partidos_Model("","","","","","","","","","","","","");
				$torneo1 = generarGrupos($parejasArray,$partido,$_REQUEST['ID_Torneo']);
				$torneo = generarEnfrentamientos($parejasArray,$_REQUEST['ID_Torneo'],$partido,$enfrentamiento);
				
				if($torneo1 == -1){
					new MESSAGE('No se ha llegado al minimo de parejas','../Controllers/Torneos_Controller.php'); 
				}else{
				
				new MESSAGE('Campeonato generado con exito','../Controllers/Torneos_Controller.php'); 
				}
		break;
		
		case 'Ver_Grupos_Torneo':
				$torneo1 = new Torneos_Model($_REQUEST['ID_Torneo'],'','','','','');
				/* $generado = $torneo1 -> comprobarGenerado(); */
				
				$idtorneo = $_REQUEST['ID_Torneo'];
				$grupo = $_REQUEST['grupo'];
				
				$torneo = new Parejas_has_Partidos_Model('',$_REQUEST['ID_Torneo'],'',''); 
				$datos1 = $torneo->partidosPareja();
				
				
				$inscripcion = new Inscripcion_Model('',$_REQUEST['ID_Torneo']);
				$clasificacion = $inscripcion -> DevolverClasificacion($grupo);//DEVUELVE LA CLASIFICACION DE UN TORNEO
				
				//$p = $torneo -> partidosPareja();
				$apuntados = new Inscripcion_Model('','');
				$apuntados1 = $apuntados -> DevolverParejasGrupo($idtorneo,$grupo);
				$grupos = $apuntados ->DevolverGruposTorneo($idtorneo);
				
					new Torneos_SHOWTORNEO_Generado($datos1,$clasificacion,$apuntados1,$idtorneo,$grupos,$grupo,'../Controllers/Torneos_Controller.php'); 
				
				
				
		break;
		
		case 'Ver_Playoffs':
		
		$playoffs = new Torneos_Model($_REQUEST['ID_Torneo'],'','','','','');
		$idtorneo = $_REQUEST['ID_Torneo'];
		$grupo = $_REQUEST['grupo'];
		$clasificados = Array();
		$partido = new Partidos_Model('','','','','','','','','','','','','');
		$enfrentamiento = new Parejas_has_partidos_Model('','','','');
		
		if($playoffs -> puedeGenerarPlayoffs() == false){
			new MESSAGE('La liga regular todavia no ha acabado','../Controllers/Torneos_Controller.php');
		}
		else{
		
			if($playoffs -> puedeGenerarPlayoffs() == true && $playoffs -> playoffsGenerados() == false){
				
				$numGrupos = $playoffs -> numGrupos($idtorneo);
				
				
				for($i = 0; $i < $numGrupos; $i++){
					echo $i;
					echo $idtorneo;
					$playoffs = new Torneos_Model($_REQUEST['ID_Torneo'],'','','','','');
					$clasif = $playoffs -> devolverClasificados($i,$idtorneo);
							
						while($clasif1 = $clasif->fetch_array()[0]){
							array_push($clasificados,$clasif1);										
						}
					
					$playoffs = generarCuartos($clasificados,$idtorneo,$partido,$enfrentamiento);
					unset($clasificados);
					$clasificados = array(); 
				}
				new Torneos_SHOWTORNEO_Generado_Cuartos('../Controllers/Torneos_Controller.php');				
			}
				
			else{
				$partido = new Partidos_Model('','','','','','','','','','','','','');
				$datos = $partido -> ShowAllPlayoffs();
				new Torneos_SHOWTORNEO_Generado_Cuartos($datos,$_REQUEST['ID_Torneo'],'../Controllers/Torneos_Controller.php');
			}
		}	
				
		break;
				
		case 'Ver_Partidos_Pareja':
				$torneo1 = new Torneos_Model($_REQUEST['ID_Torneo'],'','','','','');
				//$generado = $torneo1 -> comprobarGenerado();
				
				$idtorneo = $_REQUEST['ID_Torneo'];
				$grupo = $_REQUEST['grupo'];
				
				$torneo = new Parejas_has_Partidos_Model('',$_REQUEST['ID_Torneo'],$_REQUEST['ID_Pareja'],$_REQUEST['ID_Pareja']); 
				$datos1 = $torneo->partidosPareja();
				
				
				$inscripcion = new Inscripcion_Model('',$_REQUEST['ID_Torneo']);
				$clasificacion = $inscripcion -> DevolverClasificacion($grupo);//DEVUELVE LA CLASIFICACION DE UN TORNEO
				
				//$p = $torneo -> partidosPareja();
				$apuntados = new Inscripcion_Model('','');
				$apuntados1 = $apuntados -> DevolverParejasGrupo($idtorneo,$grupo);
				$grupos = $apuntados ->DevolverGruposTorneo($idtorneo);
				
					new Torneos_SHOWTORNEO_Generado($datos1,$clasificacion,$apuntados1,$idtorneo,$grupos,$grupo,'../Controllers/Torneos_Controller.php'); 
			
				
		break;
		
		
		//Accion por defecto cuando no hay ninguna accion
		default: /*PARA EL SHOWALL */
		if(isset($_SESSION['tipo'])){
		if($_SESSION['tipo']=='ADMIN'){		 
			$torneo = new Torneos_Model('','','','','',''); //Se construye el objeto torneo
			$datos = $torneo -> search(); //Se buscan todos los torneos y se pasan a datos
			$respuesta = new Torneos_SHOWALL_Admin($datos,'../Controllers/Torneos_Controller.php'); //Se crea el SHOWALL para mostrar todos los torneos
		}else{
			$torneo = new Torneos_Model('','','','','',''); //Se construye el objeto torneo
			$datos = $torneo -> searchPorCategoria(); //Se buscan todos los torneos y se pasan a datos
			$respuesta = new Torneos_SHOWALL($datos,'../Controllers/Torneos_Controller.php');
		}
	}
	}
}
?>