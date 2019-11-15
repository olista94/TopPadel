<?php
//Declaracion de la clase
class USUARIOS_Model {
	//Login del usuario
	var $login;
	//Contraseña del usuario
	var $password;
	//DNI del usuario
	var $dni;
	//Nombre del usuario
	var $nombre;
	//Apellidos del usuario
	var $apellidos;
	//Telefono del usuario
	var $telefono;
	//Email del usuario
	var $email;
	//Fecha de nacimiento del usuario
	var $fecha;
	//Sexo
	var $sexo;
	//Tipo de usuario (admin o normal)
	var $socio;
	var $tipo;
	//IBAN
	var $IBAN;
	//Numero de Cuenta
	var $cuenta;

//Constructor de la clase
function __construct($login,$password,$dni,$nombre,$apellidos,$telefono,$email,$fecha,$sexo,$tipo,$socio,$IBAN,$cuenta){
	$this->login = $login;
	$this->password = $password;
	$this->dni = $dni;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->telefono = $telefono;
	$this->email = $email;
	$this->fecha = $fecha;
	$this->sexo = $sexo;
	$this->tipo = $tipo;
	$this->socio = $socio;
	$this->IBAN = $IBAN;
	$this->cuenta = $cuenta;

	//Incluimos el archivo de acceso a la bd
	include_once 'Access_DB.php';
	//Funcion de conexion a la bd
	$this->mysqli = ConnectDB();
}


//Funcion para hacer login
function login(){
	//Sentencia sql para buscar el usuario
	$sql = "SELECT *
			FROM usuarios
			WHERE (
				(login = '$this->login') 
			)";

	$resultado = $this->mysqli->query($sql);//Guarda el resultado
	if ($resultado->num_rows == 0){
		return 'El login no existe';//Devuelve mensaje de error	
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){
			return true; //Exito
		}
		else{
			return 'La password para este usuario no es correcta';//Devuelve mensaje de error	
		}
	}
}//fin metodo login

//Funcion que comprueba la validez del registro
function Register(){

		$sql = "select * from usuarios where login = '".$this->login."'";

		$result = $this->mysqli->query($sql);//Guarda el resultado
		if ($result->num_rows == 1){  // existe el usuario
				return 'El usuario ya existe';//Devuelve mensaje de error	
			}
		else{
	    		return true; //no existe el usuario
		}

	}

//Funcion que realiza el registro
function registrar(){

		//Sentencia sql para insertar	
		$sql = "INSERT INTO usuarios (
			login,
			password,
			dni,
			nombre,
			apellidos,
			telefono,
			email,
			fecha,
			sexo,
			tipo,
			socio,
			IBAN,
			cuenta
			) 
				VALUES (
					'$this->login',
					'$this->password',
					'$this->dni',
					'$this->nombre',
					'$this->apellidos',
					'$this->telefono',
					'$this->email',
					'$this->fecha',
					'$this->sexo',
					'$this->tipo',
					'NO',
					'',
					''
					)";
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
function search(){ 
		//Sentencia sql para buscar
	     $sql = "SELECT *
       			FROM usuarios
    			WHERE
    				( 
    				(`login` LIKE '%$this->login%') &&
	 				(`nombre` LIKE '%$this->nombre%') &&
					(`apellidos` LIKE '%$this->apellidos%') &&
					(`dni` LIKE '%$this->dni%') &&
					(`telefono` LIKE '%$this->telefono%') &&
					(`email` LIKE '%$this->email%') &&
					(`fecha` LIKE '%$this->fecha%') &&
					(`sexo` LIKE '%$this->sexo%') &&
					(`tipo` LIKE '%$this->tipo%') &&
					(`socio` LIKE '%$this->socio%') &&
					(`IBAN` LIKE '%$this->IBAN%') &&
					(`cuenta` LIKE '%$this->cuenta%')
					
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
    $sql = "SELECT * FROM usuarios WHERE (`login` = '$this->login')";
    
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if ($result->num_rows == 1)
    {
		if($this->login == 'admin'){
			return 'No se puede borrar el usuario admin';
		}else{
			//Sentencia sql para borrar
			$sql = "DELETE FROM usuarios WHERE (`login` = '$this->login')";
			
			$this->mysqli->query($sql);
			
			return 'Borrado correctamente';//Exito
		}
    } 
    else
        return 'No existe';//Devuelve mensaje de error	
}  

//Funcion que devuelve el tipo de usuario
function DevolverTipo()
{	
    $sql = "SELECT tipo FROM usuarios WHERE (`login` = '$this->login')";
    
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if ($result->num_rows == 1)
    {    
    	return $result -> fetch_array()[0];//Guarda el resultado (El tipo de usuario)
    } 
    else
        return 'No existe';//Devuelve mensaje de error	
}  

function DevolverSexo()
{	
    $sql = "SELECT sexo FROM usuarios WHERE (`login` = '$this->login')";
    $sql;
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if ($result->num_rows == 1)
    {    
    	return $result -> fetch_array()[0];//Guarda el resultado (El tipo de usuario)
    } 
    else
        return 'No existe';//Devuelve mensaje de error	
} 

function DevolverSocio()//Devuelve si es socio o no un usuario
{	
    $sql = "SELECT socio FROM usuarios WHERE (`login` = '$this->login')";
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if ($result->num_rows == 1)
    {    
    	return $result -> fetch_array()[0];//Guarda el resultado (El tipo de usuario)
    } 
    else
        return 'No existe';//Devuelve mensaje de error	
}

function DevolverSocioConectado()//Devuelve si es socio o no el usuario conectado
{	
    $sql = "SELECT socio FROM usuarios WHERE (`login` = '".$_SESSION['login']."')";
   
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if ($result->num_rows == 1)
    {    
    	return $result -> fetch_array()[0];//Guarda el resultado (El tipo de usuario)
    } 
    else
        return 'No existe';//Devuelve mensaje de error	
}

function BuscarHombre()
{	
    $sql = "SELECT login FROM usuarios WHERE (`sexo` = 'Masculina' AND `login` <> '".$_SESSION['login']."' AND `login` <> 'admin')";
   
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}
}

function BuscarMujer()
{	
    $sql = "SELECT login FROM usuarios WHERE (`sexo` = 'Femenina' AND `login` <> '".$_SESSION['login']."' AND `login` <> 'admin' )";
     ;
    $result = $this->mysqli->query($sql);//Guarda el resultado
    
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';//Devuelve mensaje de error	
		
	}
    else{ 
		return $resultado;//Se devuelve el resultado de la consulta
	}

}

function addSocio(){

		//Sentencia sql para insertar	
		$sql = "UPDATE usuarios SET 
					`socio`='SI',
					`IBAN` = '$this->IBAN',
					`cuenta` = '$this->cuenta'

				WHERE (`login` = '$this->login')";
					
			
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';//Devuelve mensaje de error	
		}
		else{
			
			return  'Insercion correcta'; //operacion de insertado correcta
		}		
	}
	
	function deleteSocio(){

		//Sentencia sql para insertar	
		$sql = "UPDATE usuarios SET 
					`socio`='NO',
					`IBAN` = '',
					`cuenta` = ''

				WHERE (`login` = '$this->login')";
					
			
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar';//Devuelve mensaje de error	
		}
		else{
			
			return  'Borrado correctamente'; //operacion de insertado correcta
		}		
	}

}//fin de clase

?> 