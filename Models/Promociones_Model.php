<!---MODELO DE LAS RESERVAS
 CREADO POR los Cangrejas EL 21/12/2018-->
<?php
//Login del usuario conectado
$login = $_SESSION['login'];
//Declaracion de la clase
class Promociones_Model {
	var $ID_Promo; 
	var $fecha; 
	var $hora_inicio;
	var $usuarios_login_usuario;
	var $pista_ID_Pista;
	var $socio;
	
//Constructor de la clase
function __construct($ID_Promo, $fecha, $hora_inicio, $usuarios_login_usuario, $pista_ID_Pista, $socio){
	$this->ID_Promo = $ID_Promo;
	$this->fecha = $fecha;
	$this->hora_inicio = $hora_inicio;
	$this->usuarios_login_usuario = $usuarios_login_usuario;
	$this->pista_ID_Pista = $pista_ID_Pista;
	$this->socio = $socio;
		//Incluimos el archivo de acceso a la bd
		include_once 'Access_DB.php';
		//Funcion de conexion a la bd
		$this->mysqli = ConnectDB();
}
//Funcion para añadir una promocion
function add(){
	//Sentencia sql para insertar una promocion
	$sql = "INSERT INTO promociones
			VALUES (
				'$this->ID_Promo',
				'$this->fecha',
				'$this->hora_inicio',
				'$this->usuarios_login_usuario',
				NULL,
				'NO'
				)
			";
	if (!$this->mysqli->query($sql)) { 
		return 'Error al insertar';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
	}
} 
 
//Funcion para buscar las promociones si es un usuario normal (no ADMIN)
function search1(){ 
	$sql = "
			   SELECT ID_Promo, promo.fecha,hora_inicio, u.login, p.nombre_pista
			   FROM promociones promo, pista p,usuarios u
			   WHERE `usuarios_login_usuario`= u.login && `pista_ID_Pista`=p.ID_Pista ";		   
	if (!($resultado = $this->mysqli->query($sql))){
	return 'Error en la búsqueda';//Devuelve mensaje de error
	}
	else{ 
	return $resultado;//Se devuelve el resultado de la consulta
	}
}
//Funcion para buscar todas las promociones si es ADMIN
function searchAdmin(){ 
	$sql = "
			  SELECT promo.ID_Promo,fecha,hora_inicio,usuarios_login_usuario,pista_ID_Pista
			   FROM promociones promo
			   WHERE 
			    (
					(`usuarios_login_usuario` LIKE '%$this->usuarios_login_usuario%') &&
					(`fecha` LIKE '%$this->fecha%') &&
					(`hora_inicio` LIKE '%$this->hora_inicio%') &&
					(`ID_Promo` LIKE '%$this->ID_Promo%')
			)";  
	if (!($resultado = $this->mysqli->query($sql))){
	return 'Error en la búsqueda';//Devuelve mensaje de error
	
	}
	else{ 
	return $resultado;//Se devuelve el resultado de la consulta
	}
}
//Funcion para borrar una promociones
function delete()
{	
    $sql = "SELECT * FROM promociones WHERE (`ID_Promo` = '$this->ID_Promo')";
    
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result->num_rows == 1)
    {
    	//Sentencia sql para borrar
		$sql1 = "DELETE FROM `promociones_has_usuarios` WHERE `promociones_ID_Promo` = '$this->ID_Promo'";
        $sql = "DELETE FROM promociones WHERE (`ID_Promo` = '$this->ID_Promo')";
        echo $sql1;
		
        $this->mysqli->query($sql1);
		$this->mysqli->query($sql);//Guarda el resultado
        
    	return 'Borrado correctamente';//Devuelve mensaje de exito
    } 
    else
        return 'No existe';//Devuelve mensaje de error
}
//Funcion que devuelve los datos de una promocion
function rellenadatos() {	
	$sql = "SELECT * FROM promociones WHERE (`ID_Promo` = '$this->ID_Promo')";

    if (!($resultado = $this->mysqli->query($sql))){
		
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
	
		$result = $resultado;//Se guarda el resultado de la consulta sql
		return $result;//Se devuelve el resultado de la consulta
		
	}
}
//Funcion que devuelve todas las promociones
function PromocionesShowAllTodas(){
	$sql = "SELECT ID_Promo,fecha,hora_inicio,usuarios_login_usuario,
			pista_ID_Pista
			FROM promociones promo
			";
	

	if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
		$result = $resultado;//Se guarda el resultado de la consulta sql
		return $result;//Se devuelve el resultado de la consulta
	}
}

function PromocionesShowAllMias(){
	$sql = "SELECT ID_Promo,fecha,hora_inicio,usuarios_login_usuario,
			pista_ID_Pista
			FROM promociones promo
			WHERE `usuarios_login_usuario` = '".$_SESSION['login']."'
			";
	

	if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
		$result = $resultado;//Se guarda el resultado de la consulta sql
		return $result;//Se devuelve el resultado de la consulta
	}
}

function DevolverIDPromo()
{	
    $sql = "SELECT MAX(ID_Promo)
			FROM promociones
			WHERE (`usuarios_login_usuario` = '".$this->usuarios_login_usuario."'
			)";
   
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
	if ($result->num_rows == 1){
		return $result -> fetch_array()[0];
	}else{
		return false;
	}
}

function BuscarHorasOcupadas(){

	 $sql = "SELECT `hora_inicio`,COUNT(*) AS Num_Reservas
			FROM promociones,pista 
			WHERE `fecha` = '$this->fecha' and pista_ID_Pista = ID_Pista GROUP BY `hora_inicio` HAVING COUNT(*) >= (SELECT COUNT(ID_Pista) FROM pista)
			";
	

	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay horas disponibles';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}

function ContarUsuarios()
{	
    $sql = "SELECT COUNT(DISTINCT `usuarios_login`),`promociones_ID_Promo`
			FROM promociones_has_usuarios
			GROUP BY `promociones_ID_Promo`
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
    $sql = "SELECT COUNT(DISTINCT `usuarios_login`),`promociones_ID_Promo`
			FROM promociones_has_usuarios
			WHERE (`promociones_ID_Promo` = '$this->ID_Promo')
			GROUP BY `promociones_ID_Promo`
			";
		
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result)
    {
    	
       return $result;//Se devuelve el resultado de la consulta
    } 
    else
        return 'No existe';//Devuelve mensaje de error
}

function PuedeApuntarse()
{	
    $sql = "SELECT usuarios_login
			FROM promociones_has_usuarios
			WHERE (`promociones_ID_Promo` = '$this->ID_Promo') AND (`usuarios_login` = '".$_SESSION['login']."')
			"; 
    
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
	if ($result->num_rows == 1){
		return false;
	}else{
		return true;
	}
}

function cerrarPromocion(){
			//Sentencia sql que insetara la categoria
		$sql = "UPDATE promociones SET
			`cerrada` = 'SI'
				WHERE (`ID_Promo` = '$this->ID_Promo')";
			 
			 
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}





}//fin de clase
?> 