<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';


if(isset($_SESSION['tipo'])){
	if($_SESSION['tipo']=='ADMIN'){
 //Declaracion de la clase 
 class Torneos_SHOWTORNEO_Generado{	 
	//Datos de los contactos
	var $datos;
	var $clasificacion;
	var $apuntados1;
	var $idtorneo;
	var $grupos;
	var $grupo;
	//Variable con el enlace al showall
	var $enlace;	
	//Constructor de la clase
	function __construct($datos,$clasificacion,$apuntados1,$idtorneo,$grupos,$grupo,$enlace){
		$this -> datos = $datos;
		$this -> clasificacion = $clasificacion;
		$this -> apuntados1 = $apuntados1;
		$this -> idtorneo = $idtorneo;
		$this -> grupos = $grupos;
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
		
?>

<form action="../Controllers/Torneos_Controller.php" method="post" name="action" class="ronda">
			<button class="botonesRondas" type="submit" name="action" value="Confirmar_SHOWTORNEO" value="Submit" ><?php echo $strings['Liga regular'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Cuartos" value="Submit" ><?php echo $strings['Cuartos'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Semis" value="Submit" ><?php echo $strings['Semifinales'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Final" value="Submit" ><?php echo $strings['Final'];?></button>
			
			<?php $numGrupos = $this-> grupos -> num_rows;
			if($numGrupos > 1){
				?>
				<button class="botonesRondas" type="submit" name="action" value="Ver_Superfinal" value="Submit" ><?php echo $strings['Superfinal'];?></button>
			<?php } ?>
			
			<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
			<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>
			</form>
	<div class="showall"> 

         <button title = "<?php echo $strings ['Criterios desempate:'];
         					echo "\n";
         					echo "+"; echo $strings ['Puntos'];
							echo "\n";
         					echo "+"; echo $strings ['Sets a favor'];
         					echo "\n";
         					echo "-";echo $strings ['Sets en contra'];
							echo "\n";
							echo "+"; echo $strings ['Juegos a favor'];
         					echo "\n";
							echo "-"; echo $strings ['Juegos en contra'];?>


         	" type="submit" name="action" value="Submit" class="ayuda-ico"></button>                       
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Clasificacion']; ?>

			
			<form class="tableActions" action="../Controllers/Torneos_Controller.php" method="post">
			
			<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
			<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>
			
					<div>
					<label class="lblSearch" >
					<?php echo $strings['Grupo']; ?>:</label>
					<select class="slcSearch" name="grupo">
					<option value="">---</option>
						<?php
						
							while($grupos=$this->grupos->fetch_array()){
								
						?>
								
								<option value="<?php echo $grupos[0];?>"> <?php echo $grupos[0] ;?> 
								
								</option>
						<?php
							}
						?>
					</select>
				<button type="submit" name="action" value="Ver_Grupos_Torneo" value="Submit" class="buscar-little"></button>
				

					</div>
					

				</form>

			</th></tr>
		
	
			<tr>
				<th></th> 
				<th><?php echo $strings['Jugador 1']; ?></th>
				<th><?php echo $strings['Jugador 2']; ?></th>
				<th title = "<?php echo $strings['Partidos jugados']; ?>"><?php echo $strings['PJ']; ?></th>
				<th title = "<?php echo $strings['Partidos ganados']; ?>"><?php echo $strings['PG']; ?></th>
				<th title = "<?php echo $strings['Partidos perdidos']; ?>"><?php echo $strings['PP']; ?></th>
				<th title = "<?php echo $strings['Puntos']; ?>"><?php echo $strings['Ptos']; ?></th>
				<th title = "<?php echo $strings['Sets a favor']; ?>"><?php echo $strings['SF']; ?></th>
				<th title = "<?php echo $strings['Sets en contra']; ?>"><?php echo $strings['SC']; ?></th>
				<th title = "<?php echo $strings['Juegos a favor']; ?>"><?php echo $strings['JF']; ?></th>
				<th title = "<?php echo $strings['Juegos en contra']; ?>"><?php echo $strings['JC']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		//if(!is_array($this -> parejas))
			$i = 1;
				while($clasificacion=$this->clasificacion->fetch_array()){
					
	
		?>
			<tr>
				<form action="../Controllers/Torneos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					
					<!--Datos-->
					<td><?php echo "$i"; $i = $i+1;?></td>
					<td><?php echo $clasificacion['usuarios_login']; ?></td>
					<td><?php echo $clasificacion['usuarios_login1']; ?></td>
					<td><?php echo $clasificacion['PJ']; ?></td>
					<td><?php echo $clasificacion['PG']; ?></td>
					<td><?php echo $clasificacion['PP']; ?></td>
					<td><?php echo $clasificacion['Ptos']; ?></td>
					<td><?php echo $clasificacion['SF']; ?></td>
					<td><?php echo $clasificacion['SC']; ?></td>
					<td><?php echo $clasificacion['JF']; ?></td>
					<td><?php echo $clasificacion['JC']; ?></td>
					
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
			<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>
					<div>
					<label class="lblSearch" for="action">
					<?php echo $strings['Pareja']; ?>:</label>
					<select class="slcSearch" name="ID_Pareja" >
					<option value="">---</option>
						<?php
						
							while($apuntados1=$this->apuntados1->fetch_array()){
								
						?>
								
								<option value="<?php echo $apuntados1[0];?>"> <?php echo "$apuntados1[1]-$apuntados1[2]" ;?> 
								
								</option>
						<?php
							}
						?>
					</select>
				<button type="submit" name="action" value="Ver_Partidos_Pareja" value="Submit" class="buscar-little"></button>
				
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
			<form action="../Controllers/Partidos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					<input type="hidden" name="ID_Partido" value="<?php echo $datos['ID_Partido']; ?>">
					<input type="hidden" name="ID_ParejaLocal" value="<?php echo $datos['ID_ParejaLocal']; ?>">
					<input type="hidden" name="ID_ParejaVisitante" value="<?php echo $datos['ID_ParejaVisitante']; ?>">
					<!--Datos-->
					<td><?php echo "$datos[2]-$datos[3]" ; ?></td>
					<td><?php echo "$datos[5]-$datos[6]" ; ?></td>
					<td><?php echo "$datos[7]-$datos[8]" ; ?></td>
					
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

<?php
	}else{
		 class Torneos_SHOWTORNEO_Generado{	 

	var $datos;
	var $clasificacion;
	var $apuntados1;
	var $idtorneo;
	var $grupos;
	var $grupo;
	var $enlace;	

	function __construct($datos,$clasificacion,$apuntados1,$idtorneo,$grupos,$grupo,$enlace){
		$this -> datos = $datos;
		$this -> clasificacion = $clasificacion;
		$this -> apuntados1 = $apuntados1;
		$this -> idtorneo = $idtorneo;
		$this -> grupos = $grupos;
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

<!--Tabla con los datos de los torneos-->

<form action="../Controllers/Torneos_Controller.php" method="post" name="action" class="ronda">
			<button class="botonesRondas" type="submit" name="action" value="Confirmar_SHOWTORNEO" value="Submit" ><?php echo $strings['Liga regular'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Cuartos" value="Submit" ><?php echo $strings['Cuartos'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Semis" value="Submit" ><?php echo $strings['Semifinales'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Final" value="Submit" ><?php echo $strings['Final'];?></button>
			
			<?php $numGrupos = $this-> grupos -> num_rows;
			if($numGrupos > 1){
				?>
				<button class="botonesRondas" type="submit" name="action" value="Ver_Superfinal" value="Submit" ><?php echo $strings['Superfinal'];?></button>
			<?php } ?>
			
			<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
			<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>
			</form>
				
	<div class="showall">   
	
                  <button title = "<?php echo $strings ['Criterios desempate:'];
         					echo "\n";
         					echo "+"; echo $strings ['Puntos'];
							echo "\n";
         					echo "+"; echo $strings ['Sets a favor'];
         					echo "\n";
         					echo "-";echo $strings ['Sets en contra'];
							echo "\n";
							echo "+"; echo $strings ['Juegos a favor'];
         					echo "\n";
							echo "-"; echo $strings ['Juegos en contra'];?>


         	" type="submit" name="action" value="Submit" class="ayuda-ico"></button>               
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Clasificacion']; ?>
			
			
		<form class="tableActions" action="../Controllers/Torneos_Controller.php" method="post">
			<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
			<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>
					<div>
					<label class="lblSearch" >
					<?php echo $strings['Grupo']; ?>:</label>
					<select class="slcSearch" name="grupo" >
					<option value="">---</option>
						<?php
						
							while($grupos=$this->grupos->fetch_array()){
								
						?>
								
								<option value="<?php echo $grupos[0];?>"> <?php echo $grupos[0] ;?> 
								
								</option>
						<?php
							}
						?>
					</select>
				<button type="submit" name="action" value="Ver_Grupos_Torneo" value="Submit" class="buscar-little"></button>
				
					</div>
					
				</form>
			</th></tr>
	<!--Campos Categoria,nombre,Edicion,Fecha,Nivel -->
			<tr>
				
				<th></th>
				<th><?php echo $strings['Jugador 1']; ?></th>
				<th><?php echo $strings['Jugador 2']; ?></th>
				<th title = "<?php echo $strings['Partidos jugados']; ?>"><?php echo $strings['PJ']; ?></th>
				<th title = "<?php echo $strings['Partidos ganados']; ?>"><?php echo $strings['PG']; ?></th>
				<th title = "<?php echo $strings['Partidos perdidos']; ?>"><?php echo $strings['PP']; ?></th>
				<th title = "<?php echo $strings['Puntos']; ?>"><?php echo $strings['Ptos']; ?></th>
				<th title = "<?php echo $strings['Sets a favor']; ?>"><?php echo $strings['SF']; ?></th>
				<th title = "<?php echo $strings['Sets en contra']; ?>"><?php echo $strings['SC']; ?></th>
				<th title = "<?php echo $strings['Juegos a favor']; ?>"><?php echo $strings['JF']; ?></th>
				<th title = "<?php echo $strings['Juegos en contra']; ?>"><?php echo $strings['JC']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		//if(!is_array($this -> parejas))
			$i = 1;
				while($clasificacion=$this->clasificacion->fetch_array()){
					
	
		?>
			<tr>
				<form action="../Controllers/Torneos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					
					<!--Datos-->
					<td><?php echo "$i"; $i = $i+1;?></td>
					<td><?php echo $clasificacion['usuarios_login']; ?></td>
					<td><?php echo $clasificacion['usuarios_login1']; ?></td>
					<td><?php echo $clasificacion['PJ']; ?></td>
					<td><?php echo $clasificacion['PG']; ?></td>
					<td><?php echo $clasificacion['PP']; ?></td>
					<td><?php echo $clasificacion['Ptos']; ?></td>
					<td><?php echo $clasificacion['SF']; ?></td>
					<td><?php echo $clasificacion['SC']; ?></td>
					<td><?php echo $clasificacion['JF']; ?></td>
					<td><?php echo $clasificacion['JC']; ?></td>
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
			<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>
					<div>
					<label class="lblSearch" for="action">
					<?php echo $strings['Pareja']; ?>:</label>
					<select class="slcSearch" name="ID_Pareja" >
					<option value="">---</option>
						<?php
						
							while($apuntados1=$this->apuntados1->fetch_array()){
								
						?>
								
								<option value="<?php echo $apuntados1[0];?>"> <?php echo "$apuntados1[1]-$apuntados1[2]" ;?> 
								
								</option>
						<?php
							}
						?>
					</select>
				<button type="submit" name="action" value="Ver_Partidos_Pareja" value="Submit" class="buscar-little"></button>
				
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
			
					<!--Datos-->
					<td><?php echo "$datos[2]-$datos[3]" ; ?></td>
					<td><?php echo "$datos[5]-$datos[6]" ; ?></td>
					<td><?php echo "$datos[7]-$datos[8]" ; ?></td>
					
				<td style="text-align:right">
				<form class="aaa" action="../Controllers/Partidos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					<input type="hidden" name="ID_Partido" value="<?php echo $datos['ID_Partido']; ?>">
					<input type="hidden" name="ID_ParejaLocal" value="<?php echo $datos['ID_ParejaLocal']; ?>">
					<input type="hidden" name="ID_ParejaVisitante" value="<?php echo $datos['ID_ParejaVisitante']; ?>">
					<!--Botones para editar,borrar o ver en detalle-->
						<button class="manos" name="action" value="Cerrar_Partido" type="submit"></button>
						<button class="add" name="action" value="Confirmar_SHOWCURRENT1" type="submit"></button>	
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

<?php
	}
}
?>
