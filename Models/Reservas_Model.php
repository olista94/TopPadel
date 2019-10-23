<!---MODELO DE LAS TAREAS
 CREADO POR los Cangrejas EL 21/12/2018-->
<?php
//Login del usuario conectado
$login = $_SESSION['login'];
//Declaracion de la clase
class Reservas_Model {
	
	var $usuarios_login;
	var $pista_ID_Pista;
	var $fecha_reserva;
	var $hora_inicio;
	
//Constructor de la clase
function __construct($usuarios_login,$pista_ID_Pista,$fecha_reserva,$hora_inicio){
	$this->usuarios_login = $usuarios_login;
	$this->pista_ID_Pista = $pista_ID_Pista;
	$this->fecha_reserva = $fecha_reserva;
	$this->hora_inicio = $hora_inicio;

		//Incluimos el archivo de acceso a la bd
		include_once 'Access_DB.php';
		//Funcion de conexion a la bd
		$this->mysqli = ConnectDB();
}

//Funcion para añadir una reserva
function add(){

	//Sentencia sql para insertar
	$sql = "INSERT INTO reservas
			VALUES (
				'$this->usuarios_login',
				'$this->pista_ID_Pista',
				'$this->fecha_reserva',
				'$this->hora_inicio'

				)
			";

	if (!$this->mysqli->query($sql)) { 
		return 'Error al insertar';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
	}
} 

function addReservaPartido($idpista,$fecha,$hora){//Hace una reserva de un campeonato

	//Sentencia sql para insertar
	$sql = "INSERT INTO reservas
			VALUES (
				'".$_SESSION['login']."',
				'".$idpista."',
				'".$fecha."',
				'".$hora."'

				)
			";

	if (!$this->mysqli->query($sql)) { 
		return 'No hay pistas disponibles ese dia a esa hora';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
	}
} 

function pistasLibres(){

	 $sql = "SELECT `ID_Pista`,`Nombre_Pista`
			FROM pista
			WHERE `ID_Pista` NOT IN 
							(SELECT `ID_Pista` FROM reservas r,pista p 
							WHERE `fecha_reserva` = '$this->fecha_reserva' AND `hora_inicio` = '$this->hora_inicio' AND `pista_ID_Pista` = `ID_Pista`)";

	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay pistas este dia';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}	

function BuscarHorasOcupadas(){

	 $sql = "SELECT `hora_inicio`,COUNT(*) AS Num_Reservas
			FROM reservas,pista 
			WHERE `fecha_reserva` = '$this->fecha_reserva' and pista_ID_Pista = ID_Pista GROUP BY `hora_inicio` HAVING COUNT(*) >= (SELECT COUNT(ID_Pista) FROM pista)
			";
	

	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay horas disponibles';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}

//Funcion para buscar las tareas si es un usuario normal (no ADMIN)
function search1(){ 

	$sql = "
			   SELECT fecha_reserva,hora_inicio,u.login,p.nombre_pista
			   FROM reservas,pista p,usuarios u
			   WHERE `usuarios_login`= u.login && `pista_ID_Pista`=p.ID_Pista &&
			   
			   (`fecha_reserva` LIKE '%$this->fecha_reserva%') &&
			   
			   (`hora_inicio` LIKE '%$this->hora_inicio%') &&
			  
			   (`usuarios_login` = '".$_SESSION['login']."') &&
			   
			   (p.ID_Pista LIKE '%$this->pista_ID_Pista%')
	
	
	";		   

	if (!($resultado = $this->mysqli->query($sql))){
	return 'Error en la búsqueda';//Devuelve mensaje de error

	}
	else{ 
	return $resultado;//Se devuelve el resultado de la consulta
	}
}

//Funcion para buscar todas las tareas si es ADMIN
function ReservasShowAll(){ 
	
	$fecha = date('Y-m-d', time());
	
	$sql = "
			  SELECT fecha_reserva,hora_inicio,login,nombre_pista,pista_ID_Pista
			   FROM reservas,pista,usuarios 
			   WHERE `usuarios_login`= `login` && `pista_ID_Pista`=`ID_Pista` AND `fecha_reserva` >=  '$fecha'
			   Order by 1
	

	";		   
		
	if (!($resultado = $this->mysqli->query($sql))){
	return 'Error en la búsqueda';//Devuelve mensaje de error
	
	}
	else{ 
	return $resultado;//Se devuelve el resultado de la consulta
	}
}

function ReservasShowAllNormal(){ 

	$fecha = date('Y-m-d', time());
	
	$sql = "
			  SELECT fecha_reserva,hora_inicio,login,nombre_pista,pista_ID_Pista
			   FROM reservas,pista,usuarios 
			   WHERE `usuarios_login`= `login` && `pista_ID_Pista`=`ID_Pista` && `usuarios_login` = '".$_SESSION['login']."' AND `fecha_reserva` >=  '$fecha'
				Order by 1
	
	
	";		   
	
	if (!($resultado = $this->mysqli->query($sql))){
	return 'Error en la búsqueda';//Devuelve mensaje de error
	
	}
	else{ 
	return $resultado;//Se devuelve el resultado de la consulta
	}
}

function SearchAdmin(){ 

	$sql = "
			  SELECT fecha_reserva,hora_inicio,login,nombre_pista,pista_ID_Pista
			   FROM reservas,pista,usuarios 
			   WHERE (`usuarios_login`= `login` && `pista_ID_Pista`=`ID_Pista`) 
			   && (
					(`usuarios_login` LIKE '%$this->usuarios_login%') &&
	 				(`pista_ID_Pista` LIKE '%$this->pista_ID_Pista%') &&
					(`fecha_reserva` LIKE '%$this->fecha_reserva%') &&
					(`hora_inicio` LIKE '%$this->hora_inicio%')
			)";
  
	if (!($resultado = $this->mysqli->query($sql))){
	return 'Error en la búsqueda';//Devuelve mensaje de error
	
	}
	else{ 
	return $resultado;//Se devuelve el resultado de la consulta
	}
}

//Funcion para borrar una tarea
function delete()
{	
    $sql = "SELECT * FROM reservas WHERE (`usuarios_login` = '$this->usuarios_login'
										AND `pista_ID_Pista` = '$this->pista_ID_Pista'
										AND `fecha_reserva` = '$this->fecha_reserva'
										AND `hora_inicio` = '$this->hora_inicio'
										)";
    
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result->num_rows == 1)
    {
    	//Sentencia sql para borrar
        $sql = "DELETE FROM reservas WHERE (`usuarios_login` = '$this->usuarios_login'
										AND `pista_ID_Pista` = '$this->pista_ID_Pista'
										AND `fecha_reserva` = '$this->fecha_reserva'
										AND `hora_inicio` = '$this->hora_inicio'
										)";
        
        $this->mysqli->query($sql);//Guarda el resultado
        
    	return 'Borrado correctamente';//Devuelve mensaje de exito
    } 
    else
        return 'No existe';//Devuelve mensaje de error
}

