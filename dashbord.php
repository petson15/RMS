<?php  


  session_start();
  include_once('dbconfig/config.php');

  if(isset($_SESSION['employee']) && $_SESSION['employee'] == 'true')
  { 



?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dashboard</title>

	<link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="admin/fonts/all.min.css">
  	<link rel="stylesheet" type="text/css" href="fonts/all.css">
  	<link rel="stylesheet" type="text/css" href="fonts/fontawesome.css">
  	<link rel="stylesheet" type="text/css" href="fonts/fontawesome.min.css">
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

    <style type="text/css">
      
      .item-count 
      {
        max-width: 400px;
        height: 90px;
        background-color: grey;
      }

    </style>
</head>
<body>

	<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href=""><img src="images/OIP.jpg" style=" height: 40px; width: 50px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding: 10px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashbord.php"><i class="fa-solid fa-gauge text-white active"></i> Dashboard</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link text-white" href="orders.php"><i class="fa-solid fa-desktop text-white"></i> My Orders</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link text-white" href="pos.php"><i class="fa-solid fa-desktop text-white"></i> POS-Sale</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
        </li>

        <li class="nav-item dropdown " style=" position: relative; left: 680px;">
          <a class="nav-link dropdown-toggle text-white text-start" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="images/avatar.jpeg" style=" height: 25px; width: 25px; border-radius: 50%;" >
          </a>       
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="change-password.php">change password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="pos.php?action=logout">logout</a></li>
          </ul>
        </li>
      </ul>
       <span class=" text-white" style=" margin-right: 90px; font-size: 14px;"><?php echo $_SESSION['user2']; ?></span>


       <?php 


                if (isset($_GET['action'])) {
                  // code...
                  if ($_GET['action'] == "logout") {
                    // code...
                    session_destroy(); 
                     echo "<script>window.location.href='login_page.php'</script>";

                  }
                }





               ?>



    </div>
  </div>
</nav>

  <div class=" container-fluid">
    <form class="my-3">
        <h4 style=" margin:30px;">Dashboard Report</h4>
        <div style=" margin:30px;">
          <label for="form" style="padding: 10px;">Start date: </label>
         <input type="date" name style=" width: 150px; margin: 5px; padding: 5px; border: 1px solid white; background-color:#fafafa ; height: 35px; outline: none;" id="form">

         <label for="end" style="padding: 10px;">End date: </label>
         <input type="date" name style=" width: 150px; margin: 5px; padding: 5px; border: 1px solid white; background-color:#fafafa ; height: 35px; outline: none;" id="end">
         <button class="btn btn-md btn-primary fw-semibold" type="submit">Get Report</button>
    </form>

    <div class="item-count my-4">
      <div>
        <i class="fa-solid fa-cart-shopping d-flex justify-content-center text-white " style="padding-top: 10px;"></i>
        <h6 class="text-white d-flex justify-content-center py-1">345</h6>
        <h6 class="text-white d-flex justify-content-center" style="padding-bottom: 30px">item count</h6>
      </div>
      


    </div>

  </div>

</body>

  <?php  

   }

  else
  {
    header('Location: login_page.php');
  }




  ?>



</html>