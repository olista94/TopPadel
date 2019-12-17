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
	var $pago;
	var $CCV;
	var $num_tarjeta;



//Constructor de la clase
function __construct($ID_Clase,$login_usuario,$dia1,$dia2,$dia3,$dia4,$dia5,$dia6,$dia7,$dia8,$dia9,$dia10,$pago,$CCV,$num_tarjeta){
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
	$this->pago = $pago;
	$this->CCV = $CCV;
	$this->num_tarjeta = $num_tarjeta;

	//Incluimos el archivo de acceso a la bd
	include_once 'Access_DB.php';
	//Funcion de conexion a la bd
	$this->mysqli = ConnectDB();
}

function controlarAsistencia($idclase,$dia,$usuario,$asiste){
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE clases_grupales_has_usuarios SET
			".$dia." = '".$asiste."'
			
			WHERE (`ID_Clase` = '".$idclase."') AND (login_usuario = '".$usuario."')
			";
			
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
			
		
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result)
    {
    	
       return $result;//Se devuelve el resultado de la consulta
    } 
    else
        return 'No existe';//Devuelve mensaje de error
}


function Apuntados()
{	
    $sql = "SELECT * FROM `clases_grupales_has_usuarios` WHERE ID_Clase = '$this->ID_Clase'";

	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function mostrarDia($dia)
{	
    $sql = "SELECT ID_Clase,login_usuario,".$dia." FROM `clases_grupales_has_usuarios` WHERE ID_Clase = '$this->ID_Clase'";

	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function addMetodoPago(){
	
    $sql = "SELECT * FROM clases_grupales_has_usuarios WHERE (`ID_Clase` = '$this->ID_Clase' AND `login_usuario` = '".$_SESSION['login']."'
										)";
echo $sql;
    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {	
		//Sentencia sql para editar
		$sql = "UPDATE clases_grupales_has_usuarios SET
					`pago` = '$this->pago'

				WHERE (`ID_Clase` = '$this->ID_Clase' AND `login_usuario` = '".$_SESSION['login']."'
										)";
echo $sql;
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación';//Devuelve mensaje de error	
		}
		else{ 
			
			return 'Modificado correctamente'; //Exito
		}
    }
    else 
    	return 'No existe';//Devuelve mensaje de error	
}

function addTarjeta(){
	
    $sql = "SELECT * FROM clases_grupales_has_usuarios WHERE (`ID_Clase` = '$this->ID_Clase' AND `login_usuario` = '".$_SESSION['login']."'
										)";

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {	
		//Sentencia sql para editar
		$sql = "UPDATE clases_grupales_has_usuarios SET
					`CCV` = '$this->CCV',
					`num_tarjeta` = '$this->num_tarjeta'

				WHERE (`ID_Clase` = '$this->ID_Clase' AND `login_usuario` = '".$_SESSION['login']."'
										)";
echo $sql;
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación';//Devuelve mensaje de error	
		}
		else{ 
			
			return 'Modificado correctamente'; //Exito
		}
    }
    else 
    	return 'No existe';//Devuelve mensaje de error	
}

function devolverMetodoPago($idclase,$usuario)
{	
    $sql = "SELECT pago FROM `clases_grupales_has_usuarios` WHERE (`ID_Clase` = '".$idclase."' AND `login_usuario` = '".$usuario."'
										)";
echo $sql;
	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado->fetch_array()[0];//Se devuelve el resultado de la consulta
	}
}


}//fin de clase

?> 