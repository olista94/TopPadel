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
echo $sql;
	if (!$this->mysqli->query($sql)) { 
		return 'Error al insertar';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
	}
} 

function pistaLibreDia(){

	 $sql = "SELECT *
			from pista
			where ID_Pista NOT IN (SELECT `pista_ID_Pista`
								FROM reservas
								where `fecha_reserva` = '$this->fecha_reserva'
								GROUP by `pista_ID_Pista`
								HAVING COUNT(*) = 10)";
echo $sql;
	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay pistas este dia';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}	

function horasLibreDia(){

	 $sql = "SELECT *
			from pista
			where ID_Pista NOT IN (SELECT `pista_ID_Pista`
								FROM reservas
								where `hora_inicio` = '$this->hora_inicio'
								GROUP by `pista_ID_Pista`
								HAVING COUNT(*) = 10)";
echo $sql;
	$resultado = $this->mysqli->query($sql);
	
	if (!$resultado) { 
		return 'No hay pistas este dia';//Devuelve mensaje de error
	}
	else{ 
		return $resultado; //Devuelve mensaje de exito	
	}
}	

function BuscarHorasLibres(){

	 $sql = "SELECT `hora_inicio`
			FROM reservas
			where `hora_inicio` NOT IN (SELECT `hora_inicio`
								FROM reservas
								where `fecha_reserva` = '$this->fecha_reserva')
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

	$sql = "
			  SELECT fecha_reserva,hora_inicio,login,nombre_pista,pista_ID_Pista
			   FROM reservas,pista,usuarios 
			   WHERE `usuarios_login`= `login` && `pista_ID_Pista`=`ID_Pista` 
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

	$sql = "
			  SELECT fecha_reserva,hora_inicio,login,nombre_pista,pista_ID_Pista
			   FROM reservas,pista,usuarios 
			   WHERE `usuarios_login`= `login` && `pista_ID_Pista`=`ID_Pista` && `usuarios_login` = '".$_SESSION['login']."'
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