<?php 

  session_start(); 
  //unset($_SESSION['cart']);
  $tt = date('Y-m-d');
 
  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'true')
  { 

 
 
  include_once('dbconfig/config.php');
  $session_array;     
 
  if (isset($_POST['additem'])) {
 
    if (isset($_SESSION['cart'])) {
      // code...     
      $session_array_id = array_column($_SESSION['cart'], "id");
        // code...
      
      if (!in_array($_GET['id'], $session_array_id)) {
        // code...
        $session_array = array( 

        'id' => $_GET['id'],
        "item" => $_POST['item'],
        "price" => $_POST['price'],
        "quantity" => $_POST['quantity'],
      );
      $_SESSION['cart'][] = $session_array;
      }

    }
    else
    {
      if (isset($_GET['id'])) {
        // code...
        $session_array = array(

        'id' => $_GET['id'],
        "item" => $_POST['item'],
        "price" => $_POST['price'],
        "quantity" => $_POST['quantity'],
      );
         $_SESSION['cart'][] = $session_array;
      }

      
     

    }

  

  }

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
  <script type="text/javascript" src="js/jquery.js" ></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style type="text/css">
    
    body
    
    {
      font-family: "poppins", sans-serif;
    }
    .nav-side {
      position: relative;
      top: -49px;
    }

    .push-nav {
      z-index: 1;
    }

    .sidebar li .submenu{ 
        list-style: none; 
        margin: 0; 
        padding: 0; 
        padding-left: 0rem; 
        padding-right: 0rem;
        font-size: 14px;
        }
    body
    {
      background-color: #f5f5f5;
    }

    .container
    {
      width: 1400px;
      height: 500px;
      background-color: white;
      margin-top: 20px;
      padding: 0;
    }

    #Pos-form
    {
      max-width: 1100px;
      height: 500px;
      background-color: white;
      margin: 0 auto;
      position: relative;
      top: 30px;
      left: 72px;
       overflow: auto;
    }

    #Pos-form form input
    {
      width: 280px;
      margin: 10px;
      margin-left: 50px;

     
    }

    .btn
    {
      width: 220px;
      height: 35px;
    
    }
    #floatingSelect
    {
      width: 215px;
      height: 40px;
      line-height: 20px;
      padding: 2px;
      margin-right: 130px;
      margin-top: 10px;
    }
   .modals {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }
    
    .modal-contents {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 40px;
      border: 1px solid #888;
      width: 550px;
      text-align: center;
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
            <a class="nav-link text-white" href="#">Kitchen screen</a>
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
              <li><a class="dropdown-item" href="#">Change password</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="pos.php?action=logout" >Logout</a></li>
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
          <a class="nav-link text-white" href="#"><i class="fa-solid fa-user"></i> Profile </a>
          <ul class="submenu collapse">
            <li><a class="nav-link text-white" href="change-password.php"><i class="fa-solid fa-desktop"></i> change password </a></li>
            <li><a class="nav-link text-white" href="pos.php?action=logout" ><i class="fa-solid fa-right-from-bracket"></i> logout </a></li>
          </ul>

        </li>
      </ul>
    </div>

 <?php 


                if (isset($_GET['action'])) {
                  // code...
                  if ($_GET['action'] == "logout") {
                    // code...
                    session_destroy(); 
                     echo "<script>window.location.href='login_page.php'</script>";
                     exit();

                  }
                }





               ?>


    </div>

    </div>

         <div id="Pos-form">
     <form method="POST" action="POS.php">
      <div>

        <input type="text" name="cus-name" placeholder="customer name" class="form-control" style=" display: inline;" required 
        name="cus-name" id="cname">
        <input type="number" name="cus-num" placeholder="customer number" class="form-control" style=" display: inline;" required   name="cus-num" id="cnum">
        <button class="btn btn-primary" data-bs-whatever="@mdo" data-bs-toggle="modal" data-bs-target="#menuitem" type="button" style="background-color:blueviolet; margin-left: 60px;">search menu item</button>
       
        <div class="form-floating d-flex justify-content-end" id="select">
        <select class="form-select " id="floatingSelect" aria-label="Floating label select example" name= "pay-method">
            <option selected class=" text-muted">Select payment method</option>
             <option value="MOMO">Momo</option>
             <option value="Bolt">Bolt</option>
             <option value="Cash">Cash</option>
            </select>
        </div>
        <hr style=" color: grey; border: 1px solid; width: 75%; margin: 0 auto; margin-top: 18px;">
        
        </div>
        <div class="modal fade" id="menuitem" tabindex="-1" aria-labelledby="details" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content" style="overflow: auto;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="details">Add item to cart</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
          <div class="mb-3" style="overflow: auto;">

            <table style="margin: 20px auto; border-collapse: collapse; padding:200px;" class="table table-striped">
              <thead >
                <th >Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </thead>

            <?php 

              $sql = 'SELECT * FROM menu';

              $result = mysqli_query($conn, $sql);

              while ($rows = (mysqli_fetch_array($result))) 
              {
            ?>
            <form method="post" action="POS.php?id=<?php echo $rows['id']; ?>" id ="myForm">
            <tr>
              <td><?php echo $rows['item']; ?></td>
              <td><?php echo $rows['price']; ?></td>
              <input type="hidden" name="item" value="<?= $rows['item']; ?>">
              <input type="hidden" name="price" value="<?= $rows['price'] ?>">
              <td><input type="number" name="quantity" style="width:70px; outline:none;" class="form-control" value="1"></td>
              <input type="hidden" id="cus" name="cus">
              <input type="hidden" id="num" name="num">
              <td><button style="background-color: blueviolet; width:100px;" class="btn text-white"
                type="submit" name="additem">add item</button></td>
            </tr>

                
              </form>
            <?php } ?>
           

            </table>
            <script>
   window.onload = function() {
      // get the input elements
      var inputField1 = document.getElementById('cname');
      var inputField2 = document.getElementById('cnum');
      
      // get the stored values
      var storedValue1 = localStorage.getItem('inputValue1');
      var storedValue2 = localStorage.getItem('inputValue2');
      
      // set the values of the input fields
      if (storedValue1) {
        inputField1.value = storedValue1;
      }
      if (storedValue2) {
        inputField2.value = storedValue2;
      }
      
      // add event listener for when input changes
      inputField1.addEventListener('input', function() {
        // store the value in local storage
        localStorage.setItem('inputValue1', inputField1.value);
      });
      inputField2.addEventListener('input', function() {
        // store the value in local storage
        localStorage.setItem('inputValue2', inputField2.value);
      });
    }
  </script>
                
      </div>
      </div>
    </div>
  </div>
</div>
</form>

        <?php 

          $total = 0;
          $output = "";
          $output .= "

          <table class = ' my-4' style = 'width: 65%; margin: 100px auto;' >

            <tr>

              <td>Item</td>
              <td>Price</td>
              <td >Quantity</td>
              <td>Total</td>
              <td>Action</td>


            </tr>

          


          ";

          if (!empty($_SESSION['cart'])) {
            
            foreach ($_SESSION['cart'] as $key => $value) {
              $output .= "
                <tr>
              <td>".$value['item']."</td>
              <td>".$value['price']."</td>
              <td>".$value['quantity']."</td>
              <td>".number_format($value['price'] * $value['quantity'])."</td>
              <td>

              <a href = 'POS.php?action=remove&id=".$value['id']."' >
              <i title='delete' class='fa-solid fa-trash text-danger'></i>
              </a>

              </td>
              </tr>


              ";
              $total = $total + $value['quantity'] * $value['price'];

            }


            $output .= "

                <tr>
                <td colspan = '2' ></td>
                <td><b>Total</td>
                <td>".number_format($total,2)."</td>
                <input type = 'hidden' name = 'total' value = ".$total.">
                <td>
                  <a href = 'POS.php?action=clearall'>
                  <button type ='submit' class = 'btn btn-warning btn-sm text-white' style = 'width: 80px;' name = 'clear' >clear all</button>
                  </a>
                </td>

                </td>

                <tr>
                <td colspan = '1' ></td>
                <td><button class = 'btn text-white ' style='background-color:#90ee90;' type='submit' name='place_order' 
                 >Place order</button></td>



            ";

              
          }



          echo $output;

         ?>
       </form>
     


          <?php 

            if (isset($_POST['clear'])) {
              // code...
              unset($_SESSION['cart']);
               echo "<script>window.location.href='POS.php'</script>";


            }
            if (isset($_GET['action'])) {
              // code...

                if ($_GET['action'] == "remove") {
                  // code...
                   foreach ($_SESSION['cart'] as $key => $value) {
                // code...
                if ($value['id'] == $_GET['id']) {
                  // code...
                  unset($_SESSION['cart'][$key]);

                }
              }
                }


             

            }

            if (isset($_POST['place_order'])) {

                $id = uniqid();
                $cart = $_SESSION['cart'];
                $cus_name = $_POST['cus-name'];
                $cus_num = $_POST['cus-num'];
                $paymethod = $_POST['pay-method']; 
                $price = $_POST['price'];

                $username = $_SESSION['user1'];
                

                foreach ($cart as $session_array) {
                  //code...

  
                  $item_name = $session_array['item'];
                  $price = $session_array['price'];





                    if ($paymethod != "Select payment method") {
                      // code...
                      
                        // code...
                        //header('');

                      //echo "<script>window.location.reload();</script>";
                      $sql = "INSERT INTO oders(customer, telnum, paymethod, invoice, item, quantity, dates, total, employee, completed,price) VALUES ( '$cus_name','$cus_num','$paymethod','".$id."', '".$session_array['item']."', '".$session_array['quantity']."', '$tt', '$total', '$username', '0', '".$session_array['price']."')";
                      $res = mysqli_query($conn, $sql);
                      
                      //echo "<script>window.location.href='POS.php'</script>";

                   echo '<div class="modals" style="display:block;">
          <div class="modal-contents">
            <p>Your order has been placed successfully.</p>
            <i class="fa-solid fa-circle-check text-info" style = "font-size:70px;"></i>
            <b><p>invoice number #'.$id.'</p></b>
            <button onclick="window.location.href=\'orders.php\'" class="btn btn-primary">OK</button>
          </div>
        </div>';
        echo "<script>

          localStorage.removeItem('inputValue1');
        localStorage.removeItem('inputValue2');
        inputField1.value = '';
        inputField2.value = '';


        </script>";
      
                        unset($_SESSION['cart']);
                       // echo "<script>window.location.href='orders.php'</script>";

                        
                        
                      
                    }
                    else
                    {
                      
                      
                      //echo'<script>alert("   select paymentmethod")</script>';
                      echo '<div class="modals" style="display:block;">
          <div class="modal-contents">
            <h5>ERROR IN ORDER!</h5>
            <i class="fa-solid fa-circle-exclamation text-danger" style = "font-size:70px;"></i>
            <p>Order not placed</p>
            <button onclick="window.location.href=\'order_form.php\'" class="btn btn-primary">OK</button>
          </div>
        </div>';
                      
                    }
                }



                  }  


          }

          else
          {
            header('Location:login_page.php');
          }

     ?>
    





        
      </form>
      
    </div>

   



<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;  

        if(nextEl) {
            e.preventDefault(); 
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
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