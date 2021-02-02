<?php
$error = "";

if ($_POST) {
   
  
    $mail = "";
    $asunto = "";
    $texto = "";

    if (($_POST['email'])) {
        $mail = $_POST['email'];
    } else {
        $error .= "Campo email es obligatorio. <br>";
    }


    if (($_POST['asunto'])) {
        $asunto = $_POST['asunto'];
    } else {
        $error .= "Campo asunto es obligatorio. <br>";
    }


    if (($_POST['texto'])) {
        $texto = $_POST['texto'];
    } else {
        $error .= "Campo texto es obligatorio. <br>";
    }


    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $error .= "Correo electronico no válido";
    }


    if ($error != "") {

        $error = '<div class="alert alert-danger" role="alert">' . $error . '</div>';

    } 
    else {
        if (mail($mail, $asunto, $texto )) {

            $error = '<div class="alert alert-success" role="alert"> Mensaje enviado con éxito </div>';
        } else {
            $error = '<div class="alert alert-danger" role="alert"> El menasaje no pudo ser enviado </div>';
        }
    }
}
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Contact Form</title>

</head>

<body>

    <div id="container">
        <h1>Contacta con nosotros</h1>
        <div class="errorsito">
            <?php 
           
            echo $error; 
            ?>
        </div>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Dirección de e-mail</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Asunto</label>
                <input type="text" class="form-control" name="asunto">
            </div>
            <div class="form-group">
                <label for="tecto">Escribe tu consulta</label>
                <textarea class="form-control" name="texto" rows="3"></textarea>
            </div>
            <button type="submit" >Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>

</html>