<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';

if(isset($_SESSION['tipo'])){
	if($_SESSION['tipo']=='ADMIN'){

 //Declaracion de la clase 
 class Torneos_SHOWTORNEO{	 
	//Datos de los contactos
	var $datos;
	var $clasificacion;
	var $apuntados1;
	var $idtorneo;
	//Variable con el enlace al showall
	var $enlace;	
	//Constructor de la clase
	function __construct($datos,$clasificacion,$apuntados1,$idtorneo,$enlace){
		$this -> datos = $datos;
		$this -> clasificacion = $clasificacion;
		$this -> apuntados1 = $apuntados1;
		$this -> idtorneo = $idtorneo;
		$this -> enlace = $enlace;
		$this -> mostrar();
	}
	//Funcion que "muestra" el contenido de la página
	function mostrar(){
	//Variable de idioma
		if(!isset($_SESSION['idioma'])){
			$_SESSION['idioma'] = 'SPANISH';
		}
	//Archivo del idioma	
		include '../Locales/Strings_'. $_SESSION['idioma'] .'.php';  
	 
			$_SESSION['ID_Torneo'] = 'ID_Torneo';
		
?>

<!--Tabla con los datos de los torneos-->
	<div class="showall">   
                 <form class="generar-cal-form" id="generar-cal-form" action="../Controllers/Torneos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					<button class="generar-cal" name="action" value="Generar_Calendario" type="submit"></button>
					
					
				</form>	               
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Clasificacion']; ?>
			<tr>
			
				<th><?php echo $strings['Jugador 1']; ?></th>
				<th><?php echo $strings['Jugador 2']; ?></th>
				<th><?php echo $strings['PJ']; ?></th>
				<th><?php echo $strings['PG']; ?></th>
				<th><?php echo $strings['PP']; ?></th>
				<th><?php echo $strings['Ptos']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		//if(!is_array($this -> parejas))
				while($clasificacion=$this->clasificacion->fetch_array()){
					
	
		?>
			<tr>
				<form action="../Controllers/Torneos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>

					<td><?php echo $clasificacion['usuarios_login']; ?></td>
					<td><?php echo $clasificacion['usuarios_login1']; ?></td>
					<td><?php echo $clasificacion['PJ']; ?></td>
					<td><?php echo $clasificacion['PG']; ?></td>
					<td><?php echo $clasificacion['PP']; ?></td>
					<td><?php echo $clasificacion['Ptos']; ?></td>					
				</form>	
			</tr>
			
		<?php
				}	
		?>    
					
		</table>        
	</div>     	
       
<?php   
    }
}
?>

    
<footer>
<!--Pie de pagina-->
	<?php include '../Views/Footer.php'; ?>
</footer>

<?php
	}else{
		//Declaracion de la clase 
 class Torneos_SHOWTORNEO{	 
	//Datos de los contactos
	var $datos;
	var $clasificacion;
	var $apuntados1;
	var $idtorneo;
	//Variable con el enlace al showall
	var $enlace;	
	//Constructor de la clase
	function __construct($datos,$clasificacion,$apuntados1,$idtorneo,$enlace){
		$this -> datos = $datos;
		$this -> clasificacion = $clasificacion;
		$this -> apuntados1 = $apuntados1;
		$this -> idtorneo = $idtorneo;
		$this -> enlace = $enlace;
		$this -> mostrar();
		
	}
	//Funcion que "muestra" el contenido de la página
	function mostrar(){
	//Variable de idioma
		if(!isset($_SESSION['idioma'])){
			$_SESSION['idioma'] = 'SPANISH';
		}
	//Archivo del idioma	
		include '../Locales/Strings_'. $_SESSION['idioma'] .'.php';  
	 
			$_SESSION['ID_Torneo'] = 'ID_Torneo';
		
?>

<!--Tabla con los datos de los torneos-->
	<div class="showall">                 
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Clasificacion']; ?>
			<tr>
			
				<th><?php echo $strings['Jugador 1']; ?></th>
				<th><?php echo $strings['Jugador 2']; ?></th>
				<th><?php echo $strings['PJ']; ?></th>
				<th><?php echo $strings['PG']; ?></th>
				<th><?php echo $strings['PP']; ?></th>
				<th><?php echo $strings['Ptos']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		//if(!is_array($this -> parejas))
				while($clasificacion=$this->clasificacion->fetch_array()){
					
	
		?>
			<tr>
				<form action="../Controllers/Torneos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>

					<td><?php echo $clasificacion['usuarios_login']; ?></td>
					<td><?php echo $clasificacion['usuarios_login1']; ?></td>
					<td><?php echo $clasificacion['PJ']; ?></td>
					<td><?php echo $clasificacion['PG']; ?></td>
					<td><?php echo $clasificacion['PP']; ?></td>
					<td><?php echo $clasificacion['Ptos']; ?></td>					
				</form>	
			</tr>
			
		<?php
				}	
		?>    
					
		</table>        
	</div>     

		
       
<?php   
    }
}
?>

    
<footer>
<!--Pie de pagina-->
	<?php include '../Views/Footer.php'; ?>
</footer>
<?php
	}
}
?>