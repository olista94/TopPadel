<?php
//Declaracion de la clase
class Promociones_has_Usuarios_Model{
	
	var $promociones_ID_Promo;

	var $usuarios_login;
	
	//Constructor de la clase
	function __construct ($promociones_ID_Promo,$usuarios_login){
		$this -> promociones_ID_Promo = $promociones_ID_Promo;
		$this -> usuarios_login = $usuarios_login;
		
		//Incluimos el archivo de acceso a la bd
		include_once 'Access_DB.php';
		//Funcion de conexion a la bd
		$this->mysqli = ConnectDB();
		}
//Funcion para insertar torneos
function add(){
	
	//Sentencia sql para insertar
	$sql = "INSERT INTO Promociones_has_Usuarios (`promociones_ID_Promo`, `usuarios_login`) 
			VALUES (
				'$this->promociones_ID_Promo',
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

//Funcion sql que buscara las categorias que correspondan
function search(){ 
			//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM Promociones_has_Usuarios
    			WHERE
    				( 
    				(`promociones_ID_Promo` LIKE '%$this->ID_Torneo%') &&
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
function rellenadatos() 
{	
	
    $sql = "SELECT * FROM torneo WHERE (`ID_Torneo` = '$this->ID_Torneo')";
   
    if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{//Devuelve el resultado
		$result = $resultado;
		return $result;
	}
} 
//Funcion para editar torneo
function edit()
{
	
    $sql = "SELECT * FROM torneo WHERE (ID_Torneo = '$this->ID_Torneo')";
    
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if ($result->num_rows == 1)
    {	
		//Sentencia sql para editar
		$sql = "UPDATE torneo SET
					`nombre` = '$this->nombre',
					`categoria` = '$this->categoria',
					`edicion` = '$this->edicion',
					`fecha` = '$this->fecha',
					`nivel` = '$this->nivel'

				WHERE (`ID_Torneo` = '$this->ID_Torneo')";

        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación';//Devuelve mensaje de error
		}
		else{ 
			return 'Modificado correctamente'; //Devuelve mensaje de exito
		}
    }
    else 
    	return 'No existe';//Devuelve mensaje de error
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