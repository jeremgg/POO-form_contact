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
              <!-- Display the register form -->
              <form action="post.php" method="post">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="inputname">Votre nom</label>
                          <input type="text" name="name" class="form-control" id="inputname">
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="inputemail">Votre email</label>
                          <input type="text" name="email" class="form-control" id="inputemail">
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="inputmessage">Votre message</label>
                          <textarea name="message" class="form-control" id="inputmessage"></textarea>
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
