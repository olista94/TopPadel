<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';

if(isset($_SESSION['tipo'])){
	if($_SESSION['tipo']=='ADMIN'){

 class Torneos_SHOWTORNEO_Generado_Superfinal{	 

	var $datos;	
	var $clasif;	
	var $idtorneo;	
	var $grupo;	
	var $numGrupos;	
	var $enlace;	
	//Constructor de la clase
	function __construct($datos,$clasif,$idtorneo,$grupo,$numGrupos,$enlace){
		$this -> datos = $datos;
		$this -> clasif = $clasif;
		$this -> idtorneo = $idtorneo;
		$this -> grupo = $grupo;
		$this -> numGrupos = $numGrupos;
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
			<button class="botonesRondas" type="submit" name="action" value="Confirmar_SHOWTORNEO" value="Submit" ><?php echo $strings['Liga regular'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Cuartos" value="Submit" ><?php echo $strings['Cuartos'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Semis" value="Submit" ><?php echo $strings['Semifinales'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Final" value="Submit" ><?php echo $strings['Final'];?></button>
			
			<?php
			if($this -> numGrupos > 1){
				?>
				<button class="botonesRondas" type="submit" name="action" value="Ver_Superfinal" value="Submit" ><?php echo $strings['Superfinal'];?></button>	
			<?php } ?>
			
			<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
			<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>
			</form>

<div class="showall">   
                                
		<table style="width:70%" class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Superfinal']; ?>
			</th></tr>
			
		
			<tr>
				<th><?php echo $strings['Local']; ?></th>
				<th><?php echo $strings['Visitante']; ?></th>
				<th><?php echo "Res"; ?></th>
				<th><?php echo $strings['Ronda']; ?></th>
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
			<tr><th class="title" colspan="4"><?php echo $strings['Cuadro de honor']; ?>
				<form class="tableActions" action="../Controllers/Torneos_Controller.php" method="post">
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>					
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
				while($clasif=$this->clasif->fetch_array()){
					
	
		?>
			<tr>
				<form action="../Controllers/Torneos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					
					<!--Datos-->
					<td><?php echo "$i"; $i = $i+1;?></td>
					<td><?php echo $clasif['usuarios_login']; ?></td>
					<td><?php echo $clasif['usuarios_login1']; ?></td>
					<td><?php echo $clasif['PJ_SF']; ?></td>
					<td><?php echo $clasif['PG_SF']; ?></td>
					<td><?php echo $clasif['PP_SF']; ?></td>
					<td><?php echo $clasif['PtosSuperFinal']; ?></td>
					<td><?php echo $clasif['SF_SF']; ?></td>
					<td><?php echo $clasif['SC_SF']; ?></td>
					<td><?php echo $clasif['JF_SF']; ?></td>
					<td><?php echo $clasif['JC_SF']; ?></td>
					
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

 class Torneos_SHOWTORNEO_Generado_Superfinal{	 

	var $datos;	
	var $clasif;	
	var $idtorneo;	
	var $grupo;	
	var $numGrupos;	
	var $enlace;	
	//Constructor de la clase
	function __construct($datos,$clasif,$idtorneo,$grupo,$numGrupos,$enlace){
		$this -> datos = $datos;
		$this -> clasif = $clasif;
		$this -> idtorneo = $idtorneo;
		$this -> grupo = $grupo;
		$this -> numGrupos = $numGrupos;
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
			<button class="botonesRondas" type="submit" name="action" value="Confirmar_SHOWTORNEO" value="Submit" ><?php echo $strings['Liga regular'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Cuartos" value="Submit" ><?php echo $strings['Cuartos'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Semis" value="Submit" ><?php echo $strings['Semifinales'];?></button>
			<button class="botonesRondas" type="submit" name="action" value="Ver_Final" value="Submit" ><?php echo $strings['Final'];?></button>
			
			<?php
			if($this -> numGrupos > 1){
				?>
				<button class="botonesRondas" type="submit" name="action" value="Ver_Superfinal" value="Submit" ><?php echo $strings['Superfinal'];?></button>	
			<?php } ?>
			
			<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
			<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>
			</form>

<div class="showall">   
                                
		<table style="width:70%" class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Superfinal']; ?>
			</th></tr>
			
		
			<tr>
				<th><?php echo $strings['Local']; ?></th>
				<th><?php echo $strings['Visitante']; ?></th>
				<th><?php echo "Res"; ?></th>
				<th><?php echo $strings['Ronda']; ?></th>
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
			</form>
			</tr>
			
		<?php
			}
		?>                    
		</table>        
	</div> 

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
			<tr><th class="title" colspan="4"><?php echo $strings['Cuadro de honor']; ?>
				<form class="tableActions" action="../Controllers/Torneos_Controller.php" method="post">
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					<input type="hidden" name="grupo" value=<?php echo $this->grupo; ?>>					
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
				while($clasif=$this->clasif->fetch_array()){
					
	
		?>
			<tr>
				<form action="../Controllers/Torneos_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Torneo" value=<?php echo $this->idtorneo; ?>>
					
					<!--Datos-->
					<td><?php echo "$i"; $i = $i+1;?></td>
					<td><?php echo $clasif['usuarios_login']; ?></td>
					<td><?php echo $clasif['usuarios_login1']; ?></td>
					<td><?php echo $clasif['PJ_SF']; ?></td>
					<td><?php echo $clasif['PG_SF']; ?></td>
					<td><?php echo $clasif['PP_SF']; ?></td>
					<td><?php echo $clasif['PtosSuperFinal']; ?></td>
					<td><?php echo $clasif['SF_SF']; ?></td>
					<td><?php echo $clasif['SC_SF']; ?></td>
					<td><?php echo $clasif['JF_SF']; ?></td>
					<td><?php echo $clasif['JC_SF']; ?></td>
					
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