<!-- FORMULARIO PARA BUSCAR TAREAS
CREADO POR: Los Cangrejas
Fecha: 28/12/2018-->

<?php
 //Declaracion de la clase
    class Promociones_SEARCH {
	
	 //Variable con el enlace al form de SEARCH tarea
      var $pistas;
	  var $enlace;
	  
	  
//Constructor de la clase
      function __construct($pista,$enlace){
		
        $this -> pista = $pista;	
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
        <!--Formulario para buscar tarea-->
        <form class="formB" id="searchForm" enctype="multipart/form-data" method="post" action="../Controllers/Promociones_Controller.php">
            <legend><?php echo $strings['Buscar promocion'];?>
			<!--Boton para volver atras-->
            <button onclick="location.href='../Controllers/Promociones_Controller.php';" class="volver"></button>
            </legend>
			
			 <label for="usuarios_login">
				<?php echo $strings['ID Promocion']; ?></label>
                <input type="text" id="ID_Promo" name="ID_Promo" maxlength="7" size="7"/>
			
			<label>
					<?php echo $strings['Pista']; ?></label>
					<select name="pista_ID_Pista">
					<option value=""></option>
						<?php
						
							while($pista=$this->pista->fetch_array()){
						?>
						
								<option value="<?php echo $pista[0];?>"><?php echo $pista[1];?>

								</option>
						<?php
							}
						?>
					</select>

                <label for="usuarios_login">
				<?php echo $strings['Usuario']; ?></label>
                <input type="text" id="usuarios_login" name="usuarios_login" maxlength="50" size="40"/>
           
			
                <label for = "fecha">
				<?php echo $strings['Fecha']; ?></label>
                <input type="text" id="fecha" name="fecha" maxlength="11" size="15"/>
            
			<label>
					<?php echo $strings['Hora inicio']; ?></label>
					<select name = "hora_inicio">
						<option value=""></option>
						<option value="08:00">08:00</option>
						<option value="08:30">08:30</option>
						<option value="09:00">09:00</option>
						<option value="09:30">09:30</option>
						<option value="10:00">10:00</option>
						<option value="10:30">10:30</option>
						<option value="11:00">11:00</option>
						<option value="11:30">11:30</option>
						<option value="12:00">12:00</option>
						<option value="12:30">12:30</option>
						<option value="13:00">13:00</option>
						<option value="13:30">13:30</option>
						<option value="14:00">14:00</option>
						<option value="14:30">14:30</option>
						<option value="15:00">15:00</option>
						<option value="15:30">15:30</option>
						<option value="16:00">16:00</option>
						<option value="16:30">16:30</option>
						<option value="17:00">17:00</option>
						<option value="17:30">17:30</option>
						<option value="18:00">18:00</option>
						<option value="18:30">18:30</option>
						<option value="19:00">19:00</option>
						<option value="19:30">19:30</option>
						<option value="20:00">20:00</option>
						<option value="20:30">20:30</option>
						<option value="21:00">21:00</option>
						<option value="21:30">21:30</option>
						<option value="22:00">22:00</option>
				</select><br>
		
			
			<!--Boton de confirmar busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>