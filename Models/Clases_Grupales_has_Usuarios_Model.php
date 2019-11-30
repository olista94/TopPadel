<?php
//Declaracion de la clase
class Clases_Grupales_has_Usuarios_Model {

	var $ID_Clase;
	var $login_usuario;
	var $dia1;
	var $dia2;
	var $dia3;
	var $dia4;
	var $dia5;
	var $dia6;
	var $dia7;
	var $dia8;
	var $dia9;
	var $dia10;



//Constructor de la clase
function __construct($ID_Clase,$login_usuario,$dia1,$dia2,$dia3,$dia4,$dia5,$dia6,$dia7,$dia8,$dia9,$dia10){
	$this->ID_Clase = $ID_Clase;
	$this->login_usuario = $login_usuario;
	$this->dia1 = $dia1;
	$this->dia2 = $dia2;
	$this->dia3 = $dia3;
	$this->dia4 = $dia4;
	$this->dia5 = $dia5;
	$this->dia6 = $dia6;
	$this->dia7 = $dia7;
	$this->dia8 = $dia8;
	$this->dia9 = $dia9;
	$this->dia10 = $dia10;

	//Incluimos el archivo de acceso a la bd
	include_once 'Access_DB.php';
	//Funcion de conexion a la bd
	$this->mysqli = ConnectDB();
}

function controlarAsistencia(){
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE clases_grupales_has_usuarios SET
			`dia1` = '$this->dia1',
			`dia2` = '$this->dia2',
			`dia3` = '$this->dia3',
			`dia4` = '$this->dia4',
			`dia5` = '$this->dia5',
			`dia6` = '$this->dia6',
			`dia7` = '$this->dia7',
			`dia8` = '$this->dia8',
			`dia9` = '$this->dia9',
			`dia10` = '$this->dia10'
			
			WHERE (`ID_Clase` = '$this->ID_Clase')
			";
			 echo $sql;
			 
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}
	
	function devolverNumApuntados()
{	
    $sql = "SELECT Count(login_usuario)
			FROM clases_grupales_has_usuarios
			WHERE (`ID_Clase` = '$this->ID_Clase')
			
			";
			echo $sql;
		
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result)
    {
    	
       return $result;//Se devuelve el resultado de la consulta
    } 
    else
        return 'No existe';//Devuelve mensaje de error
}


}//fin de clase

?> 