<!---CONTROLADOR DE LAS PISTAS
 Creado por: Los Cangrejas
 Fecha: 20/12/2018-->
 
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
		include_once "../Models/Parejas_has_Partidos_Model.php";	
		include_once "../Views/Partidos_ADD_View.php";
		include_once "../Views/Partidos_ADD_Fecha_View.php";
		include_once "../Views/Partidos_ADD_Hora_View.php";
		include_once "../Views/Torneos_SHOWALL_View.php";	
		//include_once "../Views/Partidos_EDIT_View.php";
		include_once "../Views/Partidos_SHOWCURRENT_View.php";		
		include_once "../Views/MESSAGE.php";
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
			if(isset($_REQUEST['grupo'])){
				$grupo = $_REQUEST['grupo'];//Identificador de la pista
				
			}
			else{
				$grupo = "";
			}
			if(isset($_REQUEST['jornada'])){
				$jornada = $_REQUEST['jornada'];//Identificador de la pista
				
			}
			else{
				$jornada = "";
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
			$partido = new Partidos_Model ($ID_Partido,$fecha,$hora,$ronda,$jornada,$grupo,$pista_ID_Pista,
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
					
				new Partidos_ADD_Fecha($_REQUEST['ID_Partido'],$_REQUEST['ID_Torneo'],'../Controllers/Partidos_Controller.php');
			
			break;
			
			case 'Confirmar_ADD_Fecha':	
				$partido = new Partidos_Model($_REQUEST['ID_Partido'],$_REQUEST['fecha'],"","","","","","","","","","","","","");
				
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

				$partido = getDataForm();	//Asigna los datos obtenidos al objeto promocion		
				$mensaje = $partido-> addFechaHora(); //Llama al modelo para añadirla y le pasa la respuesta a MESSAGE
				
				new MESSAGE($mensaje,'../Controllers/Torneos_Controller.php');	
				
				
			break;
					
		case 'Acta_Partido':	
					
					$torneo = new Partidos_Model($_REQUEST['ID_Partido'],'','','','','','','','','','','','','',''); 
					$datos = $torneo->DevolverParejasPartido();
					
				new Partidos_ADD($datos,$_REQUEST['ID_Partido'],$_REQUEST['ID_Torneo'],'../Controllers/Partidos_Controller.php');
			
		break;
			
		case 'Confirmar_Acta_Partido':	
					$part1 = new Partidos_Model($_REQUEST['ID_Partido'],'','','','','','','','',$_REQUEST['JuegosSet1_Local'],$_REQUEST['JuegosSet1_Visitante'],
					$_REQUEST['JuegosSet2_Local'],$_REQUEST['JuegosSet2_Visitante'],$_REQUEST['JuegosSet3_Local'],$_REQUEST['JuegosSet3_Visitante']);
					
					
					$partido = new Partidos_Model($_REQUEST['ID_Partido'],'','','','','','','','',$_REQUEST['JuegosSet1_Local'],$_REQUEST['JuegosSet1_Visitante'],
					$_REQUEST['JuegosSet2_Local'],$_REQUEST['JuegosSet2_Visitante'],$_REQUEST['JuegosSet3_Local'],$_REQUEST['JuegosSet3_Visitante']);

					$pL = $_REQUEST['ID_ParejaLocal'];
					$pV = $_REQUEST['ID_ParejaVisitante'];
					
					$part1 -> getClasificacion($_REQUEST["ID_Torneo"],$pL);
					$part1 -> getClasificacion($_REQUEST["ID_Torneo"],$pV);
					
					$mensaje = $partido->addResultado();
					$set3 = $part1 -> seJuega3Set();
					
					if($set3 == true){
						$partido1 = $partido -> comprobar2Set();
					}
					else{
						$partido1 = $partido -> comprobar3Set();
					}
					
					
				new MESSAGE($mensaje,'../Controllers/Torneos_Controller.php');
			
			break;
			
			//Confirma el ADD de pista tras rellenar el form ADD
			case 'Confirmar_ADD2':
			//Recoge los datos
				$pista = getDataForm();
				//LLama a la funcion sql para insertar pista
				$mensaje = $pista-> add();
				//Crea un nuevo objeto de tipo MESSAGE que muestra por pantalla el texto de la respuesta y hace un enlace para permitir la vuelta hacia atrás (hacia el controlador)
				new MESSAGE($mensaje,'../Controllers/Partidos_Controller.php');
				
			break;
			
			//Pulsa editar categoria en Partidos_SHOWALL
			case 'Confirmar_EDIT1':
			if(isset($_SESSION['tipo'])){
				if($_SESSION['tipo']=='ADMIN'){	
			
				$pista = new Partidos_Model($_REQUEST['ID_Pista'],'','','');
				//Recoge los datos
				$datos = $pista->rellenadatos();
				//Muestra el form de EDIT
				new Partidos_EDIT($datos,'../Controllers/Partidos_Controller.php');
				
				}else{
					new MESSAGE('No puedes ver esto si no eres administrador', '../Controllers/Partidos_Controller.php'); 
				}
				
			}
				
			break;
			//Confirma el EDIT de pista tras rellenar el form EDIT
			case 'Confirmar_EDIT2':	
			//Recoge los datos
				$pista = getDataForm();
				//Crea un nuevo objeto de tipo MESSAGE que muestra por pantalla el texto de la respuesta y hace un enlace para permitir la vuelta hacia atrás (hacia el controlador)
				$mensaje = $pista-> edit();
				new MESSAGE($mensaje,'../Controllers/Partidos_Controller.php');
			break;
		
			//Pulsa buscar pista en Partidos_SHOWALL
			case 'Confirmar_SEARCH1':
			//Muestra el form de SEARCH
				new Partidos_SEARCH('../Controllers/Partidos_Controller.php');
			break;
			
			//Confirma el SEARCH pista tras rellenar el form search
			case 'Confirmar_SEARCH2':
			//Recoge los datos
				$pista = getDataForm();
				//Muestra las pistas tras aplicar la busqueda con una vista de Showall
				$datos = $pista-> search();
				new Partidos_SHOWALL($datos,'../Controllers/Partidos_Controller.php');
			break;
		
			//Pulsa borrar pista en Partidos_SHOWALL
			case 'Confirmar_DELETE1':
			if(isset($_SESSION['tipo'])){
				if($_SESSION['tipo']=='ADMIN'){
			
			//Pasa el id de la pista a borrar
				$pista = new Partidos_Model($_REQUEST['ID_Pista'],'','','');
				//Recoge los datos
				$datos = $pista->rellenadatos();
				//Muestra la tabla con los datos de la pista a borrar
				new Partidos_DELETE($datos,'../Controllers/Partidos_Controller.php');
				}else{
					new MESSAGE('No puedes ver esto si no eres administrador', '../Controllers/Partidos_Controller.php'); 
				}
				
			}
				
			break;
			
			//Confirma el DELETE pista
			case 'Confirmar_DELETE2':	
			//Pasa el id de la pista a borrar			
				$pista = new Partidos_Model($_REQUEST['ID_Pista'],'','','');
				//Borra dicha pista de la bd
				$mensaje = $pista-> delete();
			//Crea un nuevo objeto de tipo MESSAGE que muestra por pantalla el texto de la respuesta y hace un enlace para permitir la vuelta hacia atrás (hacia el controlador)
				new MESSAGE($mensaje,'../Controllers/Partidos_Controller.php');			
			break;
			
			//Confirma el SHOWCURRENT de pista
			case 'Confirmar_SHOWCURRENT1':

				$partido = new Partidos_Model($_REQUEST['ID_Partido'],'','','','','','','','','','','','','','');
				echo $_REQUEST['ID_Partido'];
				$datos = $partido -> rellenadatos();

				//$array = $datos -> fech_array();

				new Partidos_SHOWCURRENT($datos,'../Controllers/Partidos_Controller.php');
				
			break;

			//Por defecto al seleccionar la seccion de Partidos en el menu se mostrara el SHOWALL
			default: /*PARA EL SHOWALL */
			//Busca todas las pistas
				$pista = new Partidos_Model('','','','');
				$datos = $pista -> search();
				//Las muestra en una tabla
				$respuesta = new Partidos_SHOWALL($datos,'../Controllers/Partidos_Controller.php');

		}
	}



?>
