<?php include './config/database.php'; ?>

<?php 
    $name = $email = $body = "";
    $nameErr = $emailErr = $bodyErr="";

    //Form Submit
    if(isset($_POST['submit']))
    {
      //Validate name
      if(empty($_POST['name']))
      {
        $nameErr = 'Name is required';
      }
      else
      {
        $name = filter_input(
          INPUT_POST,
          'name',
          FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
      }

      //Validate email
      if(empty($_POST['email']))
      {
        $emailErr = 'Email is required';
      }
      else
      {
        $email = filter_input(
          INPUT_POST,
          'email',
          FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
      }

      //Validate body
      if(empty($_POST['body']))
      {
        $bodyErr = 'Body is required';
      }
      else
      {
        $body = filter_input(
          INPUT_POST,
          'body',
          FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
      }



      if(empty($nameErr) && empty($emailErr) && empty($bodyErr))
      {
        //Add to database
        $sql = "INSERT INTO feedback (name,email,body) VALUES ('$name','$email','$body')";

        if(mysqli_query($conn,$sql))
        {
          header('Location: feedback.php');
        }
        else{
          echo 'Error: '.mysqli_error($conn);
        }
      }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Leave Feedback</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
    <div class="container">
      <a class="navbar-brand" href="#">Feedback Form</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
         <li class="nav-item">
              <a class="nav-link" href="/feedback/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/feedback/feedback.php"
                >Feedback</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/feedback/about.php"
                >About</a
              >
            </li>
        </ul>
      </div>
  </div>
</nav>

<main>
  <div class="container d-flex flex-column align-items-center">
    <h2>Feedback</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo !$nameErr ?:
          'is-invalid'; ?>" id="name" name="name" placeholder="Enter your name" value="<?php echo $name; ?>">
          <div id="validationServerFeedback" class="invalid-feedback">
          <?php echo $nameErr ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo !$emailErr ?:
          'is-invalid'; ?>" id="email" name="email" placeholder="Enter your email">
          <div id="validationServerFeedback" class="invalid-feedback">
          <?php echo $emailErr ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo !$bodyErr ?:
          'is-invalid'; ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
          <div id="validationServerFeedback" class="invalid-feedback">
          <?php echo $bodyErr ?>
        </div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
    </div>
</main>

<footer class="text-center mt-5">
  Copyright &copy; 2022
</footer>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
