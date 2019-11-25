
<?php
 //Declaracion de la clase 
class Clases_Particulares_ADD_Pista{

	var $pistasLibres;
	var $fecha_clase;
	var $hora_clase;
	
	var $enlace;	

	function __construct($pistasLibres,$fecha_clase,$hora_clase,$enlace){
				
		$this -> pistasLibres = $pistasLibres;
		$this -> fecha_clase = $fecha_clase;
		$this -> hora_clase = $hora_clase;
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
<!--Formulario para añadir fase-->
		<div class="form">

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Clases_Particulares_Controller.php" enctype="multipart/form-data">
				<input type = "hidden" name = "fecha_clase" value = '<?php echo $this->fecha_clase; ?>'>
				<input type = "hidden" name = "hora_clase" value = '<?php echo $this->hora_clase; ?>'>
				<input type = "hidden" name = "ID_Pista" value = '<?php echo $this->ID_Pista; ?>'>
				<legend><?php echo $strings['Añadir pista'];?>
				</legend>

				<div>

					<label>
					<?php echo $strings['Pista']; ?></label>
					<select name="ID_Pista">
						<?php
							while($pistasLibres=$this->pistasLibres->fetch_array()){
						?>
								<option value="<?php echo $pistasLibres[0];?>"><?php echo $pistasLibres[1];?>

								</option>
						<?php
							}
						?>
					</select>
					<br>

				<!--Boton para finalizar-->
				<button type="submit" name="action" value="Confirmar_ADD_Pista" value="Submit" class="aceptar"></button>
				

			</form> 
		</div> 
<?php
	}
}
?> 