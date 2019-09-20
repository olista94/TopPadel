<?php
 //Declaracion de la clase 
    class Torneos_SEARCH {

//Variable con el enlace al form de SEARCH Torneo
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
        <!--Formulario para buscar Torneo-->
        <form class="formB" id="searchForm"  method="post" action="../Controllers/Torneos_Controller.php">
            <legend><?php echo $strings['Buscar torneo'];?>
            
            </legend>
		<div>
			<!--Campo ID de la Torneo-->
                <label ><?php echo $strings['ID Torneo']; ?></label>
                <input type="text"  name="ID_Torneo" size="5"/>
	
            <!--Campo nombre de la Torneo-->
                <label ><?php echo $strings['Nombre']; ?></label>
                <input type="text"  name="nombre" size="45"/>
				
				
				<label for="categoria"><?php echo $strings['Categoria']; ?></label>
					<select name="categoria" id="categoria">
						<option value=""></option selected>
						<option value="Masculina"><?php echo $strings['Masculina']; ?></option>
						<option value="Femenina"><?php echo $strings['Femenina']; ?></option>
						<option value="Mixta"><?php echo $strings['Mixta']; ?></option>
					</select>
	  
				<label ><?php echo $strings['Edicion']; ?></label>
                <input type="text"  name="edicion" size="7"/>
			
            
                <label for="fecha"><?php echo $strings['Fecha']; ?></label>
                <input type="text" id="fecha" name="fecha" />
           
				<label ><?php echo $strings['Nivel']; ?></label>
                <input type="text"  name="nivel" size="7"/>
			</div>
	
			
            <!--Boton de busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>