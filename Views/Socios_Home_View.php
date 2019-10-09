<!-- VISTA PARA PROMOCIONAR HACERSE SOCIO
CREADO POR: 
Fecha: -->
  <?php
 //Declaracion de la clase 
 class Socios_Home{	 
	
	//Variable con el enlace al form de ADD pista
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

<!--Formulario para añadir categoria
  <form name="Form" id="registerForm" action="../Controllers/Pistas_Controller.php" method="post" onsubmit="return comprobarCategoria(this);" >
    <legend><?php echo $strings['Añadir pista']; ?>
	<!--Boton para volver atrás
    <button type="button" onclick="location.href='../Controllers/Pistas_Controller.php';" class="volver"></button>
    </legend>-->
	
	
<!--Campo nombre de la pista-->
    <div>	
      <p>
      	Si eres un apasionado de la fotografía, si eres un amante de la naturaleza o te preocupa su conservación, tienes un sitio en AEFONA. La Asociación se creó para compartir, divulgar y promover la fotografía de naturaleza.
      </p>
      <p>
      	AEFONA te ofrece la oportunidad de conocer, compartir y disfrutar de una afición con más auge cada día. Conocer a más fotógrafos con tus mismos gustos, compartir conocimientos y experiencias de campo y disfrutar viendo buenas fotos de naturaleza. Desde la Asociación representamos tu trabajo y lo promovemos a nivel internacional desde nuestra web y publicaciones.
      </p>

      
    </div>
    <!--Boton de confirmar inserción-->
    <button type="submit" name="action" value="Confirmar_ADD2" class="aceptar"></button>
	<!--Boton de borrado de texto-->
    <button type="reset" value="Reset" class="cancelar"></button>

	</form>
 
 
 <?php
  }
}
 ?>