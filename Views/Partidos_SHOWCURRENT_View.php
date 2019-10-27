 <?php
  //Declaracion de la clase
 class Partidos_SHOWCURRENT{
	//Datos del torneo
	var $datos;
	var $idtorneo;
	//Variable con el enlace al DELETE torneo
	var $enlace;
	var $fila;
	
	//Constructor de la clase
	function __construct($datos,$idtorneo,$enlace){
		
		$this -> datos = $datos;
		$this -> idtorneo = $idtorneo;
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
			
				
            	<!--Clave del torneo que se pasa como hidden al model-->
				
            	<table class="showU" style="margin-left: 30%;">	
	
                <tr><th class="titlepartidos" colspan="4"><?php echo $this-> fila['Local1']; echo "-";echo $this-> fila['Local2']; ?>
													<?php echo "<br>" ?>
													<?php echo "VS" ?>
													<?php echo "<br>" ?>
													<?php echo $this-> fila['Visitante1']; echo "-";echo $this-> fila['Visitante2']; ?>
				   
				   <form class="formShow" enctype="multipart/form-data" action="../Controllers/Torneos_Controller.php">
				   <input type="hidden" name="ID_Torneo" value= "<?php echo $this -> idtorneo ?>">	
				   <button name = "action" value="Confirmar_SHOWTORNEO"  class="volver"></button></form></th>
				
                </tr>
				 <!--Campo ID_Torneo del torneo-->
                <tr>
                    <th><?php echo $strings['Fecha']; ?></th>
                    <td><?php echo $this -> fila['fecha']; ?></td>
                </tr>
				 <!--Campo nombre del torneo-->
                <tr>
                    <th><?php echo $strings['Hora']; ?></th>
                    <td><?php echo $this -> fila['hora']; ?></td>
                </tr>
				 <!--Campo descripcion del torneo-->				
				<tr>
                    <th><?php echo $strings['Ronda']; ?></th>
                    <td><?php echo $this -> fila['ronda']; ?></td>
                </tr>
				<!--Campo telefono del torneo-->
				
				<tr>
                    <th><?php echo $strings['Pista']; ?></th>
                    <td><?php echo $this -> fila['Nombre_Pista']; ?></td>
                </tr>

                <tr>
                    <th><?php echo $strings['1º Set']; ?></th>
                    <td><?php echo $this -> fila['JuegosSet1_Local'];echo "-";echo $this -> fila['JuegosSet1_Visitante']; ?></td>
                </tr>

                <tr>
                    <th><?php echo $strings['2º Set']; ?></th>
                    <td><?php echo $this -> fila['JuegosSet2_Local'];echo "-";echo $this -> fila['JuegosSet2_Visitante']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['3º Set']; ?></th>
                    <td><?php if($this -> fila['JuegosSet3_Local'] == 0 && $this -> fila['JuegosSet3_Visitante'] == 0) echo "-";
					else{ echo $this -> fila['JuegosSet3_Local'];echo "-";echo $this -> fila['JuegosSet3_Visitante']; }?></td>
                </tr>

				  
                                                                        
            </table>

        </div>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>