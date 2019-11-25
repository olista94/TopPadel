
<?php

//Creamos la sesion
session_start();

//Incluimos los mensajes y la funcion de autenticacion
include_once "../Views/MESSAGE.php";
include_once "../Functions/Authentication.php";

//Comprobamos si esta el tipo de usuario en sesion
if(isset($_SESSION['tipo'])){
	//Si el usuario es tipo admin
	
		
		if (!IsAuthenticated()){ //si no está autenticado

			new MESSAGE('No puedes ver esto si no estás logueado', '../Controllers/Login_Controller.php'); //muestra el mensaje

		}else{ //si lo está

			//Incluimos las vistas y modelo necesarios
			include_once "../Views/Clases_Grupales_SHOWALL_View.php";
			include_once "../Models/Clases_Grupales_Model.php";
			include_once "../Views/Clases_Grupales_DELETE_View.php";
			include_once "../Views/Clases_Grupales_SHOWCURRENT_View.php";
			include_once "../Views/Clases_Grupales_INSCRIPCION_View.php";
			
/* 			
			include_once "../Views/Clases_Grupales_ADD_Fecha_View.php";
			include_once "../Views/Clases_Grupales_ADD_Hora_View.php";
			include_once "../Views/Clases_Grupales_ADD_Pista_View.php";
			include_once "../Views/Clases_Grupales_ADD_Entrenador_View.php";
			include_once "../Views/Clases_Grupales_SEARCH_View.php"; */
			 

			/* RECOGE LOS DATOS DEL FORMULARIO */
			function getDataForm(){
			if(isset($_REQUEST['ID_Clase'])){
				$ID_Clase = $_REQUEST['ID_Clase'];//Identificador de la Inscripcion
				
			}
			else{
				$ID_Clase = "";
			}

			if(isset($_REQUEST['login_entrenador'])){
				$login_entrenador = $_REQUEST['login_entrenador'];//Identificador de la Inscripcion
				
			}
			else{
				$login_entrenador = "";
			}
				
			if(isset($_REQUEST['tope'])){
				$tope = $_REQUEST['tope'];//Identificador de la Inscripcion
				
			}
			else{
				$tope = "";
			}
			
			if(isset($_REQUEST['tipo'])){
				$tipo = $_REQUEST['tipo'];//Identificador de la Inscripcion
				
			}
			else{
				$tipo = "";
			}

			if(isset($_REQUEST['descripcion'])){
				$descripcion = $_REQUEST['descripcion'];//Identificador de la Inscripcion
				
			}
			else{
				$descripcion = "";
			}
			
			if(isset($_REQUEST['invitado'])){
				$invitado = $_REQUEST['invitado'];//Identificador de la Inscripcion
				
			}
			else{
				$invitado = "";
			}
			
			if(isset($_REQUEST['fecha_clase'])){
				$fecha_clase = $_REQUEST['fecha_clase'];//Identificador de la Inscripcion
				
			}
			else{
				$fecha_clase = "";
			}
			
			if(isset($_REQUEST['hora_clase'])){
				$hora_clase = $_REQUEST['hora_clase'];//Identificador de la Inscripcion
				
			}
			else{
				$hora_clase = "";
			}
			
			if(isset($_REQUEST['ID_Pista'])){
				$ID_Pista = $_REQUEST['ID_Pista'];//Identificador de la Inscripcion
				
			}
			else{
				$ID_Pista = "";
			}
				
				$clases_grupales = new Clases_Grupales_Model ($ID_Clase,$login_entrenador,$tope,$tipo,$descripcion,$invitado,$fecha_clase,$hora_clase,$ID_Pista); //creamos el objeto usuario
				
				return $clases_grupales; //devolvemos el objeto usuario
			}

			//Si mandamos alguna accion desde la vista
			if(!isset($_REQUEST['action'])){
				$_REQUEST['action'] = ''; //Sino la dejamos vacia
			}

			//Segun la accion definida
			switch ($_REQUEST['action']){
				
				case 'Confirmar_ADD':
				$reserva = new Clases_Grupales_Model("","",'','','','');
					new Clases_Grupales_ADD_Fecha('../Controllers/Clases_Grupales_Controller.php');	//Crea la vista de añadir
				
			break;
			
			case 'Confirmar_ADD_Fecha':
					
				$clase = new Clases_Grupales_Model("","",'',$_REQUEST['fecha_clase'],"","");
				$horasOcupadas = $clase -> BuscarHorasOcupadas();
				
				$array = Array ('08:00:00','09:30:00','11:00:00','12:30:00','14:00:00','15:30:00','17:00:00','18:30:00','20:00:00','21:30:00');
				
		
				$ocup = Array();
				
				while($h = $horasOcupadas->fetch_array()[0]){
					array_push($ocup,$h);
					
				}
				
				$resultado = array_diff($array, $ocup);
				
				new Clases_Grupales_ADD_Hora($resultado,$_REQUEST['fecha_clase'],'../Controllers/Clases_Grupales_Controller.php');	//Crea la vista de añadir
				
				
			break;
			
			case 'Confirmar_ADD_Hora':
				$clase = new Clases_Grupales_Model("","","",$_REQUEST['fecha_clase'],$_REQUEST['hora_clase'],"");
				$pistasLibres = $clase -> pistasLibres();
				
				
				new Clases_Grupales_ADD_Pista($pistasLibres,$_REQUEST['fecha_clase'],$_REQUEST['hora_clase'],'../Controllers/Clases_Grupales_Controller.php');
			break;
			
			
			case 'Confirmar_ADD_Pista':
				$clase = new Clases_Grupales_Model("","","",$_REQUEST['fecha_clase'],$_REQUEST['hora_clase'],$_REQUEST['ID_Pista']);
				$entrenadores = $clase -> buscarEntrenador();
				
				$entrenadoresDisponibles = Array();
				
				while($e = $entrenadores->fetch_array()[0]){
						array_push($entrenadoresDisponibles,$e);					
					}
				echo $_REQUEST['ID_Pista'];
				new Clases_Grupales_ADD_Entrenador($entrenadoresDisponibles,$_REQUEST['fecha_clase'],$_REQUEST['hora_clase'],$_REQUEST['ID_Pista'],'../Controllers/Clases_Grupales_Controller.php');			 
					
			break;
			
			case 'Confirmar_ADD_Entrenador':
				
				$clase = new Clases_Grupales_Model("","",$_REQUEST['login_entrenador'],$_REQUEST['fecha_clase'],$_REQUEST['hora_clase'],$_REQUEST['ID_Pista']);
				
				$mensaje = $clase -> add();
				
				new MESSAGE($mensaje,'../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_DELETE1':
			
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$datos = $clase -> rellenadatos();
				
				new Clases_Grupales_DELETE($datos,'../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_DELETE2':
			
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$mensaje = $clase -> delete();
				
				new MESSAGE($mensaje,'../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_SHOWCURRENT':
			
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$datos = $clase -> rellenadatos();
				
				new Clases_Grupales_SHOWCURRENT($datos,'../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_INSCRIPCION1':
			
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$datos = $clase -> rellenadatos();
				
				new Clases_Grupales_INSCRIPCION($datos,'../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_INSCRIPCION2':
			
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$mensaje = $clase -> apuntarUsuario();
				
				new MESSAGE($mensaje,'../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_SEARCH1':
				
				new Clases_Grupales_SEARCH('../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_SEARCH2':
			
				$clase = getDataForm();
				
				if($_SESSION['tipo'] == 'NORMAL'){
					$datos = $clase -> searchNormal();	
					new Clases_Grupales_SHOWALL($datos,'../Controllers/Clases_Grupales_Controller.php');
				}
				
				else if($_SESSION['tipo'] == 'ADMIN'){
					$datos = $clase -> searchAdmin();	
					new Clases_Grupales_SHOWALL($datos,'../Controllers/Clases_Grupales_Controller.php');
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$datos = $clase -> searchEntrenador();	
					new Clases_Grupales_SHOWALL($datos,'../Controllers/Clases_Grupales_Controller.php');
				}

			break;

				

				default: /*PARA EL SHOWALL */
				
				if($_SESSION['tipo'] == 'NORMAL' || $_SESSION['tipo'] == 'ADMIN'){
					$clases = new Clases_Grupales_Model('','','','','','','','','');
					$datos = $clases -> ShowAllAdminNormal();
					$respuesta = new Clases_Grupales_SHOWALL($datos,'../Controllers/Clases_Grupales_Controller.php'); 
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$clases_particulas = new Clases_Grupales_Model('','','','','','');
					$datos = $clases_particulas -> ShowAllEntrenador();
					$respuesta = new Clases_Grupales_SHOWALL($datos,'../Controllers/Clases_Grupales_Controller.php'); 
				}
				
			}
		
	


}
}

?>