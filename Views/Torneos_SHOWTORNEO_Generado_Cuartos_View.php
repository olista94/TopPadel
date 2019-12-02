<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';

 //Declaracion de la clase 
 class Torneos_SHOWTORNEO_Generado_Cuartos{	 

	var $datos;	
	var $idtorneo;	
	var $enlace;	
	//Constructor de la clase
	function __construct($datos,$idtorneo,$enlace){
		$this -> datos = $datos;
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

<!----------------------------------------------------------------------------Playoffs---------------------------------------------------------------------------------------------->
<div class="showall">   
                                
		<table style="width:70%" class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo "Playoffs"; ?>
			</th></tr>
			<!--Campos a mostrar-->
			<tr>
				<th><?php echo $strings['Local']; ?></th>
				<th><?php echo $strings['Visitante']; ?></th>
				<th><?php echo "Res"; ?></th>
				<th><?php echo $strings['Ronda']; ?></th>
				<th><?php echo $strings['Grupo']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		
			while($datos = $this ->datos->fetch_array()){      
		
		?>
			<tr>
			<form action="../Controllers/Partidos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					<input type="hidden" name="ID_Partido" value="<?php echo $datos['ID_Partido']; ?>">
					<input type="hidden" name="ID_ParejaLocal" value="<?php echo $datos['ID_ParejaLocal']; ?>">
					<input type="hidden" name="ID_ParejaVisitante" value="<?php echo $datos['ID_ParejaVisitante']; ?>">
					<!--Datos-->
					<td><?php echo "$datos[6]-$datos[7]" ; ?></td>
					<td><?php echo "$datos[9]-$datos[10]" ; ?></td>
					<td><?php echo "$datos[11]-$datos[12]" ; ?></td>
					<td><?php echo "$datos[3]" ; ?></td>
					<td><?php echo "$datos[4]" ; ?></td>
					
				<td style="text-align:right">
					<!--Botones para editar,borrar o ver en detalle-->
						
						<button class="add" name="action" value="Confirmar_SHOWCURRENT1" type="submit"></button>
						<button class="acta" name="action" value="Acta_Partido" type="submit"></button>
						
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

