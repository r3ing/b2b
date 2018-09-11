<?php
session_start();
if (isset($_SESSION['usuarioint']))
{
$vari = $_SESSION['usuarioint'];
}
else
{
echo "<div><br><b>Su session ha finalizado, para volver a ingresar haga </b><a href='http://intranet.aguasin.com/index.php'>Click Aqui</a><br></div>";
exit;
}    
?>