
<?php
session_start();
include_once "../Views/MESSAGE.php";
include_once "../Views/ALERT.php";
include_once "../Functions/Authentication.php";

if (!IsAuthenticated()){ //si no está autenticado
    new MESSAGE('No puedes ver esto si no estás logueado', '../Controllers/Login_Controller.php'); //muestra el mensaje
}else{ //si lo está

//Incluimos las vistas y modelo necesarios
	include_once "../Models/Promociones_Model.php";
	include_once "../Models/Usuarios_Model.php";
	include_once "../Models/Pistas_Model.php";
	include_once "../Views/Promociones_SHOWALL_View.php";
	//include_once "../Views/Promociones_ADD_View.php";
	//include_once "../Views/Promociones_SEARCH_View.php";
	//include_once "../Views/Promociones_EDIT_View.php";
	//include_once "../Views/Promociones_DELETE_View.php";
	//include_once "../Views/Promociones_SHOWCURRENT_View.php";
	
	/* RECOGE LOS DATOS DEL FORMULARIO */
	function getDataForm(){

		if(isset($_REQUEST['ID_Promo'])){
			$ID_Promo = $_REQUEST['ID_Promo'];//Si el campo se le ha pasado se le asigna
		}else{
			$ID_Promo = $_SESSION['ID_Promo']; //Si no, se pone como vacío
		}

		//Comprueba si está el campo
		if(isset($_REQUEST['fecha'])){
			$fecha = $_REQUEST['fecha'];//Si el campo se le ha pasado se le asigna
		}else{
			$fecha = ""; //Si no, se pone como vacío
		}

		//Comprueba si está el campo
		if(isset($_REQUEST['hora_fin'])){
			$hora_fin = $_REQUEST['hora_fin'];//Si el campo se le ha pasado se le asigna
		}else{
			$hora_fin = ""; //Si no, se pone como vacío
		}

		if(isset($_REQUEST['usuarios_login'])){
			$usuarios_login = $_REQUEST['usuarios_login'];//Si el campo se le ha pasado se le asigna
		}else{
			$usuarios_login = $_SESSION['login']; //Si no, se pone como vacío
		}

		if(isset($_REQUEST['pista_ID_Pista'])){
			$pista_ID_Pista = $_REQUEST['pista_ID_Pista'];//Si el campo se le ha pasado se le asigna
		}else{
			$pista_ID_Pista = ""; //Si no, se pone como vacío
		}

		//Construye el objeto promocion con los parámetros
		$promocion = new Promociones_Model ($ID_Promo, $fecha, $hora_fin, $usuarios_login,
			$pista_ID_Pista);
		
		//Devuelve el objeto promocion
		return $promocion;
	}

	//Comprueba si hay una accion seleccionada desde la vista
	if(!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

	//Accioneas a realizar según la acción que venga de la vista
	switch ($_REQUEST['action']){
		//Añadir una promocion desde el showall
		case 'Confirmar_ADD':
			//Si no se le están pasando datos entonces crea una vista para añadir
			if(count($_REQUEST) < 4 ){
				$usuarios = new Usuarios_Model("","","","","","","","","","","",""); //Construye el objeto usuarios llamando al modelo
				$u = $usuarios -> search(); //Busca los usuarios
				
				$pistas = new Pistas_Model("",""); //Construye el objeto categorias llamando al modelo
				$p = $pistas -> search(); //Busca las categorias
				
				new Promociones_ADD($u,$p,'../Controllers/Promociones_Controller.php');	//Crea la vista de añadir
			//Si se le pasan datos entonces los recoge
			}else{
				$promocion = getDataForm();	//Asigna los datos obtenidos al objeto promocion		
				$mensaje = $promocion-> add(); //Llama al modelo para añadirla y le pasa la respuesta a MESSAGE
				
				//Si el insertado es correcto
				new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php');			 
			}		
		break;

		//Editar una tarea
		case 'Confirmar_EDIT':
			//Si no se le están pasando datos entonces crea una vista para editar
			if(count($_REQUEST) < 4 ){			
				$tarea = new TAREAS_Model($_REQUEST['id_tarea'],'','','','','','',''); //Construye el objeto TAREAS con el id de la tarea que se pasa
				$datos = $tarea->rellenadatos(); //Se rellenan los datos de la tarea

				$array = $datos -> fetch_array(); //Se construye el array con los datos
				$prioridades = new PRIORIDADES_Model("","",""); //Se crea el objeto prioridades
				$p = $prioridades -> search(); //Se buscan las prioridades y se meten en p
				
				$categorias = new CATEGORIAS_Model("",""); //Se crea el objeto categorias
				$cat = $categorias -> search(); //Se buscan las categorias y se meten en cat

				$datos = $tarea->rellenadatos(); //Se rellenan los datos de la tarea

				new Tareas_EDIT($datos,$p,$cat,'../Controllers/Tareas_Controller.php'); //Se crea una vista para editar una tarea
			//Si se le han pasado datos
			}else{			
				$tarea = getDataForm(); //Se cogen los datos del formulario
				$mensaje = $tarea-> edit(); //Se edita con los nuevos datos y se guarda el mensaje de retorno
				new MESSAGE($mensaje,'../Controllers/Tareas_Controller.php'); //Se crea la vista de mensaje con el mensaje
			}
		break;

		//Si se selecciona la accion buscar desde el showall
		case 'Confirmar_SEARCH1':							
			new Tareas_SEARCH('../Controllers/Tareas_Controller.php'); //Se crea la vista para buscar
		break;

		//Si se le da a buscar desde la vista de buscar
		case 'Confirmar_SEARCH2':
			//Si el usuario es de tipo admin puede buscar entre todas las tareas
			if(isset($_SESSION['tipo'])){
				if($_SESSION['tipo']=='ADMIN'){
					$tarea = getDataForm(); //Se llena el objeto tarea con los datos del formulario
					$datos = $tarea-> searchAdmin(); //Se busca en todas las tareas y se guardan los datos
					$archivos = $tarea -> ContarArchivos(); //Se cuentan los archivos de la tarea
					$fases = $tarea -> ContarFases(); //Se cuentan las fases de la tarea
					$contactos = $tarea -> ContarContactos(); //Se cuentan los contactos de la tarea
				
					new Tareas_SHOWALL($datos,$archivos,$fases,$contactos,'../Controllers/Tareas_Controller.php'); //Se muestran las tareas encontradas en un showall
				//En otro caso el usuario es un usuario normal
				}else{
					$tarea = getDataForm(); //Se llena el objeto tarea con los datos del formulario
					$datos = $tarea-> search1(); //Se busca en las tareas del usuario y seguardan los datos
					$archivos = $tarea -> ContarArchivos(); //se cuentan los archivos de la tarea
					$fases = $tarea -> ContarFases(); //se cuentan las fases de la tarea
					$contactos = $tarea -> ContarContactos(); // se cuentan los contactos de la tarea
					new Tareas_SHOWALL($datos,$archivos,$fases,$contactos,'../Controllers/Tareas_Controller.php'); //Se muestran las tareas encontradas en un showall
				}
			}		
		break;

		//Si se le da a borrar desde la vista del showall
		case 'Confirmar_DELETE1':		
			$prioridades = new PRIORIDADES_Model("","",""); //Se crea un modelo de prioridades
			if(count($_REQUEST) < 4 ){			
				$tarea = new TAREAS_Model($_REQUEST['id_tarea'],'','','','','','',''); //Se crea un modelo de tarea con el id que se le pasa
				$datos = $tarea->rellenadatos(); //Se rellena datos con los datos de la tarea
				
				$array = $datos -> fetch_array(); //Creamos el array con los datos
				$prioridades = new PRIORIDADES_Model($array['PRIORIDADES_nivel'],"",""); //Creamos un modelo de prioridad con el nivel de prioridad
				$p = $prioridades -> searchById(); //Buscamos la prioridad por nivel
				
				$categorias = new CATEGORIAS_Model($array['CATEGORIAS_id_CATEGORIAS'],""); //Creamos una categoria con el modelo y el id de la categoria
				$cat = $categorias -> searchById(); //Buscamos la categoria por nivel
				$datos = $tarea->rellenadatos(); //Volvemos rellenar los datos de la tarea
				
				new Tareas_DELETE($datos,$p,$cat,'../Controllers/Tareas_Controller.php'); //Creamos una vista de delete con los datos obtenidos
			}
		break;
		
		// Si queremos borrar desde la vista de borrar
		case 'Confirmar_DELETE2':		
			$tarea = new TAREAS_Model($_REQUEST['id_tarea'],'','','','','','',''); //Creamos un objeto tarea con el id de la tarea a borrar
			$mensaje = $tarea-> delete(); //Llamamos a delete y guardamos el mensaje que devuelve
			new MESSAGE($mensaje,'../Controllers/Tareas_Controller.php'); //Mostramos el mensaje	
		break;

		//Si queremos mostrar los datos de una tarea en concreto
		case 'Confirmar_SHOWCURRENT':
			//Si no se le pasan argumentos por request
			if(count($_REQUEST) < 4 ){	

				$tarea = new TAREAS_Model($_REQUEST['id_tarea'],'','','','','','',''); //Creamos un objeto tarea con el id de la tarea a ver
				$datos = $tarea->rellenadatos(); //Se rellena datos con los datos de la tarea
				
				$array = $datos -> fetch_array(); //Creamos el array con los datos
				$prioridades = new PRIORIDADES_Model($array['PRIORIDADES_nivel'],"",""); //Creamos un modelo de prioridad con el nivel de prioridad
				$p = $prioridades -> searchById(); //Buscamos la prioridad por nivel
				
				$categorias = new CATEGORIAS_Model($array['CATEGORIAS_id_CATEGORIAS'],""); //Creamos una categoria con el modelo y el id de la categoria
				$cat = $categorias -> searchById(); //Buscamos la categoria por nivel
				$datos = $tarea->rellenadatos(); //Volvemos rellenar los datos de la tarea
				
				new Tareas_SHOWCURRENT($datos,$p,$cat,'../Controllers/Tareas_Controller.php'); //Creamos una vista de delete con los datos obtenidos
			}
		break;
		

		default: /*PARA EL SHOWALL */
			//Comprobamos el tipo de usuario
			if(isset($_SESSION['tipo'])){
				//Si el usuario es de tipo admin
				if($_SESSION['tipo']=='ADMIN'){		   
					$promocion = new Promociones_Model('','','','','');//Creamos un objeto promocion
					
					$usuarios = new Usuarios_Model("","","","","","","","","","","",""); //Construye el objeto usuarios llamando al modelo
					$u = $usuarios -> search(); //Busca los usuarios
				
					$pistas = new Pistas_Model("",""); //Construye el objeto categorias llamando al modelo
					$p = $pistas -> search(); //Busca las categorias
					
					$idpista = $promocion -> DevolverIDPista(); //Busca las pistas

					$datos = $promocion -> searchAdmin($idpista); //Recuperamos todas las promociones y las guardamos en datos						
					
					
					//Creamos una vista de todas las promociones completas con los datos
					$respuesta = new Promociones_SHOWALL($datos,$u,$p,'../Controllers/Promociones_Controller.php');	
				//Si es usuario normal
				}else{		   
					$promocion = new Promociones_Model('','','','','');//Creamos un objeto promocion
					
					$datos = $promocion -> search1();//Recuperamos todas las promociones y las guardamos en datos		
					
					//Creamos una vista de todas las promciones completas con los datos
					$respuesta = new Promociones_SHOWALL($datos,'../Controllers/Promociones_Controller.php');	
				}	 
			}
	}
}
?>