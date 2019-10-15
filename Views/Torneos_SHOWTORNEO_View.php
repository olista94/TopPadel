<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';



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
			
			
			
			<!--Botones para añadir o buscar-->

			</form></th></tr>
	<!--Campos Categoria,nombre,Edicion,Fecha,Nivel -->
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
					<button class="generar-cal" name="action" value="Generar_Calendario" type="submit"></button>
					<!--Datos-->

					<td><?php echo $clasificacion['usuarios_login']; ?></td>
					<td><?php echo $clasificacion['usuarios_login1']; ?></td>
					<td><?php echo $clasificacion['PJ']; ?></td>
					<td><?php echo $clasificacion['PG']; ?></td>
					<td><?php echo $clasificacion['PP']; ?></td>
					<td><?php echo $clasificacion['Ptos']; ?></td>
					
					<td style="text-align:right">
					<!--Botones para editar,borrar o ver en detalle-->
						
						
					</td>
					
				</form>
				
			</tr>
			
		<?php
				}
	
			
		?>                    
		</table>        
	</div>     

	<div class="showall">   
                                
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Partidos']; ?>
			
			<form class="tableActions" action="../Controllers/Torneos_Controller.php" method="post" name ="PartidosPareja" id="PartidosPareja">
			<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
			<input type="hidden" name="action" value="ID_Pareja">
					<div>
					<label class="lblSearch" for="action">
					<?php echo $strings['Pareja']; ?>:</label>
					<select class="slcSearch" name="ID_Pareja" >
					
						<?php
						
							while($apuntados1=$this->apuntados1->fetch_array()){
								
						?>
								
								<option value="<?php echo $apuntados1[0];?>"><?php echo "$apuntados1[1]-$apuntados1[2]" ;?>
								
								</option>
						<?php
							}
						?>
					</select>
				<button type="submit" name="action" value="Ver_Partidos_Pareja" value="Submit" class="aceptar"></button>
				<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					</div>
					
				</form>
			</th></tr>
			<!--Campos a mostrar-->
			<tr>
				<th><?php echo $strings['Local']; ?></th>
				<th><?php echo $strings['Visitante']; ?></th>
				<th><?php echo $strings['Resultado']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		
			while($datos = $this ->datos->fetch_array()){      
		
		?>
			<tr>
				<form action="../Controllers/Promociones_Controller.php" method="post" name="action" >
					
					<input type="hidden" name="ID_Partido" value="<?php echo $datos['ID_Partido']; ?>">
					<!--Datos-->
					<td><?php echo "$datos[0]-$datos[1]" ; ?></td>
					<td><?php echo "$datos[2]-$datos[3]" ; ?></td>
					<td><?php echo "$datos[4]-$datos[5]" ; ?></td>
				
				
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
