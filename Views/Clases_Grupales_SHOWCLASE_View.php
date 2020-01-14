<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';


 class Clases_Grupales_SHOWCLASE{	 

	//Variable con el enlace al showall
	var $apuntados;	
	var $num_sesiones;	
	var $datos;	
	var $enlace;	
	//Constructor de la clase
	function __construct($apuntados,$num_sesiones,$datos,$enlace){
		$this -> apuntados = $apuntados;
		$this -> num_sesiones = $num_sesiones;
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

<div class="showall">   
     <table class="asistencia">
			<tr><th style="border:none;background: #FFF;" class="title" colspan="4"><?php echo $strings['Asistencia']; ?>
			<form class="tableActions" action="../Controllers/Clases_Grupales_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			<button class="refrescar" name="action" value="Confirmar_Edit_SHOWCLASE" type="submit"></button>
			<input type="hidden" name="ID_Clase" value="<?php echo $this -> apuntados -> fetch_array()[0]; ?>">
			</form></th></tr>
	<!--Campos Categoria,nombre,Edicion,Fecha,Nivel -->
			<tr>
			
				<th style="border-left:none;border-top:none;background: #FFF"></th>
				<?php
					for ($i=1; $i <= $this->num_sesiones; $i++) { 
						?>
						<th><?php echo $strings['Dia'];echo " $i" ?></th>
						<?php
					}
				?>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		$this -> apuntados -> data_seek(0);
			while($fila = $this -> apuntados->fetch_array()){                        
		?>
			<tr>
				<form action="../Controllers/Clases_Grupales_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Clase" value="<?php echo $fila['ID_Clase']; ?>">
					<!--Datos-->
					
					<td style="border:1px solid black;border-left:none;border-collapse:collapse;"><?php echo $fila['login_usuario']; ?></td>	
					
					<?php
					for ($i=1; $i <= $this->num_sesiones; $i++) { 
						?>
						<td><?php if($fila['dia'.$i] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>
						<?php
					}
				?>
									
				</form>
			</tr>
		<?php
			}
		?>                    
		</table>  
			       
	</div> 


<div class="showall">   
     <table class="showAllUsers" style="width:50%;">
			<tr><th class="title" colspan="4"><?php echo $strings['Clases']; ?>
			<form class="tableActions" action="../Controllers/Usuarios_Controller.php" method="">
			</form></th></tr>
			<!--Campos a mostrar-->
			<tr>
				<th><?php echo $strings['Dia']; ?></th>
				<th><?php echo $strings['Fecha']; ?></th>
				<th><?php echo $strings['Hora']; ?></th>
				<th><?php echo $strings['Pista']; ?></th>
				
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		$j = 1;	
			while($fila = $this ->datos->fetch_array()){                        
		?>
			<tr>
				<form action="../Controllers/Usuarios_Controller.php" method="post" name="action" >
					<input type="hidden" name="login" value="<?php echo $fila['login']; ?>">
					<!--Datos-->
					<td><?php echo $strings['Dia'];echo " $j"; $j = $j+1;?></td>
					<td><?php echo $fila['fecha_clase']; ?></td>
					<td><?php echo $fila['hora_clase']; ?></td>
					<td><?php echo $fila['Nombre_Pista']; ?></td>	
					<td style="text-align:right;background:#FFF">
				
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

