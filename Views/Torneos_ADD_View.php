<?php
  //Declaracion de la clase
 class Torneos_ADD{	 
//Variable con el enlace al form de ADD torneo
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
<!--Formulario para añadir torneo-->
  <form name="Form" id="registerForm" action="../Controllers/Torneos_Controller.php" method="post" enctype="multipart/form-data" onsubmit="return comprobarTorneo(this)">
    <legend><?php echo $strings['Añadir torneo']; ?>
	<!--Boton para volver atrás -->
    <button type="button" onclick="location.href='../Controllers/Torneos_Controller.php';" class="volver"></button>
    </legend>

    <div>	
		 
		  <label for="nombre"><?php echo $strings['Nombre']; ?></label>
		  <input type="text" name="nombre" id="nombre" size="48"  onblur=" return !comprobarVacio(this) && comprobarTextoyNumeros(this,45);"/>
		  
		  <label for="categoria"><?php echo $strings['Categoria']; ?></label>
		<select name="categoria" id="categoria">
		<option value="Masculina"><?php echo $strings['Masculina']; ?></option>
		<option value="Femenina"><?php echo $strings['Femenina']; ?></option>
		<option value="Mixta"><?php echo $strings['Mixta']; ?></option>
		</select>
		  
		  <label for="edicion"><?php echo $strings['Edicion']; ?></label>
		  <input type="number" name="edicion" id="edicion"  style="width: 75px;" onblur=" return !comprobarVacio(this) && comprobarEntero(this,0,9999);" />
		  
		  <?php
					$hoy = date('Y-m-d');
					$date=date_create($hoy);
					date_add($date,date_interval_create_from_date_string("1 day"));
					$mañana = date_format($date,"Y-m-d");
				?>
		  
		  <label for="fecha"><?php echo $strings['Fecha']; ?></label>
		  <input type="date" id="fecha" name="fecha" min="<?php echo "$mañana";?>" onblur=" return comprobarFecha(this)" >
		  
		  <label for="nivel"><?php echo $strings['Nivel']; ?></label>
		  <input type="number" min="1" max="3" id="nivel" name="nivel" style="width: 75px;" onblur=" return !comprobarVacio(this) && comprobarEntero(this,1,3);"/>
		  
		  
      
    </div>
    <!--Boton de confirmar inserción-->
    <button type="submit" name="action" value="Confirmar_ADD" class="aceptar"></button>
    <!--Boton de borrado de texto-->
	<button type="reset" value="Reset" class="cancelar"></button>

	</form>
 
 
 <?php
  }
}
 ?>