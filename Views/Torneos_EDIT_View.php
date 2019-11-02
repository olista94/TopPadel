
<?php
   //Declaracion de la clase
class Torneos_EDIT{	 
	//Datos del torneo
	var $datos;
	//Variable con el enlace al form de EDIT torneo
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
<!--Formulario para editar torneo-->
	<form name="Form" id="registerForm" action="../Controllers/Torneos_Controller.php" method="post" enctype="multipart/form-data" onsubmit="return comprobarTorneo(this)">
    	<legend><?php echo $strings['Editar torneo']; ?>
    	<!--Boton para volver atrás -->
		<button type="button" onclick="location.href='../Controllers/Torneos_Controller.php';" class="volver"></button>
    	</legend>

<input hidden type="text" name="ID_Torneo"  value="<?php echo $this -> fila['ID_Torneo']; ?>" readonly><br>	

   		<div>	
		 
		 <!--Campo nombre del torneo-->
      <label for="nombre"><?php echo $strings['Nombre']; ?></label>
      <input type="text" name="nombre" id="nombre" value="<?php echo $this -> fila['nombre']; ?>" size="48"  onblur=" return !comprobarVacio(this) && comprobarTextoyNumeros(this,45);">
		  
		  <label ><?php echo $strings['Categoria']; ?></label>
				<select name="categoria" id="categoria">
				<option value="Masculina" <?php if($this -> fila['categoria'] == 'Masculina') echo "selected"; ?>><?php echo $strings['Masculina']; ?></option>
				<option value="Femenina" <?php if($this -> fila['categoria'] == 'Femenina') echo "selected"; ?>><?php echo $strings['Femenina']; ?></option>
				<option value="Mixta" <?php if($this -> fila['categoria'] == 'Mixta') echo "selected"; ?>><?php echo $strings['Mixta']; ?></option>
			</select> 
		  


      <label for="edicion"><?php echo $strings['Edicion']; ?></label>
      <input type="number" name="edicion" id="edicion" value="<?php echo $this -> fila['edicion']; ?>" style="width: 75px;" onblur=" return !comprobarVacio(this) && comprobarEntero(this,0,9999);" />
		
		
      <label for="fecha"><?php echo $strings['Fecha']; ?></label>
		<input type="date" name="fecha" size="18" value="<?php echo $this -> fila['fecha']; ?>" onblur=" return comprobarFecha(this)">
		  
		  <label for="nivel"><?php echo $strings['Nivel']; ?></label>
      <input type="number" min="1" max="3" name="nivel" id="nivel" value="<?php echo $this -> fila['nivel']; ?>" style="width: 75px;" onblur=" return !comprobarVacio(this) && comprobarEntero(this,1,3);" />
      
    </div>
	
	
        <!--Boton de confirmar editar-->
		<button type="submit" name="action" value="Confirmar_EDIT" class="aceptar"></button>
		<!--Boton de borrado de texto-->
		<button type="reset" value="Reset" class="cancelar"></button>

	</form>
 
 
<?php
  	}
}
 ?>