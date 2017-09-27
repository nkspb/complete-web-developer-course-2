<?php
  // check if values were posted
  $error = "";
  $successMessage = "";
  
  if ($_POST) {
    if (!$_POST["email"]) {
      $error .= "The email field is needed<br>";
    }

    if (!$_POST["subject"]) {
      $error .= "The subject field is needed<br>";  
    }

    if (!$_POST["contents"]) {
      $error .= "The contents field is needed";  
    }

    if ($_POST['email'] && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $error .= ("Email is not a valid email address<br>");
    }
    
    if ($error != "") {
      $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
    } else {
      $emailTo = "me@mydomain.com";
      $subject = $_POST['subject'];
      $content = $_POST['content'];
      $headers = "From: ".$_POST['email'];

      if (mail($emailTo, $subject, $content, $headers)) {
        $successMessage = '<div class="alert alert-success" role="alert"><p><strong>You message was sent successfully</strong></p></div>';
      } else {
        $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent. Please try again later.</strong></p></div>';  
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <h1>Get in touch!</h1>
    <p id="error"><?php echo $error.$successMessage; ?></p>
    <form method="post">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject">
      </div>

      <div class="form-group">
        <label for="contents">What would you like to ask us?</label>
        <textarea class="form-control" id="contents" name="contents" rows="3"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div> <!-- ./container -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script>
      $("form").submit(function(e){
         // check if subject or contents are not empty
        let error = "";

        // check if fields are not empty
        if ($("#email").val() == "") {
          error += "The email field is needed<br>";
        }
      
        if ($("#subject").val() == "") {
          error += "The subject field is needed<br>";
        }

        if ($("#contents").val() == "") {
          error += "The contents field is needed";
        }

        // if any of them was empty - show error
        if (error != "") {
          $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
          return false; // js way of saying something went wrong so don't submit
        } else {
          return true;
        }
      });
    </script>    
  </body>
</html>











