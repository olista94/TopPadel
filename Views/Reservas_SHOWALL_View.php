<?php
//Comprueba si esta autenticado
include_once '../Functions/Authentication.php';
//Header
include_once '../Views/Header.php';

 //Declaracion de la clase 
 class Reservas_SHOWALL{ 
	//Datos de todas las tareas
	var $datos;

	
	//Datos de las pistas
	var $pistas;
	
	//Variable con el enlace al showall
	var $enlace;	
	
	//Constructor de la clase
	function __construct($datos,$pistas,$enlace){
		
		$this -> datos = $datos;
		$this -> pistas = $pistas;
		$this -> enlace = $enlace;
		$this -> pinta();
	}
	//Funcion que "muestra" el contenido de la página	
	function pinta(){
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
			<tr><th class="title" colspan="4"><?php echo $strings['Reservas']; ?>
			<form class="tableActions" action="../Controllers/Reservas_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			<button class="buscar-little" name="action" value="Confirmar_SEARCH1" type="submit"></button>
			<button class="anadir-little"  name="action" value="Confirmar_ADD1" type="submit"></button>
			</form></th></tr>
			<!--Campos a mostrar-->
			<tr>
				<th><?php echo $strings['Usuario']; ?></th>
				<th><?php echo $strings['Fecha reserva']; ?></th>
				<th><?php echo $strings['Pista']; ?></th>
				<th><?php echo $strings['Hora']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		
			while($fila = $this ->datos->fetch_array()){      

		?>
			<tr>
				<form action="../Controllers/Reservas_Controller.php" method="post" name="action" >
					<input type="hidden" name="usuarios_login" value="<?php echo $fila['login']; ?>">
					<input type="hidden" name="pista_ID_Pista" value="<?php echo $fila['pista_ID_Pista']; ?>">
					<input type="hidden" name="fecha_reserva" value="<?php echo $fila['fecha_reserva']; ?>">
					<input type="hidden" name="hora_inicio" value="<?php echo $fila['hora_inicio']; ?>">
					<!--Datos-->
					<td><?php echo $fila['login']; ?></td>
					<td><?php echo $fila['fecha_reserva']; ?></td>
					<td><?php echo $fila['nombre_pista']; ?></td>
					<td><?php echo $fila['hora_inicio']; ?></td>					
					<td style="text-align:right">
					
					
					<!--Botones para editar,borrar o ver en detalle-->		
						<button class="borrar" name="action" value="Confirmar_DELETE1" type="submit"></button>
						<button class="add" name="action" value="Confirmar_SHOWCURRENT" type="submit"></button>
					</form>
					</td>
				
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
