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
		//include_once "../Views/Partidos_SHOWALL_View.php";
		include_once "../Views/Partidos_ADD_View.php";
		//include_once "../Views/Partidos_SEARCH_View.php";
		//include_once "../Views/Partidos_EDIT_View.php";
		//include_once "../Views/Partidos_SHOWCURRENT_View.php";
		//include_once "../Views/Partidos_DELETE_View.php";
		include_once "../Views/MESSAGE.php";
		include_once "../Functions/Authentication.php";

		/* RECOGE LOS DATOS DEL FORMULARIO */
		function getDataForm(){
			if(isset($_REQUEST['ID_Pista'])){
				$ID_Pista = $_REQUEST['ID_Pista'];//Identificador de la pista
				
			}
			else{
				$ID_Pista = "";
			}
			$Nombre_Pista = $_REQUEST['Nombre_Pista'];
			$techo = $_REQUEST['techo'];
			$suelo = $_REQUEST['suelo'];
			
			//Nombre de la pista	
			//Creamos un objeto Pista
			$pista = new Partidos_Model ($ID_Pista,$Nombre_Pista,$techo,$suelo);
			
			//Devuelve el objeto Pista
			return $pista;
		}
		
		//Si no existe un botón action le asigno cadena vacía para asegurarme que entre por el default del switch
		if(!isset($_REQUEST['action'])){
			$_REQUEST['action'] = '';
		}

		//Acciones a realizar dependiendo del boton pulsado
		switch ($_REQUEST['action']){
			
			
					
			
			case 'Acta_Partido':	
					
					
					
				new Partidos_ADD('../Controllers/Partidos_Controller.php');
				
				
				
			
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
			case 'Confirmar_SHOWCURRENT':
				if(count($_REQUEST) < 4 ){
					//Pasa el id de la pista a mostrar
					$pista = new Partidos_Model($_REQUEST['ID_Pista'],'','','');
					//Recoge los datos
					$datos = $pista->rellenadatos();
					//Muesta la tabla con los datos de la categoria seleccionada
					new Partidos_SHOWCURRENT($datos,'../Controllers/Partidos_Controller.php');
				}
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
