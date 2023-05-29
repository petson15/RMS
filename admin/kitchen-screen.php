<?php 
    session_start();
    include_once('dbconfig/config.php');
    
    $sql = "SELECT * FROM oders ORDER BY oder_date";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
      // code...    
      echo "error in sql" . mysqli_error($conn);
    }

    $tt = date('Y-m-d');

  
 
 ?> 


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="50">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RMS||Dashboard</title>

    <link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.min.css">

</head>

<style>

    .table
    {
        margin-left: 50px;
        max-width: 1300px;
        font-weight: bold;
        font-size: 17px;
        margin: 20px auto;
    }

</style>


<body>

<nav style="background-color: #f7fdfe;">
    <img src="images/smile.png" alt="" style="margin: 10px;">
    <img src="images/smile.png" alt="" style="float: right; margin:10px;">
</nav>





<table class="table table-bordered text-center fw-lighter my-5 " id="order-table">
  <thead class="table-dark text-center ">
    <tr>
      <th scope="col" class="fw-lighter">#invoice number</th>
      <th scope="col" class="fw-lighter">Order name</th>
      <th scope="col" class="fw-lighter">Quantity</th>
      <th scope="col" class="fw-lighter">Timer</th>
      <th scope="col" class="fw-lighter">served by</th>
      <th scope="col" class="fw-lighter">Action</th>
    </tr>
  </thead>
  <tbody >
    <?php 

        while ($rows = mysqli_fetch_assoc($res)) 
          // code...
        {
          $startTime = strtotime($rows['oder_date']);
          $elapsedTime = time() - $startTime;
          $timer = date('H:i:s', $elapsedTime);
     ?>
    <tr >
      <?php if ($rows['dates'] == date('Y-m-d') && $rows['completed'] != 1): ?>
      <td scope="row" style="width: 150px;" class="fw-lighter"><?php echo $rows['invoice']; ?></td>
      <td><?php echo $rows['item']; ?></td>
      <td><?php echo $rows['quantity']; ?></td>
      <td style="color: red;" ><?php echo $timer ?></td>
      <td><?php echo $rows['employee'];?></td>
      <td><form method='post' action="kitchen-screen.php?id=<?php echo $rows['id']; ?>">
      <button class="btn  bg-primary text-white" type="submit" name="complete" style="width:150px">Complete</button></form></td>
      <?php endif ?>
    </tr>
    <?php } ?>
  </tbody>
</table>


    <?php  

    if (isset($_GET['id'])) {
      // code...

      $id = $_GET['id'];

      $sql_update = "UPDATE oders SET completed=1 WHERE id=$id";
      $res = mysqli_query($conn, $sql_update);

      if($res)
      {
        echo "<script>window.location.href='kitchen-screen.php'</script>";
      }
      else
      {
        echo "error in code". mysqli_error($conn);
      }

    }



    ?>




<!-- <script>
  function startTimer(input) {
    // Find the timer element for the current row
    var timerElement = input.parentElement.nextElementSibling.firstElementChild;

    // Initialize the timer variables for the current row
    var startTime = Date.now();
    var totalElapsedTime = 0;

    // Update the timer every second for the current row
    function updateTimer() {
      // Calculate the elapsed time in seconds for the current row
      var elapsedTime = Math.floor((Date.now() - startTime) / 1000);

      // Calculate the total elapsed time in seconds for the current row
      totalElapsedTime += elapsedTime;

      // Calculate the minutes and seconds from the total elapsed time for the current row
      var minutes = Math.floor(totalElapsedTime / 60);
      var seconds = totalElapsedTime % 60;

      // Format the time string for the current row
      var timeString = (minutes < 10 ? '0' + minutes : minutes) + ':' +
        (seconds < 10 ? '0' + seconds : seconds);

      // Update the timer element for the current row
      timerElement.innerHTML = timeString;
    }

    // Start the timer for the current row
    setInterval(updateTimer, 1000);
  }
</script> -->






    
</body>

</html>