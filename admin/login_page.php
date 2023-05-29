<?php 
    session_start();
    include('dbconfig/config.php');
 
    $error_message = '';
    $email = $password = ''; 

   if (isset($_POST['submit'])) {

      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM admin WHERE email ='$email' AND password = '$password'";
      $result = mysqli_query($conn, $sql);

      $sql_sec = "SELECT * FROM employee WHERE email ='$email' AND password = '$password'";
      $result_sec = mysqli_query($conn, $sql_sec);

      $res1 = mysqli_query($conn, $sql);

      $res2 = mysqli_query($conn, $sql_sec);

      if (mysqli_num_rows($result) == 1) {
          // code...
        $_SESSION['admin'] = 'true';

        while($rows = mysqli_fetch_assoc($res1))
            {
              $user1 = $rows['username'];
               $_SESSION['user1'] = $user1;
            }

       
          header('Location: Dashboard.php');

      }
      if (mysqli_num_rows($result_sec) == 1) {
        // code... 
        $_SESSION['employee'] = 'true';

        while($rows = mysqli_fetch_assoc($res2))
            {
              $user2 = $rows['username'];
              $_SESSION['user2'] = $user2;
            }

        header('Location: ../dashbord.php');
      }
       else
        {
          $error_message = "invalid credentials, check password or email";
         }
 

   }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>

	<link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/all.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/all.css">
  <link rel="stylesheet" type="text/css" href="fonts/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="fonts/fontawesome.min.css">


  <style type="text/css">
    
    #finput
    {
      width: 350px;
      margin: 0 auto;
      margin-top: 200px;
    }

    #sinput
    {
      width: 350px;
      margin: 0 auto;
      margin-top: 15px;
    }
    form
    {
      margin: 0 auto;
      width: 500px;
      height: 200px;

    }



  </style>



</head>
	<body class="bg-dark">

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="login_page.php">RMS-Tesano</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ">
        <a class="nav-link active text-end" href="">
        </a>
      </div>
    </div>
  </div>
</nav>

    <form action="login_page.php" method="post">
      <hr style="color:white; top: 120px; position: relative;">
      <div class="container">
      <div class="input-group flex-nowrap" id="finput">
       <span class="input-group-text bg-success" id="addon-wrapping"> <i class="fa-regular fa-envelope text-light"></i></span>
      <input type="email" class="form-control" placeholder=" email: example@gmail.com" aria-label="email" aria-describedby="addon-wrapping" name="email" required value=" <?php echo $email ?>">

      </div>
        <small class="text-danger" style="margin-left: 110px;"><?php echo $error_message; ?></small>
      <div class="input-group flex-nowrap" id="sinput">
       <span class="input-group-text bg-warning" id="addon-wrapping"> <i class="fa-solid fa-key text-light"></i></span>
      <input type="password" class="form-control" placeholder=" password" aria-label="password" aria-describedby="addon-wrapping" name="password" required>
     </div>
     <div style=" position: relative; right: -50px; padding: 15px;">
     <button type="submit" class=" btn btn-primary" name="submit"><i class="fa-solid fa-right-to-bracket"></i> login</button>
      <i class="fa-solid fa-lock text-primary" style=" margin-left: 20px;"></i><a href="" style="text-decoration: none;"> Forgot your password</a>
   </div>

    
</div>

     </div>
<hr style="color:white; bottom: -30px; position: relative;">
    </form>


</body>
</html>