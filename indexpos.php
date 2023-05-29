<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>POS-cashier</title>

	<link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="fonts/all.min.css">
  	<link rel="stylesheet" type="text/css" href="fonts/all.css">
  	<link rel="stylesheet" type="text/css" href="fonts/fontawesome.css">
  	<link rel="stylesheet" type="text/css" href="fonts/fontawesome.min.css">
  	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

	
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

        <li class="nav-item dropdown " style=" position: relative; left: 700px;">
          <a class="nav-link dropdown-toggle text-white text-start" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="images/avatar.jpeg" style=" height: 25px; width: 25px; border-radius: 50%;" >
          </a>       
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="change-password.php">change password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">logout</a></li>
          </ul>
        </li>
      </ul>
       <span class=" text-white" style=" margin-right: 80px;">name</span>
    </div>
  </div>
</nav>


</body>
</html>