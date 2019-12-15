 
<?php
  //Declaracion de la clase
 class Reservas_ADD_Tarjeta{	 
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
  <form name="Form" id="registerForm" action="../Controllers/Reservas_Controller.php" method="post" enctype="multipart/form-data" >
    <legend><?php echo $strings['Añadir reserva']; ?>
	<!--Boton para volver atras-->
    <button type="button" onclick="location.href='../Controllers/Reservas_Controller.php';" class="volver"></button>
    </legend>

    <div>	
		
      <label for="CCV"><?php echo $strings['CCV']; ?></label>
      <input type="text" id="CCV" name="CCV" size="5"   onblur=" return !comprobarVacio(this) && comprobarIBAN(this,4);" />
	
     
		
      <label for="num_tarjeta"><?php echo $strings['Numero de tarjeta']; ?></label>
      <input type="text" id="num_tarjeta" name="num_tarjeta" size="22"  onblur=" return !comprobarVacio(this) && comprobarCuenta(this,20);" />
       
	  
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