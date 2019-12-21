
<?php
 //Declaracion de la clase 
class Clinics_ADD_Pago{
	//Descripcion de la tarea a la que pertenece la fase a añadir
	var $idclase;
	
	var $enlace;	
	//Constructor de la clase
	function __construct($idclase,$enlace){
				
		$this -> idclase = $idclase;	
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

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Clinics_Controller.php" enctype="multipart/form-data">
				<input type = "hidden" name = "ID_Clase" value = '<?php echo $this->idclase; ?>'>

				<legend><?php echo $strings['Añadir clase'];?>
				</legend>

				<div>
					<input type="radio" name="pago" value="Paypal" checked> <?php echo $strings['Paypal'];?><br>
					<input type="radio" name="pago" value="Tarjeta"> <?php echo $strings['Tarjeta'];?><br>
					<input type="radio" name="pago" value="Contrareembolso"> <?php echo $strings['Efectivo'];?>
				</div>

				<!--Boton para finalizar-->
				<button type="submit" name="action" value="Confirmar_ADD_Pago" value="Submit" class="aceptar"></button>
				

			</form> 
		</div> 
<?php
	}
}
?> 