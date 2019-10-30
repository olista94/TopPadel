<!-- TABLA QUE MUESTRA TODAS LAS PISTAS
CREADO POR: Los Cangrejas
Fecha: 20/12/2018-->

<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';
//Header
include '../Views/Header.php';

if(isset($_SESSION['tipo'])){
	if($_SESSION['tipo']=='ADMIN'){
 //Declaracion de la clase 
 class Pistas_SHOWALL{ 
	//Datos de las 
	var $datos;
	var $enlace;	
	
	//Constructor de la clase
	function __construct($datos,$enlace){
		
		$this -> datos = $datos;
		$this -> enlace = $enlace;
		$this -> pinta();
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
<!--Tabla con los datos de las pistas-->
        <div class="showall">   
                                
            <table class="showAllUsers">
				<tr><th class="title" colspan="4"><?php echo $strings['Pistas']; ?>
				<form class="tableActions" action="../Controllers/Pistas_Controller.php" method="">
				<!--Botones para añadir o buscar-->
				<button class="buscar-little" name="action" value="Confirmar_SEARCH1" type="submit"></button>
				<button class="anadir-little"  name="action" value="Confirmar_ADD1" type="submit"></button>
				</form></th></tr>
		<!--Campo nombre-->
				<tr>
					<th><?php echo $strings['Nombre de la pista']; ?></th>
					<th><?php echo $strings['Cubierta']; ?></th>
					<th><?php echo $strings['Suelo']; ?></th>					
					<th></th>
				</tr>
			<?php 
			//Mientras haya filas en la bd
				while($fila = $this ->datos->fetch_array()){                        
			?>
				<tr>
					<form action="../Controllers/Pistas_Controller.php" method="post" name="action" >
						<input type="hidden" name="ID_Pista" value="<?php echo $fila['ID_Pista']; ?>">
						<td><?php echo $fila['Nombre_Pista']; ?></td>
						<td><?php if($fila['techo']=='Interior')
									echo $strings['Interior'];
								else echo $strings ['Exterior'];
						 ?></td>
						<td><?php if($fila['suelo']=='Blanda')
									echo $strings['Blanda'];
								else echo $strings ['Dura'];
						 ?></td>			
						<td style="text-align:right">
						<!--Botones para editar,borrar o ver en detalle-->
							<button class="editar" name="action" value="Confirmar_EDIT1" type="submit"></button>
							<button class="borrar" name="action" value="Confirmar_DELETE1" type="submit"></button>
							<button class="add" name="action" value="Confirmar_SHOWCURRENT" type="submit"></button>
						</td>
					</form>
				</tr>
			<?php
				}
			?>                    
            </table>        
        </div>           
        
<?php   
    }
}
?>
    
<footer>
<!--Pie de pagina-->
	<?php include '../Views/Footer.php'; ?>
</footer>

<?php   
    }else{
		
		class Pistas_SHOWALL{ 
	//Datos de las 
	var $datos;
	var $enlace;	
	
	//Constructor de la clase
	function __construct($datos,$enlace){
		
		$this -> datos = $datos;
		$this -> enlace = $enlace;
		$this -> pinta();
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
<!--Tabla con los datos de las pistas-->
        <div class="showall">   
                                
            <table class="showAllUsers">
				<tr><th class="title" colspan="4"><?php echo $strings['Pistas']; ?>
				<form class="tableActions" action="../Controllers/Pistas_Controller.php" method="">
				<!--Botones para añadir o buscar-->
				<button class="buscar-little" name="action" value="Confirmar_SEARCH1" type="submit"></button>
				</form></th></tr>
		<!--Campo nombre-->
				<tr>
					<th><?php echo $strings['Nombre de la pista']; ?></th>
					<th><?php echo $strings['Cubierta']; ?></th>
					<th><?php echo $strings['Suelo']; ?></th>					
					<th></th>
				</tr>
			<?php 
			//Mientras haya filas en la bd
				while($fila = $this ->datos->fetch_array()){                        
			?>
				<tr>
					<form action="../Controllers/Pistas_Controller.php" method="post" name="action" >
						<input type="hidden" name="ID_Pista" value="<?php echo $fila['ID_Pista']; ?>">
						<td><?php echo $fila['Nombre_Pista']; ?></td>
						<td><?php if($fila['techo']=='Interior')
									echo $strings['Interior'];
								else echo $strings ['Exterior'];
						 ?></td>
						<td><?php if($fila['suelo']=='Blanda')
									echo $strings['Blanda'];
								else echo $strings ['Dura'];
						 ?></td>				
						<td style="text-align:right">
						<!--Botones para editar,borrar o ver en detalle-->
							<button class="add" name="action" value="Confirmar_SHOWCURRENT" type="submit"></button>
						</td>
					</form>
				</tr>
			<?php
				}
			?>                    
            </table>        
        </div>           
        
<?php   
    }
}
?>
    
<footer>
<!--Pie de pagina-->
	<?php include '../Views/Footer.php'; ?>
</footer>

	<?php   
    }
}		
?>