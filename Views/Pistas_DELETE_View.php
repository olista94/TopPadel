
<?php
//Incluimos el archivo para comprobar la autenticacion del usuario
    include_once '../Functions/Authentication.php';    
     //Declaracion de la clase
	class Pistas_DELETE{
	 
	//Datos de la pista
	var $datos;	
	var $fila;
	//Variable con el enlace al DELETE pista
	var $enlace;
	
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
         <!--Tabla con los datos de la categoria-->   
        <div class="show-half">
		<!--ID de la categoria que se pasa como hidden al model-->
			<form class="formShow" enctype="multipart/form-data" action="../Controllers/Pistas_Controller.php">
            <input type="hidden" name="ID_Pista" value= "<?php echo $this -> fila['ID_Pista'] ?>">	
            <table class="showU" style="margin-left: 30%;">

                <tr><th class="title" colspan="2"><?php echo $strings['Borrar pista']; ?>
                   <!--Boton para volver atrás -->
				   <button onclick="location.href='../Controllers/Pistas_Controller.php';" class="volver"></button></th>
                </tr>
				<!--Campo ID de la pista-->
                <tr>
                    <th><?php echo $strings['ID pista']; ?></th>
                    <td><?php echo $this -> fila['ID_Pista']; ?></td>								
                </tr>
				<!--Campo nombre de la pista-->
                <tr>
                    <th><?php echo $strings['Nombre de la pista']; ?></th>
                    <td><?php echo $this -> fila['Nombre_Pista']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Cubierta']; ?></th>
                    <td><?php if($this ->fila['techo']=='Interior')
									echo $strings['Interior'];
								else echo $strings ['Exterior'];
						 ?></td>	
                </tr>
				
				<tr>
                    <th><?php echo $strings['Suelo']; ?></th>
                    <td><?php if($this ->fila['suelo']=='Blanda')
									echo $strings['Blanda'];
								else echo $strings ['Dura'];
						 ?></td>
                </tr>
                

				<tr>
				<!--Confirmar borrado-->
					<th><button class="borrar-si" type="submit" name="action" value="Confirmar_DELETE2"></button></th>
				<!--Cancelar borrado-->	
					<td><button class="borrar-no" type="submit" name="action" value=""></button></td>
                </tr>   
                                                                        
            </table>

        </div>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>