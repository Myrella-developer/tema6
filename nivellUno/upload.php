<?php
session_start();

if(isset($_POST['name']) && isset($_POST['surname']) && 
    isset($_POST['email']) && isset($_POST['phone']))
    {
        $name    =  filter_var($_POST['name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $surname =  filter_var($_POST['surname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email   =  filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone    =  filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);


        $_SESSION['name']    = $name;
        $_SESSION['surname'] = $surname;
        $_SESSION['email']   = $email;
        $_SESSION['phone']  = $phone;

        echo "<h1>Valores del Formulario</h1>";
        echo "Nombre: ".($name)."<br/>";
        echo "Apellido: ".($surname)."<br/>";
        echo "Email: ".($email)."<br/>";
        echo "Telefono: ".($phone)."<br/>";
}else{
    echo "No hemos recibido ningun dado en formulario";
}
?>