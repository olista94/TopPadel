
<?php
 //Declaracion de la clase
 class Usuarios_ESTADISTICAS{
	 //Datos del usuario
	var $datos;
	var $ranking;
	//Variable con el enlace al form para ADD usuaro
	var $enlace;
	var $fila;
	
		//Constructor de la clase	
	function __construct($datos,$ranking,$enlace){
		
		$this -> datos = $datos;
		$this -> ranking =$ranking;
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
            <!--Tabla con los datos del usuario-->
        <div class="show-half">	
            <table class="showU" style="margin-left: 30%;">

                <tr><th class="title" colspan="4"><?php echo $strings['Estadisticas']; ?>
                   <!--Boton para volver atras-->
				   <button onclick="location.href='../Controllers/Usuarios_Controller.php';" class="volver"></button></th>
                </tr>
				<!--Campo login del usuario-->
                <tr>
                    <th><?php echo $strings['Partidos Jugados']; ?></th>
                    <td><?php if($this->fila['PJ'] == null)
								echo '0';
							else
								echo $this -> fila['PJ']; ?>
					</td>								
				</tr>
				<!--Campo password del usuario-->
                <tr>
                    <th><?php echo $strings['Partidos Ganados']; ?></th>
                    <td><?php if($this->fila['PG'] == null)
								echo '0';
							else
								echo $this -> fila['PG']; ?>
					</td>
                </tr>
				<!--Campo nombre del usuario-->
                <tr>
                    <th><?php echo $strings['Partidos Perdidos']; ?></th>
                    <td><?php if($this->fila['PP'] == null)
								echo '0';
							else
								echo $this -> fila['PP']; ?>
					</td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['% victorias']; ?></th>
                    <td><?php 
					
					
					echo ( ($this -> fila['PG']) / ($this -> fila['PJ']) ) * 100 ; echo "%";
					
					 ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Torneos Disputados']; ?></th>
                    <td><?php echo $this -> fila['Num_Torneos']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Ranking']; ?></th>
                    <td><?php 
					
					
					echo ($this -> fila['PG']*3) - ($this -> fila['PP']);
					
					 ?></td>
                </tr>
				
                                                                        
            </table>

        </div>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>