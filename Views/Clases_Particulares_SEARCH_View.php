
<?php
 //Declaracion de la clase
 if(isset($_SESSION['tipo'])){
 if($_SESSION['tipo'] == "ADMIN"){
    class Clases_Particulares_SEARCH {
		
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
        <form class="formB" id="searchForm" enctype="multipart/form-data" method="post" action="../Controllers/Clases_Particulares_Controller.php">
            <legend><?php echo $strings['Buscar clase'];?>
            <!--Boton para volver atras-->
			<button onclick="location.href='../Controllers/Clases_Particulares_Controller.php';" class="volver"></button>
            </legend>

            <input hidden type="text" id="password" name="password" maxlength="25" size="40"/>
            <!--Campo login del usuario-->	
			<div class="form-group">
                <label for="login_usuario"><?php echo $strings['Usuario']; ?></label>
                <input type="text" id="login_usuario" name="login_usuario" />
            </div>	
			<br>
			 <!--Campo nombre del usuario-->
            <div class="form-group">
                <label for="login_entrenador"><?php echo $strings['Entrenador']; ?></label>
                <input type="text" id="login_entrenador" name="login_entrenador" maxlength="50" size="40"/>
            </div>
			<br>
			<!--Campo apellidos del usuario-->
            <div class="form-group">
                <label for="fecha_clase"><?php echo $strings['Fecha']; ?></label>
                <input type="text" id="fecha_clase" name="fecha_clase" maxlength="25" size="40"/>
            </div>
			<br>
			<!--Campo DNI del usuario-->
           <label>
					<?php echo $strings['Hora']; ?></label>
					<select name = "hora_clase">
						<option value=""></option>
						<option value="08:00">08:00</option>
						<option value="09:30">09:30</option>
						<option value="11:00">11:00</option>
						<option value="12:30">12:30</option>
						<option value="14:00">14:00</option>
						<option value="15:30">15:30</option>
						<option value="17:00">17:00</option>
						<option value="18:30">18:30</option>
						<option value="20:00">20:00</option>
						<option value="21:30">21:30</option>
				</select>	<br>
			<!--Campo email del usuario-->
            <div class="form-group">
                <label for="ID_Pista"><?php echo $strings['Pista']; ?></label>
                <input type="text" id="ID_Pista" name="ID_Pista" >
            </div><br>
			
			
		   <!--Boton de confirmar busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
 }else if($_SESSION['tipo'] == 'NORMAL'){
	 class Clases_Particulares_SEARCH {
		
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
        <form class="formB" id="searchForm" enctype="multipart/form-data" method="post" action="../Controllers/Clases_Particulares_Controller.php">
            <legend><?php echo $strings['Buscar clase'];?>
            <!--Boton para volver atras-->
			<button onclick="location.href='../Controllers/Clases_Particulares_Controller.php';" class="volver"></button>
            </legend>
           
            <div class="form-group">
                <label for="login_entrenador"><?php echo $strings['Entrenador']; ?></label>
                <input type="text" id="login_entrenador" name="login_entrenador" maxlength="50" size="40"/>
            </div>
			<!--Campo apellidos del usuario-->
            <div class="form-group">
                <label for="fecha_clase"><?php echo $strings['Fecha']; ?></label>
                <input type="text" id="fecha_clase" name="fecha_clase" maxlength="25" size="40"/>
            </div>
			<!--Campo DNI del usuario-->
           <label>
					<?php echo $strings['Hora']; ?></label>
					<select name = "hora_clase">
						<option value=""></option>
						<option value="08:00">08:00</option>
						<option value="09:30">09:30</option>
						<option value="11:00">11:00</option>
						<option value="12:30">12:30</option>
						<option value="14:00">14:00</option>
						<option value="15:30">15:30</option>
						<option value="17:00">17:00</option>
						<option value="18:30">18:30</option>
						<option value="20:00">20:00</option>
						<option value="21:30">21:30</option>
				</select>	

			<br>
            <div class="form-group">
                <label for="ID_Pista"><?php echo $strings['Pista']; ?></label>
                <input type="text" id="ID_Pista" name="ID_Pista" >
            </div>
			
			<br>
		   <!--Boton de confirmar busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
 }else if($_SESSION['tipo'] == 'ENTRENADOR'){
	 class Clases_Particulares_SEARCH {
		
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
        <form class="formB" id="searchForm" enctype="multipart/form-data" method="post" action="../Controllers/Clases_Particulares_Controller.php">
            <legend><?php echo $strings['Buscar clase'];?>
            <!--Boton para volver atras-->
			<button onclick="location.href='../Controllers/Clases_Particulares_Controller.php';" class="volver"></button>
            </legend>
           
            <div class="form-group">
                <label for="login_usuario"><?php echo $strings['Usuario']; ?></label>
                <input type="text" id="login_usuario" name="login_usuario" maxlength="50" size="40"/>
            </div>
			<!--Campo apellidos del usuario-->
            <div class="form-group">
                <label for="fecha_clase"><?php echo $strings['Fecha']; ?></label>
                <input type="text" id="fecha_clase" name="fecha_clase" maxlength="25" size="40"/>
            </div>
			<!--Campo DNI del usuario-->
           <label>
					<?php echo $strings['Hora']; ?></label>
					<select name = "hora_clase">
						<option value=""></option>
						<option value="08:00">08:00</option>
						<option value="09:30">09:30</option>
						<option value="11:00">11:00</option>
						<option value="12:30">12:30</option>
						<option value="14:00">14:00</option>
						<option value="15:30">15:30</option>
						<option value="17:00">17:00</option>
						<option value="18:30">18:30</option>
						<option value="20:00">20:00</option>
						<option value="21:30">21:30</option>
				</select>	

			<br>
            <div class="form-group">
                <label for="ID_Pista"><?php echo $strings['Pista']; ?></label>
                <input type="text" id="ID_Pista" name="ID_Pista" >
            </div>
			
			<br>
		   <!--Boton de confirmar busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
 }
 }
?>
