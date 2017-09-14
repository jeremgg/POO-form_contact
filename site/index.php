<?php
    session_start();

    //Load Class Form
    require 'class/Form.php';

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Contact form</title>

        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding-top: 40px;
        }
    </style>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Contact form</a>
                </div>
            </div>
        </nav>

      <div class="container">
          <div class="starter-template">

              <!-- show an error message if the form contains errors -->
              <?php  if(isset($_SESSION['errors'])) : ?>
                  <div class="alert alert-danger">
                      <p>Vous n'avez pas rempli le formulaire correctement</p>
                  </div>
                  <div class="alert alert-danger">
                      <?= implode('<br>', $_SESSION['errors']); ?>
                  </div>
              <?php endif; ?>


              <!-- Show a successful message if the message was sent -->
              <?php if(isset($_SESSION['success'])) : ?>
                  <div class="alert alert-success">
                      <p>Votre email a bien été envoyé !!</p>
                  </div>

              <?php endif; ?>



              <!-- Display the register form -->
              <form action="post.php" method="post">
                  <!-- Initialiser une instance de la class Form -->
                  <?php $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>

                  <div class="col-md-4">
                      <?= $form->text('name', 'Votre Nom'); ?>
                  </div>

                  <div class="col-md-4">
                      <?= $form->email('email', 'Votre Email'); ?>
                  </div>

                  <div class="col-md-4">
                      <?= $form->select('service', 'Service', ['Contact', 'Après-ventre', 'Assurance']); ?>
                  </div>

                  <div class="col-md-12">
                      <?= $form->textarea('message', 'Votre message'); ?>
                  </div>

                  <div class="col-md-12">
                      <?= $form->submit('Envoyer'); ?>
                  </div>
              </form>
          </div>
      </div><!-- /.container -->
    </body>
</html>



<!-- empty session variables -->
<?php unset($_SESSION['inputs']); ?>
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['errors']); ?>
