 <?php
  //Declaracion de la clase
 class Torneos_SHOWCURRENT{
	//Datos del torneo
	var $datos;
	//Variable con el enlace al DELETE torneo
	var $enlace;
	var $fila;
	
	//Constructor de la clase
	function __construct($datos,$enlace){
		
		$this -> datos = $datos;
		$this -> enlace = $enlace;
		$this -> fila = $this -> datos -> fetch_array();
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
              <!--Tabla con los datos del torneo--> 
			<div class="show-half">
			
				<form class="formShow" enctype="multipart/form-data" action="../Controllers/Torneos_Controller.php">
            	<!--Clave del torneo que se pasa como hidden al model-->
				<input type="hidden" name="ID_Torneo" value= "<?php echo $this -> fila['ID_Torneo'] ?>">	
            	<table class="showU" style="margin-left: 30%;">	

                <tr><th class="title" colspan="4"><?php echo $strings['Detalles del torneo']; ?>
                   <!--Boton para volver atrás -->
				   <button onclick="location.href='../Controllers/Torneos_Controller.php';" class="volver"></button></th>
                </tr>
				 <!--Campo ID_Torneo del torneo-->
                <tr>
                    <th><?php echo $strings['ID Torneo']; ?></th>
                    <td><?php echo $this -> fila['ID_Torneo']; ?></td>
                </tr>
				 <!--Campo nombre del torneo-->
                <tr>
                    <th><?php echo $strings['Nombre']; ?></th>
                    <td><?php echo $this -> fila['nombre']; ?></td>
                </tr>
				 <!--Campo descripcion del torneo-->				
				<tr>
                    <th><?php echo $strings['Categoria']; ?></th>
                    <td><?php if($this ->fila['categoria'] == 'Masculina')
								echo $strings['Masculina'];
							else if($this ->fila['categoria'] == 'Femenina')
								echo $strings['Femenina'];
							else echo $strings['Mixta'];
							?></td>
                </tr>
				<!--Campo telefono del torneo-->
				<tr>
                    <th><?php echo $strings['Edicion']; ?></th>
                    <td><?php echo $this -> fila['edicion']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Fecha limite']; ?></th>
                    <td><?php echo $this -> fila['fecha']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Nivel']; ?></th>
                    <td><?php echo $this -> fila['nivel']; ?></td>
                </tr>

				   
                                                                        
            </table>

        </div>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>