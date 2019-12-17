
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
			include_once "../Views/Clases_Grupales_SHOWALL_View.php";
			include_once "../Models/Clases_Grupales_Model.php";
			include_once "../Models/Clases_Grupales_has_Usuarios_Model.php";
			include_once "../Views/Clases_Grupales_SHOWCLASE_View.php";
			include_once "../Views/Clinics_SHOWCLINIC_View.php";
			include_once "../Views/Clases_Grupales_SHOWCLASE_Dia_View.php";
			 

			/* RECOGE LOS DATOS DEL FORMULARIO */
			function getDataForm(){
				
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
				
				$dia = $_REQUEST['dia2'];
				
				$idclase = $_REQUEST['ID_Clase'];
				
				$clase = new Clases_Grupales_has_Usuarios_Model("","","","","","","","","","","","","","","");
				
				foreach($_REQUEST as $i => $dato){
					if($i != "dia1" && $i != 'action' && $i != 'ID_Clase'){
						$clase -> controlarAsistencia($idclase,$dia,$i,$dato);
					}
				}
				
			}

			//Si mandamos alguna accion desde la vista
			if(!isset($_REQUEST['action'])){
				$_REQUEST['action'] = ''; //Sino la dejamos vacia
			}

			//Segun la accion definida
			switch ($_REQUEST['action']){
			
			case 'Ver_Dia':
					$clase = new Clases_Grupales_has_Usuarios_Model($_REQUEST['ID_Clase'],"","","","","","","","","","","","","","");
					
					$dia1 = $_REQUEST['dia1'];
					$asistencia = $clase -> mostrarDia($dia1);
					
					$dia = mysqli_fetch_field_direct($asistencia, 2)->name;
					
					
					new Clases_Grupales_SHOWCLASE_Dia($asistencia,$dia,'../Controllers/Clases_Grupales_Controller.php');
			break;
			
			case 'Guardar_Asistencia':
					$clase = new Clases_Grupales_has_Usuarios_Model("","","","","","","","","","","","","","","");
					$clase = getDataForm(); 
					
					$clase = new Clases_Grupales_has_Usuarios_Model($_REQUEST['ID_Clase'],"","","","","","","","","","","","","","");
					$apuntados = $clase -> Apuntados();
					
					$clase2 = new Clases_Grupales_Model($_REQUEST['ID_Clase'],"","","","","","","","");
					$tipo = $clase2 -> devolverTipo();
					
					if($tipo == 'ESCUELAS'){
						
						new Clases_Grupales_SHOWCLASE($apuntados,'../Controllers/Clases_Grupales_Controller.php');
					}
					else{
						
						new Clinics_SHOWCLINIC($apuntados,'../Controllers/Clases_Grupales_Controller.php');
					}
			break;
			
			
			
			/*case 'Confirmar_SHOWCLASE':
					$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],'','','','','','','','');
					$apuntados = $clase -> Apuntados();
					
					new Clases_Grupales_SHOWCLASE($apuntados,'../Controllers/Clases_Grupales_Controller.php');
			break; */

				
				
				
				
			}
		
	


}
}

?>