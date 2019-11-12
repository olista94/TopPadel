
<?php

//Creamos la sesion
session_start();

//Incluimos los mensajes y la funcion de autenticacion
include_once "../Views/MESSAGE.php";
include_once "../Functions/Authentication.php";

//Comprobamos si esta el tipo de usuario en sesion
if(isset($_SESSION['tipo'])){
	//Si el usuario es tipo admin
	
		
		if (!IsAuthenticated()){ //si no está autenticado

			new MESSAGE('No puedes ver esto si no estás logueado', '../Controllers/Login_Controller.php'); //muestra el mensaje

		}else{ //si lo está

			//Incluimos las vistas y modelo necesarios
			include_once "../Models/Usuarios_Model.php";
			include_once "../Views/Usuarios_SHOWALL_View.php";
			include_once "../Views/Usuarios_SHOWALL_Normal_View.php";
			include_once "../Views/Usuarios_ADD_View.php";
			include_once "../Views/Usuarios_SEARCH_View.php";
			include_once "../Views/Usuarios_EDIT_View.php";
			include_once "../Views/Usuarios_SHOWCURRENT_View.php";
			include_once "../Views/Usuarios_SHOWCURRENT_Normal_View.php";
			include_once "../Views/Usuarios_DELETE_View.php";
			include_once "../Views/Socios_Home_View.php";
			include_once "../Views/Socios_Home_Delete_View.php";
			include_once "../Views/Socios_ADD_View.php";
			include_once "../Views/Socios_DELETE_View.php";

			/* RECOGE LOS DATOS DEL FORMULARIO */
			function getDataForm(){
			if(isset($_REQUEST['login'])){
				$login = $_REQUEST['login'];//Identificador de la Inscripcion
				
			}
			else{
				$login = $_SESSION['login'];
			}

			if(isset($_REQUEST['password'])){
				$password = $_REQUEST['password'];//Identificador de la Inscripcion
				
			}
			else{
				$password = "";
			}
				
			if(isset($_REQUEST['dni'])){
				$dni = $_REQUEST['dni'];//Identificador de la Inscripcion
				
			}
			else{
				$dni = "";
			}
			
			if(isset($_REQUEST['nombre'])){
				$nombre = $_REQUEST['nombre'];//Identificador de la Inscripcion
				
			}
			else{
				$nombre = "";
			}

			if(isset($_REQUEST['apellidos'])){
				$apellidos = $_REQUEST['apellidos'];//Identificador de la Inscripcion
				
			}
			else{
				$apellidos = "";
			}
			
			if(isset($_REQUEST['telefono'])){
				$telefono = $_REQUEST['telefono'];//Identificador de la Inscripcion
				
			}
			else{
				$telefono = "";
			}
				
			if(isset($_REQUEST['email'])){
				$email = $_REQUEST['email'];//Identificador de la Inscripcion
				
			}
			else{
				$email = "";
			}
				
			if(isset($_REQUEST['fecha'])){
				$fecha = $_REQUEST['fecha'];//Identificador de la Inscripcion
				
			}
			else{
				$fecha = "";
			}
				
			if(isset($_REQUEST['sexo'])){
				$sexo = $_REQUEST['sexo'];//Identificador de la Inscripcion
				
			}
			else{
				$sexo = "";
			}
			
			if(isset($_REQUEST['tipo'])){
				$tipo = $_REQUEST['tipo'];//Identificador de la Inscripcion
				
			}
			else{
				$tipo = "";
			}
			if(isset($_REQUEST['socio'])){
				$socio = $_REQUEST['socio'];//Identificador de la Inscripcion
				
			}
			else{
				$socio = "";
			}
			
			if(isset($_REQUEST['IBAN'])){
				$IBAN = $_REQUEST['IBAN'];//Identificador de la Inscripcion
				
			}
			else{
				$IBAN = "";
			}
			
			if(isset($_REQUEST['cuenta'])){
				$cuenta = $_REQUEST['cuenta'];//Identificador de la Inscripcion
				
			}
			else{
				$cuenta = "";
			}
			
				
				$usuario = new Usuarios_Model ($login,$password,$dni,$nombre,$apellidos,$telefono,$email,$fecha,$sexo,$tipo,$socio,$IBAN,$cuenta); //creamos el objeto usuario
				
				return $usuario; //devolvemos el objeto usuario
			}

			//Si mandamos alguna accion desde la vista
			if(!isset($_REQUEST['action'])){
				$_REQUEST['action'] = ''; //Sino la dejamos vacia
			}
		if($_SESSION['tipo']=='ADMIN'){
			//Segun la accion definida
			switch ($_REQUEST['action']){
				
				//Si queremos añadir un usuario
				case 'Confirmar_ADD':
					//Si no le pasamos datos desde formulario
					if(count($_REQUEST) < 4 ){						
						new Usuarios_ADD('../Controllers/Usuarios_Controller.php');
					//Si le pasamos datos desde formulario
					}else{
						$usuario = getDataForm(); //Guardamos los datos del formulario
						$mensaje = $usuario-> Register(); //Miramos si se puede resgistrar el usuario y guardamos el mensaje de vuelta

						//Si podemos
						if($mensaje == true){
							$mensaje = $usuario -> registrar(); //Guardamos el usuario y guardamos el mensaje
							new MESSAGE($mensaje,'../Controllers/Usuarios_Controller.php'); //Mostramos el mensaje
						//Si no podemos
						}else{
							new MESSAGE($mensaje,'../Controllers/Usuarios_Controller.php'); //Mostramos el mensaje
						}					
					}					
				break;

				//Si queremos editar un usuario
				case 'Confirmar_EDIT':
					//Si no le pasamos datos desde formulario
					if(count($_REQUEST) < 4 ){
						$usuario = new Usuarios_Model($_REQUEST['login'],'','','','','','','','','','','',''); //Creamos el objeto usuario
						$datos = $usuario->rellenadatos(); //Rellenamos con los datos del usuario
						new Usuarios_EDIT($datos,'../Controllers/Usuarios_Controller.php'); //Creamos la vista para editar un usuario
					//Si le pasamos datos desde formulario
					}else{						
						$usuario = getDataForm();//Obtenemos los datos del formulario y los guardamos
						$mensaje = $usuario-> edit(); //Editamos el usuario y guardamos el mensaje
						new MESSAGE($mensaje,'../Controllers/Usuarios_Controller.php'); //Mostramos el mensaje
					}
				break;

				//Si queremos buscar un usuario
				case 'Confirmar_SEARCH':
					//Si no le pasamos datos desde formulario
					if(count($_REQUEST) < 4 ){						
						new Usuarios_SEARCH('../Controllers/Usuarios_Controller.php'); //Creamos la vista para buscar usuarios
					//Si le pasamos datos desde formulario
					}else{
						$usuario = getDataForm();//Obtenemos los datos del formulario y los guardamos
						$datos = $usuario-> search();//Buscamos los usuarios
						new Usuarios_SHOWALL($datos,'../Controllers/Usuarios_Controller.php'); //Creamos la vista para los resultados						
					}
				break;

				//Si queremos borrar un usuario
				case 'Confirmar_DELETE1':					
					$usuario = new Usuarios_Model($_REQUEST['login'],'','','','','','','','','','','','');//Creamos el objeto usuario
					$datos = $usuario->rellenadatos();//Rellenamos con los datos del usuario
					new Usuarios_DELETE($datos,'../Controllers/Usuarios_Controller.php'); //Creamos la vista para borrar un usuario
				break;
				
				//Si queremos confirmar el borrado de un usuario
				case 'Confirmar_DELETE2':						
					$usuario = new Usuarios_Model($_REQUEST['login'],'','','','','','','','','','','','');//Creamos el objeto usuario
					$mensaje = $usuario-> delete(); //Borramos el usuario y guardamos el mensaje
					new MESSAGE($mensaje,'../Controllers/Usuarios_Controller.php');	//Mostramos el mensaje					
				break;

				//Si queremos mostrar los detalles de un usuario
				case 'Confirmar_SHOWCURRENT':
					//Si no le pasamos datos desde formulario
					if(count($_REQUEST) < 4 ){
						$usuario = new Usuarios_Model($_REQUEST['login'],'','','','','','','','','','','','');//Creamos el objeto usuario
						$datos = $usuario->rellenadatos();//Rellenamos con los datos del usuario
						new Usuarios_SHOWCURRENT($datos,'../Controllers/Usuarios_Controller.php'); //Creamos la vista
					}
				break;
				
				case 'Confirmar_SHOWCURRENT1':
					//Si no le pasamos datos desde formulario
					
						$usuario = new Usuarios_Model($_SESSION['login'],'','','','','','','','','','','','');//Creamos el objeto usuario
						$datos = $usuario->rellenadatos();//Rellenamos con los datos del usuario
						new Usuarios_SHOWCURRENT($datos,'../Controllers/Usuarios_Controller.php'); //Creamos la vista
					
				break;

				default: /*PARA EL SHOWALL */
					$usuario = new Usuarios_Model('','','','','','','','','','','','','','','','');//Creamos el objeto usuario
					$datos = $usuario -> search();//Buscamos todos los usuarios
					$respuesta = new Usuarios_SHOWALL($datos,'../Controllers/Usuarios_Controller.php'); //Mostramos los usuarios en el showall
			}
		}
	
	
	else{
		$user = new Usuarios_Model($_SESSION['login'],'','','','','','','','','','','','');
		$socio = $user -> DevolverSocio();
		
		
		if($_REQUEST['action'] == 'Confirmar_SHOWCURRENT1'){
			
						$usuario = new Usuarios_Model($_SESSION['login'],'','','','','','','','','','','','');//Creamos el objeto usuario
						$datos = $usuario->rellenadatos();//Rellenamos con los datos del usuario
						new Usuarios_SHOWCURRENT($datos,'../Controllers/Usuarios_Controller.php'); //Creamos la vista
		}
		
		else if($_REQUEST['action'] == 'Confirmar_SHOWCURRENT'){
			
						$usuario = new Usuarios_Model($_REQUEST['login'],'','','','','','','','','','','','');//Creamos el objeto usuario
						$datos = $usuario->rellenadatos();//Rellenamos con los datos del usuario
						new Usuarios_SHOWCURRENT_Normal($datos,'../Controllers/Usuarios_Controller.php'); //Creamos la vista
		}
		
		else if($_REQUEST['action'] == 'Confirmar_SEARCH1'){
			
						new Usuarios_SEARCH('../Controllers/Usuarios_Controller.php');
		}
		
		else if($_REQUEST['action'] == 'Confirmar_SEARCH'){
			
						$usuario = getDataForm();//Obtenemos los datos del formulario y los guardamos
						$datos = $usuario-> search();//Buscamos los usuarios
						new Usuarios_SHOWALL_Normal($datos,'../Controllers/Usuarios_Controller.php'); 
		}
		
		else if($_REQUEST['action'] == 'Hacerse_Socio1'){
			if($socio == 'NO'){
			
						$usuario = new Usuarios_Model($_SESSION['login'],'','','','','','','','','','','','');
						$datos = $usuario->rellenadatos();//Rellenamos con los datos del usuario
						new Socios_Home($datos,'../Controllers/Usuarios_Controller.php'); //Creamos la vista
			}
			else{
						$usuario = new Usuarios_Model($_SESSION['login'],'','','','','','','','','','','','');
						$datos = $usuario->rellenadatos();//Rellenamos con los datos del usuario
						new Socios_Home_Delete($datos,'../Controllers/Usuarios_Controller.php'); //Creamos la vista
			}
			
		}							
		else if($_REQUEST['action'] == 'Hacerse_Socio2'){
									$usuario = new Usuarios_Model($_SESSION['login'],'','','','','','','','','','','','');
										$datos = $usuario->rellenadatos();//Rellenamos con los datos del usuario
											new Socios_ADD($datos,'../Controllers/Usuarios_Controller.php'); //Creamos la vista
				
		
		}	
		else if($_REQUEST['action'] == 'Confirmar_Socio'){
			
									$usuario = new Usuarios_Model($_SESSION['login'],'','','','','','','','','','','','');
									$usuario = getDataForm();

										$mensaje = $usuario->addSocio();//Rellenamos con los datos del usuario
											new MESSAGE($mensaje,'../Controllers/Torneos_Controller.php');			
		
		}
		
		else if($_REQUEST['action'] == 'Borrar_Socio'){
									$usuario = new Usuarios_Model($_SESSION['login'],'','','','','','','','','','','','');
									$u = $usuario -> DatosSocio();

										//$mensaje = $usuario->deleteSocio();//Rellenamos con los datos del usuario
										new Socios_DELETE($u,'../Controllers/Usuarios_Controller.php');			
		
		}
		
		else if($_REQUEST['action'] == 'Borrar_Socio2'){
			$usuario = new Usuarios_Model($_SESSION['login'],'','','','','','','','','','','','');
			$mensaje = $usuario->deleteSocio();//Rellenamos con los datos del usuario
			new MESSAGE($mensaje,'../Controllers/Usuarios_Controller.php');			
		
		}
		
		else if($_REQUEST['action'] == ''){	
					$usuario = new Usuarios_Model('','','','','','','','','','','','','','','','');//Creamos el objeto usuario
					$datos = $usuario -> search();//Buscamos todos los usuarios
					$respuesta = new Usuarios_SHOWALL_Normal($datos,'../Controllers/Usuarios_Controller.php'); //Mostramos los usuarios en el showall
		}
		
		else{
			new MESSAGE('No puedes ver esto si no eres administrador', '../Controllers/Index_Controller.php'); //muestra el mensaje
		}
	}
}
}

?>