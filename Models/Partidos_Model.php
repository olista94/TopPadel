<!---MODELO DE LAS PIESTAS
 CREADO POR los Cangrejas EL 21/12/2018-->
<?php
//Declaracion de la clase
class Partidos_Model {

	var $ID_Partido;
	var $fecha;
	var $hora;
	var $ronda;
	var $jornada;
	var $grupo;
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
function __construct($ID_Partido,$fecha,$hora,$ronda,$jornada,$grupo,
					$pista_ID_Pista,$Sets_Local,$Sets_Visitante,$JuegosSet1_Local,
					$JuegosSet1_Visitante,$JuegosSet2_Local,$JuegosSet2_Visitante,
					$JuegosSet3_Local,$JuegosSet3_Visitante){
						
	$this->ID_Partido = $ID_Partido;
	$this->fecha = $fecha;
	$this->hora = $hora;
	$this->ronda = $ronda;
	$this->jornada = $jornada;
	$this->grupo = $grupo;
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
			grupo,
			pista_ID_Pista

			) 
				VALUES (
					
					'Grupos',
					
					'A',
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
	
	function DevolverID(){
	$sql = "SELECT MAX(ID_Partido) FROM partidos";

	$result = $this->mysqli->query($sql);//Guarda el resultado
    
	if ($result->num_rows == 1){
		return $result -> fetch_array()[0];
	}else{
		return false;
	}
}
//Funcion que obtiene todos los datos de una pista especifica	
	function rellenadatos() 
{	
    $sql = "SELECT * FROM pista WHERE (`ID_partido` = '$this->ID_partido')";
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
    $sql = "SELECT * FROM pista WHERE (`ID_partido` = '$this->ID_partido')";
    
    $result = $this->mysqli->query($sql);
    
	//Si devuelve 1a fila (consulta realizada correctamente)
    if ($result->num_rows == 1)
    {	
		$sql = "UPDATE pista SET		
					`Nombre_partido` = '$this->Nombre_partido',
					`techo` = '$this->techo',
					`suelo` = '$this->suelo'
				WHERE (`ID_partido` = '$this->ID_partido')";
				//Si se realiza erroneamente la edicion
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación';
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
					(`ID_partido` LIKE '%$this->ID_partido%')	&&
	 				(`Nombre_partido` LIKE '%$this->Nombre_partido%') &&
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
			   
				(`ID_partido` LIKE '%$this->ID_partido%')
			   
			   )";
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
    $sql = "SELECT * FROM pista WHERE (`ID_partido` = '$this->ID_partido')";
    
    $result = $this->mysqli->query($sql);
    //Si se encuentra
    if ($result->num_rows == 1)
    {
    	//Sentencia sql que borrara la pista
        $sql = "DELETE FROM pista WHERE (`ID_partido` = '$this->ID_partido')";
        
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