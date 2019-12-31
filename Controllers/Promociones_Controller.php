
<?php
session_start();
include_once "../Views/MESSAGE.php";
include_once "../Views/MESSAGE_Pago.php";
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
	/* include_once "../Views/Promociones_ADD_View.php"; */
	include_once "../Views/Promociones_ADD_Fecha_View.php";
	include_once "../Views/Promociones_ADD_Hora_View.php";
	include_once "../Views/Promociones_ADD_Pago_View.php";
	include_once "../Views/Promociones_ADD_Tarjeta_View.php";
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
		
		//Comprueba si está el campo
		if(isset($_REQUEST['pago'])){
			$pago = $_REQUEST['pago'];//Si el campo se le ha pasado se le asigna
		}else{
			$pago = ""; //Si no, se pone como vacío
		}
		
		if(isset($_REQUEST['CCV'])){
			$CCV = $_REQUEST['CCV'];//Si el campo se le ha pasado se le asigna
		}else{
			$CCV = ""; //Si no, se pone como vacío
		}
		
		if(isset($_REQUEST['num_tarjeta'])){
			$num_tarjeta = $_REQUEST['num_tarjeta'];//Si el campo se le ha pasado se le asigna
		}else{
			$num_tarjeta = ""; //Si no, se pone como vacío
		}
		//Construye el objeto promocion con los parámetros
		$promocion = new Promociones_Model ($ID_Promo,$fecha,$hora_inicio,$usuarios_login,$pista_ID_Pista,$pago,$CCV,$num_tarjeta);
		
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
					
				$promociones = new Promociones_Model("",$_REQUEST['fecha'],"","","","","","");
				
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

				//Vaina de Iago
				if(isset($_SESSION['tipo'])){
					if($_SESSION['tipo']=='ADMIN'){	
					$promocion = getDataForm();	//Asigna los datos obtenidos al objeto promocion		
					$mensaje = $promocion-> add(); //Llama al modelo para añadirla y le pasa la respuesta a MESSAGE
					
					$idpromo = $promocion -> DevolverIDPromo();
					
					$apuntar = new Promociones_has_Usuarios_Model($idpromo,"","","","");
					$a = $apuntar -> add();
					
					
					//Si el insertado es correcto
					new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php');	
					}
					else{
						$promocion = getDataForm();	//Asigna los datos obtenidos al objeto promocion	
						$mensaje = $promocion-> add(); //Llama al modelo para añadirla y le pasa la respuesta a MESSAGE
					
						$idpromo = $promocion -> DevolverIDPromo();
					
						$apuntar = new Promociones_has_Usuarios_Model($idpromo,$_SESSION['login'],"","","");
						$a = $apuntar -> add();
					
					
					//Si el insertado es correcto
					//new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php');
					new Promociones_ADD_Pago($idpromo,'../Controllers/Promociones_Controller.php');
					}
				}
			break;
			
			case 'Confirmar_ADD_Pago':
			
				$promo = getDataForm();
				
				$promocion = new Promociones_Model($_REQUEST['ID_Promo'],'',"","",'',$_REQUEST['pago'],"","",'');
				$promocion -> addMetodoPago();
				$idpromo = $promocion -> DevolverIDPromo();
				
				$pago = $promocion -> devolverMetodoPago($_REQUEST['ID_Promo']);
				
				$phu = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],$_SESSION['login'],"","","");
				$phu -> addMetodoPago($idpromo,$_SESSION['login'],$pago);
				
				if($pago == 'Paypal'){
					new MESSAGE_Pago('Insercion correcta.Puedes acceder a la pagina de paypal haciendo click sobre su logo en el boton azul','../Controllers/Promociones_Controller.php');			 
				}
				else if($pago == 'Contrareembolso'){
					new MESSAGE('Recuerda realizar el pago en las instalaciones del club','../Controllers/Promociones_Controller.php');
				}
				
				else if($pago == 'Tarjeta'){
					new Promociones_ADD_Tarjeta($_REQUEST['ID_Promo'],'../Controllers/Promociones_Controller.php');
				}
			
			break;
			
			case 'Confirmar_ADD_Tarjeta':
			
				$promo = getDataForm();
				$mensaje = $promo -> addTarjeta();
				
				$phu = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],$_SESSION['login'],"","","");
				$phu -> addTarjeta($_REQUEST['ID_Promo'],$_SESSION['login'],$_REQUEST['CCV'],$_REQUEST['num_tarjeta']);
				new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php');
				
			break;
		
		case 'Confirmar_INSCRIPCION1':
		
				$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","","","","");
				
				$ins = $promocion -> PuedeApuntarse();
				
				
				$inscritos = $promocion -> ContarUsuarios1();
				$array = $inscritos -> fetch_array();
				
				$usuario = new Usuarios_Model($_REQUEST['login'],"","","","","","","","","","","","");
				$socio = $usuario -> DevolverSocio();

				if($array[0] < 4 || empty($array[0]) == true){
					if($ins == true){
						$datos = $promocion -> rellenadatos();
						$array = $datos -> fetch_array();
				
						$pistas = new Pistas_Model($array['pista_ID_Pista'],"","","");
				
						$p = $pistas -> searchById();
						$datos = $promocion -> rellenadatos();
				
						new Promociones_INSCRIPCION($datos,$p,$socio,'../Controllers/Promociones_Controller.php');
					}else{
						
						
						if($_SESSION['tipo']=='ADMIN'){		   
					$promocion = new Promociones_Model('','','','','','',"","");//Creamos un objeto promocion
					$promocion->borrarAntiguas();
					
					$datos = $promocion -> PromocionesShowAllTodas();
					$usuarios = $promocion -> ContarUsuarios();
					//Creamos una vista de todas las promociones completas con los datos
					$respuesta = new Promociones_SHOWALL_Admin($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
				//Si es usuario normal
				}else{

					switch ($_REQUEST['action']){
		
					case 'Mostrar_Todas':
						$promocion = new Promociones_Model('','','','','','',"","");//Creamos un objeto promocion
						$promocion->borrarAntiguas();
						
						$datos = $promocion -> PromocionesShowAllTodas();
						$usuarios = $promocion -> ContarUsuarios();
						//Creamos una vista de todas las promociones completas con los datos
						$respuesta = new Promociones_SHOWALL_Todas($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
					break;
					
					default:
						
						$promocion = new Promociones_Model('','','','','','',"","");//Creamos un objeto promocion
						$promocion->borrarAntiguas();
						
						$datos = $promocion -> PromocionesShowAllMias();
						$usuarios = $promocion -> ContarUsuarios();
						//Creamos una vista de todas las promociones completas con los datos
						$respuesta = new Promociones_SHOWALL_Mias($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
					break;
					
				}	 
			}
						new ALERT('Ya estas apuntado');
						//new MESSAGE('Ya estas apuntado','../Controllers/Promociones_Controller.php');
					}
				}
				else{
					
					
					if($_SESSION['tipo']=='ADMIN'){		   
					$promocion = new Promociones_Model('','','','','','',"","");//Creamos un objeto promocion
					$promocion->borrarAntiguas();
					
					$datos = $promocion -> PromocionesShowAllTodas();
					$usuarios = $promocion -> ContarUsuarios();
					//Creamos una vista de todas las promociones completas con los datos
					$respuesta = new Promociones_SHOWALL_Admin($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
				//Si es usuario normal
				}else{

					switch ($_REQUEST['action']){
		
					case 'Mostrar_Todas':
						$promocion = new Promociones_Model('','','','','','',"","");//Creamos un objeto promocion
						$promocion->borrarAntiguas();
						
						$datos = $promocion -> PromocionesShowAllTodas();
						$usuarios = $promocion -> ContarUsuarios();
						//Creamos una vista de todas las promociones completas con los datos
						$respuesta = new Promociones_SHOWALL_Todas($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
					break;
					
					default:
						
						$promocion = new Promociones_Model('','','','','','',"","");//Creamos un objeto promocion
						$promocion->borrarAntiguas();
						
						$datos = $promocion -> PromocionesShowAllMias();
						$usuarios = $promocion -> ContarUsuarios();
						//Creamos una vista de todas las promociones completas con los datos
						$respuesta = new Promociones_SHOWALL_Mias($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
					break;
					
				}	 
			}
					new ALERT('Esta promocion esta cerrada');
					//new MESSAGE('Esta promocion esta cerrada','../Controllers/Promociones_Controller.php');
				}
		break;
		
		case 'Confirmar_INSCRIPCION2':
				
				$apuntar = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],$_SESSION['login'],"","","");
				$mensaje = $apuntar -> add();
				
				$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","","","","");
				$promo = $promocion -> ContarUsuarios1();
				
				if($promo->fetch_array()[0] == 4){
					
					$datos = $promocion -> rellenadatos()->fetch_array();
					$p = new Promociones_Model($_REQUEST['ID_Promo'],$datos['fecha'],$datos['hora_inicio'],"",$datos['pista_ID_Pista'],"","","");
					$pista = $p -> buscarPistasLibresPromo(); //Devuelve la 1º pista libre
					if(!is_numeric($pista)){
						$promocion->delete();
						new MESSAGE('No hay pistas disponibles ese dia a esa hora.La promocion sera borrada','../Controllers/Promociones_Controller.php');//Mostramos el mensaje
					}
					else{
						$promocion -> cerrarPromocion($pista);
				
						new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php');
					}
				}
				else{
		
				
					new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php');
				}
				
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
			
			$promocion = new Promociones_Model('','','','','','',"","");				
			$promocion = getDataForm(); 
			
			
			
			if($_REQUEST['pista_ID_Pista']){
				$datos = $promocion-> searchAdminConPista(); 
			}
			else{
				$datos = $promocion-> searchAdminSinPista(); 
			}
			
			$usuarios = $promocion -> ContarUsuarios();
			if($_SESSION['tipo'] == 'ADMIN'){
				new Promociones_SHOWALL_Admin($datos,$usuarios,'../Controllers/Promociones_Controller.php');
			}
			else{
				new Promociones_SHOWALL_Todas($datos,$usuarios,'../Controllers/Promociones_Controller.php');
			}			
			
		break;
		//Si se le da a borrar desde la vista del showall
		case 'Confirmar_DELETE1':		
				
				$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","","","","");
				
				$datos = $promocion -> rellenadatos();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['pista_ID_Pista'],"","","");
				
				$p = $pistas -> searchById();
				$datos = $promocion -> rellenadatos();
				
				$usuario = new Usuarios_Model($_REQUEST['login'],"","","","","","","","","","","","");
				$socio = $usuario -> DevolverSocio();
				
				new Promociones_DELETE($datos,$p,$socio,'../Controllers/Promociones_Controller.php'); 
		break;
		
		// Si queremos borrar desde la vista de borrar
		case 'Confirmar_DELETE2':		
			$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","","","","");
			$mensaje = $promocion-> delete(); 
			new MESSAGE($mensaje,'../Controllers/Promociones_Controller.php'); //Mostramos el mensaje	
		break;
		//Si queremos mostrar los datos de una tarea en concreto
		case 'Confirmar_SHOWCURRENT':
				$promocion = new Promociones_Model($_REQUEST['ID_Promo'],"","","","","","","");
				
				$datos = $promocion -> rellenadatos();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['pista_ID_Pista'],"","","");
				
				$p = $pistas -> searchById();
				$datos = $promocion -> rellenadatos();
				
				$usuario = new Usuarios_Model($_REQUEST['login'],"","","","","","","","","","","","");
				$socio = $usuario -> DevolverSocio();
				
				$apuntados = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],"","","","");
				$apunt = $apuntados -> apuntadosPromo();
				
				new Promociones_SHOWCURRENT($datos,$p,$apunt,$socio,'../Controllers/Promociones_Controller.php'); 
		break;
		
		default: /*PARA EL SHOWALL */
			//Comprobamos el tipo de usuario
			if(isset($_SESSION['tipo'])){
				//Si el usuario es de tipo admin
				if($_SESSION['tipo']=='ADMIN'){		   
					$promocion = new Promociones_Model('','','','','','',"","");//Creamos un objeto promocion
					$promocion->borrarAntiguas();
					
					$datos = $promocion -> PromocionesShowAllTodas();
					$usuarios = $promocion -> ContarUsuarios();
					//Creamos una vista de todas las promociones completas con los datos
					$respuesta = new Promociones_SHOWALL_Admin($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
				//Si es usuario normal
				}else{

					switch ($_REQUEST['action']){
		
					case 'Mostrar_Todas':
						$promocion = new Promociones_Model('','','','','','',"","");//Creamos un objeto promocion
						$promocion->borrarAntiguas();
						
						$datos = $promocion -> PromocionesShowAllTodas();
						$usuarios = $promocion -> ContarUsuarios();
						//Creamos una vista de todas las promociones completas con los datos
						$respuesta = new Promociones_SHOWALL_Todas($datos,$usuarios,'../Controllers/Promociones_Controller.php');	
					break;
					
					default:
						
						$promocion = new Promociones_Model('','','','','','',"","");//Creamos un objeto promocion
						$promocion->borrarAntiguas();
						
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