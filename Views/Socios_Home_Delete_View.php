<!-- VISTA PARA PROMOCIONAR HACERSE SOCIO
CREADO POR: 
Fecha: -->
  <?php
 //Declaracion de la clase 
 class Socios_Home_Delete{	 
	
	//Variable con el enlace al form de ADD pista
	var $enlace;	
	//Constructor de la clase
	function __construct($enlace){
		
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

<!--Texto de ventajas de ser socio-->
    <div  >	
      <head >
        <h1 class="promosociotitulo">TopSocio</h1>
      </head>
      <body class="estilosocio">
        <article class="textosocio">
         <p><?php echo $strings['Ser socio de TopPadel tiene premio. Si eres un amante del padel, este es tu sitio.']; ?></p>
         <p><?php echo $strings['TopPadel te ofrece una serie de ventajas por ser socio:']; ?> </p>
         <p>
           <u>
             <li type="circle"><?php echo $strings['Descuentos en material deportivo.']; ?> </li>
             <li type="circle"><?php echo $strings['Descuentos en empresas colaboradoras asociadas.']; ?> </li>
             <li type="circle"><?php echo $strings['Reserva por teléfono.']; ?> </li>
             <li type="circle"><?php echo $strings['Descuento en servicios de fisioterapia.']; ?> </li>
           </u>
           <br><?php echo $strings['¡Y muchas más ventajas!']; ?> <em class="palabranegrita"><?php echo $strings['¡Descúbrelas!']; ?></em>
        </p>
        </article>
      </body>

      
    </div>

    <!--Formulario para añadir socio-->
  <form name="Form" class="formsocio" action="../Controllers/Usuarios_Controller.php" method="post" onsubmit="return comprobarCategoria(this);" >

    <!--Boton para acceder a formulario de socio-->
	
    <button  type="submit" name="action" value="Borrar_Socio" class="botonsocioborrar"><?php echo $strings['Darme de baja']; ?></button>

	</form>
 
 
 <?php
  }
}
 ?>