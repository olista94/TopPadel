
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
	include_once "../Views/Promociones_SHOWALL_Admin_View.php";
	include_once "../Views/Promociones_SHOWALL_Todas_View.php";
	include_once "../Views/Promociones_SHOWALL_Mias_View.php";
	include_once "../Views/Promociones_ADD_View.php";
	include_once "../Views/Promociones_ADD_Fecha_View.php";
	include_once "../Views/Promociones_ADD_Hora_View.php";
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
		
		if(isset($_REQUEST['socio'])){
			$socio = $_REQUEST['socio'];//Si el campo se le ha pasado se le asigna
		}else{
			$socio = ""; //Si no, se pone como vacío
		}
		//Construye el objeto promocion con los parámetros
		$promocion = new Promociones_Model ($ID_Promo, $fecha, $hora_inicio, $usuarios_login,
			$pista_ID_Pista,$socio);
		
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
				
			new Promociones_ADD_Fecha('../Controllers/Promociones_Controller.php');	//Crea la vista de añadir
		break;

		case 'Confirmar_ADD_Fecha':
					
				$promociones = new Promociones_Model("",$_REQUEST['fecha'],"","","","");
				
				$horasOcupadas = $promociones -> BuscarHorasOcupadas();
				
				$array = Array ('08:00:00','09:30:00','11:00:00','12:30:00','14:00:00','15:30:00','17:00:00','18:30:00','20:00:00','21:30:00');
				
		
				$ocup = Array();
				
				while($h = $horasOcupadas->fetch_array()[0]){
					array_push($ocup,$h);
					
				}
				
				$resultado = array_diff($array, $ocup);
				
				new Promociones_ADD_Hora($resultado,$_REQUEST['fecha'],'../Controllers/Promociones_Controller.php');	//Crea la vista de añadir
				
				
			break;

			case 'Confirmar_ADD_Hora':
				/*$promociones = new Promociones_Model("",$_REQUEST['fecha'],$_REQUEST['hora_inicio'],"","","");
				$pistasLibres = $promociones -> pistasLibres();*/
				
				/* $pista = new Pistas_Model("","","","");
				$pistasTotales = $pista->DevolverTodasLasPistas();
				
				$arrayIDsOcupadas = Array();
				$arrayIDsTotales = Array();
				$arrayNombresOcupadas = Array();
				$arrayNombresTotales = Array();
				
				while($i = $pistasOcupadas->fetch_array()[0]){
					array_push($arrayIDsOcupadas,$i);
				}
				
				while($j = $pistasTotales->fetch_array()[0]){
					array_push($arrayIDsTotales,$j);
				}
				
				while($i = $pistasOcupadas->fetch_array()[1]){
					array_push($arrayNombresOcupadas,$i);
				}
				
				while($j = $pistasTotales->fetch_array()[1]){
					array_push($arrayNombresTotales,$j);
				}
				
				$IDsLibres = array_diff($arrayIDsTotales, $arrayIDsOcupadas);
				$NombresLibres = array_diff($arrayNombresTotales, $arrayNombresOcupadas); */

				//Vaina de Iago
				if(isset($_SESSION['tipo'])){
				if($_SESSION['tipo']=='ADMIN'){	
				$promocion = getDataForm();	//Asigna los datos obtenidos al objeto promocion		
				$mensaje = $promocion-> add(); //Llama al modelo para añadirla y le pasa la respuesta a MESSAGE
				
				$idpromo = $promocion -> DevolverIDPromo();
				echo $idpromo;
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
		
				$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","","");
				
				$ins = $promocion -> PuedeApuntarse();
				
				
				$inscritos = $promocion -> ContarUsuarios1();
				$array = $inscritos -> fetch_array();
				

				if($array[0] < 4 || empty($array[0]) == true){
					if($ins == true){
						$datos = $promocion -> rellenadatos();
						$array = $datos -> fetch_array();
				
						$pistas = new Pistas_Model($array['pista_ID_Pista'],"","","");
				
						$p = $pistas -> searchById();
						$datos = $promocion -> rellenadatos();
				
						new Promociones_INSCRIPCION($datos,$p,'../Controllers/Promociones_Controller.php');
					}else{
						new MESSAGE('Ya estas apuntado','../Controllers/Promociones_Controller.php');
					}
				}
				else{
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
				$pistas = new Pistas_Model("","","",""); //Construye el objeto categorias llamando al modelo
				$p = $pistas -> search(); //Busca las categorias		
			new Promociones_SEARCH($p,'../Controllers/Promociones_Controller.php'); //Se crea la vista para buscar
		break;
		//Si se le da a buscar desde la vista de buscar
		case 'Confirmar_SEARCH2':
			//Si el usuario es de tipo admin puede buscar entre todas las tareas
			
			$promocion = new Promociones_Model('','','','','','');				
			$promocion = getDataForm(); 
					
			$datos = $promocion-> searchAdmin(); 
			$usuarios = $promocion -> ContarUsuarios();
			new Promociones_SHOWALL_Todas($datos,$usuarios,'../Controllers/Promociones_Controller.php'); 		
			
		break;
		//Si se le da a borrar desde la vista del showall
		case 'Confirmar_DELETE1':		
				
				$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","","");
				
				$datos = $promocion -> rellenadatos();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['pista_ID_Pista'],"","","");
				
				$p = $pistas -> searchById();
				$datos = $promocion -> rellenadatos();
				
				new Promociones_DELETE($datos,$p,'../Controllers/Promociones_Controller.php'); //Creamos una vista de delete con los datos obtenidos
		break;
		
		// Si queremos borrar desde la vista de borrar
		case 'Confirmar_DELETE2':		
			$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","","");
			$mensaje = $promocion-> delete(); //Llamamos a delete y guardamos el mensaje que devuelve
			new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php'); //Mostramos el mensaje	
		break;
		//Si queremos mostrar los datos de una tarea en concreto
		case 'Confirmar_SHOWCURRENT':
			$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","","");
				
				$datos = $promocion -> rellenadatos();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['pista_ID_Pista'],"","","");
				
				$p = $pistas -> searchById();
				$datos = $promocion -> rellenadatos();
				
				new Promociones_SHOWCURRENT($datos,$p,'../Controllers/Promociones_Controller.php'); //Creamos una vista de delete con los datos obtenidos
		break;
		
		default: /*PARA EL SHOWALL */
			//Comprobamos el tipo de usuario
			if(isset($_SESSION['tipo'])){
				//Si el usuario es de tipo admin
				if($_SESSION['tipo']=='ADMIN'){		   
					$promocion = new Promociones_Model('','','','','','');//Creamos un objeto promocion
					
					$datos = $promocion -> PromocionesShowAllTodas();
					$usuarios = $promocion -> ContarUsuarios();
					//Creamos una vista de todas las promociones completas con los datos
					$respuesta = new Promociones_SHOWALL_Admin($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
				//Si es usuario normal
				}else{

					switch ($_REQUEST['action']){
		
					case 'Mostrar_Todas':
						$promocion = new Promociones_Model('','','','','','');//Creamos un objeto promocion
						
						$datos = $promocion -> PromocionesShowAllTodas();
						$usuarios = $promocion -> ContarUsuarios();
						//Creamos una vista de todas las promociones completas con los datos
						$respuesta = new Promociones_SHOWALL_Todas($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
					break;
					
					default:
						
						$promocion = new Promociones_Model('','','','','','');//Creamos un objeto promocion
						
						$datos = $promocion -> PromocionesShowAllMias();
						$usuarios = $promocion -> ContarUsuarios();
						//Creamos una vista de todas las promociones completas con los datos
						$respuesta = new Promociones_SHOWALL_Mias($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
					break;
					
				}	 
			}
			}
	}
}
?>