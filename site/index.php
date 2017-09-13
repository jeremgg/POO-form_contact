<?php session_start(); ?>

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
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="inputname">Votre nom</label>
                          <input type="text" name="name" class="form-control" id="inputname" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="inputemail">Votre email</label>
                          <input type="text" name="email" class="form-control" id="inputemail" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>">
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="inputservice">Services...</label>
                          <select name="service" id="inputservice" class="form-control" >
                              <option value="0">Contact</option>
                              <option value="1">Après-ventre</option>
                              <option value="2">Assurance</option>
                          </select>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="inputmessage">Votre message</label>
                          <textarea name="message" class="form-control" id="inputmessage"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">Envoyer</button>
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
