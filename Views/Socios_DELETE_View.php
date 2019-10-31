<!-- VISTA PARA AÑADIR UN NUEVO Socios_ADD
CREADO POR:										 		
Fecha: -->		  
<?php
  //Declaracion de la clase
 class Socios_DELETE{	 
	var $datos;
	var $enlace;	
	//Constructor de la clase
	function __construct($datos,$enlace){
		$this -> datos = $datos;
		$this -> fila = $this -> datos -> fetch_array();
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
  
   

     <div class="show-half">	
	 <form class="formShow" enctype="multipart/form-data" action="../Controllers/Usuarios_Controller.php">
            <table class="showU" style="margin-left: 30%;">	
			
			<tr><th class="title" colspan="4"><?php echo $strings['Borrar socio']; ?>
                   <!--Boton para volver atras-->
				   <button onclick="location.href='../Controllers/Usuarios_Controller.php';" class="volver"></button></th>
                </tr>
			
			
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
				
				<tr>
				<!--Confirmar borrado-->
					<th><button class="borrar-si" type="submit" name="action" value="Borrar_Socio2"></button></th>
					<!--Cancelar borrado-->
					<td><button class="borrar-no" type="submit" name="action" value=""></button></td>
                </tr> 
				
		</table>
    </div>
  

	
 
 
 <?php
  }
}
 ?>