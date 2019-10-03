<!---MODELO DE LAS RESERVAS
 CREADO POR los Cangrejas EL 21/12/2018-->
<?php
//Login del usuario conectado
$login = $_SESSION['login'];
//Declaracion de la clase
class Promociones_Model {
	var $ID_Promo; 
	var $fecha; 
	var $hora_fin;
	var $usuarios_login_usuario;
	var $pista_ID_Pista;
	
//Constructor de la clase
function __construct($ID_Promo, $fecha, $hora_fin, $usuarios_login_usuario, $pista_ID_Pista){
	$this->ID_Promo = $ID_Promo;
	$this->fecha = $fecha;
	$this->hora_fin = $hora_fin;
	$this->usuarios_login_usuario = $usuarios_login_usuario;
	$this->pista_ID_Pista = $pista_ID_Pista;

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
				'$this->pista_ID_Pista'
				)
			";

	if (!$this->mysqli->query($sql)) { 
		return 'Error al insertar';//Devuelve mensaje de error
	}
	else{ 
		return 'Insercion correcta'; //Devuelve mensaje de exito	
	}
} 

//Funcion para editar una promocion
function edit()
{
	
    $sql = "SELECT * FROM promociones WHERE (ID_Promo = '$this->ID_Promo'
									AND fecha = '$this->fecha'
									AND hora_inicio = '$this->hora_inicio'
									AND usuarios_login_usuario = '$this->usuarios_login_usuario'
									AND pista_ID_Pista = '$this->pista_ID_Pista'
	
	)";
    
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if ($result->num_rows == 1)
    {	
		//Sentencia sql para editar
		$sql = "UPDATE promo SET
					'ID_Promo' = '$this->ID_Promo',
					'fecha' = '$this->fecha',
					'hora_inicio' = '$this->hora_inicio',
					'usuarios_login_usuario' = '$this->usuarios_login_usuario',
					'pista_ID_Pista' = '$this->pista_ID_Pista'
					

				WHERE (`ID_Promo` = '$this->ID_Promo')";

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
function searchAdmin($idpista){ 

	$sql = "
			SELECT ID_Promo, promo.fecha, hora_inicio, usuarios_login_usuario, p.nombre_pista
			FROM promociones promo, pista p 
			WHERE (`pista_ID_Pista`= '".$idpista."')
	
	
	";		   
	echo $sql;
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
        $sql = "DELETE FROM promociones WHERE (`ID_Promo` = '$this->ID_Promo')";
        
        $this->mysqli->query($sql);//Guarda el resultado
        
    	return 'Borrado correctamente';//Devuelve mensaje de exito
    } 
    else
        return 'No existe';//Devuelve mensaje de error
}

//Funcion que devuelve los datos de una promocion
function rellenadatos() {	
	$sql = "SELECT * FROM prociones WHERE (`ID_Promo` = '$this->ID_Promo')";
   
    if (!($resultado = $this->mysqli->query($sql))){
		
		return 'No existe'; //Devuelve mensaje de error
	}
    else{ 
	
		$result = $resultado;//Se guarda el resultado de la consulta sql
		return $result;//Se devuelve el resultado de la consulta
		
	}
}

//Funcion que devuelve todas las promociones
function TareasShowAll(){
	$sql = "SELECT ID_Promo,t.descripcion AS descripcion_tarea ,p.descripcion AS descripcion_prioridad, p.color AS color_tarea,
			Fecha_Ini, t.completada AS completa, c.nombre as categoria
			FROM tareas t, prioridades p, categorias c 
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
			FROM tareas t, prioridades p, categorias c 
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
			FROM tareas t, prioridades p
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


function DevolverIDPista() 
{	
	
    $sql = "SELECT Pista_ID_Pista
			FROM promociones
			WHERE (`ID_Promo` = '".$this->ID_Promo."')";

   	echo $sql;

    $result = $this->mysqli->query($sql);

    if($result->num_rows==1){
    	return $result->fetch_array()[0];
    }
    else{
    	return false;
    }
} 



}//fin de clase

?> 