
<?php

//Creamos la sesion
session_start();

//Incluimos los mensajes y la funcion de autenticacion
include_once "../Views/MESSAGE.php";
include_once "../Views/ALERT.php";
include_once "../Views/MESSAGE_Pago.php";
include_once "../Functions/Authentication.php";

//Comprobamos si esta el tipo de usuario en sesion
if(isset($_SESSION['tipo'])){
	//Si el usuario es tipo admin
	
		
		if (!IsAuthenticated()){ //si no está autenticado

			new MESSAGE('No puedes ver esto si no estás logueado', '../Controllers/Login_Controller.php'); //muestra el mensaje

		}else{ //si lo está

			//Incluimos las vistas y modelo necesarios
			include_once "../Views/Clases_Grupales_SHOWALL_View.php";
			include_once "../Models/Clases_Grupales_Model.php";
			include_once "../Models/Clases_Grupales_has_Usuarios_Model.php";
			include_once "../Models/Pistas_Model.php";
			include_once "../Views/Clases_Grupales_DELETE_View.php";
			include_once "../Views/Clases_Grupales_SHOWCURRENT_View.php";
			include_once "../Views/Clases_Grupales_SHOWCLASE_View.php"; 
			include_once "../Views/Clases_Grupales_SHOWCLASE_Admin_View.php"; 
			include_once "../Views/Clases_Grupales_SHOWCLASE_Normal_View.php"; 
			include_once "../Views/Clases_Grupales_SHOWCLASE_Dia_View.php";
			include_once "../Views/Clases_Grupales_INSCRIPCION_View.php";
			include_once "../Views/Clases_Grupales_SEARCH_View.php";
			include_once "../Views/Clases_Grupales_ADD_View.php";
			include_once "../Views/Clases_Grupales_ADD_Pago_View.php";
			include_once "../Views/Clases_Grupales_ADD_Tarjeta_View.php";
			
/* 			
			include_once "../Views/Clases_Grupales_ADD_Fecha_View.php";
			include_once "../Views/Clases_Grupales_ADD_Hora_View.php";
			include_once "../Views/Clases_Grupales_ADD_Pista_View.php";
			include_once "../Views/Clases_Grupales_ADD_Entrenador_View.php";
			 */
			 

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
			
			if(isset($_REQUEST['fecha_limite'])){
				$fecha_limite = $_REQUEST['fecha_limite'];//Identificador de la Inscripcion
				
			}
			else{
				$fecha_limite = "";
			}

			if(isset($_REQUEST['sesiones'])){
				$sesiones = $_REQUEST['sesiones'];//Identificador de la Inscripcion
				
			}
			else{
				$sesiones = "";
			}
			
			if(isset($_REQUEST['pago'])){
				$pago = $_REQUEST['pago'];//Identificador de la Inscripcion
				
			}
			else{
				$pago = "";
			}
			
			if(isset($_REQUEST['CCV'])){
				$CCV = $_REQUEST['CCV'];//Identificador de la Inscripcion
				
			}
			else{
				$CCV = "";
			}
			
			if(isset($_REQUEST['num_tarjeta'])){
				$num_tarjeta = $_REQUEST['num_tarjeta'];//Identificador de la Inscripcion
				
			}
			else{
				$num_tarjeta = "";
			}
				
				$clases_grupales = new Clases_Grupales_Model ($ID_Clase,$login_entrenador,$tope,$tipo,$descripcion,$invitado,$fecha_limite,$sesiones); //creamos el objeto usuario
				
				return $clases_grupales; //devolvemos el objeto usuario
			}

			//Si mandamos alguna accion desde la vista
			if(!isset($_REQUEST['action'])){
				$_REQUEST['action'] = ''; //Sino la dejamos vacia
			}

			//Segun la accion definida
			switch ($_REQUEST['action']){
				
				case 'Confirmar_ADD1':
					$clase = new Clases_Grupales_Model("","",'','','','','','','','');
					new Clases_Grupales_ADD('../Controllers/Clases_Grupales_Controller.php');	//Crea la vista de añadir
				
				break;
			
			case 'Confirmar_ADD2':
					
					$clase = getDataForm();
						
						$mensaje = $clase -> addGrupal();
						$idclase = $clase -> DevolverMaxIDClase();
						
						$limite = $_REQUEST['fecha_limite'];
						$hora = $_REQUEST['hora_clase'];
						
						$entrenador = $clase -> buscarEntrenadoresLibresClases($idclase,$limite,$hora);
						
					$date=date_create($limite);
	
					for($i = 1; $i <= $_REQUEST['sesiones']; $i++){
						$j = $i * 7;
					
						date_add($date,date_interval_create_from_date_string("$j days"));
						$semana = date_format($date,"Y-m-d");
						
						
						$clase -> addFechaSesion($idclase,$semana,$_REQUEST['hora_clase']);
						$pista = $clase -> buscarPistaParaSesions($semana,$_REQUEST['hora_clase']) -> fetch_array()[0];
						$clase -> insertarPistaParaSesion($pista,$semana,$idclase);
						$date=date_create($limite);
					}
						
						$clase -> insertarEntrenador($entrenador,$idclase);
						
						new MESSAGE($mensaje,'../Controllers/Clases_Grupales_Controller.php');

			break;
			
			
			
			case 'Confirmar_DELETE1':
			
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","",'');
				
				$datos = $clase -> rellenadatos();
				$array = $datos -> fetch_array();
				
				//$pistas = new Pistas_Model($array['ID_Pista'],"","","");
				//$p = $pistas -> searchById();
				
				$datos = $clase -> rellenadatos();
				
				new Clases_Grupales_DELETE($datos,'../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_DELETE2':
			
			if($_SESSION['tipo'] == 'NORMAL' || $_SESSION['tipo'] == 'ADMIN'){
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","",'');
				
				$mensaje = $clase -> delete();
				
				new MESSAGE($mensaje,'../Controllers/Clases_Grupales_Controller.php');
			}
			
			else{
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","",'');
				
				$mensaje = $clase -> solicitaBorrado();
				
				new MESSAGE($mensaje,'../Controllers/Clases_Grupales_Controller.php');
			}
			break;
			
			case 'Confirmar_SHOWCURRENT':
			
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","",'');
				
				$datos = $clase -> rellenadatos();
				$array = $datos -> fetch_array();
				
				//$pistas = new Pistas_Model($array['ID_Pista'],"","","");
				//$p = $pistas -> searchById();
				
				$datos = $clase -> rellenadatos();
				
				new Clases_Grupales_SHOWCURRENT($datos,'../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_INSCRIPCION1':
			
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","",'');
				
				$apuntarse = $clase -> PuedeApuntarse();
				$fecha = $clase -> puedeApuntarseFecha();
				
				$tope = $clase -> devolverTope() -> fetch_array();
				$numApuntados = $clase -> ContarUsuarios1() -> fetch_array();
				
				if($fecha == true){
					if($tope[0] > $numApuntados[0]){
						if($apuntarse == false){
							
							if($_SESSION['tipo'] == 'NORMAL' || $_SESSION['tipo'] == 'ADMIN'){
								$clases = new Clases_Grupales_Model('','','','','','','','','','');
					
								$apuntados = $clases -> ContarUsuarios();
								
								$datos = $clases -> ShowAllAdminNormal();
								$respuesta = new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php'); 
							}			
				
							else if($_SESSION['tipo'] == 'ENTRENADOR'){
								$clases = new Clases_Grupales_Model('','','','','','','','','','');
								
								$apuntados = $clases -> ContarUsuarios();
								
								$datos = $clases -> ShowAllEntrenador();
								$respuesta = new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php'); 
							}
							new ALERT('Ya estas apuntado');
							//new MESSAGE('Ya estas apuntado','../Controllers/Clases_Grupales_Controller.php');
						}	
						else{
							$datos = $clase -> rellenadatos();
							$array = $datos -> fetch_array();
				
							/* $pistas = new Pistas_Model($array['ID_Pista'],"","","");
							$p = $pistas -> searchById(); */
				
							$datos = $clase -> rellenadatos();
							
							new Clases_Grupales_INSCRIPCION($datos,'../Controllers/Clases_Grupales_Controller.php');
						}
					}
					else{
						
						if($_SESSION['tipo'] == 'NORMAL' || $_SESSION['tipo'] == 'ADMIN'){
								$clases = new Clases_Grupales_Model('','','','','','','','','','');
					
								$apuntados = $clases -> ContarUsuarios();
								
								$datos = $clases -> ShowAllAdminNormal();
								$respuesta = new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php'); 
							}			
				
							else if($_SESSION['tipo'] == 'ENTRENADOR'){
								$clases = new Clases_Grupales_Model('','','','','','','','','','');
								
								$apuntados = $clases -> ContarUsuarios();
								
								$datos = $clases -> ShowAllEntrenador();
								$respuesta = new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php'); 
							}
							new ALERT('Ya se ha alcanzado el maximo de apuntados');
							//new MESSAGE('Ya se ha alcanzado el maximo de apuntados','../Controllers/Clases_Grupales_Controller.php');	
					}
				}else{
					
					if($_SESSION['tipo'] == 'NORMAL' || $_SESSION['tipo'] == 'ADMIN'){
					$clases = new Clases_Grupales_Model('','','','','','','','','','');
					
					$apuntados = $clases -> ContarUsuarios();
					
					$datos = $clases -> ShowAllAdminNormal();
					$respuesta = new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php'); 
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$clases = new Clases_Grupales_Model('','','','','','','','','','');
					
					$apuntados = $clases -> ContarUsuarios();
					
					$datos = $clases -> ShowAllEntrenador();
					$respuesta = new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php'); 
				}
					new ALERT('Fuera de plazo');
					//new MESSAGE('Fuera de plazo','../Controllers/Clases_Grupales_Controller.php');	
				}
			
			break;
			
			case 'Confirmar_INSCRIPCION2':
			
				$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","",'');
				
				$mensaje = $clase -> apuntarUsuario();
				
				new Clases_Grupales_ADD_Pago($_REQUEST['ID_Clase'],'../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_ADD_Pago':
			
				$clases = getDataForm();
				
				$clase = new Clases_Grupales_has_Usuarios_Model($_REQUEST['ID_Clase'],'','','','','','','','','','','',$_REQUEST['pago'],'','');
				$clase -> addMetodoPago();
				$idclase = $_REQUEST['ID_Clase'];
				
				$pago = $clase -> devolverMetodoPago($_REQUEST['ID_Clase'],$_SESSION['login']);
				
				//$phu = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],$_SESSION['login'],"","","");
				//$phu -> addMetodoPago($idpromo,$_SESSION['login'],$pago);
				
				if($pago == 'Paypal'){
					new MESSAGE_Pago('Insercion correcta.Puedes acceder a la pagina de paypal haciendo click sobre su logo en el boton azul','../Controllers/Clases_Grupales_Controller.php');			 
				}
				else if($pago == 'Contrareembolso'){
					new MESSAGE('Recuerda realizar el pago en las instalaciones del club','../Controllers/Clases_Grupales_Controller.php');
				}
				
				else if($pago == 'Tarjeta'){
					new Clases_Grupales_ADD_Tarjeta($_REQUEST['ID_Clase'],'../Controllers/Clases_Grupales_Controller.php');
				}
			
			break;
			
			case 'Confirmar_ADD_Tarjeta':
			
				$clases = getDataForm();
				
				$clase = new Clases_Grupales_has_Usuarios_Model($_REQUEST['ID_Clase'],'','','','','','','','','','','','',$_REQUEST['CCV'],$_REQUEST['num_tarjeta']);
				
				$mensaje = $clase -> addTarjeta();
				
				//$phu = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],$_SESSION['login'],"","","");
				//$phu -> addTarjeta($_REQUEST['ID_Promo'],$_SESSION['login'],$_REQUEST['CCV'],$_REQUEST['num_tarjeta']);
				new MESSAGE($mensaje,'../Controllers/Clases_Grupales_Controller.php');
				
			break;
			
			case 'Confirmar_SEARCH1':
				$pistas = new Pistas_Model("","","","");
				$p = $pistas -> search();
				
				new Clases_Grupales_SEARCH($p,'../Controllers/Clases_Grupales_Controller.php');
			
			break;
			
			case 'Confirmar_SEARCH2':
			
				$clase = getDataForm();
				
				if($_SESSION['tipo'] == 'NORMAL'){
					$datos = $clase -> searchAdminNormal();
					$apuntados = $clase -> ContarUsuarios();
					new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php');
				}
				
				else if($_SESSION['tipo'] == 'ADMIN'){
					$datos = $clase -> searchAdminNormal();
					$apuntados = $clase -> ContarUsuarios();
					new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php');
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$datos = $clase -> searchEntrenador();	
					$apuntados = $clase -> ContarUsuarios();
					new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php');
				}

			break;
			
			case 'Confirmar_SHOWCLASE':
					
					if($_SESSION['tipo'] == 'ENTRENADOR'){
						$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],'','','','','','','','','');
						$apuntados = $clase -> Apuntados();
						$num_sesiones = $clase -> numSesiones() -> fetch_array()[0];
						
						$datos = $clase -> showSesion();
				
						new Clases_Grupales_SHOWCLASE($apuntados,$num_sesiones,$datos,'../Controllers/Clases_Grupales_Controller.php');
					}
					else if($_SESSION['tipo'] == 'ADMIN'){
						$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],'','','','','','','','','');
						$apuntados = $clase -> Apuntados();
						
						new Clases_Grupales_SHOWCLASE_Admin($apuntados,'../Controllers/Clases_Grupales_Controller.php');
					}
					if($_SESSION['tipo'] == 'NORMAL'){
						$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],'','','','','','','','','');
						$apuntados = $clase -> Apuntados();
						$num_sesiones = $clase -> numSesiones() -> fetch_array()[0];
						
						$datos = $clase -> showSesion();
						new Clases_Grupales_SHOWCLASE_Normal($apuntados,$num_sesiones,$datos,'../Controllers/Clases_Grupales_Controller.php');
					}
					
			break;
			
			
			case 'Confirmar_Edit_SHOWCLASE':
					$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],'','','','','','','','','');
					
					$asistencia = $clase -> mostrarDia1();
					$dia = mysqli_fetch_field_direct($asistencia, 2)->name;
					
					$num_sesiones = $clase -> numSesiones() -> fetch_array()[0];
					
					new Clases_Grupales_SHOWCLASE_Dia($asistencia,$dia,$num_sesiones,'../Controllers/Clases_Grupales_Controller.php');
					
			break;

				

				default: /*PARA EL SHOWALL */
				
				if($_SESSION['tipo'] == 'NORMAL' || $_SESSION['tipo'] == 'ADMIN'){
					$clases = new Clases_Grupales_Model('','','','','','','','','','');
					
					$apuntados = $clases -> ContarUsuarios();
					
					$datos = $clases -> ShowAllAdminNormal();
					$respuesta = new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php'); 
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$clases = new Clases_Grupales_Model('','','','','','','','','','');
					
					$apuntados = $clases -> ContarUsuarios();
					
					$datos = $clases -> ShowAllEntrenador();
					$respuesta = new Clases_Grupales_SHOWALL($datos,$apuntados,'../Controllers/Clases_Grupales_Controller.php'); 
				}
				
			}
		
	


}
}

?>