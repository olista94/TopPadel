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
			
				'".$ID_Partido."',
				'".$ID_Torneo."',
				'".$ID_ParejaLocal."',
				'".$ID_ParejaVisitante."'
				)
			";

	if (!$this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
	}
}

function partidosPareja(){
	
	
	$sql = "SELECT part.ID_Partido as ID_Partido,par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2,
			par1.ID_Pareja as ID_ParejaVisitante,par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2,part.Sets_Local,part.Sets_Visitante
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph

			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido
			AND (`ID_ParejaLocal` = '$this->ID_ParejaLocal' OR `ID_ParejaVisitante` = '$this->ID_ParejaVisitante') and (part.ronda = 'Grupos')
			"; 

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




 
 



}
?>