
<?php
//Variable de sesion
session_start();

//Incluye la funciones que se encuentran en los siguientes ficheros:
include_once "../Views/Header.php";
include_once "../Views/MESSAGE.php";
include_once "../Views/MESSAGE_Pago.php";
include_once "../Functions/Authentication.php";

if(isset($_SESSION['tipo'])){
	
		//Incluye la funciones que se encuentran en los siguientes ficheros:
		include_once "../Models/Inscripcion_Model.php";
		include_once "../Models/Parejas_Model.php";
		//include_once "../Views/Inscripciones_SHOWALL_View.php";
		include_once "../Views/Inscripcion_ADD_View.php";
		include_once "../Views/Inscripcion_ADD_Pago_View.php";
		include_once "../Views/Inscripcion_ADD_Tarjeta_View.php";
		//include_once "../Views/Inscripciones_SEARCH_View.php";
		//include_once "../Views/Inscripciones_EDIT_View.php";
		//include_once "../Views/Inscripciones_SHOWCURRENT_View.php";
		//include_once "../Views/Inscripciones_DELETE_View.php";
		include_once "../Views/MESSAGE.php";
		include_once "../Functions/Authentication.php";
		include_once "../Models/Usuarios_Model.php";
		include_once "../Models/Torneos_Model.php";

		/* RECOGE LOS DATOS DEL FORMULARIO */
		function getDataForm(){
			if(isset($_REQUEST['parejas_ID_Pareja'])){
				$parejas_ID_Pareja = $_REQUEST['parejas_ID_Pareja'];//Identificador de la Inscripcion
				
			}
			else{
				$parejas_ID_Pareja = "";
			}
			
			
			if(isset($_REQUEST['torneos_ID_Torneo'])){
				$torneos_ID_Torneo = $_REQUEST['torneos_ID_Torneo'];//Identificador de la Inscripcion	
			}
			else{
				$torneos_ID_Torneo = "";
			}
			
			if(isset($_REQUEST['pago'])){
				$pago = $_REQUEST['pago'];//Identificador de la Inscripcion
				
			}
			else{
				$pago = "";
			}
			
			if(isset($_REQUEST['CCV'])){
				$CCV = $_REQUEST['CCV'];//Identificador de la Inscripcion
				
			}
			else{
				$CCV = "";
			}
			
			if(isset($_REQUEST['num_tarjeta'])){
				$num_tarjeta = $_REQUEST['num_tarjeta'];//Identificador de la Inscripcion
				
			}
			else{
				$num_tarjeta = "";
			}
			
			$inscripcion = new Inscripcion_Model ($parejas_ID_Pareja,$torneos_ID_Torneo,$pago,$CCV,$num_tarjeta);
			
			//Devuelve el objeto Inscripcion
			return $inscripcion;
		}
		
		//Si no existe un botón action le asigno cadena vacía para asegurarme que entre por el default del switch
		if(!isset($_REQUEST['action'])){
			$_REQUEST['action'] = '';
		}

		//Acciones a realizar dependiendo del boton pulsado
		switch ($_REQUEST['action']){
			//Pulsa añadir Inscripcion en Inscripcions_SHOWALL
			case 'Confirmar_INSCRIPCION1':		
			//Muestra el form de ADD Inscripcion
			$torneo = new Torneos_Model($_REQUEST['ID_Torneo'],"","","","","");
			$cat = $torneo -> BuscarCategoria();
			$generado = $torneo -> comprobarGenerado();
			
			$id_torneo = $torneo -> BuscarID_Torneo();
			$_SESSION['idtorneo'] = $_REQUEST['ID_Torneo'];
			
			$usuario = new Usuarios_Model('','','','','','','','',$_SESSION['sexo'],'','','','');
			$sexo = $_SESSION['sexo'];
			
			
			$inscripcion = new Inscripcion_Model('',$_REQUEST['ID_Torneo'],'','','');
			$ins = $inscripcion -> PuedeApuntarse($_SESSION['login']);
			
		if($generado == false){
			if($ins == true){
			
				if( ($cat == 'Masculina' && $sexo == 'Masculina') || ($cat == 'Mixta' && $sexo == 'Femenina') ){
					
					$inscripcion = new Inscripcion_Model('',$_REQUEST['ID_Torneo'],'','','');
					
					$todos = $usuario -> BuscarHombre();
					$apuntados = $inscripcion -> Apuntados();
					$apuntados1 = $inscripcion -> Apuntados1();
				
					$todosArray = Array();
					$apuntadosArray = Array ();//Compañero1
					$apuntadosArray1 = Array ();//Compañero2
				
					while($t = $todos->fetch_array()[0]){
						array_push($todosArray,$t);					
					}
					
					
					while($a = $apuntados->fetch_array()[0]){
						array_push($apuntadosArray,$a);					
					}
					
					
					while($a = $apuntados1->fetch_array()[0]){
						array_push($apuntadosArray1,$a);					
					}
				

					$disponibles = array_diff($todosArray, $apuntadosArray);
					
					
					$disponibles1 = array_diff($disponibles, $apuntadosArray1);
					
					
					new Inscripcion_ADD($torneo,$id_torneo,$disponibles1,'../Controllers/Inscripcions_Controller.php');					
				}
				else if( ($cat == 'Mixta' && $sexo == 'Masculina') || ($cat == 'Femenina' && $sexo == 'Femenina') ){
					
					$inscripcion = new Inscripcion_Model('',$_REQUEST['ID_Torneo'],'','','');
					
					$todas = $usuario -> BuscarMujer();
					$apuntadas = $inscripcion -> Apuntados();
					$apuntadas1 = $inscripcion -> Apuntados1();
				
					$todasArray = Array();
					$apuntadasArray = Array ();//Compañera1
					$apuntadasArray1 = Array ();//Compañera2
				
					while($t = $todas->fetch_array()[0]){
						array_push($todasArray,$t);					
					}
					
					
					while($a = $apuntadas->fetch_array()[0]){
						array_push($apuntadasArray,$a);					
					}
					
					
					while($a = $apuntadas1->fetch_array()[0]){
						array_push($apuntadasArray1,$a);					
					}
				

					$disponibles = array_diff($todasArray, $apuntadasArray);
					
					
					$disponibles1 = array_diff($disponibles, $apuntadasArray1);
					
					
					new Inscripcion_ADD($torneo,$id_torneo,$disponibles1,'../Controllers/Inscripcions_Controller.php');	
					}
				}
				else{
					new MESSAGE('Ya estas apuntado a este campeonato','../Controllers/Torneos_Controller.php');
				}
		}else{
					new MESSAGE('No puedes anotarte a un campeonato ya iniciado','../Controllers/Torneos_Controller.php');
		}
			
			break;
			//Confirma el ADD de Inscripcion tras rellenar el form ADD
			case 'Confirmar_INSCRIPCION2':
			//Recoge los datos
			
			
			$pareja = new Parejas_Model('',$_SESSION['login'],$_REQUEST['usuarios_login1']);
			$p = $pareja -> add();
			$idpareja = $pareja -> DevolverIDPareja();
				
			$inscripcion = new Inscripcion_Model($idpareja,$_SESSION['idtorneo'],'','','');
				
			$mensaje = $inscripcion-> add();
				
				//Crea un nuevo objeto de tipo MESSAGE que muestra por pantalla el texto de la respuesta y hace un enlace para permitir la vuelta hacia atrás (hacia el controlador)
			new Inscripcion_ADD_Pago($_REQUEST['torneos_ID_Torneo'],'../Controllers/Torneos_Controller.php');
				
			
			break;
			
			case 'Confirmar_ADD_Pago':
			
				$torneo = getDataForm();
				
				$torneo = new Inscripcion_Model('',$_REQUEST['torneos_ID_Torneo'],$_REQUEST['pago'],'','');
				$torneo -> addMetodoPago();
				$idtorneo = $_REQUEST['torneos_ID_Torneo'];
				
				$pago = $torneo -> devolverMetodoPago();
				
				//$phu = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],$_SESSION['login'],"","","");
				//$phu -> addMetodoPago($idpromo,$_SESSION['login'],$pago);
				
				if($pago == 'Paypal'){
					new MESSAGE_Pago('Insercion correcta.Puedes acceder a la pagina de paypal haciendo click sobre su logo en el boton azul','../Controllers/Inscripcion_Controller.php');			 
				}
				else if($pago == 'Contrareembolso'){
					new MESSAGE('Recuerda realizar el pago en las instalaciones del club','../Controllers/Inscripcion_Controller.php');
				}
				
				else if($pago == 'Tarjeta'){
					new Inscripcion_ADD_Tarjeta($_REQUEST['torneos_ID_Torneo'],'../Controllers/Inscripcion_Controller.php');
				}
			
			break;
			
			case 'Confirmar_ADD_Tarjeta':
			
				$torneos = getDataForm();
				
				$torneo = new Inscripcion_Model('',$_REQUEST['torneos_ID_Torneo'],'',$_REQUEST['CCV'],$_REQUEST['num_tarjeta']);
				
				$mensaje = $torneo -> addTarjeta();
				
				//$phu = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],$_SESSION['login'],"","","");
				//$phu -> addTarjeta($_REQUEST['ID_Promo'],$_SESSION['login'],$_REQUEST['CCV'],$_REQUEST['num_tarjeta']);
				new MESSAGE($mensaje,'../Controllers/Inscripcion_Controller.php');
				
			break;
			

			//Por defecto al seleccionar la seccion de Inscripcions en el menu se mostrara el SHOWALL
			default: /*PARA EL SHOWALL */
			
			//Busca todas las Inscripcions
				/* $inscripcion = new Inscripcion_Model('','');
				$datos = $inscripcion -> search();
				//Las muestra en una tabla
				$respuesta = new Inscripcion_SHOWALL($datos,'../Controllers/Inscripcion_Controller.php'); */
				
				header('Location:../Controllers/Torneos_Controller.php');
		}
	
}

?>
