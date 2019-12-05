
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
			include_once "../Views/Clases_Grupales_SHOWCLASE_Dia_View.php";
			 

			/* RECOGE LOS DATOS DEL FORMULARIO */
			function getDataForm(){
				
				$dia = $_REQUEST['dia'];
				$idclase = $_REQUEST['ID_Clase'];
				
				$clase = new Clases_Grupales_has_Usuarios_Model("","","","","","","","","","","","");
				
				foreach($_REQUEST as $i => $dato){
					if($i != "dia" && $i != 'action' && $i != 'ID_Clase'){
						$clase -> controlarAsistencia($idclase,$dia,$i,$dato);
					}
				}
				
			/* if(isset($_REQUEST['ID_Clase'])){
				$ID_Clase = $_REQUEST['ID_Clase'];//Identificador de la Inscripcion
				
			}
			else{
				$ID_Clase = "";
			}

			if(isset($_REQUEST['login_usuario'])){
				$login_usuario = $_REQUEST['login_usuario'];//Identificador de la Inscripcion
				
			}
			else{
				$login_usuario = "";
			}
				
			if(isset($_REQUEST['dia1'])){
				$dia1 = $_REQUEST['dia1'];//Identificador de la Inscripcion
				
			}
			else{
				$dia1 = "";
			}
			
			if(isset($_REQUEST['dia2'])){
				$dia2 = $_REQUEST['dia2'];//Identificador de la Inscripcion
				
			}
			else{
				$dia2 = "";
			}
			
			if(isset($_REQUEST['dia3'])){
				$dia3 = $_REQUEST['dia3'];//Identificador de la Inscripcion
				
			}
			else{
				$dia3 = "";
			}
			
			if(isset($_REQUEST['dia4'])){
				$dia4 = $_REQUEST['dia4'];//Identificador de la Inscripcion
				
			}
			else{
				$dia4 = "";
			}
			
			if(isset($_REQUEST['dia5'])){
				$dia5 = $_REQUEST['dia5'];//Identificador de la Inscripcion
				
			}
			else{
				$dia5 = "";
			}
			
			if(isset($_REQUEST['dia6'])){
				$dia6 = $_REQUEST['dia6'];//Identificador de la Inscripcion
				
			}
			else{
				$dia6 = "";
			}
			
			if(isset($_REQUEST['dia7'])){
				$dia7 = $_REQUEST['dia7'];//Identificador de la Inscripcion
				
			}
			else{
				$dia7 = "";
			}
			
			if(isset($_REQUEST['dia8'])){
				$dia8 = $_REQUEST['dia8'];//Identificador de la Inscripcion
				
			}
			else{
				$dia8 = "";
			}
			
			if(isset($_REQUEST['dia9'])){
				$dia9 = $_REQUEST['dia9'];//Identificador de la Inscripcion
				
			}
			else{
				$dia9 = "";
			}
			
			if(isset($_REQUEST['dia10'])){
				$dia10 = $_REQUEST['dia10'];//Identificador de la Inscripcion
				
			}
			else{
				$dia10 = "";
			}
				
				$clases_grupales_has_usuarios = new Clases_Grupales_has_Usuarios_Model ($ID_Clase,$login_usuario,$dia1,$dia2,$dia3,$dia4,$dia5,$dia6,$dia7,$dia8,$dia9,$dia10); //creamos el objeto usuario
				
				return $clases_grupales_has_usuarios; //devolvemos el objeto usuario */
			}

			//Si mandamos alguna accion desde la vista
			if(!isset($_REQUEST['action'])){
				$_REQUEST['action'] = ''; //Sino la dejamos vacia
			}

			//Segun la accion definida
			switch ($_REQUEST['action']){
			
			case 'Guardar_Asistencia':
					$clase = new Clases_Grupales_has_Usuarios_Model("","","","","","","","","","","","");
					$clase = getDataForm(); 
					
					$clase = new Clases_Grupales_has_Usuarios_Model($_REQUEST['ID_Clase'],"","","","","","","","","","","");
					$apuntados = $clase -> Apuntados();
					
					new Clases_Grupales_SHOWCLASE($apuntados,'../Controllers/Clases_Grupales_Controller.php');
			break;
			
			case 'Confirmar_SHOWCLASE':
					$clase = new Clases_Grupales_Model($_REQUEST['ID_Clase'],'','','','','','','','');
					$apuntados = $clase -> Apuntados();
					
					new Clases_Grupales_SHOWCLASE($apuntados,'../Controllers/Clases_Grupales_Controller.php');
			break;

				
				
				
				
			}
		
	


}
}

?>