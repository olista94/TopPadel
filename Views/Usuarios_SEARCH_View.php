
<?php
 //Declaracion de la clase
 if(isset($_SESSION['tipo'])){
 if($_SESSION['tipo'] == "ADMIN"){
    class Usuarios_SEARCH {
		
//Variable con el enlace al form para SEARCH usuaro
      var $enlace;

//Constructor de la clase	
      function __construct($enlace){

        $this -> enlace = $enlace;
        $this->pinta();

      }
//Funcion que "muestra" el contenido de la página
      function pinta(){
        //Variable de idioma 
        if(!isset($_SESSION['idioma'])){
            $_SESSION['idioma'] = 'SPANISH';
        }
//Archivo del idioma
        include '../Locales/Strings_'. $_SESSION['idioma'] .'.php';

        ?>
         <!--Form para buscar un usuario-->
        <form class="formB" id="searchForm" enctype="multipart/form-data" method="post" action="../Controllers/Usuarios_Controller.php">
            <legend><?php echo $strings['Buscar usuario'];?>
            <!--Boton para volver atras-->
			<button onclick="location.href='../Controllers/Usuarios_Controller.php';" class="volver"></button>
            </legend>

            <input hidden type="text" id="password" name="password" maxlength="25" size="40"/>
            <!--Campo login del usuario-->	
			<div class="form-group">
                <label for="login"><?php echo $strings['Login']; ?></label>
                <input type="text" id="login" name="login" />
            </div>	
			 <!--Campo nombre del usuario-->
            <div class="form-group">
                <label for="nombre"><?php echo $strings['Nombre']; ?></label>
                <input type="text" id="nombre" name="nombre" maxlength="50" size="40"/>
            </div>
			<!--Campo apellidos del usuario-->
            <div class="form-group">
                <label for="apellidos"><?php echo $strings['Apellidos']; ?></label>
                <input type="text" id="apellidos" name="apellidos" maxlength="25" size="40"/>
            </div>
			<!--Campo DNI del usuario-->
            <div class="form-group">
                <label for="dni"><?php echo $strings['DNI']; ?></label>
                <input type="text" id="dni" name="dni" />
            </div>	
			<!--Campo email del usuario-->
            <div class="form-group">
                <label for="email"><?php echo $strings['Correo electronico']; ?></label>
                <input type="text" id="email" name="email" maxlength="50" size="40"/>
            </div>
			<!--Campo fecha de nacimiento del usuario-->
            <div class="form-group">
                <label for="fecha"><?php echo $strings['Fecha de nacimiento']; ?></label>
                <input type="text" id="fecha" name="fecha" />
            </div>
			<!--Campo telefono del usuario-->
            <div class="form-group">
                <label for="telefono"><?php echo $strings['Telefono']; ?></label>
                <input type="text" id="telefono" name="telefono" maxlength="11"/>
            </div>	
			<!--Campo tipo del usuario (ADMIN O NORMAL)-->
			<div class="form-group">
		<label for="tipo"><?php echo $strings['Tipo']; ?></label>
	  <select name="tipo" id="tipo">
		<option value=""></option selected>
		<option value="ADMIN"><?php echo $strings['Admin']; ?></option>
		<option value="ENTRENADOR"><?php echo $strings['Entrenador']; ?></option>
		<option value="NORMAL"><?php echo $strings['Deportista']; ?></option>
	  </select>
	  </div>
		   
		   <div class="form-group">
		   <label for="sexo"><?php echo $strings['Sexo']; ?></label>
	  <select name="sexo" id="sexo">
		<option value=""></option selected>
		<option value="Masculina"><?php echo $strings['Hombre']; ?></option>
		<option value="Femenina"><?php echo $strings['Mujer']; ?></option>
	  </select>
	  </div>
	  
			<div class="form-group">
				<label for="socio"><?php echo $strings['Socio']; ?></label>
					<select name="socio" id="socio">
						<option value=""></option selected>
						<option value="SI"><?php echo $strings['SI']; ?></option>
						<option value="NO"><?php echo $strings['NO']; ?></option>
					</select>
			</div>
			<br>
	   <div class="form-group">
                <label for="IBAN"><?php echo $strings['IBAN']; ?></label>
                <input type="text" id="IBAN" name="IBAN" maxlength="11"/>
            </div>	
			
			 <div class="form-group">
                <label for="cuenta"><?php echo $strings['Cuenta']; ?></label>
                <input type="text" id="cuenta" name="cuenta" maxlength="20"/>
            </div>	
			<br>
			
		   <!--Boton de confirmar busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
 }else{
	 class Usuarios_SEARCH {
		
//Variable con el enlace al form para SEARCH usuaro
      var $enlace;

//Constructor de la clase	
      function __construct($enlace){

        $this -> enlace = $enlace;
        $this->pinta();

      }
//Funcion que "muestra" el contenido de la página
      function pinta(){
        //Variable de idioma 
        if(!isset($_SESSION['idioma'])){
            $_SESSION['idioma'] = 'SPANISH';
        }
//Archivo del idioma
        include '../Locales/Strings_'. $_SESSION['idioma'] .'.php';

        ?>
         <!--Form para buscar un usuario-->
        <form class="formB" id="searchForm" enctype="multipart/form-data" method="post" action="../Controllers/Usuarios_Controller.php">
            <legend><?php echo $strings['Buscar usuario'];?>
            <!--Boton para volver atras-->
			<button onclick="location.href='../Controllers/Usuarios_Controller.php';" class="volver"></button>
            </legend>

            <input hidden type="text" id="password" name="password" maxlength="25" size="40"/>
            <!--Campo login del usuario-->	
			<div class="form-group">
                <label for="login"><?php echo $strings['Login']; ?></label>
                <input type="text" id="login" name="login" />
            </div>	
			<br>
			 <!--Campo nombre del usuario-->
            <div class="form-group">
                <label for="nombre"><?php echo $strings['Nombre']; ?></label>
                <input type="text" id="nombre" name="nombre" maxlength="50" size="40"/>
            </div>
			<br>
			<!--Campo apellidos del usuario-->
            <div class="form-group">
                <label for="apellidos"><?php echo $strings['Apellidos']; ?></label>
                <input type="text" id="apellidos" name="apellidos" maxlength="25" size="40"/>
            </div>
		<br>
		
		   
		   <div class="form-group">
		   <label for="sexo"><?php echo $strings['Sexo']; ?></label>
	  <select name="sexo" id="sexo">
		<option value=""></option selected>
		<option value="Masculina"><?php echo $strings['Hombre']; ?></option>
		<option value="Femenina"><?php echo $strings['Mujer']; ?></option>
	  </select>
	  </div>
	  <br>
			
		   <!--Boton de confirmar busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
 }
 }
?>
