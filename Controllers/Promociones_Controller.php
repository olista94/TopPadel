
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
	include_once "../Views/Promociones_ADD_View.php";
	include_once "../Views/Promociones_SEARCH_View.php";
	include_once "../Views/Promociones_DELETE_View.php";
	include_once "../Views/Promociones_SHOWCURRENT_View.php";
	include_once "../Views/Promociones_INSCRIPCION_View.php";
	include_once "../Models/Promociones_has_Usuarios_Model.php";
	
	/* RECOGE LOS DATOS DEL FORMULARIO */
	function getDataForm(){
		if(isset($_REQUEST['ID_Promo'])){
			$ID_Promo = $_REQUEST['ID_Promo'];//Si el campo se le ha pasado se le asigna
		}else{
			$ID_Promo = ""; //Si no, se pone como vacío
		}
		//Comprueba si está el campo
		if(isset($_REQUEST['fecha'])){
			$fecha = $_REQUEST['fecha'];//Si el campo se le ha pasado se le asigna
		}else{
			$fecha = ""; //Si no, se pone como vacío
		}
		//Comprueba si está el campo
		if(isset($_REQUEST['hora_inicio'])){
			$hora_inicio = $_REQUEST['hora_inicio'];//Si el campo se le ha pasado se le asigna
		}else{
			$hora_inicio = ""; //Si no, se pone como vacío
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
		$promocion = new Promociones_Model ($ID_Promo, $fecha, $hora_inicio, $usuarios_login,
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
		case 'Confirmar_ADD1':

				$pistas = new Pistas_Model("",""); //Construye el objeto categorias llamando al modelo
				$p = $pistas -> search(); //Busca las categorias
				
				new Promociones_ADD($p,'../Controllers/Promociones_Controller.php');	//Crea la vista de añadir
			//Si se le pasan datos entonces los recoge
		break;
		case 'Confirmar_ADD2':	
		
			if(isset($_SESSION['tipo'])){
				if($_SESSION['tipo']=='ADMIN'){	
				$promocion = getDataForm();	//Asigna los datos obtenidos al objeto promocion		
				$mensaje = $promocion-> add(); //Llama al modelo para añadirla y le pasa la respuesta a MESSAGE
				
				$idpromo = $promocion -> DevolverIDPromo();
				
				$apuntar = new Promociones_has_Usuarios_Model($idpromo,"");
				$a = $apuntar -> add();
				
				
				//Si el insertado es correcto
				new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php');	
				}
				else{
					$promocion = getDataForm();	//Asigna los datos obtenidos al objeto promocion		
					$mensaje = $promocion-> add(); //Llama al modelo para añadirla y le pasa la respuesta a MESSAGE
				
					$idpromo = $promocion -> DevolverIDPromo();
				
					$apuntar = new Promociones_has_Usuarios_Model($idpromo,$_SESSION['login']);
					$a = $apuntar -> add();
				
				
				//Si el insertado es correcto
				new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php');	
				}
			}
					
		break;
		
		case 'Confirmar_INSCRIPCION1':
		
				$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","");
				$inscritos = $promocion -> PuedeApuntarse();
				$array = $inscritos -> fetch_array();
				
				if($array[0] < 4 || empty($array[0]) == true){
				
				$datos = $promocion -> rellenadatos();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['pista_ID_Pista'],"");
				
				$p = $pistas -> searchById();
				$datos = $promocion -> rellenadatos();
				
				new Promociones_INSCRIPCION($datos,$p,'../Controllers/Promociones_Controller.php');
				}else{
				new MESSAGE('Esta promocion esta cerrada','../Controllers/Promociones_Controller.php');
				}
		break;
		
		case 'Confirmar_INSCRIPCION2':
				
				$apuntar = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],$_SESSION['login']);
				$mensaje = $apuntar -> add();
				
				new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php');//Mostramos el mensaje				

				
		break;
		
		
		//Si se selecciona la accion buscar desde el showall
		case 'Confirmar_SEARCH1':	
				$pistas = new Pistas_Model("",""); //Construye el objeto categorias llamando al modelo
				$p = $pistas -> search(); //Busca las categorias		
			new Promociones_SEARCH($p,'../Controllers/Promociones_Controller.php'); //Se crea la vista para buscar
		break;
		//Si se le da a buscar desde la vista de buscar
		case 'Confirmar_SEARCH2':
			//Si el usuario es de tipo admin puede buscar entre todas las tareas
			if(isset($_SESSION['tipo'])){
				if($_SESSION['tipo']=='ADMIN'){
									
					$promocion = getDataForm(); //Se llena el objeto tarea con los datos del formulario
					$datos = $promocion-> searchAdmin(); //Se busca en todas las tareas y se guardan los datos

					new Promociones_SHOWALL($datos,'../Controllers/Tareas_Controller.php'); //Se muestran las tareas encontradas en un showall
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
				
				$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","");
				
				$datos = $promocion -> rellenadatos();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['pista_ID_Pista'],"");
				
				$p = $pistas -> searchById();
				$datos = $promocion -> rellenadatos();
				
				new Promociones_DELETE($datos,$p,'../Controllers/Promociones_Controller.php'); //Creamos una vista de delete con los datos obtenidos
		break;
		
		// Si queremos borrar desde la vista de borrar
		case 'Confirmar_DELETE2':		
			$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","");
			$mensaje = $promocion-> delete(); //Llamamos a delete y guardamos el mensaje que devuelve
			new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php'); //Mostramos el mensaje	
		break;
		//Si queremos mostrar los datos de una tarea en concreto
		case 'Confirmar_SHOWCURRENT':
			$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","");
				
				$datos = $promocion -> rellenadatos();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['pista_ID_Pista'],"");
				
				$p = $pistas -> searchById();
				$datos = $promocion -> rellenadatos();
				
				new Promociones_SHOWCURRENT($datos,$p,'../Controllers/Promociones_Controller.php'); //Creamos una vista de delete con los datos obtenidos
		break;
		
		default: /*PARA EL SHOWALL */
			//Comprobamos el tipo de usuario
			if(isset($_SESSION['tipo'])){
				//Si el usuario es de tipo admin
				if($_SESSION['tipo']=='ADMIN'){		   
					$promocion = new Promociones_Model('','','','','');//Creamos un objeto promocion
					
					$datos = $promocion -> PromocionesShowAll();
					$usuarios = $promocion -> ContarUsuarios();
					//Creamos una vista de todas las promociones completas con los datos
					$respuesta = new Promociones_SHOWALL($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
				//Si es usuario normal
				}else{		   
					$promocion = new Promociones_Model('','','','','');//Creamos un objeto promocion
					
					$datos = $promocion -> PromocionesShowAll();
					$usuarios = $promocion -> ContarUsuarios();
					//Creamos una vista de todas las promociones completas con los datos
					$respuesta = new Promociones_SHOWALL($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
				}	 
			}
	}
}
?>