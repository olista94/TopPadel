

<?php
 //Declaracion de la clase 
    class Clinics_SEARCH {

//Variable con el enlace al form de SEARCH clinics
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
        <!--Formulario para buscar clinics-->
        <form class="formB" id="searchForm"  method="post" action="../Controllers/Clinics_Controller.php">
            <legend><?php echo $strings['Buscar clinics'];?>
            
            </legend>

                 <!--Campo login entrenador--> 
                 <label for="login"><?php echo $strings['Login']; ?></label>
                 <input type="text" id="login" name="login" size="40"   onblur=" return !comprobarVacio(this) && comprobarAlfabetico(this,15);" />
                 <!--Campo tope de deportistas-->
                 <label for="tope"><?php echo $strings['Tope']; ?></label>
                 <input type="text" name="tope" size="20"  onblur=" return !comprobarVacio(this) && comprobarDni(this);" />
                 <!--Campo invitado-->
                 <label for="invitado"><?php echo $strings['Invitado']; ?></label>
                 <input type="text" name="invitado" id="invitado" size="55"  onblur=" return !comprobarVacio(this) && comprobarTexto(this,50);" />
                 <!--Campo fecha de la clase-->
                 <label for="fecha"><?php echo $strings['Fecha']; ?></label>
                 <input type="date" name="fecha" min="<?php echo "$hoy";?>" onblur=" return comprobarFecha(this)">
                <!--Campo hora de la clase-->
                
                <label>
                    <?php echo $strings['Hora']; ?></label>
                    <select name = "hora_inicio">
                    
                        <?php
                        foreach ($this->horasLibres as $horas){
                            echo "<option value = '".$horas."'>".$horas."</option>";
                        }
                        ?>

                </select>
    
                <!--Campo ID pista-->
                 <label for="id_pista"><?php echo $strings['ID_Pista']; ?></label>
                 <input type="date" name="id_pista" size="18" class="tcal"  onblur=" return comprobarFecha(this)" >
                    
            
                <!--Boton de busqueda-->
                <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>