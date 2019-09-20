<?php

//Variable de sesion
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
	include_once "../Views/Torneos_ADD_View.php";
	include_once "../Views/Torneos_SEARCH_View.php";
	include_once "../Views/Torneos_EDIT_View.php";
	include_once "../Views/Torneos_SHOWCURRENT_View.php";
	include_once "../Views/Torneos_DELETE_View.php";

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

		//Accion por defecto cuando no hay ninguna accion
		default: /*PARA EL SHOWALL */
			$torneo = new Torneos_Model('','','','','',''); //Se construye el objeto torneo
			$datos = $torneo -> search(); //Se buscan todos los torneos y se pasan a datos
			$respuesta = new Torneos_SHOWALL($datos,'../Controllers/Torneos_Controller.php'); //Se crea el SHOWALL para mostrar todos los torneos

	}
}
?>