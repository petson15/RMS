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
	<title>orders</title>

	<link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="fonts/all.min.css">
  	<link rel="stylesheet" type="text/css" href="fonts/all.css">
  	<link rel="stylesheet" type="text/css" href="fonts/fontawesome.css">
  	<link rel="stylesheet" type="text/css" href="fonts/fontawesome.min.css">
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>


    <style type="text/css">
      
      #order-table
      {
        max-width: 90%;
        margin: 0 auto;
        margin-top: 110px;
      }
      #search-btn input
    {
      width: 170px;
      position: relative;
      margin-top: 82px;
      margin-bottom: -108px;
      left: -18px; 
      height: 32px;
      
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
    </div>
  </div>


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



</nav>

    <form class="d-flex justify-content-end" role="search" id="search-btn">
        <input class="form-control me-5" type="search" placeholder="Search" aria-label="Search">
      </form>

  <table class="table table-bordered text-center fw-lighter" id="order-table">
  <thead class="table-dark text-center fw-lighter">
    <tr style="font-size:15px;">
      <td>#Invoice number</td>
      <td>Customer</td>
      <td>Payment method</td>
      <td>Number</td>
      <td>Total amount</td>
      <td>Served by</td>
      <td>Action</td>

    </tr>
  </thead>
  <tbody >
    <?php  

    $sql = 'SELECT DISTINCT invoice,dates,employee,paymethod,total,telnum,customer,id FROM oders GROUP BY invoice DESC';
    $res = mysqli_query($conn, $sql);

    while ($rows = (mysqli_fetch_array($res))) 
              {

    ?>
    <tr>
      <?php if ($rows['dates'] == date('Y-m-d') && $rows['employee'] == $_SESSION['user2']): ?>
      <td scope="row" style="width: 150px;" class="fw-lighter"><?php  echo $rows['invoice']; ?></td>
      <td style="font-weight: normal;"><?php echo $rows['customer']; ?></td>
      <td><?php echo $rows['paymethod']; ?></td>
      <td><?php echo $rows['telnum']; ?></td>
      <td><?php echo $rows['total']; ?></td>
      <td><?php echo $rows['employee']; ?></td>
      <td ><a href="orders.php?id=<?php echo $rows['id']; ?>"><i title = "print" class="fa-solid fa-eye"></i></a></td>
      <?php endif ?>
    </tr>
    <?php } ?>
  </tbody>
</table>
  

  
  <?php
  if (isset($_GET['id'])) {
    // code...
    $S = $_GET['id'];
    $_SESSION['printID'] = $S;
    echo "<script>window.location.href='receipt.php'</script>";
  }



  }
          else
          {
            header('Location:login_page.php');
          }

  ?>

</body>





</html>