 
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
  <form name="Form" id="registerForm" action="../Controllers/Usuarios_Controller.php" method="post" enctype="multipart/form-data" onsubmit="return comprobarSocio(this)">
    <legend><?php echo $strings['Añadir socio']; ?>
	<!--Boton para volver atras-->
    <button type="button" onclick="location.href='../Controllers/Usuarios_Controller.php';" class="volver"></button>
    </legend>

    <div>	
		
      <label for="IBAN"><?php echo $strings['IBAN']; ?></label>
      <input type="text" id="IBAN" name="IBAN" size="5"   onblur=" return !comprobarVacio(this) && comprobarIBAN(this,4);" />
	
     
		
      <label for="cuenta"><?php echo $strings['Cuenta']; ?></label>
      <input type="text" id="cuenta" name="cuenta" size="22"  onblur=" return !comprobarVacio(this) && comprobarCuenta(this,20);" />
       
	  
    </div>
     <!--Boton para confirmar insercion-->
    <button type="submit" name="action" value="Confirmar_Socio" class="aceptar"></button>
	<!--Boton para borrar texto-->
    <button type="reset" value="Reset" class="cancelar"></button>

	</form>
 
 
 <?php
  }
}
 ?>