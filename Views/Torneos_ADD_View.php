<?php
  //Declaracion de la clase
 class Torneos_ADD{	 
//Variable con el enlace al form de ADD torneo
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
<!--Formulario para añadir torneo-->
  <form name="Form" id="registerForm" action="../Controllers/Torneos_Controller.php" method="post" enctype="multipart/form-data" >
    <legend><?php echo $strings['Añadir torneo']; ?>
	<!--Boton para volver atrás -->
    <button type="button" onclick="location.href='../Controllers/Torneos_Controller.php';" class="volver"></button>
    </legend>

    <div>	
		 
		  <label for="nombre"><?php echo $strings['Nombre']; ?></label>
		  <input type="text" name="nombre" id="nombre" size="40"  onblur=" return !comprobarVacio(this) && comprobarTexto(this,45);"/>
		  
		  <label for="categoria"><?php echo $strings['Categoria']; ?></label>
		<select name="categoria" id="categoria">
		<option value="Masculina"><?php echo $strings['Masculina']; ?></option>
		<option value="Femenina"><?php echo $strings['Femenina']; ?></option>
		<option value="Mixta"><?php echo $strings['Mixta']; ?></option>
		</select>
		  
		  <label for="edicion"><?php echo $strings['Edicion']; ?></label>
		  <input type="text" name="edicion" id="edicion" size="7"  onblur=" return !comprobarVacio(this) && comprobarEntero(this,0,9999);" />
		  
		  <label for="fecha"><?php echo $strings['Fecha']; ?></label>
		  <input id="fecha" type="text" name="fecha" size="18" class="tcal" value="" onblur=" return comprobarFecha(this)">
		  
		  <label for="nivel"><?php echo $strings['Nivel']; ?></label>
		  <input type="nivel" id="nivel" name="nivel" size="5" onblur=" return !comprobarVacio(this) && comprobarEntero(this,0,99);"/>
		  
		  
      
    </div>
    <!--Boton de confirmar inserción-->
    <button type="submit" name="action" value="Confirmar_ADD" class="aceptar"></button>
    <!--Boton de borrado de texto-->
	<button type="reset" value="Reset" class="cancelar"></button>

	</form>
 
 
 <?php
  }
}
 ?>