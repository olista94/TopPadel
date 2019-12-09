
<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';


 //Declaracion de la clase 
 class Usuarios_RANKING{	 
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
	
	<button title = "<?php echo $strings ['Criterios de puntuacion:'];
         					echo "\n";
         					echo $strings ['Partido ganado -> +3 puntos'];
							echo "\n";
         					echo $strings ['Partido perdido -> -1 punto'];
         					echo "\n";
         					echo $strings ['Aplicable a cualquier partido dentro de un campeonato'];?>


         	" type="submit" name="action" value="Submit" class="ayuda-ico"></button>
                                
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Rankings']; ?>
			<form class="tableActions" action="../Controllers/Usuarios_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			
			<button class="chico" name="action" value="Ranking_Masc" type="submit"></button>
			<button class="chica"  name="action" value="Ranking_Fem" type="submit"></button>
			</form></th></tr>
			<!--Campos a mostrar-->
			<tr>
			<th><?php echo "Pos" ?></th>
				<th><?php echo $strings['Usuario']; ?></th>
				<th><?php echo $strings['Puntos']; ?></th>
				
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		$i = 1;	
			while($fila = $this ->datos->fetch_array()){   
		
		?>
			<tr>
				<form action="../Controllers/Usuarios_Controller.php" method="post" name="action" >
					<input type="hidden" name="login" value="<?php echo $fila['login']; ?>">
					<!--Datos-->
					<td><?php echo "$i"; $i = $i+1;?></td>
					<td><?php echo $fila['login']; ?></td>
					<td><?php echo $fila['ranking']; ?></td>
					
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
