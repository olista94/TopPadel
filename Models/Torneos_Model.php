<?php
//Declaracion de la clase
class Torneos_Model{
	
	var $ID_Torneo;
	
	var $nombre;
	
	var $categoria;

	var $edicion;
	
	var $fecha;
	
	var $nivel;
	
	//Constructor de la clase
	function __construct ($ID_Torneo,$nombre,$categoria,$edicion,$fecha,$nivel){
		$this -> ID_Torneo = $ID_Torneo;
		$this -> nombre = $nombre;
		$this -> categoria = $categoria;
		$this -> edicion = $edicion;
		$this -> fecha = $fecha;
		$this -> nivel = $nivel;

		//Incluimos el archivo de acceso a la bd
		include_once 'Access_DB.php';
		//Funcion de conexion a la bd
		$this->mysqli = ConnectDB();
		}
//Funcion para insertar torneos
function add(){
	
	//Sentencia sql para insertar
	$sql = "INSERT INTO torneo
			VALUES (
				'$this->ID_Torneo',
				'$this->nombre',
				'$this->categoria',
				'$this->fecha',
				'$this->edicion',
				'$this->nivel')
			";

	if (!$this->mysqli->query($sql)) { 
		return 'Error al insertar';//Devuelve mensaje de error
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
					
    				)
					order by fecha";

				
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

function comprobarGenerado()
{	
    $sql = "SELECT * FROM parejas_has_partidos WHERE (`ID_Torneo` = '$this->ID_Torneo')";
   
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result->num_rows >= 1)
    {
		return true;//Devuelve mensaje de exito
    } 
	else{
        return false;//Devuelve mensaje de error
	}
}

function BuscarCategoria(){
	$sql = "SELECT categoria
			FROM torneo
			WHERE ID_Torneo = '$this->ID_Torneo' ";
					
	
	
	if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
		$result = $resultado->fetch_array()[0];//Se guarda el resultado de la consulta sql
		
		return $result;//Se devuelve el resultado de la consulta
	}
}

function BuscarID_Torneo(){
	$sql = "SELECT ID_Torneo
			FROM torneo
			WHERE ID_Torneo = '$this->ID_Torneo' ";
					
	
	
	if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
		$result = $resultado->fetch_array()[0];//Se guarda el resultado de la consulta sql
		
		return $result;//Se devuelve el resultado de la consulta
	}
}

function TorneoShowCompleto(){
	$sql = "SELECT `torneos_ID_Torneo`,`nombre`,`edicion`,`parejas_ID_Pareja`,`usuarios_login`,`usuarios_login1`,`PJ`,`PG`,`PP`,`Ptos`
			FROM `parejas_has_torneos` p,`parejas` par,`torneo` t
			WHERE p.`parejas_ID_Pareja` = par.`ID_Pareja` AND p.`torneos_ID_Torneo` = t.`ID_Torneo` ";
					
	
	
	if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
		$result = $resultado->fetch_array()[0];//Se guarda el resultado de la consulta sql
		
		return $result;//Se devuelve el resultado de la consulta
	}
}

function partidosPareja($idparejalocal,$idparejavisitante){
	
	//Sentencia sql para insertar
	$sql = "SELECT * FROM parejas_has_partidos WHERE `ID_ParejaLocal` = '".$idparejalocal."' or `ID_ParejaVisitante` = '".$idparejavisitante."'
			";


	if (!$this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
	}
}

function ResultadosPartidosPareja($idpartido,$idparejalocal,$idparejavisitante){
	$sql = "SELECT par.usuarios_login,par.usuarios_login1,par1.usuarios_login,par1.usuarios_login1,part.Sets_Local,part.Sets_Visitante
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph
			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido AND
			part.ID_Partido = ".$idpartido." AND par.ID_Pareja = ".$idparejalocal." AND par1.ID_Pareja = ".$idparejavisitante;
	
}


//------------------------------------------------------------------------PLAYOFFS----------------------------------------------------------------------------------------------------

 function puedeGenerarPlayoffs(){//Comprueba que la liga regular ha terminado para poder generar los PO
	 
	$sql = "SELECT php.*,p.* FROM `parejas_has_partidos` php, partidos p WHERE JuegosSet1_Local is null and (p.ID_Partido = php.`ID_Partido`) AND (p.ronda = 'Grupos')
	";
	 
	  $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result->num_rows >= 1)
    {
		return false;//Devuelve mensaje de exito
    } 
	else{
        return true;//Devuelve mensaje de error
	}
 }
 
 function playoffsGenerados(){//Comprueba si ya se han generado los PO para no volver a generarlos
	 
	$sql = "SELECT php.*,p.* FROM `parejas_has_partidos` php, partidos p WHERE JuegosSet1_Local is null and (p.ID_Partido = php.`ID_Partido`) and ronda = 'Cuartos'
	";
	 
	  $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result->num_rows >= 1)
    {
		return true;//Devuelve mensaje de exito
    } 
	else{
        return false;//Devuelve mensaje de error
	}
 }
 
 function numGrupos($idtorneo){//Comprueba si ya se han generado los PO para no volver a generarlos
	 
	$sql = "SELECT COUNT(DISTINCT grupo) as Num_Grupos FROM `parejas_has_grupos` WHERE `ID_Torneo` = '".$idtorneo."'
	";
	 
	  $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
		$result = $resultado->fetch_array()[0];//Se guarda el resultado de la consulta sql
		
		return $result;//Se devuelve el resultado de la consulta
	}
 }
 
  function devolverClasificados($grupo,$idtorneo){//Comprueba si ya se han generado los PO para no volver a generarlos
	 
	$sql = "SELECT parejas_ID_Pareja
			FROM `parejas_has_torneos` pht, `parejas_has_grupos` phg
			WHERE `parejas_ID_Pareja` = ID_Pareja and grupo = '".$grupo."' and `torneos_ID_Torneo` = '".$idtorneo."'
			ORDER BY grupo,`Ptos` DESC,`SF` DESC,`SC` ASC,`JF` DESC,`JC` ASC
			LIMIT 8
	";
	 echo $sql;
	  $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
		return $result;//Se devuelve el resultado de la consulta
	}
 }
 
}
?>