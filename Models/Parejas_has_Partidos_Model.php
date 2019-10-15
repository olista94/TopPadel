<?php
//Declaracion de la clase
class Parejas_has_Partidos_Model{
	
	var $ID_Partido;
	var $ID_Torneo;
	var $ID_ParejaLocal;	
	var $ID_ParejaVisitante;
	
	//Constructor de la clase
	function __construct ($ID_Partido,$ID_Torneo,$ID_ParejaLocal,$ID_ParejaVisitante){
		$this -> ID_Partido = $ID_Partido;
		$this -> ID_Torneo = $ID_Torneo;
		$this -> ID_ParejaLocal = $ID_ParejaLocal;
		$this -> ID_ParejaVisitante = $ID_ParejaVisitante;
		
		//Incluimos el archivo de acceso a la bd
		include_once 'Access_DB.php';
		//Funcion de conexion a la bd
		$this->mysqli = ConnectDB();
		}
//Funcion para insertar torneos
function add($ID_Partido,$ID_Torneo,$ID_ParejaLocal,$ID_ParejaVisitante){
	
	//Sentencia sql para insertar
	$sql = "INSERT INTO parejas_has_partidos
			VALUES (
			'".$idparejalocal."'
				'".$ID_Partido."',
				'".$ID_Torneo."',
				'".$ID_ParejaLocal."',
				'".$ID_ParejaVisitante."'
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

function partidosPareja(){
	
	//Sentencia sql para insertar
	$sql = "SELECT par.usuarios_login as Local1,par.usuarios_login1 as Local2,par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2,part.Sets_Local,part.Sets_Visitante
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph

			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido
			AND (`ID_ParejaLocal` = '$this->ID_ParejaLocal' OR `ID_ParejaVisitante` = '$this->ID_ParejaVisitante')
			"; echo $sql;

	if (!$resultado = $this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; ; //Devuelve mensaje de exito	
	}
}



//Funcion sql que buscara las categorias que correspondan
function search(){ 
			//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM Parejas_has_Partidos_Model
    			WHERE
    				( 
    				(`ID_Partido` LIKE '%$this->ID_Partido%') &&
	 				(`ID_Torneo` LIKE '%$this->ID_Torneo%') &&
					(`ID_ParejaLocal` LIKE '%$this->ID_ParejaLocal%') &&
					(`ID_ParejaVisitante` LIKE '%$this->ID_ParejaVisitante%')
					
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



}
?>