<?php
//Declaracion de la clase
class Inscripcion_Model{
	
	var $parejas_ID_Pareja;

	var $torneos_ID_Torneo;
	
	//Constructor de la clase
	function __construct ($parejas_ID_Pareja,$torneos_ID_Torneo){
		$this -> parejas_ID_Pareja = $parejas_ID_Pareja;
		$this -> torneos_ID_Torneo = $torneos_ID_Torneo;
		
		//Incluimos el archivo de acceso a la bd
		include_once 'Access_DB.php';
		//Funcion de conexion a la bd
		$this->mysqli = ConnectDB();
		}
//Funcion para insertar torneos
function add(){
	
	//Sentencia sql para insertar
	$sql = "INSERT INTO `parejas_has_torneos`(`parejas_ID_Pareja`, `torneos_ID_Torneo`) 
			VALUES (
				'$this->parejas_ID_Pareja',
				'$this->torneos_ID_Torneo'
				)
			";
			echo $sql;

	if (!$this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
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

    $result = $this->mysqli->query($sql);//Guarda el resultado
    
	if ($result->num_rows == 0){
		return true;
	}else{
		return false;
	}
}

function Apuntados()
{	
    $sql = "SELECT `usuarios_login`
			FROM `parejas` WHERE `ID_Pareja` IN
										(SELECT `parejas_ID_Pareja`
										FROM parejas_has_torneos
										WHERE `torneos_ID_Torneo` = '".$this->torneos_ID_Torneo."')";
										 ;
	
	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
    

}

function Apuntados1()
{	
    $sql = "SELECT `usuarios_login1`
			FROM `parejas` WHERE `ID_Pareja` IN
										(SELECT `parejas_ID_Pareja`
										FROM parejas_has_torneos
										WHERE `torneos_ID_Torneo` = '".$this->torneos_ID_Torneo."')";
										 ;
	
	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function DevolverClasificacionInicial()
{	
    $sql = "SELECT `torneos_ID_Torneo`,`nombre`,`edicion`,`parejas_ID_Pareja`,`usuarios_login`,`usuarios_login1`,`PJ`,`PG`,`PP`,`Ptos`,`SF`,`SC`,`JF`,`JC`
			FROM `parejas_has_torneos` p,`parejas` par,`torneo` t,`parejas_has_grupos` pg
			WHERE (p.`parejas_ID_Pareja` = par.`ID_Pareja`) AND (p.`torneos_ID_Torneo` = t.`ID_Torneo`) AND (p.`torneos_ID_Torneo` = '".$this->torneos_ID_Torneo."')
			AND (pg.`grupo` = '0') AND (pg.`ID_Pareja` = par.`ID_Pareja`) AND (pg.`ID_Torneo` = '".$this->torneos_ID_Torneo."')
			ORDER BY `Ptos` DESC,`SF` DESC,`SC` ASC,`JF` DESC,`JC` ASC
			";
			
										
	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function DevolverClasificacion($grupo)
{	
    $sql = "SELECT `torneos_ID_Torneo`,`nombre`,`edicion`,`parejas_ID_Pareja`,`usuarios_login`,`usuarios_login1`,`PJ`,`PG`,`PP`,`Ptos`,`SF`,`SC`,`JF`,`JC`
			FROM `parejas_has_torneos` p,`parejas` par,`torneo` t,`parejas_has_grupos` pg
			WHERE (p.`parejas_ID_Pareja` = par.`ID_Pareja`) AND (p.`torneos_ID_Torneo` = t.`ID_Torneo`) AND (p.`torneos_ID_Torneo` = '".$this->torneos_ID_Torneo."')
			AND (pg.`ID_Pareja` = par.`ID_Pareja`) AND (pg.`ID_Torneo` = '".$this->torneos_ID_Torneo."') AND (pg.`grupo` = '".$grupo."')
			ORDER BY `Ptos` DESC,`SF` DESC,`SC` ASC,`JF` DESC,`JC` ASC
			";
									 
	
	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}


function DevolverParejas($idtorneo)
{	
    $sql = "SELECT `parejas_ID_Pareja`,`usuarios_login`,`usuarios_login1`
			FROM `parejas_has_torneos` p,`parejas` par
			WHERE (p.`parejas_ID_Pareja` = par.`ID_Pareja`) AND (p.`torneos_ID_Torneo` = '$idtorneo') ";

	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function DevolverIDParejas($idtorneo)
{	
    $sql = "SELECT `parejas_ID_Pareja`
			FROM `parejas_has_torneos` p,`parejas` par
			WHERE (p.`parejas_ID_Pareja` = par.`ID_Pareja`) AND (p.`torneos_ID_Torneo` = '$idtorneo') ";
	
	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
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

function DevolverParejasTorneo($idtorneo)
{	
    $sql = "SELECT `parejas_ID_Pareja`,`usuarios_login`,`usuarios_login1`
			FROM `parejas_has_torneos` p,`parejas` par
			WHERE (p.`parejas_ID_Pareja` = par.`ID_Pareja`) AND (p.`torneos_ID_Torneo` = '$idtorneo') ";

	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}
function DevolverParejasGrupo($idtorneo,$grupo)
{	
    $sql = "SELECT `parejas_ID_Pareja`,`usuarios_login`,`usuarios_login1`
			FROM `parejas_has_torneos` p,`parejas` par,`parejas_has_grupos` pg
			WHERE (p.`parejas_ID_Pareja` = par.`ID_Pareja`) AND (p.`torneos_ID_Torneo` = '$idtorneo') AND (pg.`ID_Pareja` = par.`ID_Pareja`)
			AND (pg.`ID_Torneo` = '".$idtorneo."') AND (pg.`grupo` = '".$grupo."') ";

	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}
function DevolverGruposTorneo($idtorneo)
{	
    $sql = "SELECT DISTINCT `grupo` FROM `parejas_has_grupos` WHERE `ID_Torneo` = '".$idtorneo."'";

	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}


}
?>