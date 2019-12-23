<?php
//Declaracion de la clase
class Partidos_Model {
	var $ID_Partido;
	var $fecha;
	var $hora;
	var $ronda;
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
function __construct($ID_Partido,$fecha,$hora,$ronda,
					$pista_ID_Pista,$Sets_Local,$Sets_Visitante,$JuegosSet1_Local,
					$JuegosSet1_Visitante,$JuegosSet2_Local,$JuegosSet2_Visitante,
					$JuegosSet3_Local,$JuegosSet3_Visitante){
						
	$this->ID_Partido = $ID_Partido;
	$this->fecha = $fecha;
	$this->hora = $hora;
	$this->ronda = $ronda;
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
	
	function addCuartos(){
			//Sentencia sql que insetara la categoria
		$sql = "INSERT INTO partidos (
			ronda,
			pista_ID_Pista
			) 
				VALUES (					
					'Cuartos',					
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
	
	function addSemis(){
			//Sentencia sql que insetara la categoria
		$sql = "INSERT INTO partidos (
			ronda,
			pista_ID_Pista
			) 
				VALUES (					
					'Semis',					
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
	
	function addFinal(){
			//Sentencia sql que insetara la categoria
		$sql = "INSERT INTO partidos (
			ronda,
			pista_ID_Pista
			) 
				VALUES (					
					'Final',					
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
	
	function addSuperfinal(){
			//Sentencia sql que insetara la categoria
		$sql = "INSERT INTO partidos (
			ronda,
			pista_ID_Pista
			) 
				VALUES (					
					'Superfinal',					
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
			(SELECT pista_ID_Pista from reservas where fecha_reserva = '$this->fecha' AND hora_inicio = '$this->hora')
			AND ID_Pista not in 
			(SELECT pista_ID_Pista from promociones where fecha = '$this->fecha' AND hora_inicio = '$this->hora' AND cerrada = 'SI')
			AND ID_Pista NOT IN 
			(SELECT p.`ID_Pista` FROM clases_particulares cp,pista p
			WHERE `fecha_clase` = '$this->fecha' AND `hora_clase` = '$this->hora' AND cp.`ID_Pista` = p.`ID_Pista`)
			AND ID_Pista NOT IN
			(SELECT p.`ID_Pista` FROM clases_grupales cg,pista p
			WHERE `fecha_clase` = '$this->fecha' AND `hora_clase` = '$this->hora' AND cg.`ID_Pista` = p.`ID_Pista`)
			";
			echo $sql;				
	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay pistas este dia';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}	
	
	
	
	function addPista($idpista){//Inserta una pista al azar
			//Sentencia sql que insetara la psita
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
			$sql = "SELECT COUNT(*), part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Grupos' and `Sets_Local`= 2
					order by 1";
		
			 
			$resultado = $this->mysqli->query($sql);
			
			$sqlSFL = "SELECT COALESCE (SUM(Sets_Local),0) as SetsFavorLocal, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Grupos' 
					order by 1";
		
			
			$SFL = $this->mysqli->query($sqlSFL);
			
			$sqlSCL = "SELECT COALESCE (SUM(Sets_Visitante),0) as SetsFavorVisitante, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Grupos'
					order by 1";
		
			
			$SCL = $this->mysqli->query($sqlSCL);
			
			$sqlJFL = "SELECT COALESCE (SUM(JuegosSet1_Local+JuegosSet2_Local+JuegosSet3_Local),0) as JuegosFavorLocal, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Grupos'
					order by 1";
		
			
			$JFL = $this->mysqli->query($sqlJFL);
			
			$sqlJCL = "SELECT COALESCE (SUM(`JuegosSet1_Visitante`+`JuegosSet2_Visitante`+`JuegosSet3_Visitante`),0) as JuegosContraLocal, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Grupos'
					order by 1";
		
	
			$JCL = $this->mysqli->query($sqlJCL);
			
			$sql1 = "SELECT COUNT(*), part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Grupos' and `Sets_Visitante`= 2
					order by 1";
			 
			
			$resultado1 = $this->mysqli->query($sql1);
			
			$sqlSFV = "SELECT COALESCE (SUM(Sets_Visitante),0) as SetsFavorVisitante, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Grupos'
					order by 1";
		
			
			$SFV = $this->mysqli->query($sqlSFV);
			
			$sqlSCV = "SELECT COALESCE (SUM(Sets_Local),0) as SetsContraVisitante, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Grupos'
					order by 1";
		
			
			$SCV = $this->mysqli->query($sqlSCV);
			
			$sqlJFV = "SELECT COALESCE (SUM(`JuegosSet1_Visitante`+`JuegosSet2_Visitante`+`JuegosSet3_Visitante`),0) as JuegosFavorVisitante, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Grupos'
					order by 1";
		
			
			$JFV = $this->mysqli->query($sqlJFV);
			
			$sqlJCV = "SELECT COALESCE (SUM(JuegosSet1_Local+JuegosSet2_Local+JuegosSet3_Local),0) as JuegosContraVistante, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Grupos'
					order by 1";
		
			
			$JCV = $this->mysqli->query($sqlJCV);
			
			$ganados = $resultado -> fetch_array()[0] + $resultado1 -> fetch_array()[0];
			$setsFavor = $SFL -> fetch_array()[0] + $SFV -> fetch_array()[0];
			$setsContra = $SCL -> fetch_array()[0] + $SCV -> fetch_array()[0];
			$juegosFavor = $JFL -> fetch_array()[0] + $JFV -> fetch_array()[0];
			$juegosContra = $JCL -> fetch_array()[0] + $JCV -> fetch_array()[0];
			
			$sql2 = "SELECT COUNT(*) FROM `parejas_has_partidos` ph,`partidos` p
					 WHERE (ID_ParejaLocal = '".$pareja."' OR ID_ParejaVisitante= '".$pareja."') and ID_Torneo = '".$idtorneo."' AND ronda = 'Grupos'
					 AND p.`ID_Partido` = ph.`ID_Partido` AND `Sets_Local` IS NOT NULL";
			
			$jugados =  $this->mysqli->query($sql2) -> fetch_array()[0];
				
			
			$perdidos = $jugados - $ganados;
		
			$puntos = ($ganados*3) + $perdidos;
			
			$sql3 = "UPDATE `parejas_has_torneos` SET `PJ`='".$jugados."',`PG`='".$ganados."',`PP`='".$perdidos."',`Ptos`='".$puntos."', `SF` = '".$setsFavor."',`SC` = '".$setsContra."' ,
			`JF` = '".$juegosFavor."' ,`JC` = '".$juegosContra."' 
			WHERE parejas_ID_Pareja = '".$pareja."'";
			
			if (!$this->mysqli->query($sql3)) {
			
				return 'Error al insertar';
			}
		//operacion de insertado correcta
			else{
				return  'Insercion correcta'; 
			}			
			
	}
	
	 function actualizarRanking($jugador){
			//Sentencia sql que insetara la categoria
			$sql = "SELECT COUNT(*) FROM `partidos` p WHERE Sets_Local = 2 AND ID_Partido IN
					(SELECT ID_Partido
					FROM parejas_has_partidos ph,parejas par
					WHERE p.ID_Partido = ph.ID_Partido and (par.ID_Pareja = ph.ID_ParejaLocal) AND (usuarios_login = '".$jugador."' or usuarios_login1 = '".$jugador."'))";
		
			
			$resultado = $this->mysqli->query($sql);
			
			
			
			$sql1 = "SELECT COUNT(*) FROM `partidos` p WHERE Sets_Visitante = 2 AND ID_Partido IN
					(SELECT ID_Partido
					FROM parejas_has_partidos ph,parejas par
					WHERE p.ID_Partido = ph.ID_Partido and (par.ID_Pareja = ph.ID_ParejaVisitante) AND (usuarios_login = '".$jugador."' or usuarios_login1 = '".$jugador."'))";
			 
			
			$resultado1 = $this->mysqli->query($sql1);
			
			
			$ganados = $resultado -> fetch_array()[0] + $resultado1 -> fetch_array()[0];

			
			$sql2 = "SELECT COUNT(*) FROM `parejas_has_partidos` ph,`partidos` p, `parejas` par
					WHERE  (p.`ID_Partido` = ph.`ID_Partido`) and (par.ID_Pareja = ph.ID_ParejaLocal OR par.ID_Pareja = ph.ID_ParejaVisitante)
					AND (usuarios_login = '".$jugador."' OR usuarios_login1 = '".$jugador."') AND `Sets_Local` IS NOT NULL";
			
			
			$jugados =  $this->mysqli->query($sql2) -> fetch_array()[0];
				
			
			$perdidos = $jugados - $ganados;
		
			$puntosGana = ($ganados*3);
			$puntosPierde = $perdidos;
			
			$puntosTotales = $puntosGana - $puntosPierde;
			
			$sql3 = "UPDATE `usuarios` SET `ranking` = '".$puntosTotales."'
			WHERE login = '".$jugador."'";
			
			if (!$this->mysqli->query($sql3)) {
			
				return 'Error al insertar';
			}
		//operacion de insertado correcta
			else{
				return  'Insercion correcta'; 
			}	
	}  


	
	function estadisticas($jugador){
			//Sentencia sql que insetara la categoria
			$sql = "SELECT COUNT(`torneos_ID_Torneo`) AS Num_Torneos,`nombre`,`edicion`,`parejas_ID_Pareja`,`usuarios_login`,`usuarios_login1`,SUM(`PJ`) AS PJ,SUM(`PG`) AS PG,SUM(`PP`) AS PP,`Ptos`,`SF`,`SC`,`JF`,`JC`
					FROM `parejas_has_torneos` p,`parejas` par,`torneo` t
					WHERE (p.`parejas_ID_Pareja` = par.`ID_Pareja`) AND (p.`torneos_ID_Torneo` = t.`ID_Torneo`)
					AND (usuarios_login = '".$jugador."' OR usuarios_login1 = '".$jugador."')
					ORDER BY `Ptos` DESC,`SF` DESC,`SC` ASC,`JF` DESC,`JC` ASC";

			echo $sql;
			$resultado = $this->mysqli->query($sql);	
			
			if (!$this->mysqli->query($sql)) {
			
				return 'Error al insertar';
			}
		//operacion de insertado correcta
			else{
				return  $resultado; 
			}	
	}
	
	function BuscarHorasOcupadas(){
	 $sql = "SELECT `hora`,COUNT(*) AS Num_Reservas
			FROM partidos,pista 
			WHERE `fecha` = '$this->fecha' and pista_ID_Pista = ID_Pista GROUP BY `hora` HAVING COUNT(*) >= (SELECT COUNT(ID_Pista) FROM pista)
			";
	
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
    $sql = "SELECT p.*,pis.Nombre_Pista FROM partidos p,pista pis WHERE (`ID_Partido` = '$this->ID_Partido') AND `pista_ID_Pista` = ID_Pista";
	
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

function insertarGrupo($ID_Pareja,$grupo,$idtorneo)
{
	
		$sql = "INSERT INTO parejas_has_grupos VALUES
					('".$ID_Pareja."', '".$grupo."','".$idtorneo."')
				";
				
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación';//Devuelve mensaje de error
		}
		else{ 
			return 'Modificado correctamente'; //Devuelve mensaje de exito
		}
    
   
}

function borrarParejaSobrante($ID_Pareja)
{
	
		$sql = "DELETE FROM parejas WHERE `ID_Pareja` = '".$ID_Pareja."'
					
				";
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación';//Devuelve mensaje de error
		}
		else{ 
			return 'Modificado correctamente'; //Devuelve mensaje de exito
		}
    
   
}
 
 function parejasCadaGrupo($idtorneo,$grupo)
{
	
		$sql = "SELECT `ID_Pareja` FROM parejas_has_grupos WHERE `ID_Torneo` = '".$idtorneo."' and `grupo` = '".$grupo."'
					
				";
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación';//Devuelve mensaje de error
		}
		else{ 
			$result = $resultado;//Se guarda el resultado de la consulta sql
		
			return $result;//Se devuelve el resultado de la consulta
		}
    
   
}

function ShowCurrentPartidos(){
	
	
	$sql = "SELECT part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.pista_ID_pista as ID_Pista,pis.Nombre_Pista,part.ronda as ronda,
			par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2,
			par1.ID_Pareja as ID_ParejaVisitante,par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2,
			part.Sets_Local,part.Sets_Visitante,part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante,
			part.JuegosSet2_Local as JuegosSet2_Local,part.JuegosSet2_Visitante as JuegosSet2_Visitante,
			part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,pista pis 
			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido AND part.pista_ID_Pista = pis.ID_Pista 
			AND (part.`ID_Partido` = '$this->ID_Partido' )
			"; 

	if (!$resultado = $this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return $resultado;//Devuelve mensaje de exito	
	}
}

function ShowAllCuartos($idtorneo){
	
	
	$sql = "SELECT part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
			par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
			par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
			part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
			part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
			phg.ID_Pareja = par.ID_Pareja and ronda = 'Cuartos' and phg.`ID_Torneo` = '".$idtorneo."'
			order by 1
			"; 

	if (!$resultado = $this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return $resultado;  //Devuelve mensaje de exito	
	}
}

function ShowAllSemis($idtorneo){
	
	
	$sql = "SELECT part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
			par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
			par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
			part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
			part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
			phg.ID_Pareja = par.ID_Pareja and ronda = 'Semis' and phg.`ID_Torneo` = '".$idtorneo."'
			order by 1
			"; 

	if (!$resultado = $this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return $resultado;  //Devuelve mensaje de exito	
	}
}

function ShowAllFinal($idtorneo){
	
	
	$sql = "SELECT part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
			par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
			par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
			part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
			part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
			phg.ID_Pareja = par.ID_Pareja and ronda = 'Final' and phg.`ID_Torneo` = '".$idtorneo."'
			order by 1
			"; 

	if (!$resultado = $this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return $resultado;  //Devuelve mensaje de exito	
	}
}

function ShowAllSuperfinal($idtorneo){
	
	
	$sql = "SELECT part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
			par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
			par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
			part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
			part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
			phg.ID_Pareja = par.ID_Pareja and ronda = 'Superfinal' and phg.`ID_Torneo` = '".$idtorneo."'
			order by 1
			"; 

	if (!$resultado = $this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return $resultado;  //Devuelve mensaje de exito	
	}
}

function getRonda(){
	
	
	$sql = "SELECT ronda
			FROM partidos
			WHERE `ID_Partido` = '$this->ID_Partido'
			"; 

	if (!$resultado = $this->mysqli->query($sql)) { 
		return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
	}
	else{ 
		return $resultado ->fetch_array()[0] ; //Devuelve mensaje de exito	
	}
}

function getClasificacionCuartos($idtorneo,$pareja){
			//Sentencia sql que insetara la categoria
			$sql = "SELECT COUNT(*), part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Cuartos' and `Sets_Local`= 2
					order by 1";
		
			
			$resultado = $this->mysqli->query($sql);
			
			
			
			$sql1 = "SELECT COUNT(*), part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Cuartos' and `Sets_Visitante`= 2
					order by 1";
			 
			
			$resultado1 = $this->mysqli->query($sql1);
			
			
			
			$ganados = $resultado -> fetch_array()[0] + $resultado1 -> fetch_array()[0];
			
			$sql2 = "SELECT COUNT(*) FROM `parejas_has_partidos` ph,`partidos` p
					 WHERE (ID_ParejaLocal = '".$pareja."' OR ID_ParejaVisitante= '".$pareja."') and ID_Torneo = '".$idtorneo."' AND ronda = 'Cuartos'
					 AND p.`ID_Partido` = ph.`ID_Partido` AND `Sets_Local` IS NOT NULL";
			
			$jugados =  $this->mysqli->query($sql2) -> fetch_array()[0];
				
			
			$perdidos = $jugados - $ganados;
		
			$puntos = ($ganados*3) + $perdidos;
			
			$sql3 = "UPDATE `parejas_has_torneos` SET `PtosCuartos`='".$puntos."'
			WHERE parejas_ID_Pareja = '".$pareja."'";
			
			if (!$this->mysqli->query($sql3)) {
			
				return 'Error al insertar';
			}
		//operacion de insertado correcta
			else{
				return  'Insercion correcta'; 
			}			
			
	}
	
	function getClasificacionSemis($idtorneo,$pareja){
			//Sentencia sql que insetara la categoria
			$sql = "SELECT COUNT(*), part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Semis' and `Sets_Local`= 2
					order by 1";
		
			
			$resultado = $this->mysqli->query($sql);
			
			
			
			$sql1 = "SELECT COUNT(*), part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Semis' and `Sets_Visitante`= 2
					order by 1";
			 
			
			$resultado1 = $this->mysqli->query($sql1);
			
			
			
			$ganados = $resultado -> fetch_array()[0] + $resultado1 -> fetch_array()[0];
			
			$sql2 = "SELECT COUNT(*) FROM `parejas_has_partidos` ph,`partidos` p
					 WHERE (ID_ParejaLocal = '".$pareja."' OR ID_ParejaVisitante= '".$pareja."') and ID_Torneo = '".$idtorneo."' AND ronda = 'Semis'
					 AND p.`ID_Partido` = ph.`ID_Partido` AND `Sets_Local` IS NOT NULL";
			
			$jugados =  $this->mysqli->query($sql2) -> fetch_array()[0];
				
			
			$perdidos = $jugados - $ganados;
		
			$puntos = ($ganados*3) + $perdidos;
			
			$sql3 = "UPDATE `parejas_has_torneos` SET `PtosSemis`='".$puntos."'
			WHERE parejas_ID_Pareja = '".$pareja."'";
			
			if (!$this->mysqli->query($sql3)) {
			
				return 'Error al insertar';
			}
		//operacion de insertado correcta
			else{
				return  'Insercion correcta'; 
			}			
			
	}
 
 function getClasificacionFinal($idtorneo,$pareja){
			//Sentencia sql que insetara la categoria
			$sql = "SELECT COUNT(*), part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Final' and `Sets_Local`= 2
					order by 1";
		
			
			$resultado = $this->mysqli->query($sql);
			
			
			
			$sql1 = "SELECT COUNT(*), part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Final' and `Sets_Visitante`= 2
					order by 1";
			 
			
			$resultado1 = $this->mysqli->query($sql1);
			
			
			
			$ganados = $resultado -> fetch_array()[0] + $resultado1 -> fetch_array()[0];
			
			$sql2 = "SELECT COUNT(*) FROM `parejas_has_partidos` ph,`partidos` p
					 WHERE (ID_ParejaLocal = '".$pareja."' OR ID_ParejaVisitante= '".$pareja."') and ID_Torneo = '".$idtorneo."' AND ronda = 'Final'
					 AND p.`ID_Partido` = ph.`ID_Partido` AND `Sets_Local` IS NOT NULL";
			
			$jugados =  $this->mysqli->query($sql2) -> fetch_array()[0];
				
			
			$perdidos = $jugados - $ganados;
		
			$puntos = ($ganados*3) + $perdidos;
			
			$sql3 = "UPDATE `parejas_has_torneos` SET `PtosFinal`='".$puntos."'
			WHERE parejas_ID_Pareja = '".$pareja."'";
			
			if (!$this->mysqli->query($sql3)) {
			
				return 'Error al insertar';
			}
		//operacion de insertado correcta
			else{
				return  'Insercion correcta'; 
			}			
			
	}
	
	function clasificadosLocalSuperfinal($idtorneo){
	
	
		$sql = "SELECT DISTINCT par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
			phg.ID_Pareja = par.ID_Pareja and ronda = 'Superfinal' and phg.`ID_Torneo` = '".$idtorneo."'
			order by 1
			"; 

		if (!$resultado = $this->mysqli->query($sql)) { 
			return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
		}
		else{ 
			return $resultado;  //Devuelve mensaje de exito	
		}
	}
	
	function clasificadosVisitanteSuperfinal($idtorneo){
	
	
		$sql = "SELECT DISTINCT par1.ID_Pareja as ID_ParejaVisitante,par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
			phg.ID_Pareja = par.ID_Pareja and ronda = 'Superfinal' and phg.`ID_Torneo` = 1 and par1.ID_Pareja not in (SELECT DISTINCT par.ID_Pareja as ID_ParejaLocal
			FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
			WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
			phg.ID_Pareja = par.ID_Pareja and ronda = 'Superfinal' and phg.`ID_Torneo` = '".$idtorneo."'
			order by 1)
			order by 1
			"; 

		if (!$resultado = $this->mysqli->query($sql)) { 
			return 'Ya te has inscrito en este torneo';//Devuelve mensaje de error
		}
		else{ 
			return $resultado;  //Devuelve mensaje de exito	
		}
	}
	
	
	function getClasificacionSuperfinal($idtorneo,$pareja){
			//Sentencia sql que insetara la categoria
			$sql = "SELECT COUNT(*), part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Superfinal' and `Sets_Local`= 2
					order by 1";
		
			 
			$resultado = $this->mysqli->query($sql);
			
			$sqlSFL = "SELECT COALESCE (SUM(Sets_Local),0) as SetsFavorLocal, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Superfinal' 
					order by 1";
		
			
			$SFL = $this->mysqli->query($sqlSFL);
			
			$sqlSCL = "SELECT COALESCE (SUM(Sets_Visitante),0) as SetsFavorVisitante, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Superfinal'
					order by 1";
		
			
			$SCL = $this->mysqli->query($sqlSCL);
			
			$sqlJFL = "SELECT COALESCE (SUM(JuegosSet1_Local+JuegosSet2_Local+JuegosSet3_Local),0) as JuegosFavorLocal, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Superfinal'
					order by 1";
		
			
			$JFL = $this->mysqli->query($sqlJFL);
			
			$sqlJCL = "SELECT COALESCE (SUM(`JuegosSet1_Visitante`+`JuegosSet2_Visitante`+`JuegosSet3_Visitante`),0) as JuegosContraLocal, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaLocal = '".$pareja."' and ronda = 'Superfinal'
					order by 1";
		
			$JCL = $this->mysqli->query($sqlJCL);
			
			$sql1 = "SELECT COUNT(*), part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Superfinal' and `Sets_Visitante`= 2
					order by 1";
			 
			
			$resultado1 = $this->mysqli->query($sql1);
			
			$sqlSFV = "SELECT COALESCE (SUM(Sets_Visitante),0) as SetsFavorVisitante, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Superfinal'
					order by 1";
		
			
			$SFV = $this->mysqli->query($sqlSFV);
			
			$sqlSCV = "SELECT COALESCE (SUM(Sets_Local),0) as SetsContraVisitante, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Superfinal'
					order by 1";
		
			
			$SCV = $this->mysqli->query($sqlSCV);
			
			$sqlJFV = "SELECT COALESCE (SUM(`JuegosSet1_Visitante`+`JuegosSet2_Visitante`+`JuegosSet3_Visitante`),0) as JuegosFavorVisitante, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Superfinal'
					order by 1";
			
			$JFV = $this->mysqli->query($sqlJFV);
			
			$sqlJCV = "SELECT COALESCE (SUM(JuegosSet1_Local+JuegosSet2_Local+JuegosSet3_Local),0) as JuegosContraVistante, part.ID_Partido as ID_Partido,part.fecha as fecha,part.hora as hora,part.ronda as ronda,phg.grupo as grupo,
					par.ID_Pareja as ID_ParejaLocal,par.usuarios_login as Local1,par.usuarios_login1 as Local2, par1.ID_Pareja as ID_ParejaVisitante,
					par1.usuarios_login as Visitante1,par1.usuarios_login1 as Visitante2, part.Sets_Local,part.Sets_Visitante,
					part.JuegosSet1_Local as JuegosSet1_Local,part.JuegosSet1_Visitante as JuegosSet1_Visitante, part.JuegosSet2_Local as JuegosSet2_Local,
					part.JuegosSet2_Visitante as JuegosSet2_Visitante, part.JuegosSet3_Local as JuegosSet3_Local,part.JuegosSet3_Visitante as JuegosSet3_Visitante
					FROM parejas par,parejas par1,partidos part,parejas_has_partidos ph,parejas_has_grupos phg 
					WHERE par.ID_Pareja = ph.ID_ParejaLocal AND par1.ID_Pareja = ph.ID_ParejaVisitante AND part.ID_Partido = ph.ID_Partido and
					phg.ID_Pareja = par.ID_Pareja and phg.ID_Torneo = '".$idtorneo."' and ID_ParejaVisitante = '".$pareja."' and ronda = 'Superfinal'
					order by 1";
		
			$JCV = $this->mysqli->query($sqlJCV);
			
			$ganados = $resultado -> fetch_array()[0] + $resultado1 -> fetch_array()[0];
			$setsFavor = $SFL -> fetch_array()[0] + $SFV -> fetch_array()[0];
			$setsContra = $SCL -> fetch_array()[0] + $SCV -> fetch_array()[0];
			$juegosFavor = $JFL -> fetch_array()[0] + $JFV -> fetch_array()[0];
			$juegosContra = $JCL -> fetch_array()[0] + $JCV -> fetch_array()[0];
			
			$sql2 = "SELECT COUNT(*) FROM `parejas_has_partidos` ph,`partidos` p
					 WHERE (ID_ParejaLocal = '".$pareja."' OR ID_ParejaVisitante= '".$pareja."') and ID_Torneo = '".$idtorneo."' AND ronda = 'Superfinal'
					 AND p.`ID_Partido` = ph.`ID_Partido` AND `Sets_Local` IS NOT NULL";
			
			$jugados =  $this->mysqli->query($sql2) -> fetch_array()[0];
				
			
			$perdidos = $jugados - $ganados;
		
			$puntos = ($ganados*3) + $perdidos;
			
			$sql3 = "UPDATE `parejas_has_torneos` SET `PJ_SF`='".$jugados."',`PG_SF`='".$ganados."',`PP_SF`='".$perdidos."',`PtosSuperFinal`='".$puntos."', `SF_SF` = '".$setsFavor."',`SC_SF` = '".$setsContra."' ,
			`JF_SF` = '".$juegosFavor."' ,`JC_SF` = '".$juegosContra."' 
			WHERE parejas_ID_Pareja = '".$pareja."'";
			
			if (!$this->mysqli->query($sql3)) {
			
				return 'Error al insertar';
			}
		//operacion de insertado correcta
			else{
				return  'Insercion correcta'; 
			}			
			
	}
 
 
}//fin de clase
?> 