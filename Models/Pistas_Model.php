<?php
//Declaracion de la clase
class Pistas_Model {
	//Id de la pista
	var $ID_Pista;
	//Nombre de la pista
	var $Nombre_Pista;
	var $techo;
	var $suelo;
	
//Constructor de la clase
function __construct($ID_Pista,$Nombre_Pista,$techo,$suelo){
	$this->ID_Pista = $ID_Pista;
	$this->Nombre_Pista = $Nombre_Pista;
	$this->techo = $techo;
	$this->suelo = $suelo;
	//Incluimos el archivo de acceso a la bd
	include_once 'Access_DB.php';
	//Funcion de conexion a la bd
	$this->mysqli = ConnectDB();
}

//Funcion para insertar pistas
function add(){
			//Sentencia sql que insetara la categoria
		$sql = "INSERT INTO pista (
			Nombre_Pista,
			techo,
			suelo
			) 
				VALUES (
					'$this->Nombre_Pista',
					'$this->techo',
					'$this->suelo'
					)";
			
			//Si ya se han insertado la PK o FK
		if (!$this->mysqli->query($sql)) {
			
			return 'Error al insertar.Ya existe una pista con ese nombre';
		}
		//operacion de insertado correcta
		else{
			return  'Insercion correcta'; 
		}		
	}
//Funcion que obtiene todos los datos de una pista especifica	
	function rellenadatos() 
{	
    $sql = "SELECT * FROM pista WHERE (`ID_Pista` = '$this->ID_Pista')";
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

//Funcion para editar pista
function edit()
{
	//Sentencia sql que buscara todos los datos de una categoria
    $sql = "SELECT * FROM pista WHERE (`ID_Pista` = '$this->ID_Pista')";
    
    $result = $this->mysqli->query($sql);
    
	//Si devuelve 1a fila (consulta realizada correctamente)
    if ($result->num_rows == 1)
    {	
		$sql = "UPDATE pista SET		
					`Nombre_Pista` = '$this->Nombre_Pista',
					`techo` = '$this->techo',
					`suelo` = '$this->suelo'
				WHERE (`ID_Pista` = '$this->ID_Pista')";
				//Si se realiza erroneamente la edicion
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación.Ya existe una pista con ese nombre';
		}
		else{ 
			//Edit correcto
			return 'Modificado correctamente'; 
		}
    }//Si no encuentra ninguna pista
    else 
		return 'No existe';
}

//Funcion sql que buscara las categorias que correspondan
function search(){ 
//Sentencia sql que buscara las pistas cuyo nombre contengan la cadena introducida en el form de SEARCH
	     $sql = "SELECT *
       			FROM pista
    			WHERE
    				( 
					(`ID_Pista` LIKE '%$this->ID_Pista%')	&&
	 				(`Nombre_Pista` LIKE '%$this->Nombre_Pista%') &&
					(`techo` LIKE '%$this->techo%') &&
					(`suelo` LIKE '%$this->suelo%')				
    				)";
				
   //Si se produce un error
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';
		
	}//Si las encuentra (aunque no devuelva ninguna)
    else{ 
		return $resultado;
	}
}

//Devuelve una pista
function searchById(){ 
	$sql = "SELECT *
			  FROM pista
		   WHERE
			   ( 
			   
				(`ID_Pista` LIKE '%$this->ID_Pista%')
			   
			   )";
		//No la encuentra   
	if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';
		
	}
	else{ //Busqueda positiva
		return $resultado;
	}
}

function DevolverTodasLasPistas(){ 
	$sql = "SELECT `ID_Pista`,`Nombre_Pista`
			  FROM pista	   
			   ";
		//No la encuentra   
	if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la búsqueda';
		
	}
	else{ //Busqueda positiva
		return $resultado;
	}
}

//Funcion de borrado de una pista
function delete()
{	
//Sentencia sql que buscara la categoria a borrar
    $sql = "SELECT * FROM pista WHERE (`ID_Pista` = '$this->ID_Pista')";
    
    $result = $this->mysqli->query($sql);
    //Si se encuentra
    if ($result->num_rows == 1)
    {
    	//Sentencia sql que borrara la pista
        $sql = "DELETE FROM pista WHERE (`ID_Pista` = '$this->ID_Pista')";
        
		//Resultado positivo
        if($this->mysqli->query($sql)){
        
			return 'Borrado correctamente';
		}/*
		else{//Si esta asociada a una tarea no se puede borrar
			return 'No se puede borrar. Hay tareas asociadas a esta pista';
		}*/
    } 
    else//Si no existe
        return 'No existe';
} 


 
}//fin de clase
?> 