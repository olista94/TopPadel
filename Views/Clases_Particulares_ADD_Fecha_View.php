
<?php
 //Declaracion de la clase 
class Clases_Particulares_ADD_Fecha{
	 //Id de la tarea a la que pertenece la fase a añadir

	//Variable con el enlace al form de ADD fase
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
<!--Formulario para añadir fase-->
		<div class="form">
 
			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Clases_Particulares_Controller.php" enctype="multipart/form-data" onsubmit="return comprobarFechaReserva(this)">
				<legend><?php echo $strings['Añadir fecha'];?>
				<button type="button" type="button" onClick="history.go(-1);" class="volver"></button>
				</legend>

				<div>
				<!--Campo descripcion de la fase-->
				<?php
					$hoy = date('Y-m-d');
					$date=date_create($hoy);
					date_add($date,date_interval_create_from_date_string("1 day"));
					$mañana = date_format($date,"Y-m-d");
				?>

				<label for="fecha_clase"><?php echo $strings['Fecha']; ?></label>
				<input type="date" id="fecha_clase" name="fecha_clase" min="<?php echo "$mañana";?>" onblur=" return comprobarFecha(this)" >
					
				</div>
				
				<!--Boton para finalizar-->
				<button type="submit" name="action" value="Confirmar_ADD_Fecha" class="aceptar"></button>
				<!--Boton de borrado de texto-->
				<button type="reset" value="Reset" class="cancelar"></button>

			</form> 
		</div> 
<?php
	}
}
?>