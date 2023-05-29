<?php 

  session_start();

  include_once('dbconfig/config.php');
  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'true') 
  {
 
  $item = $quantity = $unitprice = "";
  $total= 0;
  $gtot =0;
  $ptot = 0;
  if (isset($_POST['submit'])) {
    // code...
    
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $unitprice = $_POST['uprice'];
    $total = $quantity * $unitprice; 
    $tt = date('Y-m-d');

    $sql = "INSERT INTO purchase(item, quantity, unit_price, total, dates) VALUES('$item', '$quantity', '$unitprice', '$total', '$tt') ";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
      echo "query error" . mysqli_error($conn); 
    }

  }


    $sql = 'SELECT * FROM purchase';
    
    $result = mysqli_query($conn, $sql);


   
   if (isset($_GET['id'])) {
     // code...
    $id = $_GET['id'];
   $del = "DELETE FROM purchase WHERE id = '$id'";
   $del_result = mysqli_query($conn, $del);
    header('location:purchase.php');
   }

   


   



 ?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RMS||Dashboard</title>

  <link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.css">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="fonts/all.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/all.css">

  <style type="text/css">
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
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

    body {
      background-color: whites;
    }

    #floatingInput {
      width: 190px;
      height: 30px;
      padding: 5px;
      margin-left: 65px;
    }

    #del-icon {
      position: relative;
      left: 90px;
      top: -35px;
      font-size: 13px;
      cursor: pointer;
      width: 100px;
      background-color: red;
    }

     #order-table
      {
        max-width: 90%;
        margin: 0 auto;
        margin-top: 50px;
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

    <div class="sidebar card py-4 mb-1 bg-dark my-5">
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



  </div>

  </div>


  <form class="my-5 ms-5" action="purchase.php" method="post">

    <div class="container-lg text-center ">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mb-5 ms-5" style="margin-left: 30px;">
        <div class="col"><input type="number" class="form-control" id="floatingInput" placeholder="Invoice number" style = "margin-right: 100px;" name="invoice"></div>
        <div class="col">
          <input type="text" class="form-control" id="floatingInput" placeholder="supplier" style="margin-left: 90px;" name="supplier">
        </div>
        <div class="col">
          <input type="number" class="form-control" id="floatingInput" placeholder="receipt number" style="margin-left: 100px;" name="receipt">
        </div>
      </div>
      <table class="table table-bordered text-center fw-lighter mb-5" id="order-table">
  <thead class="table-dark text-center fw-lighter">
    <tr>
      <th scope="col" class="fw-lighter">Item name</th>
      <th scope="col" class="fw-lighter">Quantity</th>
      <th scope="col" class="fw-lighter">Unit price</th>
      <th scope="col" class="fw-lighter">Total</th>
      <th scope="col" class="fw-lighter">Action</th>
    </tr>
  </thead>
  <tbody >
   <?php 


   while ($rows = mysqli_fetch_assoc($result)) {
     
    ?>
      <tr>
        <?php if ($rows['dates'] == date('Y-m-d')): 

         // $sq = 'SELECT SUM(total) FROM purchase';
         // $q = mysqli_query($conn, $sq);
         // $row = mysqli_fetch_array($q);
          //$sum = $row[0];

          $sum = $rows['total'];
          $gtot = $gtot + $sum;
          $ptot = $gtot;
          ?>

           <td><?php echo $rows['item']; ?></td>
        <td><?php echo $rows['quantity']; ?></td>
        <td><?php echo $rows['unit_price']; ?></td>
        <td><?php echo $rows['total']; ?></td>
        <td><a href="purchase.php?id=<?php echo $rows['id']; ?>"><i class='fa-solid fa-trash'></i> </a>

        </td>
        
        <?php endif ?>
       
      </tr>
      <?php 
    }

     ?>
  </tbody>
</table>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
        <div class="col"><input type="text" name="item" class="form-control item" id="floatingInput" placeholder="item" value="<?php echo $item; ?>" required></div>
        <div class="col">
          <input type="number" name="quantity" class="form-control quantity" id="floatingInput" placeholder="quantity" style="margin-left: 12px;" value="<?php echo $quantity; ?>">
        </div>
        <div class="col">
          <input type="number" name="uprice" class="form-control unit-price" id="floatingInput" placeholder="unit price" style="margin-left: -25px;" value="<?php echo $unitprice; ?>">
        </div>
        <div class="col">
          <input type="number" name="total" disabled class="form-control total" id="floatingInput" placeholder="total" style="margin-left: -65px;" value="<?php echo $total; ?>">
          <button id="del-icon" class="btn text-white" style="background-color:blueviolet; width: 130px;" type="submit" name="submit">Add purchase</button>
        </div>
      </div>
      <span style="margin-left: 840px; font-weight: bold;">Total:
        <input type="number" name="gtotal" disabled style=" outline: none; border: none; float: right; " value="<?php echo $gtot ?>">
      </span>

      <button class="btn text-white" type="submit" name="save" style="background-color: blueviolet; margin-left:180px; padding-left:40px;padding-right: 30px; font-size: 18px;"><i class="fa-solid fa-1x fa-floppy-disk" style="margin-right: 20px; font-size: 23px;"></i>Save Purchase</button>      
  </form>

<?php 
    
      if (isset($_POST['save'])) {
    // code...
    $invoice = $_POST['invoice'];
    $supplier = $_POST['supplier'];
    $receipt = $_POST['receipt'];
    $tt = date('Y-m-d H:i:s');

    $sql = "INSERT INTO tpurchase(invoice, supplier, receipt, total, created_at) VALUES('$invoice', '$supplier', '$receipt', '$ptot', '$tt')";

    $result = mysqli_query($conn, $sql);

    if(!$result)
    {
      echo "querry error". mysqli_error($conn);
    }

  }



  ?>



  <script type="text/javascript">
    const addpurchase = document.querySelector('#del-icon');
    const item = document.querySelector('.item');
    let unitprice = document.querySelector('.unit-price');
    let quantity = document.querySelector('.quantity');
    const divList = document.querySelector('.listHolder');
    let total = document.querySelector('.total');


    function purchase() {
        total.value = quantity.value * unitprice.value;
        grandtotal.value = 0;
      }
  

    addpurchase.addEventListener('click', () => {
      purchase();


    });

    

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
<?php  
  
  }
          else
          {
            header('Location:login_page.php');
          }


?>
</html>