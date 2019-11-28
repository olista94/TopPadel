
<?php
 //Declaracion de la clase
 if(isset($_SESSION['tipo'])){
 if($_SESSION['tipo'] == "ADMIN" || $_SESSION['tipo'] == "NORMAL"){
    class Clases_Grupales_SEARCH {
		
//Variable con el enlace al form para SEARCH usuaro
      var $pista;
      var $enlace;

//Constructor de la clase	
      function __construct($pista,$enlace){
		$this -> pista = $pista;
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
        <form class="formB" id="searchForm" enctype="multipart/form-data" method="post" action="../Controllers/Clases_Grupales_Controller.php">
            <legend><?php echo $strings['Buscar clase'];?>
            <!--Boton para volver atras-->
			<button onclick="location.href='../Controllers/Clases_Grupales_Controller.php';" class="volver"></button>
            </legend>

            <input hidden type="text" id="password" name="password" maxlength="25" size="40"/>
			
			
            <div class="form-group">
                <label for="login_entrenador"><?php echo $strings['Entrenador']; ?></label>
                <input type="text" id="login_entrenador" name="login_entrenador" maxlength="50" size="40"/>
            </div>
			<br>

			<div class="form-group">
                <label for="tope"><?php echo $strings['Tope']; ?></label>
                <input type="text" id="tope" name="tope" maxlength="25"/>
            </div>
			<br>
			
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
				
			<label>
					<?php echo $strings['Pista']; ?></label>
					<select name="ID_Pista">
					<option value=""></option>
						<?php
						
							while($pista=$this->pista->fetch_array()){
						?>
						
								<option value="<?php echo $pista[0];?>"><?php echo $pista[1];?>

								</option>
						<?php
							}
						?>
					</select>
			
			<br>
			
			
		   <!--Boton de confirmar busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
 }else{
	 class Clases_Grupales_SEARCH {
		
//Variable con el enlace al form para SEARCH usuaro
      var $pista;
      var $enlace;

//Constructor de la clase	
      function __construct($pista,$enlace){

        $this -> pista = $pista;
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
        <form class="formB" id="searchForm" enctype="multipart/form-data" method="post" action="../Controllers/Clases_Grupales_Controller.php">
            <legend><?php echo $strings['Buscar clase'];?>
            <!--Boton para volver atras-->
			<button onclick="location.href='../Controllers/Clases_Grupales_Controller.php';" class="volver"></button>
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
            <label>
					<?php echo $strings['Pista']; ?></label>
					<select name="ID_Pista">
					<option value=""></option>
						<?php
						
							while($pista=$this->pista->fetch_array()){
						?>
						
								<option value="<?php echo $pista[0];?>"><?php echo $pista[1];?>

								</option>
						<?php
							}
						?>
					</select>
			
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
