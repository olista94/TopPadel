
<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';
//Header
include '../Views/Header.php';

 //Declaracion de la clase 
 class Clinics_SHOWALL{	 
	//Datos de los usuarios
	var $datos;
	//Variable con el enlace al showall
	var $enlace;	
	
	//Constructor de la clase
	function __construct($datos,$enlace){
		
		$this -> datos = $datos;
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
				<th><?php echo $strings['Pista']; ?></th>
				<th><?php echo $strings['Fecha']; ?></th>
				<th><?php echo $strings['Hora']; ?></th>
				<th><?php echo $strings['Invitado']; ?></th>
				<th><?php echo $strings['Descripcion']; ?></th>
				<th><?php echo $strings['Tope']; ?></th>
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
					<td><?php echo $fila['ID_Pista']; ?></td>
					<td><?php echo $fila['fecha_clase']; ?></td>
					<td><?php echo $fila['hora_clase']; ?></td>
					<td><?php echo $fila['invitado']; ?></td>
					<td><?php echo $fila['descripcion']; ?></td>
					<td><?php echo $fila['tope']; ?></td>		
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

