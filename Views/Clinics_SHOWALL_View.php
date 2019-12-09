
<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';
//Header
include '../Views/Header.php';

if($_SESSION['tipo'] == "ADMIN"){
	

 //Declaracion de la clase 
 class Clinics_SHOWALL{	 
	//Datos de los usuarios
	var $datos;
	var $apuntados;
	var $apuntados2;
	//Variable con el enlace al showall
	var $enlace;	
	
	//Constructor de la clase
	function __construct($datos,$apuntados,$enlace){
		
		$this -> datos = $datos;
		$this -> apuntados = $apuntados;
		$this -> apuntados2 = [];
		//Cuenta el numero de usuarios
		if($this -> apuntados -> num_rows > 0){
			while($apun = $this -> apuntados -> fetch_array()){
						$this -> apuntados2[$apun[1]] = $apun[0];	
							}
		}
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
	 
?>
<!--Tabla con los datos de los usuarios-->
	<div class="showall">   
                                
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Clinics']; ?>
			<form class="tableActions" action="../Controllers/Clinics_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			<button class="anadir-little"  name="action" value="Confirmar_ADD1" type="submit"></button>
			<button class="buscar-little" name="action" value="Confirmar_SEARCH1" type="submit"></button>
			</form></th></tr>
			<!--Campos a mostrar-->
			<tr>
				<th><?php echo $strings['Descripcion']; ?></th>
				<th><?php echo $strings['Invitado']; ?></th>
				<th><?php echo $strings['Tope']; ?></th>
				<th><?php echo $strings['Apuntados']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
			while($fila = $this ->datos->fetch_array()){                        
		?>
			<tr>
				<form action="../Controllers/Clinics_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Clase" value="<?php echo $fila['ID_Clase']; ?>">
					<!--Datos-->
					<td><?php echo $fila['descripcion']; ?></td>
					<td><?php echo $fila['invitado']; ?></td>
					<td><?php echo $fila['tope']; ?></td>
					<td>
						 <!--Muestra el numero de usuarios-->
						<?php
						if($this -> apuntados-> num_rows == 0){
							//Si no hay usuarios muestra 0
							echo '0';
						}
						else{
							$entra = 0;
							//Foreach para contar los usuarios que tiene la tarea
							foreach($this -> apuntados2 as $indice => $valor){
								if($indice == $fila['ID_Clase']){
									$entra = 1;
									echo $valor;
								}
							}
							if($entra == 0){
								echo '0';
							}
							$entra = 0;
						}
						?>
						</td>					
					<td style="text-align:right">
					<!--Botones para editar,borrar o ver en detalle-->
						<button class="borrar" name="action" value="Confirmar_DELETE1" type="submit"></button>
						<button class="add" name="action" value="Confirmar_SHOWCURRENT" type="submit"></button>
						
					</td>
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
    }else if($_SESSION['tipo'] == "NORMAL"){
		//Declaracion de la clase 
 class Clinics_SHOWALL{	 
	//Datos de los usuarios
	var $datos;
	var $apuntados;
	var $apuntados2;
	//Variable con el enlace al showall
	var $enlace;	
	
	//Constructor de la clase
	function __construct($datos,$apuntados,$enlace){
		
		$this -> datos = $datos;
		$this -> apuntados = $apuntados;
		$this -> apuntados2 = [];
		//Cuenta el numero de usuarios
		if($this -> apuntados -> num_rows > 0){
			while($apun = $this -> apuntados -> fetch_array()){
						$this -> apuntados2[$apun[1]] = $apun[0];	
							}
		}
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
	 
?>
<!--Tabla con los datos de los usuarios-->
	<div class="showall">   
                                
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Clinics']; ?>
			<form class="tableActions" action="../Controllers/Clinics_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			<button class="buscar-little" name="action" value="Confirmar_SEARCH1" type="submit"></button>
			
			</form></th></tr>
			<!--Campos a mostrar-->
			<tr>
				<th><?php echo $strings['Descripcion']; ?></th>
				<th><?php echo $strings['Invitado']; ?></th>
				<th><?php echo $strings['Tope']; ?></th>
				<th><?php echo $strings['Apuntados']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
			while($fila = $this ->datos->fetch_array()){                        
		?>
			<tr>
				<form action="../Controllers/Clinics_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Clase" value="<?php echo $fila['ID_Clase']; ?>">
					<!--Datos-->
					<td><?php echo $fila['descripcion']; ?></td>
					<td><?php echo $fila['invitado']; ?></td>
					<td><?php echo $fila['tope']; ?></td>
					<td>
						 <!--Muestra el numero de usuarios-->
						<?php
						if($this -> apuntados-> num_rows == 0){
							//Si no hay usuarios muestra 0
							echo '0';
						}
						else{
							$entra = 0;
							//Foreach para contar los usuarios que tiene la tarea
							foreach($this -> apuntados2 as $indice => $valor){
								if($indice == $fila['ID_Clase']){
									$entra = 1;
									echo $valor;
								}
							}
							if($entra == 0){
								echo '0';
							}
							$entra = 0;
						}
						?>
						</td>					
					<td style="text-align:right">
					<!--Botones para editar,borrar o ver en detalle-->
						<button class="add" name="action" value="Confirmar_SHOWCURRENT" type="submit"></button>
						<button class="inscripcion" name="action" value="Confirmar_INSCRIPCION1" type="submit"></button>
					</td>
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
    } else if($_SESSION['tipo'] == "ENTRENADOR"){
		 class Clinics_SHOWALL{	 
	//Datos de los usuarios
	var $datos;
	var $apuntados;
	var $apuntados2;
	//Variable con el enlace al showall
	var $enlace;	
	
	//Constructor de la clase
	function __construct($datos,$apuntados,$enlace){
		
		$this -> datos = $datos;
		$this -> apuntados = $apuntados;
		$this -> apuntados2 = [];
		//Cuenta el numero de usuarios
		if($this -> apuntados -> num_rows > 0){
			while($apun = $this -> apuntados -> fetch_array()){
						$this -> apuntados2[$apun[1]] = $apun[0];	
							}
		}
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
	 
?>
<!--Tabla con los datos de los usuarios-->
	<div class="showall">   
                                
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Clinics']; ?>
			<form class="tableActions" action="../Controllers/Clinics_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			<button class="buscar-little" name="action" value="Confirmar_SEARCH1" type="submit"></button>
			
			</form></th></tr>
			<!--Campos a mostrar-->
			<tr>
				<th><?php echo $strings['Descripcion']; ?></th>
				<th><?php echo $strings['Invitado']; ?></th>
				<th><?php echo $strings['Tope']; ?></th>
				<th><?php echo $strings['Apuntados']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
			while($fila = $this ->datos->fetch_array()){                        
		?>
			<tr>
				<form action="../Controllers/Clinics_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Clase" value="<?php echo $fila['ID_Clase']; ?>">
					<!--Datos-->
					<td><button title =	"<?php echo $strings['Pulsa para controlar asistencia']; ?>" 
						class="tarea" name="action" value="Confirmar_SHOWCLINIC"><?php echo $fila['descripcion']; ?></button></td>
					<td><?php echo $fila['invitado']; ?></td>
					<td><?php echo $fila['tope']; ?></td>
					<td>
						 <!--Muestra el numero de usuarios-->
						<?php
						if($this -> apuntados-> num_rows == 0){
							//Si no hay usuarios muestra 0
							echo '0';
						}
						else{
							$entra = 0;
							//Foreach para contar los usuarios que tiene la tarea
							foreach($this -> apuntados2 as $indice => $valor){
								if($indice == $fila['ID_Clase']){
									$entra = 1;
									echo $valor;
								}
							}
							if($entra == 0){
								echo '0';
							}
							$entra = 0;
						}
						?>
						</td>					
					<td style="text-align:right">
					<!--Botones para editar,borrar o ver en detalle-->
						<button class="borrar" name="action" value="Confirmar_DELETE1" type="submit"></button>
						<button class="add" name="action" value="Confirmar_SHOWCURRENT" type="submit"></button>
					</td>
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

?>
