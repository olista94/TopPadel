<!-- FORMULARIO PARA BUSCAR PISTAS
CREADO POR: Los Cangrejas
Fecha: 20/12/2018-->

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

			<!--Campo ID de la pista-->
                <label ><?php echo $strings['ID pista']; ?></label>
                <input type="text"  name="ID_Pista" size="5"/>
	
            <!--Campo nombre de la pista-->
                <label ><?php echo $strings['Nombre de la pista']; ?></label>
                <input type="text"  name="Nombre_Pista" size="45"/>
            
            
            <!--Boton de busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>