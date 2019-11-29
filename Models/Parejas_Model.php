<?php
//Declaracion de la clase
class Parejas_Model{
	
	var $ID_Pareja;
	
	var $usuarios_login;
	
	var $usuarios_login1;
	
	//Constructor de la clase
	function __construct ($ID_Pareja,$usuarios_login,$usuarios_login1){
		$this -> ID_Pareja = $ID_Pareja;
		$this -> usuarios_login = $usuarios_login;
		$this -> usuarios_login1 = $usuarios_login1;
		
		//Incluimos el archivo de acceso a la bd
		include_once 'Access_DB.php';
		//Funcion de conexion a la bd
		$this->mysqli = ConnectDB();
		}
//Funcion para insertar torneos
function add(){
	
	//Sentencia sql para insertar
	$sql = "INSERT INTO `parejas` (usuarios_login,usuarios_login1)
			VALUES (
				'".$this->usuarios_login."',
				'".$this->usuarios_login1."'
			 )
			
			";

	if (!$this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
	}
}



function PuedeApuntarse()
{	
    $sql = "SELECT *
			FROM parejas_has_torneos
			WHERE ((`parejas_usuarios_login` = '".$_SESSION['login']."' OR
			`parejas_usuarios_login1` = '".$_SESSION['login']."') AND `torneos_ID_Torneo` = '$this->torneos_ID_Torneo')"
			;
   
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
	if ($result->num_rows == 0){
		return true;
	}else{
		return false;
	}
}

function PuedeApuntarPareja()
{	
    $sql = "SELECT *
			FROM parejas_has_torneos
			WHERE ((`parejas_usuarios_login` = '$this->parejas_usuarios_login1' OR
			`parejas_usuarios_login1` = '$this->parejas_usuarios_login1') AND `torneos_ID_Torneo` = '$this->torneos_ID_Torneo')"
			;
     ;
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
	if ($result->num_rows == 0){
		return true;
	}else{
		return false;
	}
    

}

function DevolverIDPareja()
{	
    $sql = "SELECT MAX(ID_Pareja)
			FROM parejas
			WHERE (`usuarios_login` = '".$this->usuarios_login."' AND
			`usuarios_login1` = '".$this->usuarios_login1."')"
			;
   
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
	if ($result->num_rows == 1){
		return $result -> fetch_array()[0];
	}else{
		return false;
	}
}

function DevolverMiembro1Pareja($idpareja)
{	
    $sql = "SELECT `usuarios_login`
			FROM `parejas`
			WHERE `ID_Pareja` = '".$idpareja."'
	";
   
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
	if ($result->num_rows == 1){
		return $result -> fetch_array()[0];
	}else{
		return false;
	}
}

function DevolverMiembro2Pareja($idpareja)
{	
    $sql = "SELECT `usuarios_login1`
			FROM `parejas`
			WHERE `ID_Pareja` = '".$idpareja."'
	";
   
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
	if ($result->num_rows == 1){
		return $result -> fetch_array()[0];
	}else{
		return false;
	}
}


}
?>