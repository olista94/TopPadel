
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
	include_once "../Models/Reservas_Model.php";
	include_once "../Models/Usuarios_Model.php";
	include_once "../Models/Pistas_Model.php";
	include_once "../Views/Reservas_SHOWALL_View.php";
	//include_once "../Views/Reservas_ADD_View.php";
	include_once "../Views/Reservas_ADD_Pista_View.php";
	include_once "../Views/Reservas_ADD_Fecha_View.php";
	include_once "../Views/Reservas_ADD_Pago_View.php";
	include_once "../Views/Reservas_ADD_Tarjeta_View.php";
	include_once "../Views/Reservas_ADD_Hora_View.php";
	include_once "../Views/Reservas_SEARCH_View.php";
	include_once "../Views/Reservas_DELETE_View.php";
	include_once "../Views/Reservas_SHOWCURRENT_View.php";
	
	/* RECOGE LOS DATOS DEL FORMULARIO */
	function getDataForm(){
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
		if(isset($_REQUEST['fecha_reserva'])){
			$fecha_reserva = $_REQUEST['fecha_reserva'];//Si el campo se le ha pasado se le asigna
		}else{
			$fecha_reserva = ""; //Si no, se pone como vacío
		}
		
		//Comprueba si está el campo
		if(isset($_REQUEST['hora_inicio'])){
			$hora_inicio = $_REQUEST['hora_inicio'];//Si el campo se le ha pasado se le asigna
		}else{
			$hora_inicio = ""; //Si no, se pone como vacío
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
		
		//Construye el objeto reserva con los parámetros
		$reserva = new Reservas_Model ($usuarios_login,$pista_ID_Pista,$fecha_reserva,$hora_inicio,$pago,$CCV,$num_tarjeta);
		
		//Devuelve el objeto reserva
		return $reserva;
	}
	//Comprueba si hay una accion seleccionada desde la vista
	if(!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}
	//Accioneas a realizar según la acción que venga de la vista
	switch ($_REQUEST['action']){
		//Añadir una reserva desde el showall
		case 'Confirmar_ADD1':
				$reserva = new Reservas_Model("","",'','','','','');
				$numReservas = $reserva->contarReservasUsuario()->fetch_array()[1];

				if($numReservas >= 5){
					new MESSAGE('No puedes tener mas de 5 reservas activas a la vez','../Controllers/Reservas_Controller.php');
				}
				else{
					new Reservas_ADD_Fecha('../Controllers/Reservas_Controller.php');	//Crea la vista de añadir
				}
			break;
			
			case 'Confirmar_ADD_Fecha':
					
				$reservas = new Reservas_Model("","",$_REQUEST['fecha_reserva'],"",'','','');
				$horasOcupadas = $reservas -> BuscarHorasOcupadas();
				
				$array = Array ('08:00:00','09:30:00','11:00:00','12:30:00','14:00:00','15:30:00','17:00:00','18:30:00','20:00:00','21:30:00');
				
		
				$ocup = Array();
				
				while($h = $horasOcupadas->fetch_array()[0]){
					array_push($ocup,$h);
				}
				
				$resultado = array_diff($array, $ocup);
				
				new Reservas_ADD_Hora($resultado,$_REQUEST['fecha_reserva'],'../Controllers/Reservas_Controller.php');	//Crea la vista de añadir
				
				
			break;
			
			case 'Confirmar_ADD_Hora':
				$reservas = new Reservas_Model("","",$_REQUEST['fecha_reserva'],$_REQUEST['hora_inicio'],'','','');
				$pistasLibres = $reservas -> pistasLibres();
				
				new Reservas_ADD_Pista($pistasLibres,$_REQUEST['fecha_reserva'],$_REQUEST['hora_inicio'],'../Controllers/Reservas_Controller.php');
			break;
			
			case 'Confirmar_ADD_Pista':
			
				//$reserva = getDataForm();
				
				new Reservas_ADD_Pago($_REQUEST['fecha_reserva'],$_REQUEST['hora_inicio'],$_REQUEST['pista_ID_Pista'],'../Controllers/Reservas_Controller.php');			 
					
			break;
			
			case 'Confirmar_ADD_Pago':
			
				$reserva = getDataForm();
				$reservas = new Reservas_Model($_SESSION['login'],$_REQUEST['pista_ID_Pista'],$_REQUEST['fecha_reserva'],$_REQUEST['hora_inicio'],$_REQUEST['pago'],"","");
				$reservas -> add();
				$pago = $reservas -> devolverMetodoPago();
				
				if($pago == 'Paypal'){
					new MESSAGE_Pago('Insercion correcta.Puedes acceder a la pagina de paypal haciendo click sobre su logo en el boton azul','../Controllers/Reservas_Controller.php');			 
				}
				else if($pago == 'Contrareembloso'){
					new MESSAGE('Recuerda realizar el pago en las instalaciones del club','../Controllers/Reservas_Controller.php');
				}
				
				else if($pago == 'Tarjeta'){
					new Reservas_ADD_Tarjeta($_REQUEST['pista_ID_Pista'],$_REQUEST['fecha_reserva'],$_REQUEST['hora_inicio'],'../Controllers/Reservas_Controller.php');
				}
				
			break;
			
			case 'Confirmar_ADD_Tarjeta':
			
				$reserva = getDataForm();
				$mensaje = $reserva -> addTarjeta();
				new MESSAGE($mensaje,'../Controllers/Reservas_Controller.php');
				
			break;
		
		//Si se selecciona la accion buscar desde el showall
		case 'Confirmar_SEARCH1':
				$pistas = new Pistas_Model("","","",""); //Construye el objeto categorias llamando al modelo
				$p = $pistas -> search(); //Busca las categorias		
			new Reservas_SEARCH($p,'../Controllers/Reservas_Controller.php'); //Se crea la vista para buscar
		break;
		//Si se le da a buscar desde la vista de buscar
		case 'Confirmar_SEARCH2':
			//Si el usuario es de tipo admin puede buscar entre todas las tareas
			if(isset($_SESSION['tipo'])){
				if($_SESSION['tipo']=='ADMIN'){
					$reserva = getDataForm(); 
					$datos = $reserva-> searchAdmin(); 
				
					$pistas = new Pistas_Model("","","",""); //Construye el objeto categorias llamando al modelo
					$p = $pistas -> search(); //Busca las categorias
				
					new Reservas_SHOWALL($datos,$p,'../Controllers/Reservas_Controller.php'); //Se muestran las tareas encontradas en un showall
				//En otro caso el usuario es un usuario normal
				}else{
					$reserva = getDataForm(); 
					$datos = $reserva-> search1(); 
				
					$pistas = new Pistas_Model("","","",""); //Construye el objeto categorias llamando al modelo
					$p = $pistas -> search(); //Busca las categorias
				
					new Reservas_SHOWALL($datos,$p,'../Controllers/Reservas_Controller.php');
				}
			}		
		break;
		//Si se le da a borrar desde la vista del showall
		case 'Confirmar_DELETE1':		
			
				
				$reserva = new Reservas_Model($_REQUEST['usuarios_login'],$_REQUEST['pista_ID_Pista'],$_REQUEST['fecha_reserva'],$_REQUEST['hora_inicio'],"",'','');
				$puedeBorrar = $reserva -> puedeBorrarReserva();
				
				if($puedeBorrar == true){
				$datos = $reserva -> rellenadatos();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['pista_ID_Pista'],"","","");
				
				$p = $pistas -> searchById();
				$datos = $reserva -> rellenadatos();
				
				$usuario = new Usuarios_Model($_REQUEST['usuarios_login'],"","","","","","","","","","","","");
				$socio = $usuario -> DevolverSocio();
				
				new Reservas_DELETE($datos,$p,$socio,'../Controllers/Reservas_Controller.php'); //Creamos una vista de delete con los datos obtenidos
				}
				else{
					new MESSAGE('No puedes cancelar una reserva que se dispute hoy','../Controllers/Reservas_Controller.php');
				}
		break;
		
		// Si queremos borrar desde la vista de borrar
		case 'Confirmar_DELETE2':		
			$reserva = new Reservas_Model($_REQUEST['usuarios_login'],$_REQUEST['pista_ID_Pista'],$_REQUEST['fecha_reserva'],$_REQUEST['hora_inicio'],"",'',"");
			$mensaje = $reserva-> delete(); //Llamamos a delete y guardamos el mensaje que devuelve
			new MESSAGE($mensaje,'../Controllers/Reservas_Controller.php'); //Mostramos el mensaje	
		break;
		//Si queremos mostrar los datos de una reserva en concreto
		case 'Confirmar_SHOWCURRENT':
			//Si no se le pasan argumentos por request
				$reserva = new Reservas_Model($_REQUEST['usuarios_login'],$_REQUEST['pista_ID_Pista'],$_REQUEST['fecha_reserva'],$_REQUEST['hora_inicio'],"",'','');
				
				$datos = $reserva -> rellenadatos();
				$array = $datos -> fetch_array();
				
				$pistas = new Pistas_Model($array['pista_ID_Pista'],"","","");
				$p = $pistas -> searchById();
				
				$usuario = new Usuarios_Model($_REQUEST['usuarios_login'],"","","","","","","","","","","","");
				$socio = $usuario -> DevolverSocio();
				
				$datos = $reserva -> rellenadatos();
				
				new Reservas_SHOWCURRENT($datos,$p,$socio,'../Controllers/Reservas_Controller.php'); //Creamos una vista de delete con los datos obtenidos
			
		break;
		
		default: /*PARA EL SHOWALL */
			//Comprobamos el tipo de usuario
			if(isset($_SESSION['tipo'])){
				//Si el usuario es de tipo admin
				if($_SESSION['tipo']=='ADMIN'){		   
					$reserva = new Reservas_Model('','','','','','','');//Creamos un objeto reserva
					$reserva -> borrarAntiguas();
					$pistas = new Pistas_Model("","","",""); //Construye el objeto pistas llamando al modelo
					$p = $pistas -> search(); //Busca las pistas
					       
					$datos = $reserva -> ReservasShowAll();//Recuperamos todas las reservas y las guardamos en datos						
					
					
					//Creamos una vista de todas las reservas completas con los datos
					$respuesta = new Reservas_SHOWALL($datos,$p,'../Controllers/Reservas_Controller.php');	
				//Si es usuario normal
				}else{
					
					$reserva = new Reservas_Model('','','','','','','');//Creamos un objeto reserva
					$reserva -> borrarAntiguas();
					
					$pistas = new Pistas_Model("","","",""); //Construye el objeto pistas llamando al modelo
					$p = $pistas -> search(); //Busca las pistas
					       
					$datos = $reserva -> ReservasShowAllNormal();//Recuperamos todas las reservas y las guardamos en datos						
					
					
					//Creamos una vista de todas las reservas completas con los datos
					$respuesta = new Reservas_SHOWALL($datos,$p,'../Controllers/Reservas_Controller.php');
				}	 
			}
	}
}
?>