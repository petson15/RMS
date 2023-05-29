<?php  

  session_start();
    include('dbconfig/config.php');
    $currentDate = date('Y-m-d');


    $query = "SELECT employee, 
                 SUM(CASE WHEN completed = 1 THEN price ELSE 0 END) AS completed_sum,
                 SUM(CASE WHEN completed = 0 THEN price ELSE 0 END) AS pending_sum,
                 SUM(price) AS total_sum
          FROM oders
          WHERE DATE(dates) = '$currentDate'
          GROUP BY employee";
       
                    $result = mysqli_query($conn, $query);

                    if (!$result) {
                        // code...
                        echo "<script>alert('error in sql');</script>".mysqli_error($conn);
                    }

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




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['employee', 'sales per day'],
          <?php  
          while ($row = mysqli_fetch_assoc($result)) {
            // code...
            echo "['".$row['employee']."', ".$row['total_sum']."],";
            //$_SESSION['employeeID'] = $row['id'];
          }




          ?>
          
         
        ]);

        var options = {
          title: 'Ratio of sales per employee'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


   















  <style type="text/css">
    body {
      font-family: "poppins", sans-serif;
    } 

    .nav-side
    {
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

    .item-count {
      max-width: 400px;
      height: 90px;
      background-color: grey;
    }

    #order-table {
      max-width: 50%;

    }
    .push-nav
    {
      z-index: 1;
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

    <div class="sidebar card py-4 mb-1 bg-dark my-5 "  >
      <ul class="nav flex-column text-white " id="nav_accordion" style="padding-top: 55px;">
        <li class="nav-item ">
          <a class="nav-link text-white " href="Dashboard.php"> <i class="fa-brands fa-windows"></i> Dashboard</a>
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
          <a class="nav-link text-white" href="#"><i class="fa-solid fa-user"></i> Profile </a>
          <ul class="submenu collapse">
            <li><a class="nav-link text-white" href="change-password.php"><i class="fa-solid fa-desktop"></i> change password </a></li>
            <li><a class="nav-link text-white" href="pos.php?action=logout"><i class="fa-solid fa-right-from-bracket"></i> logout </a></li>
          </ul>

        </li>
      </ul>
    </div>



  </div>

  </div>
  <?php  

      $query = " SELECT SUM(quantity) AS count FROM oders WHERE DATE(dates) = '$currentDate' ";
      $result = mysqli_query($conn, $query);

      if (!$result) {
        // code...
        echo "<script>alert('error in sql')</script>";
      }

      $count = 0;

      while ($row = mysqli_fetch_assoc($result)) {
        // code...
        $count = $row['count'];
      }


  ?>

  <div class=" container me-5">
    <form class="my-3">
      <h5 style=" margin:30px;">Dashboard Report</h5>
      <div style=" margin:30px;">
        <label for="form" style="padding: 10px;">Start date: </label>
        <input type="date" name style=" width: 150px; margin: 5px; padding: 5px; border: 1px solid white; background-color:#fafafa ; height: 35px; outline: none;" id="form">

        <label for="end" style="padding: 10px;">End date: </label>
        <input type="date" name style=" width: 150px; margin: 5px; padding: 5px; border: 1px solid white; background-color:#fafafa ; height: 35px; outline: none;" id="end">
        <button class="btn btn-md btn-primary fw-semibold" type="submit">Get Report</button>
    </form>

    <div class="item-count my-5 ">
      <div>
        <i class="fa-solid fa-cart-shopping d-flex justify-content-center text-white " style="padding-top: 10px;"></i>
        <p class="text-white d-flex justify-content-center" style="position: relative; top: 10px"><?php echo $count; ?></p>
        <p class="text-white d-flex justify-content-center" style="margin-bottom: 5px;">Item Count</p>
      </div>
    </div>
  </div>


  <div class="container text-center">
    <div class="row">
      <div class="col">
        <table class="table table-bordered text-center fw-lighter ms-4" style="display: inline;" id="order-table">
          <thead class="table-dark text-center fw-lighter">
            <p class="text-muted container ms-3">Highest menu item by quantity</p>
            <tr>
              <th scope="col" class="fw-lighter">Menu item</th>
              <th scope="col" class="fw-lighter" style="width: 5px;">Quantity</th>
              <th scope="col" class="fw-lighter">Amount</th>

            </tr>
          </thead>
          <tbody>

                <?php  
                  

                        $sql = "SELECT item,price, SUM(quantity) AS total_quantity
                        FROM oders WHERE date(dates) = '$currentDate'
                        GROUP BY item
                        ORDER BY quantity DESC ";

                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {

                ?>
            <tr>
              <th scope="row" class="fw-lighter" style="width: 350px;"><?php echo $row['item'] ?></th>
              <td style="width: 50px;"><?php echo $row['total_quantity'] ?></td>
              <td style="width: 5px;"><?php echo $row['price'] * $row['total_quantity'] ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="col" >
        <table class="table table-bordered text-center fw-lighter ms-4" style="display: inline;" id="order-table">
          <thead class="table-dark text-center fw-lighter">
            <p class="text-muted container ms-3">Highest menu item by Price</p>
            <tr>
              <th scope="col" class="fw-lighter">Menu item</th>
              <th scope="col" class="fw-lighter" style="width: 5px;">Price</th>
              <th scope="col" class="fw-lighter">Quantity</th>
            </tr>
          </thead>
          <tbody>

            <?php  

              $sql = "SELECT item,price,quantity
                        FROM oders WHERE date(dates) = '$currentDate'
                        GROUP BY item
                        ORDER BY price DESC ";


                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                          // code...
                          echo "<script>alert('error in sql')</script>";
                        }

                        while ($row = mysqli_fetch_assoc($result)) {

            ?>



            <tr>
              <th scope="row" class="fw-lighter" style="width: 350px;"><?php echo $row['item'] ?></th>
              <td style="width: 50px;"><?php echo $row['price'] ?></td>
              <td style="width: 5px;"><?php echo $row['quantity'] ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


<div class=" justify-content-center" style="margin-left: 200px;">
      
        <div id="piechart" style="width: 950px; height: 500px;" class="my-3"></div>
      
  </div>


  <?php



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