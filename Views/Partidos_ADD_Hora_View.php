<!-- FORMULARIO PARA AÑADIR UNA FASE A UNA TAREA
CREADO POR: Los Cangrejas
Fecha: 26/12/2018-->

<?php
 //Declaracion de la clase 
class Partidos_ADD_Hora{
	//Descripcion de la tarea a la que pertenece la fase a añadir
	var $idpartido;
	var $idtorneo;
	var $fecha;
	var $horas;
	var $enlace;
	//Constructor de la clase
	function __construct($idpartido,$idtorneo,$fecha,$horas,$enlace){
				
		$this -> idpartido = $idpartido;		
		$this -> idtorneo = $idtorneo;
		$this -> fecha = $fecha;
		$this -> horas = $horas;
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

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Partidos_Controller.php" enctype="multipart/form-data">
				<input type = "hidden" name ="ID_Partido" value ="<?php echo $this->idpartido; ?>">
				<input type = "hidden" name ="ID_Torneo" value ="<?php echo $this->idtorneo; ?>">
				<input type = "hidden" name ="fecha" value ="<?php echo $this->fecha; ?>">				
				<legend><?php echo $strings['Hora partido'];?>

				</legend>

				<div>
				<!--Campo descripcion de la fase-->


				<label>
					<?php echo $strings['Hora']; ?></label>
					<select name = "hora">
					
						<?php
						foreach ($this->horas as $horas){
							echo "<option value = '".$horas."'>".$horas."</option>";
						}
						?>

				</select>

				</div>

				<!--Boton para finalizar-->
				<button type="submit" name="action" value="Confirmar_ADD_Hora" value="Submit" class="aceptar"></button>
				<!--Boton de borrado de texto-->
				<button type="reset" value="Reset" class="cancelar"></button>

			</form> 
		</div> 
<?php
	}
}
?> 