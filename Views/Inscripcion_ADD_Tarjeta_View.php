 
<?php
  //Declaracion de la clase
 class Inscripcion_ADD_Tarjeta{	 
//Variable con el enlace al form de ADD Socio
	var $idtorneo;
	var $enlace;	
	//Constructor de la clase
	function __construct($idtorneo,$enlace){
		$this -> idtorneo = $idtorneo;
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
  <form name="Form" id="registerForm" action="../Controllers/Inscripcion_Controller.php" method="post" enctype="multipart/form-data" onsubmit="return comprobarTarjeta(this)">
					<input type = "hidden" name = "torneos_ID_Torneo" value = '<?php echo $this->idtorneo; ?>'>
					
    <legend><?php echo $strings['Añadir pago']; ?>
	<!--Boton para volver atras-->
    </legend>

    <div>	
		
      <label for="CCV"><?php echo $strings['CCV']; ?></label>
      <input type="text" id="CCV" name="CCV" size="5"   onblur=" return !comprobarVacio(this) && comprobarCCV(this,3);" />
		
      <label for="num_tarjeta"><?php echo $strings['Numero de tarjeta']; ?></label>
      <input type="text" id="num_tarjeta" name="num_tarjeta" size="22"  onblur=" return !comprobarVacio(this) && comprobarNumTarjeta(this,16);" />
       
	  
    </div>
     
    <button type="submit" name="action" value="Confirmar_ADD_Tarjeta" class="aceptar"></button>
	
    <button type="reset" value="Reset" class="cancelar"></button>

	</form>
 
 
 <?php
  }
}
 ?>