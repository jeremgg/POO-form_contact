<?php

    //load autoloader
    require_once 'inc/autoloader.php';



    //Verify that data has been send via the form
    if(!empty($_POST)){


        //If there are errors, they are saves in an array
        $errors = [];



        //list service emails
        $emails = ['contact@local.dev', 'apres-vente@local.dev', 'assurance@local.dev'];



        //validate the form data
        $validateForm = new ValidateForm($_POST);



        //Check that the name, email and message fields are required
        //Check that the email address is valid
        //Check that the select field option matches an email address in the $emails array
        $validateForm->check('name', 'required');
        $validateForm->check('email', 'required');
        $validateForm->check('email', 'email');
        $validateForm->check('message', 'required');
        $validateForm->check('service', 'in', array_keys($emails));


        //Then retrieve all errors
        $errors = $validateForm->errors();



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