function borrarAntiguas()
{	
   
		$fecha = date('Y-m-d', time());
    	//Sentencia sql para borrar
        $sql = "DELETE FROM reservas WHERE (`fecha_reserva` < '$fecha'
										)";
        
        $this->mysqli->query($sql);
        
    	return 'Borrado correctamente';
    
}

function contarReservasUsuario(){

	 $sql = "SELECT `usuarios_login`,COUNT(*) as Num_Reservas FROM `reservas` WHERE `usuarios_login` = '".$_SESSION['login']."' GROUP by `usuarios_login`
			";
	

	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay horas disponibles';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}

	function puedeBorrarReserva()
{
	$fecha = date('Y-m-d', time());
	
    $sql = "SELECT * FROM `reservas`  WHERE (`usuarios_login` = '$this->usuarios_login'
										AND `pista_ID_Pista` = '$this->pista_ID_Pista'
										AND `fecha_reserva` = '$this->fecha_reserva'
										AND `hora_inicio` = '$this->hora_inicio'
										)";
    
    $result = $this->mysqli->query($sql);
    
	
    if ($fecha == $this->fecha_reserva)
    {	
		return false;
    }
    else 
		return true;
}

//Funcion que devuelve los datos de una tarea
function rellenadatos() {	
	$sql = "SELECT * FROM reservas WHERE (`usuarios_login` = '$this->usuarios_login'
										AND `pista_ID_Pista` = '$this->pista_ID_Pista'
										AND `fecha_reserva` = '$this->fecha_reserva'
										AND `hora_inicio` = '$this->hora_inicio'
										)";
									
   
    if (!($resultado = $this->mysqli->query($sql))){
		
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
	
		$result = $resultado;//Se guarda el resultado de la consulta sql
		return $result;//Se devuelve el resultado de la consulta
		
	}
}



}//fin de clase

?> 