

<?php
 //Declaracion de la clase
class Inscripcion_ADD{
	 
	var $fila;
	var $torneo;
	var $id_torneo;
	var $disponibles;
	var $enlace;	
	//Constructor de la clase
	function __construct($torneo,$id_torneo,$disponibles,$enlace){
				

		$this -> torneo = $torneo;
		$this -> id_torneo = $id_torneo;
		$this -> disponibles = $disponibles;
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

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Inscripcion_Controller.php" enctype="multipart/form-data">
				<legend><?php echo $strings['Elegir pareja'];?>
				<!--Boton para volver atras-->
				<button type="button" type="button" onclick="location.href='../Controllers/Inscripcion_Controller.php';" class="volver"></button>
				</legend>
				<div>
					
						
					
					<label>
					<?php echo $strings['Jugadores']; ?></label>
					<select name = "usuarios_login1">
					
						<?php
						foreach ($this->disponibles as $disp){
							echo "<option value = '".$disp."'>".$disp."</option>";
						}
						?>

				</select>
					<input type="hidden" name="torneos_ID_Torneo" value="<?php echo $this -> id_torneo;?>">
					
				</div>
				<!--Boton para añadir la tarea y pasar a añadir fases-->
				<button type="submit" name="action" value="Confirmar_INSCRIPCION2" value="Submit" class="aceptar"></button>
				

			</form> 
		</div> 
<?php
	}
}
?>