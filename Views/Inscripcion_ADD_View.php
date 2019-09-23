

<?php
 //Declaracion de la clase
class Inscripcion_ADD{
	 
	var $fila;
	//Prioridades para añadir a la tarea (solo 1)
	var $usuarios;
	var $torneo;
	var $id_torneo;
	var $enlace;	
	//Constructor de la clase
	function __construct($usuarios,$torneo,$id_torneo,$enlace){
				
		$this -> usuarios = $usuarios;
		$this -> torneo = $torneo;
		$this -> id_torneo = $id_torneo;
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
					
						
					
					<!--Categorias-->
					<label>
					<?php echo $strings['Jugadores']; ?></label><br>
					<select name="parejas_usuarios_login1">
						<?php
							while($usuarios=$this->usuarios->fetch_array()){
						?>
						<!--Usa la PK aunque muestre el nombre de la categoria-->
								<option value="<?php echo $usuarios[0];?>"><?php echo $usuarios['login'];?>

								</option>
						<?php
							}
						?>
					</select>
					<input type="hidden" name="torneos_ID_Torneo" value="<?php echo $this -> id_torneo;?>">
					
				</div>
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