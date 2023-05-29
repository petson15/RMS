<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RMS||Dashboard</title>

    <link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootsrap/bootstrap.min.css">

</head>

<style>

    .table
    {
        margin-left: 30px;
        max-width: 1300px;
        font-weight: bold;
        font-size: 17px;
    }

</style>


<body>

<nav style="background-color: #f7fdfe;">
    <img src="images/smile.png" alt="" style="margin: 10px;">
    <img src="images/smile.png" alt="" style="float: right; margin:10px;">
</nav>

<form action="">
<table class="table table-bordered text-center fw-lighter my-5 " id="order-table">
  <thead class="table-dark text-center ">
    <tr>
      <th scope="col" class="fw-lighter">#invoice number</th>
      <th scope="col" class="fw-lighter">Order name</th>
      <th scope="col" class="fw-lighter">Quantity</th>
      <th scope="col" class="fw-lighter">Note</th>
      <th scope="col" class="fw-lighter">Timer</th>
      <th scope="col" class="fw-lighter">served by</th>
      <th scope="col" class="fw-lighter">Action</th>
    </tr>
  </thead>
  <tbody >
    <tr >
      <th scope="row" style="width: 150px;" class="fw-lighter">1</th>
      <td>indomi</td>
      <td>3</td>
      <td style="color: blue;">extra meat</td>
      <td style="color: red;">20:00</td>
      <td>serwaa</td>
      <td><button class="btn bg-primary text-white" type="submit">complete order</button></td>
    </tr>
  </tbody>
</table>

</form>

    
</body>

</html>