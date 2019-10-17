

<?php
include '../Views/Header.php';
 //Declaracion de la clase
class Partidos_ADD{
	 
	var $enlace;	
	//Constructor de la clase
	function __construct($enlace){
				

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
<!--Formulario para añadir tarea-->
		<div class="form">

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Partidos_Controller.php" enctype="multipart/form-data">
				<legend><?php echo $strings['Acta del partido'];?>
				<!--Boton para volver atras-->
				<button type="button" type="button" onclick="location.href='../Controllers/Torneos_Controller.php?action=Confirmar_SHOWTORNEO';" class="volver"></button>
				</legend>
				<div style="display:inline-block;margin-right:25%">
					
						
					
					<b><h2><legend>
					<?php echo $strings['Set 1']; ?></legend></h2></b>
					<label>
					<?php echo $strings['Local']; ?></label>
					<input type="number" name="quantity" min="0" max="7">
					<label>
					<?php echo $strings['Visitante']; ?></label>
					<input type="number" name="quantity" min="0" max="7">
					
					
				</div>
				
				<div style="display:inline-block;margin-right:25%">
					
						
					
					<b><h2><legend>
					<?php echo $strings['Set 2']; ?></legend></h2></b>
					<label>
					<?php echo $strings['Local']; ?></label>
					<input type="number" name="quantity" min="0" max="7">
					<label>
					<?php echo $strings['Visitante']; ?></label>
					<input type="number" name="quantity" min="0" max="7">
					
					
				</div>
				
				<div style="display:inline-block;margin-right:0%">
					
						
					
					<b><h2><legend>
					<?php echo $strings['Set 3']; ?></legend></h2></b>
					<label>
					<?php echo $strings['Local']; ?></label>
					<input type="number" name="quantity" min="0" max="7">
					<label>
					<?php echo $strings['Visitante']; ?></label>
					<input type="number" name="quantity" min="0" max="7">
					
					
				</div>
				<br>
				<!--Boton para añadir la tarea y pasar a añadir fases-->
				<button type="submit" name="action" value="Confirmar_INSCRIPCION2" value="Submit" class="aceptar"></button>
				<!--Boton de borrado de texto-->
				<button type="reset" value="Reset" class="cancelar"></button>

			</form> 
		</div> 
<?php
	}
}
?>