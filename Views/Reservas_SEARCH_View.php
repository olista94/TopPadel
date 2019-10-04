<!-- FORMULARIO PARA BUSCAR TAREAS
CREADO POR: Los Cangrejas
Fecha: 28/12/2018-->

<?php
 //Declaracion de la clase
    class Reservas_SEARCH {
	
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
        <form class="formB" id="searchForm" enctype="multipart/form-data" method="post" action="../Controllers/Reservas_Controller.php">
            <legend><?php echo $strings['Buscar reserva'];?>
			<!--Boton para volver atras-->
            <button onclick="location.href='../Controllers/Reservas_Controller.php';" class="volver"></button>
            </legend>
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
           
			
                <label for = "fecha_reserva">
				<?php echo $strings['Fecha reserva']; ?></label>
                <input type="text" id="fecha_reserva" name="fecha_reserva" maxlength="11" size="15"/>
            
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
				</select>
		<label>
					<?php echo $strings['Hora fin']; ?></label>
					<select name = "hora_fin">
						<option value=""></option>
						<option value="09:29">09:29</option>
						<option value="09:59">09:59</option>
						<option value="10:29">10:29</option>
						<option value="10:59">10:59</option>
						<option value="11:29">11:29</option>
						<option value="11:59">11:59</option>
						<option value="12:29">12:29</option>
						<option value="12:59">12:59</option>
						<option value="13:29">13:29</option>
						<option value="13:59">13:59</option>
						<option value="14:29">14:29</option>
						<option value="14:59">14:59</option>
						<option value="15:29">15:29</option>
						<option value="15:59">15:59</option>
						<option value="16:29">16:29</option>
						<option value="16:59">16:59</option>
						<option value="17:29">17:29</option>
						<option value="17:59">17:59</option>
						<option value="18:29">18:29</option>
						<option value="18:59">18:59</option>
						<option value="19:29">19:29</option>
						<option value="19:59">19:59</option>
						<option value="20:29">20:29</option>
						<option value="20:59">20:59</option>
						<option value="21:29">21:29</option>
						<option value="21:59">21:59</option>
						<option value="22:29">22:29</option>
						<option value="22:59">22:59</option>
						<option value="23:29">23:29</option>
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