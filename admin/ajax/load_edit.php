<?php 

  include_once('../dbconfig/config.php');

 
   $id = $_POST['id'];
   $sql = "SELECT * FROM menu WHERE id ='$id' ";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);

  

  $output = ' <form action="menu.php" action="post">
          <div class="mb-3">
            <label for="item-name" class="col-form-label">Item Name:</label>
            <input type="text"name ="uname" class="form-control "  id="item_name_p" required value="'.$row["item"].'">
          </div>
          <div class="mb-3">
            <label for="Price" class="col-form-label">Price:</label>
            <input class="form-control" name="uprice" id="item_price'.$row['id'].'" required value="'.$row["price"].'" >
          </div>
          <div class="modal-footer justify-content-center" style=" margin: 10px" >
        <button name="update" class="btn btn-primary update" id="'.$row['id'].'" type="submit">Update</button>';


        echo $output;

       


 ?>