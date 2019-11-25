<?php
//Declaracion de la clase
class Clases_Particulares_Model {
	//Login del usuario
	var $ID_Clase;
	//Contraseña del usuario
	var $login_usuario;
	//DNI del usuario
	var $login_entrenador;
	//Nombre del usuario
	var $fecha_clase;
	//Apellidos del usuario
	var $hora_clase;
	//Telefono del usuario
	var $ID_Pista;


//Constructor de la clase
function __construct($ID_Clase,$login_usuario,$login_entrenador,$fecha_clase,$hora_clase,$ID_Pista){
	$this->ID_Clase = $ID_Clase;
	$this->login_usuario = $login_usuario;
	$this->login_entrenador = $login_entrenador;
	$this->fecha_clase = $fecha_clase;
	$this->hora_clase = $hora_clase;
	$this->ID_Pista = $ID_Pista;

	//Incluimos el archivo de acceso a la bd
	include_once 'Access_DB.php';
	//Funcion de conexion a la bd
	$this->mysqli = ConnectDB();
}

//Funcion que realiza el registro
function add(){

		//Sentencia sql para insertar	
		$sql = "INSERT INTO clases_particulares
			VALUES (
				'$this->ID_Clase',
				'".$_SESSION['login']."',
				'$this->login_entrenador',
				'$this->fecha_clase',
				'$this->hora_clase',
				'$this->ID_Pista'
				
				)
				";
				
				echo $sql;
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar.Ya existe un usuario con ese login';//Devuelve mensaje de error	
		}
		else{
			
			return  'Insercion correcta'; //operacion de insertado correcta
		}		
	}
	
	function rellenadatos() 
{	
    $sql = "SELECT * FROM usuarios WHERE (`login` = '$this->login')";

    if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error	
	}
    else{ 
		$result = $resultado;
		return $result;//Se devuelve el resultado de la consulta
	}
}

	function DatosSocio() 
{	
    $sql = "SELECT socio,IBAN,cuenta FROM usuarios WHERE (`login` = '$this->login')";

    if (!($resultado = $this->mysqli->query($sql))){
		return 'No existe'; //Devuelve mensaje de error	
	}
    else{ 
		$result = $resultado;
		return $result;//Se devuelve el resultado de la consulta
	}
}

//Funcion que edita un usuario
function edit()
{
	
    $sql = "SELECT * FROM usuarios WHERE (`login` = '$this->login')";
    
    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {	
		//Sentencia sql para editar
		$sql = "UPDATE usuarios SET
					`password` = '$this->password',
					`dni` = '$this->dni',
					`nombre` = '$this->nombre',
					`apellidos` = '$this->apellidos',
					`telefono` = '$this->telefono',
					`email` = '$this->email',
					`fecha` = '$this->fecha',
					`sexo` = '$this->sexo',
					`tipo` = '$this->tipo'

				WHERE (`login` = '$this->login')";

        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación';//Devuelve mensaje de error	
		}
		else{ 
			
			return 'Modificado correctamente'; //Exito
		}
    }
    else 
    	return 'No existe';//Devuelve mensaje de error	
} 

//Funcion para buscar un usuario
function searchAdmin(){ 
		//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM clases_particulares
    			WHERE
    				( 
    				(`ID_Clase` LIKE '%$this->ID_Clase%') &&
	 				(`login_usuario` LIKE '%$this->login_usuario%') &&
					(`login_entrenador` LIKE '%$this->login_entrenador%') &&
					(`fecha_clase` LIKE '%$this->fecha_clase%') &&
					(`hora_clase` LIKE '%$this->hora_clase%') &&
					(`ID_Pista` LIKE '%$this->ID_Pista%')
					
    				)";
				
echo $sql;
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function searchNormal(){ 
		//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM clases_particulares
    			WHERE
    				( 
    				(`ID_Clase` LIKE '%$this->ID_Clase%') &&
	 				(`login_usuario` LIKE '".$_SESSION['login']."') &&
					(`login_entrenador` LIKE '%$this->login_entrenador%') &&
					(`fecha_clase` LIKE '%$this->fecha_clase%') &&
					(`hora_clase` LIKE '%$this->hora_clase%') &&
					(`ID_Pista` LIKE '%$this->ID_Pista%')
					
    				)";
				
echo $sql;
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
       			FROM clases_particulares
    			WHERE
    				( 
    				(`ID_Clase` LIKE '%$this->ID_Clase%') &&
	 				(`login_usuario` LIKE '%$this->login_usuario%') &&
					(`login_entrenador` LIKE '".$_SESSION['login']."') &&
					(`fecha_clase` LIKE '%$this->fecha_clase%') &&
					(`hora_clase` LIKE '%$this->hora_clase%') &&
					(`ID_Pista` LIKE '%$this->ID_Pista%')
					
    				)";
				
echo $sql;
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
    $sql = "SELECT * FROM clases_particulares WHERE (`ID_Clase` = '$this->ID_Clase')";
    
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if ($result->num_rows == 1)
    {
			//Sentencia sql para borrar
			$sql = "DELETE FROM clases_particulares WHERE (`ID_Clase` = '$this->ID_Clase')";
			
			$this->mysqli->query($sql);
			
			return 'Borrado correctamente';//Exito
		
    } 
    else
        return 'No existe';//Devuelve mensaje de error	
}

function BuscarHorasOcupadas(){

	 $sql = "SELECT `hora_clase`,COUNT(*) AS Num_Reservas
			FROM clases_particulares cp,pista p
			WHERE `fecha_clase` = '$this->fecha_clase' and p.ID_Pista = cp.ID_Pista GROUP BY `hora_clase` HAVING COUNT(*) >= (SELECT COUNT(ID_Pista) FROM pista)
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

function pistasLibres(){

	 $sql = "SELECT `ID_Pista`,`Nombre_Pista`
			FROM pista
			WHERE `ID_Pista` NOT IN 
							(SELECT p.`ID_Pista` FROM clases_particulares cp,pista p 
							WHERE `fecha_clase` = '$this->fecha_clase' AND `hora_clase` = '$this->hora_clase' AND cp.`ID_Pista` = p.`ID_Pista`)";
echo $sql;
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
	 login not in (SELECT login_entrenador from clases_particulares where `fecha_clase` = '$this->fecha_clase' AND `hora_clase` )";
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}	

function ShowAllDeportista(){ 
		//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM clases_particulares
    			WHERE
    				( 
    				(`login_usuario` LIKE '".$_SESSION['login']."') 
					
    				)";
				

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
       			FROM clases_particulares
    			WHERE
    				( 
    				(`login_entrenador` LIKE '".$_SESSION['login']."') 
					
    				)";
				

    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function ShowAllAdmin(){ 
		//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM clases_particulares
    			";
				

    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}


}//fin de clase

?> 