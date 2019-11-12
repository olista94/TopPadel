
 <?php
 
  //Declaracion de la clase
 class Usuarios_ADD{
	 
//Variable con el enlace al form para ADD usuaro
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
 <!--Form para registrar un nuevo usuario-->
  <form name="Form" id="registerForm" action="../Controllers/Usuarios_Controller.php" method="post" enctype="multipart/form-data" onsubmit="return comprobarUsuario(this)">
    <legend><?php echo $strings['Añadir usuario']; ?>
	<!--Boton para volver atras-->
    <button type="button" onclick="location.href='../Controllers/Usuarios_Controller.php';" class="volver"></button>
    </legend>

    <div>	
		<!--Campo login del usuario-->	
      <label for="login"><?php echo $strings['Login']; ?></label>
      <input type="text" id="login" name="login" size="40"   onblur=" return !comprobarVacio(this) && comprobarAlfabetico(this,15);" />
		<!--Campo password del usuario--> 
      <label for="password"><?php echo $strings['Contraseña']; ?></label>
      <input type="password" id="password" name="password" size="40"  onblur=" return !comprobarVacio(this) && comprobarAlfabetico(this,20);" />
		<!--Campo DNI del usuario-->
      <label for="dni"><?php echo $strings['DNI']; ?></label>
      <input type="text" id="dni" name="dni" size="20"  onblur=" return !comprobarVacio(this) && comprobarDni(this);" />
        <!--Campo nombre del usuario-->
      <label for="nombre"><?php echo $strings['Nombre']; ?></label>
      <input type="text" name="nombre" id="nombre" size="40"   onblur=" return !comprobarVacio(this) && comprobarTexto(this,30);"/>
		<!--Campo apellidos del usuario-->
      <label for="apellidos"><?php echo $strings['Apellidos']; ?></label>
      <input type="text" name="apellidos" id="apellidos" size="55"  onblur=" return !comprobarVacio(this) && comprobarTexto(this,50);" />
		<!--Campo telefono del usuario-->
      <label for="telefono"><?php echo $strings['Teléfono']; ?></label>
      <input type="text" name="telefono" id="telefono" size="20" onblur=" return !comprobarVacio(this) && comprobarTelf(this);" />
		<!--Campo email del usuario-->
      <label for="email"><?php echo $strings['Correo electronico']; ?></label>
      <input type="email" id="email" name="email" size="65"  onblur=" return !comprobarVacio(this) && comprobarEmail(this,60);" />	
		<!--Campo fecha de nacimiento del usuario-->
      <label for="fecha"><?php echo $strings['Fecha de nacimiento']; ?></label>
	  <input type="date" name="fecha" size="18" class="tcal"  onblur=" return comprobarFecha(this)" >
	  
	   <!--Campo tipo del usuario (ADMIN O NORMAL)-->
	  <label for="tipo"><?php echo $strings['Tipo']; ?></label>
	  
      <select name="tipo" id="tipo">
		<option value="NORMAL"><?php echo $strings['Deportista']; ?></option>
		<option value="ADMIN"><?php echo $strings['Admin']; ?></option>
	  </select>
      
	  <label for="sexo"><?php echo $strings['Sexo']; ?></label>
	  <select name="sexo" id="sexo">
		<option value="Masculina"><?php echo $strings['Hombre']; ?></option>
		<option value="Femenina"><?php echo $strings['Mujer']; ?></option>
	  </select>
	  
    </div>
     <!--Boton para confirmar insercion-->
    <button type="submit" name="action" value="Confirmar_ADD" class="aceptar"></button>
	<!--Boton para borrar texto-->
    <button type="reset" value="Reset" class="cancelar"></button>

	</form>
 
 
 <?php
  }
}
 ?>