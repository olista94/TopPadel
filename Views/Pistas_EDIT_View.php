<!-- FORMULARIO PARA EDITAR UNA PISTA 
CREADO POR: Los Cangrejas
Fecha: 20/12/2018-->

<?php
 //Declaracion de la clase 
class Pistas_EDIT{
	 
	 //Datos de la categoria
	var $datos;
	//Variable con el enlace al form EDIT categoria
	var $enlace;
	var $fila;	
	
	//Constructor de la clase
	function __construct($datos,$enlace){
				
		$this -> datos = $datos;
		$this -> enlace = $enlace;
		$this -> fila = $this -> datos -> fetch_array();
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
<!--Formulario para editar categoria-->
		<div class="form">

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Pistas_Controller.php" enctype="multipart/form-data" onsubmit="return comprobarPista(this);">
				<legend><?php echo $strings['Editar pista'];?>
				<!--Boton para volver atrás -->
				<button type="button" onclick="location.href='../Controllers/Pistas_Controller.php';" class="volver"></button>
				</legend>
<!--Id de la categoria que se pasara como hidden al model-->
				<input hidden type="text" name="ID_Pista"  value="<?php echo $this -> fila[0]; ?>" readonly><br>	
<!--Campo nombre de la categoria-->
				<div>	
				  <label ><?php echo $strings['Nombre de la pista']; ?></label>
				  <input type="text" id="Nombre_Pista" name="Nombre_Pista" size="50" value="<?php echo $this -> fila['Nombre_Pista']; ?>" onblur=" return !comprobarVacio(this) && comprobarTextoyNumeros(this,45);">
				
				
				<label ><?php echo $strings['Cubierta']; ?></label>
					<select name="techo" id="techo">
						<option value="Interior" <?php if($this -> fila['techo'] == 'Interior') echo "selected"; ?>><?php echo $strings['Interior']; ?></option>
						<option value="Exterior" <?php if($this -> fila['techo'] == 'Exterior') echo "selected"; ?>><?php echo $strings['Exterior']; ?></option>
					</select>  
	
				<label ><?php echo $strings['Suelo']; ?></label>
					<select name="suelo" id="suelo">
						<option value="Dura" <?php if($this -> fila['suelo'] == 'Dura') echo "selected"; ?>><?php echo $strings['Dura']; ?></option>
						<option value="Blanda" <?php if($this -> fila['suelo'] == 'Blanda') echo "selected"; ?>><?php echo $strings['Blanda']; ?></option>
					</select>  

				</div>
				<!--Boton de confirmar editado-->
				<button type="submit" name="action" value="Confirmar_EDIT2" value="Submit" class="aceptar"></button>
				<!--Boton de borrado-->
				<button type="reset" value="Reset" class="cancelar"></button>

			</form> 
		</div> 
<?php
	}
}
?>