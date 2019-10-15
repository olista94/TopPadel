<!-- VISTA PARA AÑADIR UN NUEVO Socios_ADD
CREADO POR:										 		
Fecha: -->		  
<?php
  //Declaracion de la clase
 class Socios_ADD{	 
//Variable con el enlace al form de ADD Socio
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
<!--Formulario para añadir socio-->
  <form name="Form" id="registerForm" action="../Controllers/Usuarios_Controller.php" method="post" enctype="multipart/form-data" >
    <legend><?php echo $strings['Añadir socio']; ?> 
	<!--Boton para volver atrás -->
    <!-- <button type="button" onclick="location.href='../Controllers/Usuarios_Controller.php';" class="volver"></button>
    </legend>-->

    <div>	
		 
		  <label for="IBAN"><?php echo $strings['IBAN']; ?></label>
		  <input type="text" name="IBAN" id="nombre" size="40"  onblur=" return !comprobarVacio(this) && comprobarTexto(this,45);"/>
		  
		  <label for="Nº_Cuenta"><?php echo $strings['Nº_Cuenta']; ?></label>
		  <input type="text" name="cuenta" id="nombre" size="15"  onblur=" return !comprobarVacio(this) && comprobarTexto(this,18);"/>	 
		  
      
    </div>
    <!--Boton de confirmar inserción-->
    <button type="submit" name="action" value="Confirmar_Socio" class="aceptar"></button>
    <!--Boton de borrado de texto-->
	<button type="reset" value="Reset" class="cancelar"></button>

	</form>
 
 
 <?php
  }
}
 ?>