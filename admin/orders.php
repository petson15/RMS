<?php  
 
  session_start(); 
    include('dbconfig/config.php');
     $tt = date('Y-m-d');

    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'true')
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

    .push-nav {
      z-index: 1;
    }


    .sidebar li .submenu {
      list-style: none;
      margin: 0;
      padding: 0;
      padding-left: 0rem;
      padding-right: 0rem;
      font-size: 14px;
    }

    #order-table {
      max-width: 78%;
      margin: 26px auto;
      margin-top: 110px;
      margin-right: 70px;
    }

    #search-btn input {
      width: 170px;
      position: relative;
      margin-top: 82px;
      margin-bottom: -108px;
      left: -17px;
      height: 32px;

    }
  </style>

</head>

<body>

<nav class="navbar navbar navbar-expand-lg bg-dark navbar-dark push-nav">
    <div class="container-fluid">
      <a class="navbar-brand ms-4" href="#"><img src="images/smile.png" style=" height: 40px; width: 50px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ms-5 ps-2" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="kitchen-screen.php">Kitchen screen</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Inventory
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="purchase.php">Add Purchase</a></li>
              <li><a class="dropdown-item" href="today-sales.php">Today sales</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="close-stock.php">Close daily stock</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="images/avatar.jpeg" class="me-4" style=" height: 25px; width: 25px; border-radius: 50%;">
            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="change-password.php">Change password</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="pos.php?action=logout">Logout</a></li>
            </ul>
          </div>
          <span class="me-5 text-white"><small><?php echo $_SESSION['user1']; ?></small></span>
        </form>
      </div>
    </div>
  </nav>

  <div style=" width: 160px; height: 120vh; float: left; position: fixed; display: block;" class="text-white bg-dark nav-side">

    <div class="sidebar card py-4 mb-1 bg-dark my-5"  >
      <ul class="nav flex-column text-white" id="nav_accordion" style="padding-top: 55px;">
        <li class="nav-item ">
          <a class="nav-link text-white" href="Dashboard.php"> <i class="fa-brands fa-windows"></i> Dashboard</a>
        </li>
        <li class="nav-item has-submenu my-2">
          <a class="nav-link text-white" href="#"> <i class="fa-sharp fa-solid fa-warehouse"></i> Inventory</a>
          <ul class="submenu collapse">
            <li><a class="nav-link text-white" href="purchase.php"><i class="fa-solid fa-cart-shopping"></i> Add Purchase </a></li>
            <li><a class="nav-link text-white" href="today-sales.php"><i class="fa-sharp fa-solid fa-money-bill"></i> Today sales</a></li>
            <li><a class="nav-link text-white" href="close-stock.php"><i class="fa-solid fa-hand-holding-dollar"></i> Close daily stock</a> </li>
          </ul>
        </li>
        <li class="nav-item has-submenu my-2">
          <a class="nav-link text-white" href="#"><i class="fa-solid fa-desktop"></i> Pos-Order </a>
          <ul class="submenu collapse">
            <li><a class="nav-link text-white" href="POS.php"><i class="fa-solid fa-desktop"></i> Order </a></li>
            <li><a class="nav-link text-white" href="orders.php"><i class="fa-solid fa-desktop"></i> My orders </a></li>
          </ul>
        </li>
        <li class="nav-item my-2">
          <a class="nav-link text-white" href="menu.php"><i class="fa-sharp fa-solid fa-utensils"></i> Menu items</a>
        </li>
        <li class="nav-item my-2">
          <a class="nav-link text-white" href="close-stock.php"><i class="fa-solid fa-user"></i> Profile </a>
          <ul class="submenu collapse">
            <li><a class="nav-link text-white" href="change-password.php"><i class="fa-solid fa-desktop"></i> change password </a></li>
            <li><a class="nav-link text-white" href="pos.php?action=logout"><i class="fa-solid fa-right-from-bracket"></i> logout </a></li>
          </ul>

        </li>
      </ul>
    </div>



    </div>

    </div>


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
      <?php if ($rows['dates'] == date('Y-m-d') && $rows['employee'] == $_SESSION['user1']): ?>
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

  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {

        element.addEventListener('click', function(e) {

          let nextEl = element.nextElementSibling;
          let parentEl = element.parentElement;

          if (nextEl) {
            e.preventDefault();
            let mycollapse = new bootstrap.Collapse(nextEl);

            if (nextEl.classList.contains('show')) {
              mycollapse.hide();
            } else {
              mycollapse.show();
              // find other submenus with class=show
              var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
              // if it exists, then close all of them
              if (opened_submenu) {
                new bootstrap.Collapse(opened_submenu);
              }
            }
          }
        }); // addEventListener
      }) // forEach
    });
    // DOMContentLoaded  end
  </script>
</body>

</html>