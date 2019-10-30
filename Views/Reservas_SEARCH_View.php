<!-- FORMULARIO PARA BUSCAR TAREAS
CREADO POR: Los Cangrejas
Fecha: 28/12/2018-->

<?php

if(isset($_SESSION['tipo'])){
	if($_SESSION['tipo']=='ADMIN'){
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
						<option value="09:30">09:30</option>
						<option value="11:00">11:00</option>
						<option value="12:30">12:30</option>
						<option value="14:00">14:00</option>
						<option value="15:30">15:30</option>
						<option value="17:00">17:00</option>
						<option value="18:30">18:30</option>
						<option value="20:00">20:00</option>
						<option value="21:30">21:30</option>
				</select>
				<br>
			
			<!--Boton de confirmar busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>
        
        <?php
    
        }
    }
	}else{
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
           			
                <label for = "fecha_reserva">
				<?php echo $strings['Fecha reserva']; ?></label>
                <input type="text" id="fecha_reserva" name="fecha_reserva" maxlength="11" size="15"/>
            
			<label>
					<?php echo $strings['Hora inicio']; ?></label>
					<select name = "hora_inicio">
						<option value=""></option>
						<option value="08:00">08:00</option>
						<option value="09:30">09:30</option>
						<option value="11:00">11:00</option>
						<option value="12:30">12:30</option>
						<option value="14:00">14:00</option>
						<option value="15:30">15:30</option>
						<option value="17:00">17:00</option>
						<option value="18:30">18:30</option>
						<option value="20:00">20:00</option>
						<option value="21:30">21:30</option>
				</select>
				<br>
			
			<!--Boton de confirmar busqueda-->
            <button type="submit" name="action" value="Confirmar_SEARCH2" class="buscar"></button>

        </form>
            
        </body>
        </html>

<?php  		
	}
}
	}
}

?>