<?php 
//Mi primer PHP
echo "Mi primer PHP";

//Declaración de variables
$_a_1 = 1;
$b = 2.34; 
$B = 4;
$c = "Hola Mundo"; 

echo "<br />".$_a_1."<br />".$b."<br />".$B."<br />". $c;

//Variables predefinidas
//phpinfo();
echo $_SERVER["SERVER_ADDR"];

//Ámbito de las variables

$altura = 15; 

function calcularBase(){
    global $altura;
    echo $altura;

}
calcularBase();

//Ámbito de las variables
$altura = 14; 
$nombre = "altura";
$$nombre = 90;
echo $$nombre;

// Tipos de datos simples

//Boolean 
$mi_boolean_verdadero = true; 
$mi_boolean_false = false; 

//echo $mi_boolean_false;

//Enteros
$mi_entero_decimal = 2;
$mi_entero_hexadecimales= 0x2B;
$mi_entero_octal = 07;

//echo $mi_entero_decimal;

//Real 
$mi_real = 4.3;
$mi_real_notacion_cientifica = 7.3e-1;
//echo $mi_real_notacion_cientifica;

$suma = $mi_entero_decimal + $mi_real; 
$suma = 23;
echo $suma;
echo gettype($suma);
settype($suma, "integer");
echo gettype($suma);
echo is_int($suma);

//Cadenas, strings

$cadena = "La edad de el alumnado es 34:";
$edad = 25;
//echo $cadena.'\$edad: '.$edad;
//NULL 
$variable_null = null;
echo $variable_null;

define("PI", 3.141516);

echo(PI);


// Expresiones operadores
$a = 10;
$b = 5; 
$suma = $a + $b; 
echo $suma."</br>";
$resta = $a - $b; 
echo $resta."</br>";
$resta = $b - $a; 
echo $resta."</br>";
$multiplicacion = $a * $b; 
$division = $a / $b; 
$resto = $a % $b; 
echo $multiplicacion."</br>";
echo $division."</br>";
echo $resto."</br>";

$a++; 
echo $a."</br>";
$b--; 
echo $b."</br>";

$b = $b -1;
echo $b."</br>";


// Operadores comparacion

$a = 10; 
$b = 5; 

echo "<p> ¿A es igual a B? ";
echo $a==$b; 
echo "</p>";

echo "<p> ¿A es distinto a B? ";
echo $a!=$b; 
echo "</p>";

echo "<p> ¿A es mayor a B? ";
echo $a>$b; 
echo "</p>";

echo "<p> ¿A es menor a B? ";
echo $a<$b; 
echo "</p>";

echo "<p> ¿A es mayor o igual a B? ";
echo $a>=$b; 
echo "</p>";

echo "<p> ¿A es menor o igual a B? ";
echo $a<=$b; 
echo "</p>";

// Operadores lógicos

$a = 10; 
$b = 5; 
$c = 2; 

echo "<p> ¿A es igual a B y B es mayor que C?"; 
echo ($a == $b) && ($b > $c);  
echo "</p>";


echo "<p> ¿A es igual a B o B es mayor que C?"; 
echo ($a == $b) || ($b > $c);  
echo "</p>";

//Operadores de asignación
$a = 10;
echo $a."</br>";
$a += 2; //$a = $a +2; 
echo $a."</br>";
$a -= 2; //$a = $a -2; 
echo $a."</br>";
$a *= 2; //$a = $a -2; 
echo $a."</br>";
$a /= 2; //$a = $a -2; 
echo $a."</br>";


/** Arrays */
//array por índice
$datos = ['casa', 'coche', 'gato'];
$datos[1] = 'Aceite'; 
//matriz asociativa
$datos = [
  'propietario' => 'Antonio', 
  'domicilio' => 'Santiago de compostela', 
  'idade' => 45
];
print_r($datos);

var_dump($datos);
echo "El propietario de esta vivenda es {$datos["propietario"]}<br />";

echo "El propietario de esta vivenda es".$datos['propietario']."<br />";
foreach($datos as $key => $value){
    echo $key."=".$value."<br />";
}

$productos[0]= "Azúcar"; 
$productos[1]= "Aceite"; 
$productos[2]= "Arroz"; 
print_r($productos);
for($i =0; $i<3; $i++){
echo $productos[$i]."<br />";
}

foreach($productos as $p){
    echo $p."<br />";
}
unset($productos[2]);

$matriz = array("negocio" => "bar", 12=> true);
echo $matriz["negocio"];
echo $matriz[12];



/** Estructuras de control */
//Condicionales

$a = 3; 
$b = 3; 

if($a>$b){
    $resultado = "A es más grande que B";
}else{
    $resultado = "B es más grande que A";
}
//echo $resultado;

// ? 
$resultado = ($a>$b) ? "A es más grande que B" : "B es más grande que A";
//echo $resultado;

//Switch 
$posicion = "abajo"; 
switch($posicion){
    case "arriba": 
        echo "Está arriba <br />";
        break;
    case "abajo":
        echo "Está abajo <br />";
        break;
    default: 
        echo "No sé donde está <br />";
}

/** Bucles */
//While
$i=0;
while ($i<10){
    echo "El valor de i es".$i."<br />";
    $i++;
}

//Do - while
$i=9;
do{
    echo "El valor de i es".$i."<br />";
    $i++;
}while($i<10);

//For
for($i=0; $i<10; $i++){
    echo "El valor de i es".$i."<br />";
}

//Foreach 
$array = array(1,"platano",3,"usuario",5.23);
foreach($array as $item){
    echo $item."<br />";
}

//Formulario
include("libreria.php");

cabecera();

echo "Esta es la página inicial";
piePagina();



<h2>PHP Ejemplo de validación de Formularios</h2>
<form method="post" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  *Nombre: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
  Comentario: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Género:
  <input type="radio" name="gender" value="female">Mujer
  <input type="radio" name="gender" value="male">Hombre
  <input type="radio" name="gender" value="other">Other
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php 
$nombreError = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 if(empty($_POST["name"])){
    $nombreError = "El campo nombre es obligatorio"; 
 }else{
    $name = test_input($_POST["name"]);
 }
}
echo $name; 
echo $nombreError;

function test_input($dato){
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

?>