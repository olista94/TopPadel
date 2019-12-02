<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';


 class Clases_Grupales_SHOWCLASE_Dia{	 

	//Variable con el enlace al showall
	var $apuntados;	
	var $enlace;	
	//Constructor de la clase
	function __construct($apuntados,$enlace){

		$this -> apuntados = $apuntados;
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
                                

			
			<form class="tableActions" action="../Controllers/Clases_Grupales_has_Usuarios_Controller.php" method="post">
<input type="hidden" name="ID_Clase" value="<?php echo $this -> apuntados -> fetch_array()[0]; ?>">
					<div>
					<label class="lblSearch" for="action">
					<?php echo $strings['Dia']; ?>:</label>
					<select class="slcSearch" name="dia">
					<?php for($i = 1; $i < 11; $i++){
						?>
					<option value="<?php echo 'dia'.$i;?>"><?php echo 'dia'.$i;?></option>
						
						<?php
							}
						?>
					</select>
					
					<ul>
					
						<?php $this -> apuntados -> data_seek(0);
						while($login = $this -> apuntados -> fetch_array()[1]){?>
							
							<li> <label for="tipo"><?php echo $strings['Tipo']; ?></label>
					<select name="<?php echo $login; ?>">
		<option value="0"><?php echo $strings['SI']; ?></option>
		<option value="1"><?php echo $strings['NO']; ?></option>
	  </select> <?php echo $login; ?>
							
							</li>
							<?php
						}
?>						
					
					</ul>
				<button type="submit" name="action" value="Guardar_Asistencia" value="Submit" class="buscar-little"></button>
				
					</div>
					
				</form>
			       
	</div> 	
       
<?php   
    }
}
?>

    
<footer>
<!--Pie de pagina-->
	<?php include '../Views/Footer.php'; ?>
</footer>

