<?php
    $conn = mysqli_connect('localhost', 'root', '', 'rms');

    if (!$conn) {
        echo "error in connection" . mysqli_connect_error();
    }
  
  

?>