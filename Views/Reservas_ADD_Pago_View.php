
<?php
 //Declaracion de la clase 
class Reservas_ADD_Pago{
	//Descripcion de la tarea a la que pertenece la fase a añadir
	var $fecha_reserva;
	var $hora_reserva;
	var $pista;
	var $enlace;	
	//Constructor de la clase
	function __construct($fecha_reserva,$hora_reserva,$pista,$enlace){
				
		$this -> fecha_reserva = $fecha_reserva;
		$this -> hora_reserva = $hora_reserva;
		$this -> pista = $pista;
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

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Reservas_Controller.php" enctype="multipart/form-data">
				<input type = "hidden" name = "fecha_reserva" value = '<?php echo $this->fecha_reserva; ?>'>
					<input type = "hidden" name = "hora_inicio" value = '<?php echo $this->hora_reserva; ?>'>
					<input type = "hidden" name = "pista_ID_Pista" value = '<?php echo $this->pista; ?>'>
				<legend><?php echo $strings['Añadir reserva'];?>
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