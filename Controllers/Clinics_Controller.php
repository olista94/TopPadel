
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
			include_once "../Models/Clinics_Model.php";
			include_once "../Models/Pistas_Model.php";		
			include_once "../Views/Clinics_SHOWALL_View.php";
			include_once "../Views/Clinics_SHOWCURRENT_View.php";
			include_once "../Views/Clinics_DELETE_View.php";
			include_once "../Views/Clinics_ADD_View.php";
			include_once "../Views/Clinics_SEARCH_View.php";
			include_once "../Views/Clinics_INSCRIPCION_View.php";
			
			 

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
				
				$clinics = new Clinics_Model ($ID_Clase,$login_entrenador,$tope,$tipo,$descripcion,$invitado,$fecha_clase,$hora_clase,$ID_Pista); //creamos el objeto usuario
				
				return $clinics; //devolvemos el objeto usuario
			}

			//Si mandamos alguna accion desde la vista
			if(!isset($_REQUEST['action'])){
				$_REQUEST['action'] = ''; //Sino la dejamos vacia
			}

			//Segun la accion definida
			switch ($_REQUEST['action']){
				
				case 'Confirmar_ADD1':
					$clase = new Clinics_Model("","",'','','','','','','');
					new Clinics_ADD('../Controllers/Clinics_Controller.php');	//Crea la vista de añadir
				
				break;
			
			case 'Confirmar_ADD2':
					
					$clase = getDataForm();
					
					$pista = $clase -> buscarPistasLibresClases();
					$entrenador = $clase -> buscarEntrenadoresLibresClases();
					
					
					if(!is_string($entrenador) || !is_numeric($pista)){
						new MESSAGE('No hay pista y/o entrenadores disponibles','../Controllers/Clinics_Controller.php');
					}else{
						
						$mensaje = $clase -> addClinic();
						$idclase = $clase -> DevolverMaxIDClase();
						
						$clase -> insertarPistayEntrenador($pista,$entrenador,$idclase);
						
						new MESSAGE($mensaje,'../Controllers/Clinics_Controller.php');
					
					}
				
			break;
			
			case 'Confirmar_DELETE1':
			
				$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$datos = $clase -> searchAdminNormal();
				$p = $pistas -> search();
				
				new Clinics_DELETE($datos,$p,'../Controllers/Clinics_Controller.php');
			
			break;
			
			case 'Confirmar_DELETE2':
			
				$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$mensaje = $clase -> delete();
				
				new MESSAGE($mensaje,'../Controllers/Clinics_Controller.php');
			
			break;
			
			case 'Confirmar_SHOWCURRENT':
			
				$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$datos = $clase -> searchAdminNormal();
				$p = $pistas -> search();
				
				new Clinics_SHOWCURRENT($datos,$p,'../Controllers/Clinics_Controller.php');
			
			break;
			
			case 'Confirmar_SEARCH1':
				$pistas = new Pistas_Model("","","",""); 
				$p = $pistas -> search(); 
				
				new Clinics_SEARCH($p,'../Controllers/Clinics_Controller.php');
			
			break;
			
			case 'Confirmar_SEARCH2':
			
				$clase = getDataForm();
				
				if($_SESSION['tipo'] == 'NORMAL'){
					$datos = $clase -> searchAdminNormal();
					$apuntados = $clase -> ContarUsuarios();
					
					new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php');
				}
				
				else if($_SESSION['tipo'] == 'ADMIN'){
					$datos = $clase -> searchAdminNormal();
					$apuntados = $clase -> ContarUsuarios();
					
					new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php');
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$datos = $clase -> searchEntrenador();
					$apuntados = $clase -> ContarUsuarios();
					
					new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php');
				}

			break;
			
			case 'Confirmar_INSCRIPCION1':
			
				$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$apuntarse = $clase -> PuedeApuntarse();
				
				$tope = $clase -> devolverTope() -> fetch_array();
				$numApuntados = $clase -> ContarUsuarios1() -> fetch_array();

				if($tope[0] > $numApuntados[0]){
				
				
					if($apuntarse == false){
						new MESSAGE('Ya estas apuntado','../Controllers/Clinics_Controller.php');
					}
				
					else{
						$p = $pistas -> search();
						$datos = $clase -> rellenadatos();
						new Clinics_INSCRIPCION($datos,$p,'../Controllers/Clinics_Controller.php');
					}
				}
				
				else{
					new MESSAGE('Ya se ha alcanzado el maximo de apuntados','../Controllers/Clinics_Controller.php');	
				}
			
			break;
			
			case 'Confirmar_INSCRIPCION2':
			
				$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$mensaje = $clase -> apuntarUsuario();
				
				new MESSAGE($mensaje,'../Controllers/Clinics_Controller.php');
			
			break;

				

				default: /*PARA EL SHOWALL */
				
				if($_SESSION['tipo'] == 'NORMAL'){
					$clinics = new Clinics_Model('','','','','','','','','');
					$datos = $clinics -> ShowAllAdminNormal();
					
					$apuntados = $clinics -> ContarUsuarios();
					
					$respuesta = new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php'); 
				}
				else if($_SESSION['tipo'] == 'ADMIN'){
					$clinics = new Clinics_Model('','','','','','','','','');
					$datos = $clinics -> ShowAllAdminNormal();
					
					$apuntados = $clinics -> ContarUsuarios();
					
					$respuesta = new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php'); 
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$clinics = new Clinics_Model('','','','','','','','','');
					$datos = $clinics -> ShowAllEntrenador();
					
					$apuntados = $clinics -> ContarUsuarios();
					
					$respuesta = new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php'); 
				}
				
			}
		
	


}
}

?>