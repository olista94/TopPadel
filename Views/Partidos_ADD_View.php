

<?php

 //Declaracion de la clase
class Partidos_ADD{
	var $datos;
	var $idpartido;
	var $idtorneo;
	var $enlace;	
	//Constructor de la clase
	function __construct($datos,$idpartido,$idtorneo,$enlace){
				
		$this -> datos = $datos;
		$this -> idpartido = $idpartido;
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
<!--Formulario para añadir tarea-->
		<div class="form">

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Partidos_Controller.php" enctype="multipart/form-data">
			<input type="hidden" name="ID_Partido" value ="<?php echo $this->idpartido; ?>">
			<input type="hidden" name="ID_Torneo" value ="<?php echo $this->idtorneo; ?>">
			<input type="hidden" name="ID_ParejaLocal" value ="<?php echo $this->fila['ID_ParejaLocal']; ?>">
			<input type="hidden" name="ID_ParejaVisitante" value ="<?php echo $this->fila['ID_ParejaVisitante']; ?>">
				<legend><?php echo $strings['Acta del partido'];?>
				<!--Boton para volver atras-->
				<button type="button" type="button" onclick="location.href='../Controllers/Torneos_Controller.php?action=Confirmar_SHOWTORNEO';" class="volver"></button>
				</legend>
				<div style="display:inline-block;margin-right:25%">
		
					<b><h2><legend>
					<?php echo $strings['Set 1']; ?></legend></h2></b>
					<label>
					<?php echo $this->fila[2];echo "-"; echo $this->fila[3]; ?></label>
					<input type="number" name="JuegosSet1_Local" min="0" max="7">
					<label>
					<?php echo $this->fila[5];echo "-"; echo $this->fila[6]; ?></label>
					<input type="number" name="JuegosSet1_Visitante" min="0" max="7">
					
					
				</div>
				
				<div style="display:inline-block;margin-right:25%">
	
					<b><h2><legend>
					<?php echo $strings['Set 2']; ?></legend></h2></b>
					<label>
					<?php echo $this->fila[2];echo "-"; echo $this->fila[3]; ?></label>
					<input type="number" name="JuegosSet2_Local" min="0" max="7">
					<label>
					<?php echo $this->fila[5];echo "-"; echo $this->fila[6]; ?></label>
					<input type="number" name="JuegosSet2_Visitante" min="0" max="7">
					
					
				</div>
				
				<div style="display:inline-block;margin-right:0%">
	
					<b><h2><legend>
					<?php echo $strings['Set 3']; ?></legend></h2></b>
					<label>
					<?php echo $this->fila[2];echo "-"; echo $this->fila[3]; ?></label>
					<input type="number" name="JuegosSet3_Local" min="0" max="7">
					<label>
					<?php echo $this->fila[5];echo "-"; echo $this->fila[6]; ?></label>
					<input type="number" name="JuegosSet3_Visitante" min="0" max="7">

				</div>
				<br>
				
				<button type="submit" name="action" value="Confirmar_Acta_Partido" value="Submit" class="aceptar"></button>
				
				

			</form> 
		</div> 
<?php
	}
}
?>