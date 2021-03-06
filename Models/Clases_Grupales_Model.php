<?php
//Declaracion de la clase
class Clases_Grupales_Model {

	var $ID_Clase;
	var $login_entrenador;
	var $tope;
	var $tipo;
	var $descripcion;
	var $invitado;
	var $fecha_limite;
	var $sesiones;


//Constructor de la clase
function __construct($ID_Clase,$login_entrenador,$tope,$tipo,$descripcion,$invitado,$fecha_limite,$sesiones){
	$this->ID_Clase = $ID_Clase;
	$this->login_entrenador = $login_entrenador;
	$this->tope = $tope;
	$this->tipo = $tipo;
	$this->descripcion = $descripcion;
	$this->invitado = $invitado;
	$this->fecha_limite = $fecha_limite;
	$this->sesiones = $sesiones;

	//Incluimos el archivo de acceso a la bd
	include_once 'Access_DB.php';
	//Funcion de conexion a la bd
	$this->mysqli = ConnectDB();
}

//Funcion que realiza el registro
function addGrupal(){

		//Sentencia sql para insertar	
		$sql = "INSERT INTO clases_grupales
			VALUES (
				'$this->ID_Clase',
				'$this->login_entrenador',
				'$this->tope',
				'ESCUELAS',
				'$this->descripcion',
				'$this->invitado',
				'$this->fecha_limite',
				'$this->sesiones',
				'NO'
				
				)
				";
				

		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';//Devuelve mensaje de error	
		}
		else{
			
			return  'Insercion correcta'; //operacion de insertado correcta
		}		
	}
	
	
	function rellenadatos() 
{	
    $sql = "SELECT * FROM clases_grupales WHERE (`ID_Clase` = '$this->ID_Clase')";

    if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error	
	}
    else{ 
		$result = $resultado;
		return $result;//Se devuelve el resultado de la consulta
	}
}

function puedeApuntarseFecha()
{	
   
		$fecha = date('Y-m-d', time());
    	//Sentencia sql para borrar
        $sql = "SELECT * FROM clases_grupales WHERE (`fecha_limite` < '$fecha' AND ID_Clase = '$this->ID_Clase'
										)";
        
        $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
	if ($result->num_rows == 1){
		return false;
	}else{
		return true;
	}
    
}



//Funcion para buscar un usuario
function searchAdminNormal(){ 
		//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM clases_grupales
    			WHERE
    				( 
					(`login_entrenador` LIKE '%$this->login_entrenador%') &&
					(`fecha_limite` LIKE '%$this->fecha_limite%') &&
					(`tope` LIKE '%$this->tope%') &&
					(`tipo` LIKE 'ESCUELAS')					
    				)";
				

    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}



