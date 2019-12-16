<?php
//Declaracion de la clase
class Promociones_has_Usuarios_Model{
	
	var $ID_Promo;

	var $usuarios_login;
	var $pago;
	var $CCV;
	var $num_tarjeta;
	
	//Constructor de la clase
	function __construct ($ID_Promo,$usuarios_login,$pago,$CCV,$num_tarjeta){
		$this -> ID_Promo = $ID_Promo;
		$this -> usuarios_login = $usuarios_login;
		$this -> pago = $pago;
		$this -> CCV = $CCV;
		$this -> num_tarjeta = $num_tarjeta;
		
		//Incluimos el archivo de acceso a la bd
		include_once 'Access_DB.php';
		//Funcion de conexion a la bd
		$this->mysqli = ConnectDB();
		}
//Funcion para insertar torneos
function add(){
	
	//Sentencia sql para insertar
	$sql = "INSERT INTO Promociones_has_Usuarios (`ID_Promo`, `usuarios_login`) 
			VALUES (
				'$this->ID_Promo',
				'$this->usuarios_login'
				)
			";
			
 ;
	if (!$this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
	}
}

function addMetodoPago($idpromo,$usuario,$pago){
	
    $sql = "SELECT * FROM promociones_has_usuarios WHERE (`ID_Promo` = '".$idpromo."' AND `usuarios_login` = '".$usuario."'
										)";
echo $sql;
    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {	
		//Sentencia sql para editar
		$sql = "UPDATE promociones_has_usuarios SET
					`pago` = '".$pago."'

				WHERE (`ID_Promo` = '".$idpromo."' AND `usuarios_login` = '".$usuario."'
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

function addTarjeta($idpromo,$usuario,$CCV,$num_tarjeta){
	
    $sql = "SELECT * FROM promociones_has_usuarios WHERE (`ID_Promo` = '".$idpromo."' AND `usuarios_login` = '".$usuario."'
										)";
echo $sql;
    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {	
		//Sentencia sql para editar
		$sql = "UPDATE promociones_has_usuarios SET
					`CCV` = '".$CCV."',
					`num_tarjeta` = '".$num_tarjeta."'

				WHERE (`ID_Promo` = '".$idpromo."' AND `usuarios_login` = '".$usuario."'
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

//Funcion sql que buscara las categorias que correspondan
function search(){ 
			//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM Promociones_has_Usuarios
    			WHERE
    				( 
    				(`ID_Promo` LIKE '%$this->ID_Torneo%') &&
	 				(`nombre` LIKE '%$this->nombre%') &&
					(`categoria` LIKE '%$this->categoria%') &&
					(`edicion` LIKE '%$this->edicion%') &&
					(`fecha` LIKE '%$this->fecha%') &&
					(`nivel` LIKE '%$this->nivel%')
					
    				)";
			
				
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda'; //Devuelve mensaje de error
	
	}
    else{ 
	
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

//Muestra los torneos a los que se puede apuntar un hombre (mixtos o masculinos) y/o los que se puede apuntar una mujer (mixtos o femeninos)
function searchPorCategoria(){ 
			//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM torneo
    			WHERE
    				( 
    				
					(`categoria` LIKE '".$_SESSION['sexo']."') OR  (`categoria` LIKE 'Mixta')
					
    				)";
			
				 ;
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda'; //Devuelve mensaje de error
	
	}
    else{ 
	
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

//Funcion de borrado de un torneo
function delete()
{	
    $sql = "SELECT * FROM torneo WHERE (`ID_Torneo` = '$this->ID_Torneo')";
    
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result->num_rows == 1)
    {
    	//Sentencia sql para borrar
        $sql = "DELETE FROM torneo WHERE (`ID_Torneo` = '$this->ID_Torneo')";
        
        $this->mysqli->query($sql);//Guarda el resultado
        
    	return 'Borrado correctamente';//Devuelve mensaje de exito
    } 
    else
        return 'No existe';//Devuelve mensaje de error
}


//Funcion que obtiene todos los datos de un torneo especifico
function apuntadosPromo() 
{	
	
    $sql = "SELECT usuarios_login FROM Promociones_has_Usuarios WHERE (`ID_Promo` = '".$this->ID_Promo."')";
  
    if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{//Devuelve el resultado
		$result = $resultado;
		return $result;
	}
} 



function PuedeApuntarse($login)
{	
    $sql = "SELECT *
			FROM parejas_has_torneos
			WHERE parejas_ID_Pareja IN (
				SELECT ID_Pareja
				FROM parejas
				WHERE (usuarios_login = '".$login."' OR usuarios_login1 = '".$login."')
				AND torneos_ID_Torneo = '".$this->torneos_ID_Torneo."')
			";
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
   
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
	if ($result->num_rows == 0){
		return true;
	}else{
		return false;
	}
    

}


function DevolverIDPareja() 
{	
	
    $sql = "SELECT parejas_ID_Pareja
			FROM parejas_has_torneos
			WHERE (`ID_Pareja` = '$this->ID_Pareja')";
   
    if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{//Devuelve el resultado
		$result = $resultado;
		return $result;
	}
}


function DevolverPareja() 
{	
	
    $sql = "SELECT pareja_usuarios_login1
			FROM parejas_has_torneos
			WHERE (`parejas_ID_Pareja` = '$this->parejas_ID_Pareja')";
   
    if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{//Devuelve el resultado
		$result = $resultado;
		return $result;
	}
}

}
?>