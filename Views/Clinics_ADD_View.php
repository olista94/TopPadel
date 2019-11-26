
 <?php
 
  //Declaracion de la clase
 class Clinics_ADD{
     
//Variable con el enlace al form para ADD Clinics
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
 <!--Form para añadir clinics-->
  <form name="Form" id="registerForm" action="../Controllers/Clinics_Controller.php" method="post" enctype="multipart/form-data" onsubmit="return comprobarclinics(this)">
    <legend><?php echo $strings['Clinics']; ?>
    <!--Boton para volver atras-->
    <button type="button" onclick="location.href='../Controllers/Clinics_Controller.php';" class="volver"></button>
    </legend>

    <div>   
        <!--Campo ID_Clase-->   
      <label for="id_clase"><?php echo $strings['ID_Clase']; ?></label>
      <input type="text" name="id_clase" size="40"   onblur=" return !comprobarVacio(this) && comprobarAlfabetico(this,15);" />
        <!--Campo login entrenador--> 
      <label for="login"><?php echo $strings['Login']; ?></label>
      <input type="text" id="login" name="login" size="40"   onblur=" return !comprobarVacio(this) && comprobarAlfabetico(this,15);" />
        <!--Campo tope de deportistas-->
      <label for="tope"><?php echo $strings['Tope']; ?></label>
      <input type="text" name="tope" size="20"  onblur=" return !comprobarVacio(this) && comprobarDni(this);" />
        <!--Campo descripcion-->
      <label for="descripcion"><?php echo $strings['Descripcion']; ?></label>
      <input type="text" name="descripcion"  size="40"   onblur=" return !comprobarVacio(this) && comprobarTexto(this,30);"/>
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
      
       <!--Campo tipo del clinics -->
      <label for="tipo"><?php echo $strings['Tipo']; ?></label>
      
      <select name="tipo" id="tipo">
        <option value="NORMAL"><?php echo $strings['Deportista']; ?></option>
        <option value="ENTRENADOR"><?php echo $strings['Entrenador']; ?></option>
        <option value="ADMIN"><?php echo $strings['Admin']; ?></option>
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