function searchEntrenador(){ 
		//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM clases_grupales
    			WHERE
    				( 
					(`login_entrenador` LIKE '".$_SESSION['login']."') &&
					(`fecha_limite` LIKE '%$this->fecha_limite%') &&
					(`tope` LIKE '%$this->tope%') &&
					(`tipo` LIKE 'ESCUELAS')
					
    				)";


    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

//Funcion para borrar un usuario
function delete()
{	
    $sql = "SELECT * FROM clases_grupales WHERE (`ID_Clase` = '$this->ID_Clase')";
    
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if ($result->num_rows == 1)
    {
			//Sentencia sql para borrar
			$sql = "DELETE FROM clases_grupales WHERE (`ID_Clase` = '$this->ID_Clase')";
			$sql1 = "DELETE FROM clases_grupales_has_usuarios WHERE (`ID_Clase` = '$this->ID_Clase')";
			$sql2 = "DELETE FROM clases_grupales_has_sesiones WHERE (`ID_Clase` = '$this->ID_Clase')";
			
			$this->mysqli->query($sql);
			$this->mysqli->query($sql1);
			$this->mysqli->query($sql2);
			
			return 'Borrado correctamente';//Exito
		
    } 
    else
        return 'No existe';//Devuelve mensaje de error	
}

function BuscarHorasOcupadas(){

	 $sql = "SELECT `hora_clase`,COUNT(*) AS Num_Reservas
			FROM clases_grupales cp,pista p
			WHERE `fecha_limite` = '$this->fecha_limite' and p.ID_Pista = cp.ID_Pista GROUP BY `hora_clase` HAVING COUNT(*) >= (SELECT COUNT(ID_Pista) FROM pista)
			";


	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay horas disponibles';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}

function pistasLibres(){

	 $sql = "SELECT `ID_Pista`,`Nombre_Pista`
			FROM pista
			WHERE `ID_Pista` NOT IN 
						(SELECT p.`ID_Pista` FROM clases_grupales_has_sesiones cp,pista p 
						WHERE `fecha_limite` = '$this->fecha_limite' AND `hora_clase` = '$this->hora_clase' AND cp.`ID_Pista` = p.`ID_Pista`)
						(SELECT p.`ID_Pista` FROM clases_particulares cp,pista p 
						WHERE `fecha_limite` = '$this->fecha_limite' AND `hora_clase` = '$this->hora_clase' AND cp.`ID_Pista` = p.`ID_Pista`)
						AND ID_Pista NOT IN (SELECT pista_ID_Pista from reservas where fecha_reserva = '$this->fecha_limite' AND hora_inicio = '$this->hora_clase')
						AND ID_Pista NOT IN (SELECT pista_ID_Pista from promociones where fecha = '$this->fecha_limite' AND hora_inicio = '$this->hora_clase' AND cerrada = 'SI')
						LIMIT 1
						";

	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay pistas este dia';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}

function buscarEntrenador(){

	 $sql = "SELECT login FROM usuarios WHERE (`tipo` = 'ENTRENADOR') AND 
	 login not in (SELECT login_entrenador from clases_grupales where `fecha_limite` = '$this->fecha_limite' AND `hora_clase` )";
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}	

function ShowAllEntrenador(){ 
		//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM clases_grupales
    			WHERE
    				( 
    				(`login_entrenador` LIKE '".$_SESSION['login']."') AND `tipo` = 'ESCUELAS'
					
    				)";
				

    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function ShowAllAdminNormal(){ 
		//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM clases_grupales
				WHERE `tipo` = 'ESCUELAS'
    			";
				

    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function apuntarUsuario(){

		//Sentencia sql para insertar	
		$sql = "INSERT INTO clases_grupales_has_usuarios (ID_Clase,login_usuario)
			VALUES (
				'$this->ID_Clase',
				'".$_SESSION['login']."'
				
				)
				";
				
				
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar.Ya existe un usuario con ese login';//Devuelve mensaje de error	
		}
		else{
			
			return  'Insercion correcta'; //operacion de insertado correcta
		}		
}
	
	function PuedeApuntarse(){	
	
    $sql = "SELECT login_usuario
			FROM clases_grupales_has_usuarios
			WHERE (`ID_Clase` = '$this->ID_Clase') AND (`login_usuario` = '".$_SESSION['login']."')
			"; 
    
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
	if ($result->num_rows == 1){
		return false;
	}else{
		return true;
	}
}

function ContarUsuarios()
{	
    $sql = "SELECT COUNT(DISTINCT `login_usuario`),`ID_Clase`
			FROM clases_grupales_has_usuarios
			GROUP BY `ID_Clase`
			";
		
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result)
    {
    	
       return $result;//Se devuelve el resultado de la consulta
    } 
    else
        return 'No existe';//Devuelve mensaje de error
}

function ContarUsuarios1()
{	
    $sql = "SELECT COUNT(DISTINCT `login_usuario`),`ID_Clase`
			FROM clases_grupales_has_usuarios
			WHERE (`ID_Clase` = '$this->ID_Clase')
			GROUP BY `ID_Clase`
			";
		
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result)
    {
    	
       return $result;//Se devuelve el resultado de la consulta
    } 
    else
        return 'No existe';//Devuelve mensaje de error
}

function devolverTope()
{	
    $sql = "SELECT `tope`
			FROM clases_grupales
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

function buscarPistasLibresClases(){
			//Sentencia sql que insetara la categoria
		$sql = "SELECT ID_Pista FROM `pista`
				WHERE ID_Pista not in
				(SELECT pista_ID_Pista from reservas where fecha_reserva = '".$this->fecha_limite."' AND hora_inicio = '".$this->hora_clase."')
				AND ID_Pista not in (SELECT pista_ID_Pista from promociones where fecha = '".$this->fecha_limite."' AND hora_inicio = '".$this->hora_clase."' AND cerrada = 'SI') AND
				ID_Pista not in (SELECT ID_Pista from clases_grupales where fecha_limite = '".$this->fecha_limite."' AND hora_clase = '".$this->hora_clase."')
				LIMIT 1
				
				";
			
			$result = $this->mysqli->query($sql); 
			//Si ya se han insertado la PK o FK
		if (!$result) {
			
			return 'No hay pistas disponibles';
		}
		//operacion de insertado correcta
		else{
			return  $result -> fetch_array()[0]; 
		}		
	}
	
	function buscarEntrenadoresLibresClases($idclase,$fecha,$hora){
			//Sentencia sql que insetara la categoria
		$sql = "SELECT login FROM `usuarios`
				WHERE tipo = 'ENTRENADOR'
				AND login not in
				(SELECT login_entrenador from clases_particulares where fecha_clase = '".$fecha."' AND hora_clase = '".$hora."')
				AND login not in 
				(SELECT login_entrenador from clases_grupales where fecha_limite = '".$fecha."')
				ORDER BY RAND()
				LIMIT 1
				
				";
				
			$result = $this->mysqli->query($sql); 
			//Si ya se han insertado la PK o FK
		if (!$result) {
			
			return 'No hay pistas disponibles';
		}
		//operacion de insertado correcta
		else{
			return  $result -> fetch_array()[0]; 
		}		
	}
	
	function insertarEntrenador($entrenador,$idclase){
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE clases_grupales SET
			`login_entrenador` = '".$entrenador."'
			
			WHERE (`ID_Clase` = '".$idclase."')";
			 
			 
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}
	
	function DevolverMaxIDClase()
{	
    $sql = "SELECT MAX(ID_Clase)
			FROM clases_grupales
			";
   
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
	if ($result->num_rows == 1){
		return $result -> fetch_array()[0];
	}else{
		return false;
	}
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

function mostrarDia1()
{	
    $sql = "SELECT ID_Clase,login_usuario,dia1 FROM `clases_grupales_has_usuarios` WHERE ID_Clase = '$this->ID_Clase'";

	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function devolverTipo()
{	
    $sql = "SELECT tipo FROM `clases_grupales` WHERE ID_Clase = '$this->ID_Clase'";

	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado->fetch_array()[0];//Se devuelve el resultado de la consulta
	}
}

function devolverMetodoPagoCadaUsuario($idclase)
{	
    $sql = "SELECT * FROM `clases_grupales_has_usuarios` WHERE (`ID_Clase` = '".$idclase."')";

	$result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado->fetch_array()[0];//Se devuelve el resultado de la consulta
	}
}

function numSesiones()
{	
    $sql = "SELECT `sesiones`
			FROM clases_grupales
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

function addFechaSesion($idclase,$fecha_limite,$hora_clase){

		//Sentencia sql para insertar	
		$sql = "INSERT INTO clases_grupales_has_sesiones (ID_Clase,fecha_clase,hora_clase)
			VALUES (
				'".$idclase."',
				'".$fecha_limite."',
				'".$hora_clase."'				
				)
				";
				

		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';//Devuelve mensaje de error	
		}
		else{
			
			return  'Insercion correcta'; //operacion de insertado correcta
		}		
	}
	
	function buscarPistaParaSesions($fecha_clase,$hora_clase){

	 $sql = "SELECT `ID_Pista`,`Nombre_Pista`
			FROM pista
			WHERE `ID_Pista` NOT IN 
						(SELECT p.`ID_Pista` FROM clases_grupales_has_sesiones cp,pista p 
						WHERE `fecha_clase` = '".$fecha_clase."' AND `hora_clase` = '".$hora_clase."' AND cp.`ID_Pista` = p.`ID_Pista`)
						AND ID_Pista NOT IN
						(SELECT p.`ID_Pista` FROM clases_particulares cp,pista p 
						WHERE `fecha_clase` = '".$fecha_clase."' AND `hora_clase` = '".$hora_clase."' AND cp.`ID_Pista` = p.`ID_Pista`)
						AND ID_Pista NOT IN
						(SELECT pista_ID_Pista from reservas where fecha_reserva = '".$fecha_clase."' AND hora_inicio = '".$hora_clase."')
						AND ID_Pista NOT IN 
						(SELECT pista_ID_Pista from promociones where fecha = '".$fecha_clase."' AND hora_inicio = '".$hora_clase."' AND cerrada = 'SI')
						LIMIT 1
						";
						

	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay pistas este dia';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}

function buscarEntrenadoresParaSesion($fecha_clase,$hora_clase){
			//Sentencia sql que insetara la categoria
		$sql = "SELECT login FROM `usuarios`
				WHERE tipo = 'ENTRENADOR' AND login not in
				(SELECT login_entrenador from clases_particulares where fecha_clase = '".$fecha_clase."' AND hora_clase = '".$hora_clase."')
				AND login not in (SELECT login_entrenador from clases_grupales_has_sesiones where fecha_limite = '".$fecha_clase."' AND hora_clase = '".$hora_clase."')
				";
			$result = $this->mysqli->query($sql); 
			//Si ya se han insertado la PK o FK
		if (!$result) {
			
			return 'No hay pistas disponibles';
		}
		//operacion de insertado correcta
		else{
			return  $result; 
		}		
	}

function insertarPistaParaSesion($pista,$semana,$idclase){
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE clases_grupales_has_sesiones SET
			`ID_Pista` = '".$pista."'
			
			WHERE (`ID_Clase` = '".$idclase."' AND `fecha_clase` = '".$semana."')";
			
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}
	
	function showSesion(){
			//Sentencia sql que insetara la categoria
		$sql = "SELECT c.*,p.Nombre_Pista
			FROM clases_grupales_has_sesiones c, pista p
			WHERE (`ID_Clase` = '$this->ID_Clase') and p.ID_Pista = c.ID_Pista
			";
			
			//Si ya se han insertado la PK o FK
		if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}		
	}
	
	function solicitaBorrado(){
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE clases_grupales SET
			`borrado` = 'SI'
			
			WHERE (`ID_Clase` = '$this->ID_Clase')
			";
			
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';
		}
		//operacion de insertado correcta
		else{
			return  'Solicitud enviada'; 
		}		
	}


}//fin de clase

?> 