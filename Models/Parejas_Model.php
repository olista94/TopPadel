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

//Funcion sql que buscara las categorias que correspondan
function search(){ 
			//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM torneo
    			WHERE
    				( 
    				(`ID_Torneo` LIKE '%$this->ID_Torneo%') &&
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

}
?>