<?php

    //Verify that data has been send via the form
    if(!empty($_POST)){


        //If there are errors, they are saves in an array
        $errors = [];



        //list service emails
        $emails = ['contact@local.dev', 'depannage@local.dev', 'heimerdinger@local.dev'];



        //check that the username field is not empty
        if(!isset($_POST['name']) || empty($_POST['name'])){
            $errors['name'] = "Vous n'avez pas renseigné votre nom";
        }



        //check that the email field is not empty and that its data is in the correct format
        if(!isset($_POST['email']) || empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Vous n'avez pas renseigné un email valide";
        }



        //check that the message field is not empty
        if(!isset($_POST['message']) || empty($_POST['message'])){
            $errors['message'] = "Vous n'avez pas renseigné votre message";
        }



        //verify the select field is not empty and that the value exists
        if(!isset($_POST['service']) || !isset($emails[$_POST['service']])){
            $errors['service'] = "Le service que vous demandez n'existe pas !!!";
        }


        session_start();


        //If there are errors
        //save form data and errors field
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            $_SESSION['inputs'] = $_POST;
            header('location: index.php');
        }


        //Sent the email
        else{
            $_SESSION['success'] = 1;
            $message = $_POST['message'];
            $headers = 'FROM: ' . $_POST['email'];
            mail($emails[$_POST['service']], 'Formulaire de contact de ' . $_POST['name'], $message, $headers);
            header('location: index.php');
        }
    }





?>
