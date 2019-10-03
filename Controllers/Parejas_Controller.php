
<?php
//Variable de sesion
session_start();

//Incluye la funciones que se encuentran en los siguientes ficheros:
include_once "../Views/Header.php";
include_once "../Views/MESSAGE.php";
include_once "../Functions/Authentication.php";

if(isset($_SESSION['tipo'])){
	
		//Incluye la funciones que se encuentran en los siguientes ficheros:
		include_once "../Models/Inscripcion_Model.php";
		//include_once "../Views/Inscripciones_SHOWALL_View.php";
		include_once "../Views/Inscripcion_ADD_View.php";
		//include_once "../Views/Inscripciones_SEARCH_View.php";
		//include_once "../Views/Inscripciones_EDIT_View.php";
		//include_once "../Views/Inscripciones_SHOWCURRENT_View.php";
		//include_once "../Views/Inscripciones_DELETE_View.php";
		include_once "../Views/MESSAGE.php";
		include_once "../Functions/Authentication.php";
		include_once "../Models/Usuarios_Model.php";
		include_once "../Models/Torneos_Model.php";
		include_once "../Models/Inscripcion_Model.php";
		include_once "../Controllers/Inscripcion_Controller.php";

		/* RECOGE LOS DATOS DEL FORMULARIO */
		function getDataForm(){
			if(isset($_REQUEST['ID_Pareja'])){
				$ID_Pareja = $_REQUEST['ID_Pareja'];//Identificador de la Inscripcion
				
			}
			else{
				$ID_Pareja = "";
			}
			
			if(isset($_REQUEST['usuarios_login'])){
				$usuarios_login = $_REQUEST['usuarios_login'];//Identificador de la Inscripcion	
			}
			else{
				$usuarios_login = $_SESSION['login'];
			}
			
			if(isset($_REQUEST['usuarios_login1'])){
				$usuarios_login1 = $_REQUEST['usuarios_login1'];//Identificador de la Inscripcion	
			}
			else{
				$usuarios_login1 = "";
			}
			
			
			
			$pareja = new Parejas_Model ($ID_Pareja,$usuarios_login,$usuarios_login1);
			
			//Devuelve el objeto pareja
			return $pareja;
		}
		
		//Si no existe un botón action le asigno cadena vacía para asegurarme que entre por el default del switch
		if(!isset($_REQUEST['action'])){
			$_REQUEST['action'] = '';
		}

		//Acciones a realizar dependiendo del boton pulsado
		switch ($_REQUEST['action']){
			
			//Confirma el ADD de Inscripcion tras rellenar el form ADD
			case 'Confirmar_INSCRIPCION2':
			//Recoge los datos
			$pareja = new Parejas_Model('','','');
			$pareja = getDataForm();
			
				//LLama a la funcion sql para insertar pareja
				$mensaje = $pareja-> add();
				//Crea un nuevo objeto de tipo MESSAGE que muestra por pantalla el texto de la respuesta y hace un enlace para permitir la vuelta hacia atrás (hacia el controlador)
				new MESSAGE($mensaje,'../Controllers/Parejas_Controller.php');
			
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
