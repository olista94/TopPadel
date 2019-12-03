<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';

 //Declaracion de la clase 
 class Torneos_SHOWTORNEO_Generado_Final{	 

	var $datos;	
	var $idtorneo;	
	var $grupo;	
	var $enlace;	
	//Constructor de la clase
	function __construct($datos,$idtorneo,$grupo,$enlace){
		$this -> datos = $datos;
		$this -> idtorneo = $idtorneo;
		$this -> grupo = $grupo;
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

<form action="../Controllers/Torneos_Controller.php" method="post" name="action" class="ronda">
			<button type="submit" name="action" value="Confirmar_SHOWTORNEO" value="Submit" ><?php echo $strings['Liga regular'];?></button>
			<button type="submit" name="action" value="Ver_Cuartos" value="Submit" ><?php echo $strings['Cuartos'];?></button>
			<button type="submit" name="action" value="Ver_Semis" value="Submit" ><?php echo $strings['Semifinales'];?></button>
			<button type="submit" name="action" value="Ver_Final" value="Submit" ><?php echo $strings['Final'];?></button>
			<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
			<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>
			</form>

<div class="showall">   
                                
		<table style="width:70%" class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Final']; ?>
			</th></tr>
			
		
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

