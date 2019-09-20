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
	var $hora_fin;
	
//Constructor de la clase
function __construct($usuarios_login,$pista_ID_Pista,$fecha_reserva,$hora_inicio,$hora_fin){
	$this->usuarios_login = $usuarios_login;
	$this->pista_ID_Pista = $pista_ID_Pista;
	$this->fecha_reserva = $fecha_reserva;
	$this->hora_inicio = $hora_inicio;
	$this->hora_fin = $hora_fin;

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
				'$this->hora_inicio',
				'$this->hora_fin'
				)
			";

	if (!$this->mysqli->query($sql)) { 
		return 'Error al insertar';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
	}
} 

//Funcion para editar una reserva
function edit()
{
	
    $sql = "SELECT * FROM reservas WHERE (usuarios_login = '$this->usuarios_login'
									AND pista_ID_Pista = '$this->pista_ID_Pista'
									AND fecha_reserva = '$this->fecha_reserva'
									AND hora_inicio = '$this->hora_inicio'
	
	)";
    
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if ($result->num_rows == 1)
    {	
		//Sentencia sql para editar
		$sql = "UPDATE reservas SET
					`pista_ID_Pista` = '$this->pista_ID_Pista',
					`fecha_reserva` = '$this->fecha_reserva',
					`hora_inicio` = '$this->hora_inicio'
					

				WHERE (`id_tarea` = '$this->id_tarea')";

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



//Funcion para buscar las tareas si es un usuario normal (no ADMIN)
function search1(){ 

	$sql = "
			   SELECT fecha_reserva,hora_inicio,hora_fin,u.login,p.nombre_pista
			   FROM reservas,pista p,usuarios u
			   WHERE `usuarios_login`= u.login && `pista_ID_Pista`=p.ID_Pista &&
			   
			   (`fecha_reserva` LIKE '%$this->fecha_reserva%') &&
			   
			   (`hora_inicio` LIKE '%$this->hora_inicio%') &&
			   (`hora_fin` LIKE '%$this->hora_fin%') &&
			  
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
function searchAdmin(){ 

	$sql = "
			  SELECT fecha_reserva,hora_inicio,hora_fin,u.login,p.nombre_pista
			   FROM reservas,pista p,usuarios u
			   WHERE `usuarios_login`= u.login && `pista_ID_Pista`=p.ID_Pista &&
			   
			   (`fecha_reserva` LIKE '%$this->fecha_reserva%') &&
			   
			   (`hora_inicio` LIKE '%$this->hora_inicio%') &&
			   
			   (`hora_fin` LIKE '%$this->hora_fin%') &&
			  
			   (`u.login` LIKE '%$this->usuarios_login%') &&
			   
			   (p.ID_Pista LIKE '%$this->pista_ID_Pista%')
	
	
	";		   

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
    $sql = "SELECT * FROM tareas WHERE (`id_tarea` = '$this->id_tarea')";
    
    $result = $this->mysqli->query($sql);//Se guarda el resultado de la consulta sql
    
    if ($result->num_rows == 1)
    {
    	//Sentencia sql para borrar
        $sql = "DELETE FROM tareas WHERE (`id_tarea` = '$this->id_tarea')";
        
        $this->mysqli->query($sql);//Guarda el resultado
        
    	return 'Borrado correctamente';//Devuelve mensaje de exito
    } 
    else
        return 'No existe';//Devuelve mensaje de error
}

//Funcion que devuelve los datos de una tarea
function rellenadatos() {	
	$sql = "SELECT * FROM tareas WHERE (`id_tarea` = '$this->id_tarea')";
   
    if (!($resultado = $this->mysqli->query($sql))){
		
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
	
		$result = $resultado;//Se guarda el resultado de la consulta sql
		return $result;//Se devuelve el resultado de la consulta
		
	}
}

//Funcion que devuelve todas las tareas
function TareasShowAll(){
	$sql = "SELECT id_tarea,t.descripcion AS descripcion_tarea ,p.descripcion AS descripcion_prioridad, p.color AS color_tarea,
			Fecha_Ini, t.completada AS completa, c.nombre as categoria
			FROM tareas t,prioridades p, categorias c 
			WHERE t.PRIORIDADES_nivel = p.nivel && c.id_CATEGORIAS = t.CATEGORIAS_id_CATEGORIAS";
	
	
	if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
		$result = $resultado;//Se guarda el resultado de la consulta sql
		return $result;//Se devuelve el resultado de la consulta
	}
}

//Funcion que devuelve todas la tareas de un usuario normal
function TareasShowAllNormal(){
	$sql = "SELECT id_tarea,t.descripcion AS descripcion_tarea ,p.descripcion AS descripcion_prioridad, p.color AS color_tarea,
			Fecha_Ini, t.completada AS completa, c.nombre as categoria
			FROM tareas t,prioridades p, categorias c 
			WHERE t.PRIORIDADES_nivel = p.nivel && c.id_CATEGORIAS = t.CATEGORIAS_id_CATEGORIAS && `USUARIOS_login` = '".$_SESSION['login']."'";
	
	
	if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
		$result = $resultado;//Se guarda el resultado de la consulta sql
		return $result;//Se devuelve el resultado de la consulta
	}
}







//Busca las tareas que pertenezcan a un usuario normal
function BuscarTareasUser(){
	$sql = " SELECT id_tarea,t.descripcion AS descripcion_tarea ,p.descripcion 
	AS descripcion_prioridad, p.color AS color_tarea, Fecha_Ini, t.completada AS completa
			FROM tareas t,prioridades p
			WHERE `USUARIOS_login` = '".$_SESSION['login']."' && t.PRIORIDADES_nivel = p.nivel
					";
	
	
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