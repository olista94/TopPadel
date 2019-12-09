
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
			include_once "../Models/Clases_Particulares_Model.php";
			include_once "../Models/Pistas_Model.php";
			include_once "../Views/Clases_Particulares_SHOWALL_View.php";
			include_once "../Views/Clases_Particulares_ADD_Fecha_View.php";
			include_once "../Views/Clases_Particulares_ADD_Hora_View.php";
			include_once "../Views/Clases_Particulares_ADD_Pista_View.php";
			include_once "../Views/Clases_Particulares_ADD_Entrenador_View.php";
			include_once "../Views/Clases_Particulares_DELETE_View.php";
			include_once "../Views/Clases_Particulares_SHOWCURRENT_View.php";
			include_once "../Views/Clases_Particulares_SEARCH_View.php";
			 

			/* RECOGE LOS DATOS DEL FORMULARIO */
			function getDataForm(){
			if(isset($_REQUEST['ID_Clase'])){
				$ID_Clase = $_REQUEST['ID_Clase'];//Identificador de la Inscripcion
				
			}
			else{
				$ID_Clase = "";
			}

			if(isset($_REQUEST['login_usuario'])){
				$login_usuario = $_REQUEST['login_usuario'];//Identificador de la Inscripcion
				
			}
			else{
				$login_usuario = "";
			}
				
			if(isset($_REQUEST['login_entrenador'])){
				$login_entrenador = $_REQUEST['login_entrenador'];//Identificador de la Inscripcion
				
			}
			else{
				$login_entrenador = "";
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
				
				$clases_particulas = new Clases_Particulares_Model ($ID_Clase,$login_usuario,$login_entrenador,$fecha_clase,$hora_clase,$ID_Pista); //creamos el objeto usuario
				
				return $clases_particulas; //devolvemos el objeto usuario
			}

			//Si mandamos alguna accion desde la vista
			if(!isset($_REQUEST['action'])){
				$_REQUEST['action'] = ''; //Sino la dejamos vacia
			}

			//Segun la accion definida
			switch ($_REQUEST['action']){
				
				case 'Confirmar_ADD':
				$reserva = new Clases_Particulares_Model("","",'','','','');
					new Clases_Particulares_ADD_Fecha('../Controllers/Clases_Particulares_Controller.php');	//Crea la vista de añadir
				
			break;
			
			case 'Confirmar_ADD_Fecha':
					
				$clase = new Clases_Particulares_Model("","",'',$_REQUEST['fecha_clase'],"","");
				$horasOcupadas = $clase -> BuscarHorasOcupadas();
				
				$array = Array ('08:00:00','09:30:00','11:00:00','12:30:00','14:00:00','15:30:00','17:00:00','18:30:00','20:00:00','21:30:00');
				
		
				$ocup = Array();
				
				while($h = $horasOcupadas->fetch_array()[0]){
					array_push($ocup,$h);
					
				}
				
				$resultado = array_diff($array, $ocup);
				
				new Clases_Particulares_ADD_Hora($resultado,$_REQUEST['fecha_clase'],'../Controllers/Clases_Particulares_Controller.php');	//Crea la vista de añadir
				
				
			break;
			
			case 'Confirmar_ADD_Hora':
				$clase = new Clases_Particulares_Model("","","",$_REQUEST['fecha_clase'],$_REQUEST['hora_clase'],"");
				$pistasLibres = $clase -> pistasLibres();
				
				
				new Clases_Particulares_ADD_Pista($pistasLibres,$_REQUEST['fecha_clase'],$_REQUEST['hora_clase'],'../Controllers/Clases_Particulares_Controller.php');
			break;
			
			
			case 'Confirmar_ADD_Pista':
				$clase = new Clases_Particulares_Model("","","",$_REQUEST['fecha_clase'],$_REQUEST['hora_clase'],$_REQUEST['ID_Pista']);
				$entrenadores = $clase -> buscarEntrenador();
				
				$entrenadoresDisponibles = Array();
				
				while($e = $entrenadores->fetch_array()[0]){
						array_push($entrenadoresDisponibles,$e);					
					}
				new Clases_Particulares_ADD_Entrenador($entrenadoresDisponibles,$_REQUEST['fecha_clase'],$_REQUEST['hora_clase'],$_REQUEST['ID_Pista'],'../Controllers/Clases_Particulares_Controller.php');			 
					
			break;
			
			case 'Confirmar_ADD_Entrenador':
				
				$clase = new Clases_Particulares_Model("","",$_REQUEST['login_entrenador'],$_REQUEST['fecha_clase'],$_REQUEST['hora_clase'],$_REQUEST['ID_Pista']);
				
				$mensaje = $clase -> add();
				
				new MESSAGE($mensaje,'../Controllers/Clases_Particulares_Controller.php');
			
			break;
			
			case 'Confirmar_DELETE1':
			
				$clase = new Clases_Particulares_Model($_REQUEST['ID_Clase'],"","","","","");
				
				$datos = $clase -> searchAdmin();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['ID_Pista'],"","","");
				$p = $pistas -> searchById();
				
				$datos = $clase -> searchAdmin();
				
				new Clases_Particulares_DELETE($datos,$p,'../Controllers/Clases_Particulares_Controller.php');
			
			break;
			
			case 'Confirmar_DELETE2':
			
			if($_SESSION['tipo'] == 'NORMAL' || $_SESSION['tipo'] == 'ADMIN'){
				$clase = new Clases_Particulares_Model($_REQUEST['ID_Clase'],"","","","","");
				
				$mensaje = $clase -> delete();
				
				new MESSAGE($mensaje,'../Controllers/Clases_Particulares_Controller.php');
			}
			else{
				$clase = new Clases_Particulares_Model($_REQUEST['ID_Clase'],"","","","","");
				
				$mensaje = $clase -> solicitaBorrado();
				
				new MESSAGE($mensaje,'../Controllers/Clases_Particulares_Controller.php');
			}
			
			break;
			
			case 'Confirmar_SHOWCURRENT':
			
				$clase = new Clases_Particulares_Model($_REQUEST['ID_Clase'],"","","","","");
				
				$datos = $clase -> searchAdmin();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['ID_Pista'],"","","");
				$p = $pistas -> searchById();
				
				$datos = $clase -> searchAdmin();
				
				new Clases_Particulares_SHOWCURRENT($datos,$p,'../Controllers/Clases_Particulares_Controller.php');
			
			break;
			
			case 'Confirmar_SEARCH1':
				$pistas = new Pistas_Model("","","",""); //Construye el objeto categorias llamando al modelo
				$p = $pistas -> search();
				new Clases_Particulares_SEARCH($p,'../Controllers/Clases_Particulares_Controller.php');
			
			break;
			
			case 'Confirmar_SEARCH2':
			
				$clase = getDataForm();
				
				if($_SESSION['tipo'] == 'NORMAL'){
					$datos = $clase -> searchNormal();	
					new Clases_Particulares_SHOWALL($datos,'../Controllers/Clases_Particulares_Controller.php');
				}
				
				else if($_SESSION['tipo'] == 'ADMIN'){
					$datos = $clase -> searchAdmin();	
					new Clases_Particulares_SHOWALL($datos,'../Controllers/Clases_Particulares_Controller.php');
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$datos = $clase -> searchEntrenador();	
					new Clases_Particulares_SHOWALL($datos,'../Controllers/Clases_Particulares_Controller.php');
				}

			break;

				

				default: /*PARA EL SHOWALL */
				
				if($_SESSION['tipo'] == 'NORMAL'){
					$clases_particulas = new Clases_Particulares_Model('','','','','','');
					$datos = $clases_particulas -> ShowAllDeportista();
					$respuesta = new Clases_Particulares_SHOWALL($datos,'../Controllers/Clases_Particulares_Controller.php'); 
				}
				else if($_SESSION['tipo'] == 'ADMIN'){
					$clases_particulas = new Clases_Particulares_Model('','','','','','');
					$datos = $clases_particulas -> ShowAllAdmin();
					$respuesta = new Clases_Particulares_SHOWALL($datos,'../Controllers/Clases_Particulares_Controller.php'); 
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$clases_particulas = new Clases_Particulares_Model('','','','','','');
					$datos = $clases_particulas -> ShowAllEntrenador();
					$respuesta = new Clases_Particulares_SHOWALL($datos,'../Controllers/Clases_Particulares_Controller.php'); 
				}
				
			}
		
	


}
}

?>