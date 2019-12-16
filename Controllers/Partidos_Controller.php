<?php
//Variable de sesion
session_start();

//Incluye la funciones que se encuentran en los siguientes ficheros:

include_once "../Views/MESSAGE.php";
include_once "../Functions/Authentication.php";

if (!IsAuthenticated()){ //si no está autenticado
    new MESSAGE('No puedes ver esto si no estás logueado', '../Controllers/Login_Controller.php'); //muestra el mensaje
}else{
	
		//Incluye la funciones que se encuentran en los siguientes ficheros:
		include_once "../Models/Partidos_Model.php";
		include_once "../Models/Parejas_Model.php";
		include_once "../Models/Reservas_Model.php";
		include_once "../Models/Parejas_has_Partidos_Model.php";	
		include_once "../Views/Partidos_ADD_View.php";
		include_once "../Views/Partidos_ADD_Fecha_View.php";
		include_once "../Views/Partidos_ADD_Hora_View.php";
		include_once "../Views/Torneos_SHOWALL_View.php";	
		//include_once "../Views/Partidos_EDIT_View.php";
		include_once "../Views/Partidos_SHOWCURRENT_View.php";		
		include_once "../Views/MESSAGE.php";
		include_once "../Views/ALERT.php";
		include_once "../Functions/Authentication.php";

		/* RECOGE LOS DATOS DEL FORMULARIO */
		function getDataForm(){
			if(isset($_REQUEST['ID_Partido'])){
				$ID_Partido = $_REQUEST['ID_Partido'];//Identificador de la pista
				
			}
			else{
				$ID_Partido = "";
			}

			if(isset($_REQUEST['fecha'])){
				$fecha = $_REQUEST['fecha'];//Identificador de la pista
				
			}
			else{
				$fecha = "";
			}

			if(isset($_REQUEST['hora'])){
				$hora = $_REQUEST['hora'];//Identificador de la pista
				
			}
			else{
				$hora = "";
			}

			if(isset($_REQUEST['ronda'])){
				$ronda = $_REQUEST['ronda'];//Identificador de la pista
				
			}
			else{
				$ronda = "";
			}
			if(isset($_REQUEST['pista_ID_Pista'])){
				$pista_ID_Pista = $_REQUEST['pista_ID_Pista'];//Identificador de la pista
				
			}
			else{
				$pista_ID_Pista = "";
			}
			if(isset($_REQUEST['Sets_Local'])){
				$Sets_Local = $_REQUEST['Sets_Local'];//Identificador de la pista
				
			}
			else{
				$Sets_Local = "";
			}
			if(isset($_REQUEST['Sets_Visitante'])){
				$Sets_Visitante = $_REQUEST['Sets_Visitante'];//Identificador de la pista
				
			}
			else{
				$Sets_Visitante = "";
			}
			if(isset($_REQUEST['JuegosSet1_Local'])){
				$JuegosSet1_Local = $_REQUEST['JuegosSet1_Local'];//Identificador de la pista
				
			}
			else{
				$JuegosSet1_Local = "";
			}
			if(isset($_REQUEST['JuegosSet1_Visitante'])){
				$JuegosSet1_Visitante = $_REQUEST['JuegosSet1_Visitante'];//Identificador de la pista
				
			}
			else{
				$JuegosSet1_Visitante = "";
			}
			if(isset($_REQUEST['JuegosSet2_Local'])){
				$JuegosSet2_Local = $_REQUEST['JuegosSet2_Local'];//Identificador de la pista
				
			}
			else{
				$JuegosSet2_Local = "";
			}
			if(isset($_REQUEST['JuegosSet2_Visitante'])){
				$JuegosSet2_Visitante = $_REQUEST['JuegosSet2_Visitante'];//Identificador de la pista
				
			}
			else{
				$JuegosSet2_Visitante = "";
			}
			if(isset($_REQUEST['JuegosSet3_Local'])){
				$JuegosSet3_Local = $_REQUEST['JuegosSet3_Local'];//Identificador de la pista
				
			}
			else{
				$JuegosSet3_Local = NULL;
			}
			if(isset($_REQUEST['JuegosSet3_Visitante'])){
				$JuegosSet3_Visitante = $_REQUEST['JuegosSet3_Visitante'];//Identificador de la pista
				
			}
			else{
				$JuegosSet3_Visitante = NULL;
			}

			
			
			//Nombre de la pista	
			//Creamos un objeto Pista
			$partido = new Partidos_Model ($ID_Partido,$fecha,$hora,$ronda,$pista_ID_Pista,
				$Sets_Local,$Sets_Visitante,$JuegosSet1_Local,$JuegosSet1_Visitante,$JuegosSet2_Local,
				$JuegosSet2_Visitante,$JuegosSet1_Local,$JuegosSet3_Visitante);
			
			//Devuelve el objeto Pista
			return $partido;
		}
		
		//Si no existe un botón action le asigno cadena vacía para asegurarme que entre por el default del switch
		if(!isset($_REQUEST['action'])){
			$_REQUEST['action'] = '';
		}

		//Acciones a realizar dependiendo del boton pulsado
		switch ($_REQUEST['action']){
			
			case 'Cerrar_Partido':	
				$reserva = new Reservas_Model("","",'','');
				$numReservas = $reserva->contarReservasUsuario()->fetch_array()[1];
				
				$partido = new Partidos_Model($_REQUEST['ID_Partido'],"","","","","","","","","","","","");
				$puedeCerrar = $partido -> puedeReservarPartido();
				if($numReservas >= 5){
					new MESSAGE('No puedes tener mas de 5 reservas activas a la vez','../Controllers/Reservas_Controller.php');
				}else{
					if($puedeCerrar == true){
						new Partidos_ADD_Fecha($_REQUEST['ID_Partido'],$_REQUEST['ID_Torneo'],'../Controllers/Partidos_Controller.php');
					}
					else{
						new MESSAGE('No puedes reservar partidos que no juegas','../Controllers/Torneos_Controller.php');
					}
				}
			
			break;
			
			case 'Confirmar_ADD_Fecha':	
				$partido = new Partidos_Model($_REQUEST['ID_Partido'],$_REQUEST['fecha'],"","","","","","","","","","","");
				
				$horasOcupadas = $partido -> BuscarHorasOcupadas();
				
				$array = Array ('08:00:00','09:30:00','11:00:00','12:30:00','14:00:00','15:30:00','17:00:00','18:30:00','20:00:00','21:30:00');
				
		
				$ocup = Array();
				
				while($h = $horasOcupadas->fetch_array()[0]){
					array_push($ocup,$h);
					
				}
				
				$resultado = array_diff($array, $ocup);
							
				new Partidos_ADD_Hora($_REQUEST['ID_Partido'],$_REQUEST['ID_Torneo'],$_REQUEST['fecha'],$resultado,'../Controllers/Partidos_Controller.php');
			
			break;
			
			case 'Confirmar_ADD_Hora':
				$partido = new Partidos_Model($_REQUEST['ID_Partido'],$_REQUEST['fecha'],$_REQUEST['hora'],"","","","","","","","","","");
				$idpista = $partido->pistasLibres()->fetch_array()[0];
				$fecha = $_REQUEST['fecha'];
				$hora = $_REQUEST['hora'];
				
				$reserva = new Reservas_Model("","","","");
				$reserva -> addReservaPartido($idpista,$fecha,$hora);
				
				
				
				$partido = getDataForm();	//Asigna los datos obtenidos al objeto promocion		
				$mensaje1 = $partido-> addFechaHora(); //Llama al modelo para añadirla y le pasa la respuesta a MESSAGE
				$mensaje = $partido-> addPista($idpista);
				
				
				new MESSAGE($mensaje,'../Controllers/Torneos_Controller.php');	
				
				
			break;
					
		case 'Acta_Partido':	
					
					$torneo = new Partidos_Model($_REQUEST['ID_Partido'],'','','','','','','','','','','',''); 
					$datos = $torneo->DevolverParejasPartido();
					
				new Partidos_ADD($datos,$_REQUEST['ID_Partido'],$_REQUEST['ID_Torneo'],'../Controllers/Partidos_Controller.php');
			
		break;
			
		case 'Confirmar_Acta_Partido':	
					$part1 = new Partidos_Model($_REQUEST['ID_Partido'],'','','','','','',$_REQUEST['JuegosSet1_Local'],$_REQUEST['JuegosSet1_Visitante'],
					$_REQUEST['JuegosSet2_Local'],$_REQUEST['JuegosSet2_Visitante'],$_REQUEST['JuegosSet3_Local'],$_REQUEST['JuegosSet3_Visitante']);
					
					
					$partido = new Partidos_Model($_REQUEST['ID_Partido'],'','','','','','',$_REQUEST['JuegosSet1_Local'],$_REQUEST['JuegosSet1_Visitante'],
					$_REQUEST['JuegosSet2_Local'],$_REQUEST['JuegosSet2_Visitante'],$_REQUEST['JuegosSet3_Local'],$_REQUEST['JuegosSet3_Visitante']);

					$pL = $_REQUEST['ID_ParejaLocal'];
					$pV = $_REQUEST['ID_ParejaVisitante'];
					
					$parejaLocal = new Parejas_Model($_REQUEST['ID_ParejaLocal'],'','');
					$local1 = $parejaLocal -> DevolverMiembro1Pareja($pL); 
					$local2 = $parejaLocal -> DevolverMiembro2Pareja($pL); 
					
					$parejaVisitante = new Parejas_Model($_REQUEST['ID_ParejaVisitante'],'','');
					$visitante1 = $parejaVisitante -> DevolverMiembro1Pareja($pV); 
					$visitante2 = $parejaVisitante -> DevolverMiembro2Pareja($pV);
					
					
					$mensaje = $partido->addResultado();
					$set3 = $part1 -> seJuega3Set();
					
					if($set3 == true){
						$partido1 = $partido -> comprobar2Set();
					}
					else{
						$partido1 = $partido -> comprobar3Set();
					}
					
					$part1 -> getClasificacion($_REQUEST["ID_Torneo"],$pL);
					$part1 -> getClasificacion($_REQUEST["ID_Torneo"],$pV);
					
					$ronda = $part1 -> getRonda();
					if($ronda == 'Cuartos'){
						$part1 -> getClasificacionCuartos($_REQUEST["ID_Torneo"],$pL);
						$part1 -> getClasificacionCuartos($_REQUEST["ID_Torneo"],$pV);
					}
					
					if($ronda == 'Semis'){
						$part1 -> getClasificacionSemis($_REQUEST["ID_Torneo"],$pL);
						$part1 -> getClasificacionSemis($_REQUEST["ID_Torneo"],$pV);
					}
					
					if($ronda == 'Final'){
						$part1 -> getClasificacionFinal($_REQUEST["ID_Torneo"],$pL);
						$part1 -> getClasificacionFinal($_REQUEST["ID_Torneo"],$pV);
					}
					
					if($ronda == 'Superfinal'){
						$part1 -> getClasificacionSuperfinal($_REQUEST["ID_Torneo"],$pL);
						$part1 -> getClasificacionSuperfinal($_REQUEST["ID_Torneo"],$pV);
					}
					
					$part1 -> actualizarRanking($local1);
					$part1 -> actualizarRanking($local2);
					$part1 -> actualizarRanking($visitante1);
					$part1 -> actualizarRanking($visitante2);
					
					
					
				new MESSAGE($mensaje,'../Controllers/Torneos_Controller.php');
			
			break;
			
			
			
			
			//Confirma el SHOWCURRENT de pista
			case 'Confirmar_SHOWCURRENT1':

				$partido = new Partidos_Model($_REQUEST['ID_Partido'],'','','','','','','','','','','','');
				
				$datos = $partido -> ShowCurrentPartidos();
				
			
				//$array = $datos -> fech_array();

				new Partidos_SHOWCURRENT($datos,$_REQUEST['ID_Torneo'],'../Controllers/Partidos_Controller.php');
				
			break;

			//Por defecto al seleccionar la seccion de Partidos en el menu se mostrara el SHOWALL
			default: /*PARA EL SHOWALL */
			//Busca todas las pistas
				$pista = new Partidos_Model('','','','','','','','','','','','','');
				$datos = $pista -> search();
				//Las muestra en una tabla
				$respuesta = new Partidos_SHOWALL($datos,'../Controllers/Partidos_Controller.php');

		}
	}



?>
