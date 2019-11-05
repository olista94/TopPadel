<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';
//Header
include_once '../Views/Header.php';


 //Declaracion de la clase 
 class Torneos_SHOWALL_Admin{	 
	//Datos de los contactos
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

<!--Tabla con los datos de los torneos-->
	<div class="showall">   
                                
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Torneos']; ?>
			<form class="tableActions" action="../Controllers/Torneos_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			<button class="buscar-little" name="action" value="Confirmar_SEARCH1" type="submit"></button>
			<button class="anadir-little"  name="action" value="Confirmar_ADD" type="submit"></button>
			</form></th></tr>
	<!--Campos Categoria,nombre,Edicion,Fecha,Nivel -->
			<tr>
			
				<th><?php echo $strings['Nombre']; ?></th>
				<th><?php echo $strings['Categoria']; ?></th>
				<th><?php echo $strings['Edicion']; ?></th>
				<th><?php echo $strings['Fecha limite']; ?></th>
				<th><?php echo $strings['Nivel']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
			while($fila = $this ->datos->fetch_array()){  
			
		?>
			<tr>
				<form action="../Controllers/Torneos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value="<?php echo $fila['ID_Torneo']; ?>">
					<!--Datos-->
					<td><button title =	"<?php echo $strings['Pulsa para ver partidos']; ?>" 
						class="tarea" name="action" value="Confirmar_SHOWTORNEO"><?php echo $fila['nombre']; ?></button></td>
					<td><?php if($fila['categoria'] == 'Masculina')
								echo $strings['Masculina'];
							else if($fila['categoria'] == 'Femenina')
								echo $strings['Femenina'];
							else echo $strings['Mixta'];
							?></td>
					<td><?php echo $fila['edicion']; ?></td>	
					<td><?php echo $fila['fecha']; ?></td>	
					
					<td><?php echo $fila['nivel']; ?></td>	
					
					<td style="text-align:right">
					<!--Botones para editar,borrar o ver en detalle-->
						<button class="editar" name="action" value="Confirmar_EDIT" type="submit"></button>
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
