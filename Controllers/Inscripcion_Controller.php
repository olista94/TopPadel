
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

		/* RECOGE LOS DATOS DEL FORMULARIO */
		function getDataForm(){
			if(isset($_REQUEST['parejas_ID_Pareja'])){
				$parejas_ID_Pareja = $_REQUEST['parejas_ID_Pareja'];//Identificador de la Inscripcion
				
			}
			else{
				$parejas_ID_Pareja = "";
			}
			
			if(isset($_REQUEST['parejas_usuarios_login'])){
				$parejas_usuarios_login = $_REQUEST['parejas_usuarios_login'];//Identificador de la Inscripcion	
			}
			else{
				$parejas_usuarios_login = $_SESSION['login'];
			}
			
			if(isset($_REQUEST['parejas_usuarios_login1'])){
				$parejas_usuarios_login1 = $_REQUEST['parejas_usuarios_login1'];//Identificador de la Inscripcion	
			}
			else{
				$parejas_usuarios_login1 = "";
			}
			
			if(isset($_REQUEST['torneos_ID_Torneo'])){
				$torneos_ID_Torneo = $_REQUEST['torneos_ID_Torneo'];//Identificador de la Inscripcion	
			}
			else{
				$torneos_ID_Torneo = "";
			}
			
			$inscripcion = new Inscripcion_Model ($parejas_ID_Pareja,$parejas_usuarios_login,$parejas_usuarios_login1,$torneos_ID_Torneo);
			
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
			echo $cat;
			$id_torneo = $torneo -> BuscarID_Torneo();
			
			$usuario = new Usuarios_Model('','','','','','','','','','');
			$sexo = $_SESSION['sexo'];
			echo $sexo;
			
			if( ($cat == 'Masculina' && $sexo == 'Masculina') || ($cat == 'Mixta' && $sexo == 'Femenina') ){
				
				$u = $usuario -> BuscarHombre();
				new Inscripcion_ADD($u,$torneo,$id_torneo,'../Controllers/Inscripcions_Controller.php');
				
			}
			else if( ($cat == 'Mixta' && $sexo == 'Masculina') || ($cat == 'Femenina' && $sexo == 'Femenina') ){
				$u = $usuario -> BuscarMujer();
				new Inscripcion_ADD($u,$torneo,$id_torneo,'../Controllers/Inscripcions_Controller.php');
			}else{
			}
			
			
			
			
			break;
			//Confirma el ADD de Inscripcion tras rellenar el form ADD
			case 'Confirmar_INSCRIPCION2':
			//Recoge los datos
				$inscripcion = getDataForm();
				//LLama a la funcion sql para insertar Inscripcion
				$mensaje = $inscripcion-> add();
				//Crea un nuevo objeto de tipo MESSAGE que muestra por pantalla el texto de la respuesta y hace un enlace para permitir la vuelta hacia atrás (hacia el controlador)
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
