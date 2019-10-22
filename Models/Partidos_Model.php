<!---MODELO DE LAS PIESTAS
 CREADO POR los Cangrejas EL 21/12/2018-->
<?php
//Declaracion de la clase
class Partidos_Model {

	var $ID_Partido;
	var $fecha;
	var $hora;
	var $ronda;
	var $jornada;
	var $grupo;
	var $pista_ID_Pista;
	var $Sets_Local;
	var $Sets_Visitante;
	var $JuegosSet1_Local;
	var $JuegosSet1_Visitante;
	var $JuegosSet2_Local;
	var $JuegosSet2_Visitante;
	var $JuegosSet3_Local;
	var $JuegosSet3_Visitante;
	
//Constructor de la clase
function __construct($ID_Partido,$fecha,$hora,$ronda,$jornada,$grupo,
					$pista_ID_Pista,$Sets_Local,$Sets_Visitante,$JuegosSet1_Local,
					$JuegosSet1_Visitante,$JuegosSet2_Local,$JuegosSet2_Visitante,
					$JuegosSet3_Local,$JuegosSet3_Visitante){
						
	$this->ID_Partido = $ID_Partido;
	$this->fecha = $fecha;
	$this->hora = $hora;
	$this->ronda = $ronda;
	$this->jornada = $jornada;
	$this->grupo = $grupo;
	$this->pista_ID_Pista = $pista_ID_Pista;
	$this->Sets_Local = $Sets_Local;
	$this->Sets_Visitante = $Sets_Visitante;
	$this->JuegosSet1_Local = $JuegosSet1_Local;
	$this->JuegosSet1_Visitante = $JuegosSet1_Visitante;
	$this->JuegosSet2_Local = $JuegosSet2_Local;
	$this->JuegosSet2_Visitante = $JuegosSet2_Visitante;
	$this->JuegosSet3_Local = $JuegosSet3_Local;
	$this->JuegosSet3_Visitante = $JuegosSet3_Visitante;
	//Incluimos el archivo de acceso a la bd
	include_once 'Access_DB.php';
	//Funcion de conexion a la bd
	$this->mysqli = ConnectDB();
}

//Funcion para insertar pistas
function add(){
			//Sentencia sql que insetara la categoria
		$sql = "INSERT INTO partidos (
			ronda,
			pista_ID_Pista
			) 
				VALUES (					
					'Grupos',					
					NULL
					)";
			 
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}

	function addResultado(){
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE partidos SET
			`JuegosSet1_Local` = '$this->JuegosSet1_Local',
			`JuegosSet1_Visitante` = '$this->JuegosSet1_Visitante',
			`JuegosSet2_Local` = '$this->JuegosSet2_Local',
			`JuegosSet2_Visitante` = '$this->JuegosSet2_Visitante',
			`JuegosSet3_Local` = '$this->JuegosSet3_Local',
			`JuegosSet3_Visitante` = '$this->JuegosSet3_Visitante'
			
			WHERE (`ID_Partido` = '$this->ID_Partido')";
			 
			 
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}
	
	function addFechaHora(){
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE partidos SET
			`fecha` = '$this->fecha',
			`hora` = '$this->hora'
			
			WHERE (`ID_Partido` = '$this->ID_Partido')";
			 
			 
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}
	
	function pistasLibres(){

	 $sql = "SELECT `ID_Pista`,`Nombre_Pista`
			FROM pista
			WHERE `ID_Pista` NOT IN 
							(SELECT `ID_Pista` FROM reservas r,pista p 
							WHERE `fecha_reserva` = '$this->fecha' AND `hora_inicio` = '$this->hora' AND `pista_ID_Pista` = `ID_Pista`)";

	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay pistas este dia';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}	
	
	
	
	function addPista($idpista){//Inserta una pista al azar
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE partidos SET
			`pista_ID_Pista` = '".$idpista."'		
			WHERE (`ID_Partido` = '$this->ID_Partido')";
			 
			 
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'No hay pistas libres ese dia,a esa hora.Por favor,escoge otra fecha';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}
	
	function getClasificacion($idtorneo,$pareja){
			//Sentencia sql que insetara la categoria
		$sql = "SELECT COUNT(*) FROM `partidos` p WHERE Sets_Local = 2 AND ID_Partido IN 
												(SELECT ID_Partido FROM parejas_has_partidos ph WHERE `ID_Torneo` = '".$idtorneo."'
												AND p.ID_Partido = ph.ID_Partido AND(ID_ParejaLocal = '".$pareja."'))";
		
			 
			$resultado = $this->mysqli->query($sql);
			
		$sql1 = "SELECT COUNT(*) FROM `partidos` p WHERE Sets_Visitante = 2 AND ID_Partido IN 
												(SELECT ID_Partido FROM parejas_has_partidos ph WHERE `ID_Torneo` = '".$idtorneo."'
												AND p.ID_Partido = ph.ID_Partido AND(ID_ParejaVisitante = '".$pareja."'))";
			 
			
			$resultado1 = $this->mysqli->query($sql1);
			
			
			$ganados = $resultado -> fetch_array()[0] + $resultado1 -> fetch_array()[0];
			
			
			$sql2 = "SELECT COUNT(*) FROM `parejas_has_partidos` ph,`partidos` p
					 WHERE (ID_ParejaLocal = '".$pareja."' OR ID_ParejaVisitante= '".$pareja."') and ID_Torneo = '".$idtorneo."'
					 AND p.`ID_Partido` = ph.`ID_Partido` AND `Sets_Local` IS NOT NULL";
			
			$jugados =  $this->mysqli->query($sql2) -> fetch_array()[0];
				
			
			$perdidos = $jugados - $ganados;
		
			$puntos = ($ganados*3) + $perdidos;
			
			$sql3 = "UPDATE `parejas_has_torneos` SET `PJ`='".$jugados."',`PG`='".$ganados."',`PP`='".$perdidos."',`Ptos`='".$puntos."' WHERE parejas_ID_Pareja = '".$pareja."'";
			echo $sql3;
			if (!$this->mysqli->query($sql3)) {
			
				return 'Error al insertar';
			}
		//operacion de insertado correcta
			else{
				return  'Insercion correcta'; 
			}	
	}
	
	function BuscarHorasOcupadas(){

	 $sql = "SELECT `hora`,COUNT(*) AS Num_Reservas
			FROM partidos,pista 
			WHERE `fecha` = '$this->fecha' and pista_ID_Pista = ID_Pista GROUP BY `hora` HAVING COUNT(*) >= (SELECT COUNT(ID_Pista) FROM pista)
			";
	echo $sql;

	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay horas disponibles';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}
	
	function seJuega3Set()
{
	//Sentencia sql que buscara todos los datos de una categoria
    $sql = "SELECT * FROM `partidos` WHERE `ID_Partido` = '$this->ID_Partido' and `JuegosSet3_Local` = 0 AND `JuegosSet3_Visitante` = 0";
    
    $result = $this->mysqli->query($sql);
    
	//Si devuelve 1a fila (consulta realizada correctamente)
    if ($result->num_rows == 1)
    {	
		return true;
    }//Si no encuentra ninguna pista
    else 
		return false;
}
	
	function comprobar2Set(){
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE `partidos`  
				SET 
				`Sets_Local`= (CASE WHEN `JuegosSet2_Local` > `JuegosSet2_Visitante` THEN 2 ELSE 0 end),
				`Sets_Visitante`= (CASE WHEN `JuegosSet2_Local` > `JuegosSet2_Visitante` THEN 0 ELSE 2 end)
				
				WHERE (`ID_Partido` = '$this->ID_Partido')";
			 
			 
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}
	
	function comprobar3Set(){
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE `partidos`  
				SET 
				`JuegosSet3_Local`= (CASE WHEN `JuegosSet3_Local` = `JuegosSet3_Visitante` THEN NULL ELSE '$this->JuegosSet3_Local' end),
				`JuegosSet3_Visitante`= (CASE WHEN `JuegosSet3_Local` = `JuegosSet3_Visitante` THEN NULL ELSE '$this->JuegosSet3_Visitante' end),
				`Sets_Local`= (CASE WHEN `JuegosSet3_Local` > `JuegosSet3_Visitante` THEN 2 ELSE 1 end),
				`Sets_Visitante`= (CASE WHEN `JuegosSet3_Local` > `JuegosSet3_Visitante` THEN 1 ELSE 2 end)
				
				WHERE (`ID_Partido` = '$this->ID_Partido')";
			 
			 
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}
	
	function DevolverID(){
	$sql = "SELECT MAX(ID_Partido) FROM partidos";

	$result = $this->mysqli->query($sql);//Guarda el resultado
   
	if ($result->num_rows == 1){
		return $result -> fetch_array()[0];
	}else{
		return false;
	}
}

function DevolverParejasPartido(){
	
	//Sentencia sql para insertar
	$sql = "SELECT  part.ID_Partido as ID_Partido,par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2,
			par1.ID_Pareja as ID_ParejaVisitante,par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2,part.Sets_Local,part.Sets_Visitante
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph

			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido
			AND (part.`ID_Partido` = '$this->ID_Partido')
			"; 

	if (!$resultado = $this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; ; //Devuelve mensaje de exito	
	}
}
//Funcion que obtiene todos los datos de una pista especifica	
	function rellenadatos() 
{	
    $sql = "SELECT * FROM partidos WHERE (`ID_Partido` = '$this->ID_Partido')";
	echo $sql;
   //Si no existe
    if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; 
	}
	//Devolucion de la consulta
    else{ 
		$result = $resultado;
		return $result;
	}
}

function puedeReservarPartido()//Busca si es uno de los 4 usuarios que juegan un partido.True si lo es y puede acordar una fecha y hora para el partido
{
	
    $sql = "SELECT part.ID_Partido as ID_Partido,par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2,
			par1.ID_Pareja as ID_ParejaVisitante,par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2,part.Sets_Local,part.Sets_Visitante
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph
			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido AND
			(part.`ID_Partido` = '$this->ID_Partido' AND (par.usuarios_login = '".$_SESSION['login']."' OR par.usuarios_login1 = '".$_SESSION['login']."'
			OR par1.usuarios_login = '".$_SESSION['login']."' OR par1.usuarios_login1 = '".$_SESSION['login']."'))
";
    
    $result = $this->mysqli->query($sql);
    
	//Si devuelve 1a fila (consulta realizada correctamente)
    if ($result->num_rows == 1)
    {	
		return true;
    }//Si no encuentra ninguna pista
    else 
		return false;
}

function insertarGrupo($ID_Pareja,$grupo)
{
	
		$sql = "INSERT INTO parejas_has_grupos VALUES
					('".$ID_Pareja."', '".$grupo."')
				";

        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación';//Devuelve mensaje de error
		}
		else{ 
			return 'Modificado correctamente'; //Devuelve mensaje de exito
		}
    
   
}
 
}//fin de clase
?> 