<?php  
  
  session_start();
  include_once('dbconfig/config.php');


  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'true')
  {

  $sql = 'SELECT * FROM menu';
  $result = mysqli_query($conn, $sql);
 
  if (isset($_POST['add'])) { 

      $name = $_POST['name'];
      $price = $_POST['price'];
      
      $sql = "INSERT INTO menu(item,price) VALUES('$name', '$price')";
       $res = mysqli_query($conn, $sql);

      if (!$result) {
        echo "error in querry". mysqli_error($conn);
      }
      else
      {
        header('Location:menu.php'); 
      }
 
      }

    if (isset($_GET['id'])) {
     // code...
    $id = $_GET['id'];
   $del = "DELETE FROM menu WHERE id = '$id'";
   $del_result = mysqli_query($conn, $del);

    $uname = $_POST['name'];
     $uprice = $_POST['uprice'];

     $sql = "UPDATE menu SET item = '$uname' AND price = '$uprice' WHERE id = '$id' ";
     $ures = mysqli_query($conn, $sql);

     if (!$res) {
        echo "error in querry". mysqli_error($conn);
      }

    header('location:menu.php');
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
    <link rel="stylesheet" type="text/css" href="ajax/main.js">
   <script type="text/javascript" src="js/jquery.js" ></script>

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

        .sales {
            max-width: 72%;
            margin-left: 20%;
        }
        .fa-solid
        {
            cursor: pointer;
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

    <h4 class="me-1 my-3 container text-muted ">Menu Items</h4>
        <button style="float: right; margin-right: 120px;" class="btn btn-sm bg-primary text-white"
        data-bs-whatever="@mdo" data-bs-toggle="modal" data-bs-target="#additem" type="button">Add item</button>

    <div class="container d-flex justify-content-center sales my-5">
        <table class="table table-bordered text-center fw-lighter" id="order-table">
            <thead class="table-dark text-center fw-lighter">
                <tr>
                    <th scope="col" class="fw-lighter">Menu item</th>
                    <th scope="col" class="fw-lighter">Price</th>
                    <th scope="col" class="fw-lighter">Action</th>
                </tr>
            </thead>
            <tbody>
                
                  <?php 

                    while ($rows = mysqli_fetch_assoc($result)) 
                    {
                  ?><tr>
                      <td scope="col" class="fw-lighter"><?php echo $rows['item']; ?></td>
                    <td><?php echo "GHC  ". $rows['price']; ?></td>
                    <td class="edit_p" id="<?php echo $rows['id']; ?>"><i title="edit" class="fa-solid fa-edit text-primary " 
                    data-bs-whatever="@mdo" type="button"></i> 
                        <a href="menu.php?id=<?php echo $rows['id']; ?>"><i title="delete" class="fa-solid fa-trash text-danger"></i>
                   </td> 
                   </tr>
                    <div class="modal fade" id="additem" tabindex="-1" aria-labelledby="details" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="details">Add menu item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="menu.php">
          <div class="mb-3">
            <label for="item-name" class="col-form-label">Item Name:</label>
            <input type="text" class="form-control" id="item-name" required name="name">
          </div>
          <div class="mb-3">
            <label for="Price" class="col-form-label">Price:</label>
            <input type="number" class="form-control" id="price" required name="price"> 
          </div>
          <div class="modal-footer justify-content-center" style=" margin: 10px" >
        <button type="submit" name = "add" class="btn btn-primary">Add item</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="details" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="details">Update menu item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body load_edit_info">
       
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

                   <?php  } ?>
                   
                
            </tbody>
        </table>
    </div>

  




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





        $(document).ready(function(){

               $(".edit_p").click(function(){
                  let id = $(this).attr("id");
                

                $("#edit").modal("show");
                 
                  $.ajax({
                    url: "ajax/load_edit.php",
                    method: "POST",
                  //  dataType: "JSON",
                    data: {id},
                    success:function(data){
                        $(".load_edit_info").html(data);

                    }
                  })
               });





               $(document).on("click",".update",function(e){
                e.preventDefault();

                let id = $(this).attr("id");
                let item = $("#item_name_p").val();
                let price = $("#item_price"+id).val();

             

                   $.ajax({
                    url: "ajax/update_item.php",
                    method: "POST",
                  //  dataType: "JSON",
                    data: {id,item,price},
                    success:function(data){
                        $(".load_edit_info").html(data);

                    }
                  })
               })

        })
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