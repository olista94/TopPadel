
<?php

//Creamos la sesion
session_start();

//Incluimos los mensajes y la funcion de autenticacion
include_once "../Views/MESSAGE.php";
include_once "../Views/MESSAGE_Pago.php";
include_once "../Functions/Authentication.php";

//Comprobamos si esta el tipo de usuario en sesion
if(isset($_SESSION['tipo'])){
	//Si el usuario es tipo admin
	
		
		if (!IsAuthenticated()){ //si no está autenticado

			new MESSAGE('No puedes ver esto si no estás logueado', '../Controllers/Login_Controller.php'); //muestra el mensaje

		}else{ //si lo está

			//Incluimos las vistas y modelo necesarios
			include_once "../Models/Clinics_Model.php";
			include_once "../Models/Clases_Grupales_has_Usuarios_Model.php";
			include_once "../Models/Pistas_Model.php";		
			include_once "../Views/Clinics_SHOWALL_View.php";
			include_once "../Views/Clinics_SHOWCURRENT_View.php";
			include_once "../Views/Clinics_DELETE_View.php";
			include_once "../Views/Clinics_ADD_View.php";
			include_once "../Views/Clinics_ADD_Pago_View.php";
			include_once "../Views/Clinics_ADD_Tarjeta_View.php";
			include_once "../Views/Clinics_SEARCH_View.php";
			include_once "../Views/Clinics_INSCRIPCION_View.php";
			include_once "../Views/Clinics_SHOWCLINIC_View.php"; 
			include_once "../Views/Clinics_SHOWCLINIC_Dia_View.php"; 
			
			 

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
			if(isset($_REQUEST['fecha_clase'])){
				$fecha_clase = $_REQUEST['fecha_clase'];//Identificador de la Inscripcion
				
			}
			else{
				$fecha_clase = "";
			}
			if(isset($_REQUEST['hora_clase'])){
				$hora_clase = $_REQUEST['hora_clase'];//Identificador de la Inscripcion
				
			}
			else{
				$hora_clase = "";
			}
			
			if(isset($_REQUEST['ID_Pista'])){
				$ID_Pista = $_REQUEST['ID_Pista'];//Identificador de la Inscripcion
				
			}
			else{
				$ID_Pista = "";
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
				
				$clinics = new Clinics_Model ($ID_Clase,$login_entrenador,$tope,$tipo,$descripcion,$invitado,$fecha_clase,$hora_clase,$ID_Pista); //creamos el objeto usuario
				
				return $clinics; //devolvemos el objeto usuario
			}

			//Si mandamos alguna accion desde la vista
			if(!isset($_REQUEST['action'])){
				$_REQUEST['action'] = ''; //Sino la dejamos vacia
			}

			//Segun la accion definida
			switch ($_REQUEST['action']){
				
				case 'Confirmar_ADD1':
					$clase = new Clinics_Model("","",'','','','','','','');
					new Clinics_ADD('../Controllers/Clinics_Controller.php');	//Crea la vista de añadir
				
				break;
			
			case 'Confirmar_ADD2':
					
					$clase = getDataForm();
					
					$pista = $clase -> buscarPistasLibresClases();
					$entrenador = $clase -> buscarEntrenadoresLibresClases();
					
					
					if(!is_string($entrenador) || !is_numeric($pista)){
						new MESSAGE('No hay pista y/o entrenadores disponibles','../Controllers/Clinics_Controller.php');
					}else{
						
						$mensaje = $clase -> addClinic();
						$idclase = $clase -> DevolverMaxIDClase();
						
						$clase -> insertarPistayEntrenador($pista,$entrenador,$idclase);
						
						new MESSAGE($mensaje,'../Controllers/Clinics_Controller.php');
					
					}
				
			break;
			
			case 'Confirmar_DELETE1':
			
				$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$datos = $clase -> rellenadatos();
				
				$array = $datos -> fetch_array();
				$pistas = new Pistas_Model($array['ID_Pista'],"","","");
				$p = $pistas -> searchById();
				
				$datos = $clase -> rellenadatos();
				
				new Clinics_DELETE($datos,$p,'../Controllers/Clinics_Controller.php');
			
			break;
			
			case 'Confirmar_DELETE2':
			
				$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$mensaje = $clase -> delete();
				
				new MESSAGE($mensaje,'../Controllers/Clinics_Controller.php');
			
			break;
			
			case 'Confirmar_SHOWCURRENT':
			
				$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$datos = $clase -> rellenadatos();
				
				$array = $datos -> fetch_array();
				$pistas = new Pistas_Model($array['ID_Pista'],"","","");
				$p = $pistas -> searchById();
				
				$datos = $clase -> rellenadatos();
				
				new Clinics_SHOWCURRENT($datos,$p,'../Controllers/Clinics_Controller.php');
			
			break;
			
			case 'Confirmar_SEARCH1':
				$pistas = new Pistas_Model("","","",""); 
				$p = $pistas -> search(); 
				
				new Clinics_SEARCH($p,'../Controllers/Clinics_Controller.php');
			
			break;
			
			case 'Confirmar_SEARCH2':
			
				$clase = getDataForm();
				
				if($_SESSION['tipo'] == 'NORMAL'){
					$datos = $clase -> searchAdminNormal();
					$apuntados = $clase -> ContarUsuarios();
					
					new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php');
				}
				
				else if($_SESSION['tipo'] == 'ADMIN'){
					$datos = $clase -> searchAdminNormal();
					$apuntados = $clase -> ContarUsuarios();
					
					new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php');
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$datos = $clase -> searchEntrenador();
					$apuntados = $clase -> ContarUsuarios();
					
					new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php');
				}

			break;
			
			case 'Confirmar_INSCRIPCION1':
			
				$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$apuntarse = $clase -> PuedeApuntarse();
				
				$tope = $clase -> devolverTope() -> fetch_array();
				$numApuntados = $clase -> ContarUsuarios1() -> fetch_array();

				if($tope[0] > $numApuntados[0]){
				
				
					if($apuntarse == false){
						new MESSAGE('Ya estas apuntado','../Controllers/Clinics_Controller.php');
					}
				
					else{
						$datos = $clase -> rellenadatos();	
						$array = $datos -> fetch_array();
						$pistas = new Pistas_Model($array['ID_Pista'],"","","");
						$p = $pistas -> searchById();
				
						$datos = $clase -> rellenadatos();
						new Clinics_INSCRIPCION($datos,$p,'../Controllers/Clinics_Controller.php');
					}
				}
				
				else{
					new MESSAGE('Ya se ha alcanzado el maximo de apuntados','../Controllers/Clinics_Controller.php');	
				}
			
			break;
			
			case 'Confirmar_INSCRIPCION2':
			
				$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
				
				$mensaje = $clase -> apuntarUsuario();
				
				new Clinics_ADD_Pago($_REQUEST['ID_Clase'],'../Controllers/Clinics_Controller.php');
			
			break;
			
			
			case 'Confirmar_ADD_Pago':
			
				$clases = getDataForm();
				
				$clase = new Clases_Grupales_has_Usuarios_Model($_REQUEST['ID_Clase'],'','','','','','','','','','','',$_REQUEST['pago'],'','');
				$clase -> addMetodoPago();
				$idclase = $_REQUEST['ID_Clase'];
				
				$pago = $clase -> devolverMetodoPago($_REQUEST['ID_Clase'],$_SESSION['login']);
				echo $pago;
				//$phu = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],$_SESSION['login'],"","","");
				//$phu -> addMetodoPago($idpromo,$_SESSION['login'],$pago);
				
				if($pago == 'Paypal'){
					new MESSAGE_Pago('Insercion correcta.Puedes acceder a la pagina de paypal haciendo click sobre su logo en el boton azul','../Controllers/Clinics_Controller.php');			 
				}
				else if($pago == 'Contrareembloso'){
					new MESSAGE('Recuerda realizar el pago en las instalaciones del club','../Controllers/Clinics_Controller.php');
				}
				
				else if($pago == 'Tarjeta'){
					new Clinics_ADD_Tarjeta($_REQUEST['ID_Clase'],'../Controllers/Clinics_Controller.php');
				}
			
			break;
			
			case 'Confirmar_ADD_Tarjeta':
			
				$clases = getDataForm();
				
				$clase = new Clases_Grupales_has_Usuarios_Model($_REQUEST['ID_Clase'],'','','','','','','','','','','','',$_REQUEST['CCV'],$_REQUEST['num_tarjeta']);
				
				$mensaje = $clase -> addTarjeta();
				
				//$phu = new Promociones_has_Usuarios_Model($_REQUEST['ID_Promo'],$_SESSION['login'],"","","");
				//$phu -> addTarjeta($_REQUEST['ID_Promo'],$_SESSION['login'],$_REQUEST['CCV'],$_REQUEST['num_tarjeta']);
				new MESSAGE($mensaje,'../Controllers/Clinics_Controller.php');
				
			break;
			
			
			case 'Confirmar_SHOWCLINIC':
					$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
					$apuntados = $clase -> Apuntados();
					
					new Clinics_SHOWCLINIC($apuntados,'../Controllers/Clases_Grupales_Controller.php');
			break;
			
			
			case 'Confirmar_Edit_SHOWCLINIC':
					$clase = new Clinics_Model($_REQUEST['ID_Clase'],"","","","","","","","");
					
					$asistencia = $clase -> mostrarDia1();
					$dia = mysqli_fetch_field_direct($asistencia, 2)->name;
					
					new Clinics_SHOWCLINIC_Dia($asistencia,$dia,'../Controllers/Clases_Grupales_Controller.php');
			break;

				

				default: /*PARA EL SHOWALL */
				
				if($_SESSION['tipo'] == 'NORMAL'){
					$clinics = new Clinics_Model('','','','','','','','','');
					$datos = $clinics -> ShowAllAdminNormal();
					
					$apuntados = $clinics -> ContarUsuarios();
					
					$respuesta = new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php'); 
				}
				else if($_SESSION['tipo'] == 'ADMIN'){
					$clinics = new Clinics_Model('','','','','','','','','');
					$datos = $clinics -> ShowAllAdminNormal();
					
					$apuntados = $clinics -> ContarUsuarios();
					
					$respuesta = new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php'); 
				}
				
				else if($_SESSION['tipo'] == 'ENTRENADOR'){
					$clinics = new Clinics_Model('','','','','','','','','');
					$datos = $clinics -> ShowAllEntrenador();
					
					$apuntados = $clinics -> ContarUsuarios();
					
					$respuesta = new Clinics_SHOWALL($datos,$apuntados,'../Controllers/Clinics_Controller.php'); 
				}
				
			}
		
	


}
}

?>