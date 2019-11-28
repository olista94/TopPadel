

<?php
 //Declaracion de la clase 
    class Pistas_SEARCH {

//Variable con el enlace al form de SEARCH pista
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
        <!--Formulario para buscar pista-->
        <form class="formB" id="searchForm"  method="post" action="../Controllers/Pistas_Controller.php">
            <legend><?php echo $strings['Buscar pista'];?>
            
            </legend>
            <!--Campo nombre de la pista-->
                <label ><?php echo $strings['Nombre de la pista']; ?></label>
                <input type="text"  name="Nombre_Pista" size="45"/>
				
				<label for="techo"><?php echo $strings['Cubierta']; ?></label>
					<select name="techo" id="techo">
						<option value=""></option>
						<option value="Interior"><?php echo $strings['Interior']; ?></option>
						<option value="Exterior"><?php echo $strings['Exterior']; ?></option>
					</select>
				
				<label for="suelo"><?php echo $strings['Suelo']; ?></label>
					<select name="suelo" id="suelo">
						<option value=""></option>
						<option value="Dura"><?php echo $strings['Dura']; ?></option>
						<option value="Blanda"><?php echo $strings['Blanda']; ?></option>
					</select>
					<br>
					
            
            <!--Boton de busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>