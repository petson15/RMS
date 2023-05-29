<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>admin||POS</title>

  <link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="fonts/all.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/all.css">

  <style type="text/css"> 
    
    body
    
    {
      font-family: "poppins", sans-serif;
    }
    .sidebar li .submenu{ 
        list-style: none; 
        margin: 0; 
        padding: 0; 
        padding-left: 0rem; 
        padding-right: 0rem;
        font-size: 14px;
        }

  </style>

</head>
<body>

  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand ms-4" href="#"><img src="images/smile.png" style=" height: 40px; width: 50px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-5 ps-2" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Kitchen screen</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventory
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Add Purchase</a></li>
            <li><a class="dropdown-item" href="#">Today sales</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Close daily stock</a></li>
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
             <li><hr class="dropdown-divider"></li>
             <li><a class="dropdown-item" href="#">Logout</a></li>
             </ul>
              </div>
               <span class="me-5 text-white"><small>name</small></span>
      </form>
    </div>
  </div>
</nav>

  <div style=" width: 160px; height: 98vh; float: left; position: fixed; display: block;" class="text-white bg-dark">

    <div class="sidebar card py-2 mb-4 bg-dark my-3">
        <ul class="nav flex-column text-white" id="nav_accordion">
         <li class="nav-item ">
          <a class="nav-link text-white" href="Dashboard"> <i class="fa-brands fa-windows"></i>  Dashboard</a>
        </li>
        <li class="nav-item has-submenu my-2">
         <a class="nav-link text-white" href="#"> <i class="fa-sharp fa-solid fa-warehouse"></i>  Inventory</a>
         <ul class="submenu collapse">
          <li><a class="nav-link text-white" href="#"><i class="fa-solid fa-cart-shopping"></i> Add Purchase </a></li>
         <li><a class="nav-link text-white" href="#"><i class="fa-sharp fa-solid fa-money-bill"></i> Today sales</a></li>
         <li><a class="nav-link text-white" href="#"><i class="fa-solid fa-hand-holding-dollar"></i> Close daily stock</a> </li>
          </ul>
         </li>
        <li class="nav-item has-submenu my-2">
        <a class="nav-link text-white" href="#"><i class="fa-solid fa-desktop"></i> Pos-Order  </a>
       <ul class="submenu collapse">
      <li><a class="nav-link text-white" href="#"><i class="fa-solid fa-desktop"></i> Order </a></li>
      <li><a class="nav-link text-white" href="#"><i class="fa-solid fa-desktop"></i> My orders </a></li>
      </ul>
      </li>
       <li class="nav-item my-2">
       <a class="nav-link text-white" href="#"><i class="fa-sharp fa-solid fa-utensils"></i> Menu items</a>
      </li>
       <li class="nav-item my-2">
       <a class="nav-link text-white" href="#"><i class="fa-solid fa-user"></i> Profile </a>
       <ul class="submenu collapse">
        <li><a class="nav-link text-white" href="#"><i class="fa-solid fa-desktop"></i> change password </a></li>
        <li><a class="nav-link text-white" href="#"><i class="fa-solid fa-right-from-bracket"></i> logout </a></li>
       </ul>

       </li>
      </ul>
    </div>



  </div>
 
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