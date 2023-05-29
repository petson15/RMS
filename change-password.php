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
    <title>RMS||Dashboard</title>

    <link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fonts/all.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/all.css">

    <style type="text/css">
        body {
            font-family: "poppins", sans-serif;
        }

        .nav-side {
            position: relative;
            top: -49px;


        }

        .sidebar li .submenu {
            list-style: none;
            margin: 0;
            padding: 0;
            padding-left: 0rem;
            padding-right: 0rem;
            font-size: 14px;
        }

        .password {
            max-width: 560px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f7fdfe;
            border-radius: 10px;
            

        }
        .daily-stock input
        {
            margin: 10px;
        }

        .push-nav {
            z-index: 1;
        }
        .btn
        {
            font-weight: normal;
            background-color: blueviolet;
            margin-left: 140px 
            
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

    <h5 style=" margin-right:60px; margin-top:20px;" class="container py-2 text-muted">Change password</h5>

    <form action="" class=" password pass-form">
        <label for="current">current password: </label>
        <input type="text" id="current" class="form-control mb-3" placeholder="enter current password" required>
        <label for="new" >new password:</label>
        <input type="text" name="" id="new" class="form-control mb-3" placeholder="enter new password" required>
        <label for="confirm">Confirm password: </label>
        <input type="text" id="confirm" class="form-control mb-3" placeholder="confirm password" required>
        <button class="btn bg-primary py-1 my-2 text-white" type="submit">
         Change password</button>
    </form>




    
</body>
<?php  

    
     }

  else
  {
    header('Location: login_page.php');
  }



?>
</html>