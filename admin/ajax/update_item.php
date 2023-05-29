<?php 


  include_once('../dbconfig/config.php');

  $id = $_POST['id'];
 
  $item = $_POST['item'];
  $price = $_POST['price'];


  $query = "UPDATE menu SET item = '$item', price = '$price' WHERE id = '$id'";
  $res = mysqli_query($conn,$query);


  if($res){
     echo "Item updated";
     

  }else{
  	echo "failed to update";
  }






 ?>