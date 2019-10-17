<!-- VISTA PARA AÑADIR UN NUEVO Socios_ADD
CREADO POR:										 		
Fecha: -->		  
<?php
  //Declaracion de la clase
 class Socios_DELETE{	 
//Variable con el enlace al form de ADD Socio
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
<!--Formulario para añadir socio-->
  <form name="Form" id="registerForm" action="../Controllers/Usuarios_Controller.php" method="post" enctype="multipart/form-data" >
    <legend><?php echo $strings['Borrar socio']; ?> 
	<!--Boton para volver atrás -->
    <button type="button" onclick="location.href='../Controllers/Torneos_Controller.php';" class="volver"></button>
    </legend>

    <div>	
		 
		  <th><?php echo $strings['Socio']; ?></th>
                    <td><?php if($this -> fila['socio'] == 'SI') echo $strings['SI'];
					else echo $strings['NO']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['IBAN']; ?></th>
                    <td><?php if($this -> fila['IBAN'] == '') echo $strings['No es socio'];
					else echo $this -> fila['IBAN']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Cuenta']; ?></th>
                    <td><?php if($this -> fila['cuenta'] == '') echo $strings['No es socio'];
					else echo $this -> fila['cuenta']; ?></td>
                </tr>
		  
      
    </div>
    <!--Boton de confirmar inserción-->
    <button type="submit" name="action" value="Confirmar_Socio" class="aceptar"></button>
    <!--Boton de borrado de texto-->
	<button type="reset" value="Reset" class="cancelar"></button>

	</form>
 
 
 <?php
  }
}
 ?>