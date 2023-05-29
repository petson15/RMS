<?php  

    session_start();
    include('dbconfig/config.php');

    $id = $_SESSION['printID'];
    $output="";
    $total = 0;
    $served_by = "";

    $sql = "SELECT * FROM oders WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);

    echo "<img src='images/smile.png' style=' height: 60px; width: 90px; margin-left:80px;'>";

    if (!$res) {
        // code...
        echo mysql_error($conn);
    }
    $output .= 
    "
                   <table style = 'text-align:center; margin-top:40px; font-size:12px'>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sub total</th>

    ";


        $rows = mysqli_fetch_assoc($res);
       $originalInvoice =$rows['invoice'];

       $sql1 = "SELECT DISTINCT employee,total,customer,telnum,oder_date FROM oders WHERE invoice = '$originalInvoice'";
       $res2 = mysqli_query($conn, $sql1);

       while ($row = mysqli_fetch_assoc($res2))
        {
            // code...
            echo "<h3>Invoice</h3>";
            echo "<p style = 'font-size:12px'>Branch - Madina </P>";
            echo "<p style = 'font-size:12px;'>Address: P.O BOX NT 564 </P>";
            echo "<p style = 'font-size:12px'><b>Invoice number -</b> ".$originalInvoice."</p>";
            echo "<p style = 'font-size:12px'><b>Customer name -</b> ".$row['customer']."</p>";
            echo "<p style = 'font-size:12px'><b>Tel number -</b> ".$row['telnum']."</p>";
            echo "<p style = 'font-size:12px'><b>Date -</b> ".$row['oder_date']."</p>";

                $sql = 'SELECT * FROM oders';
                $res = mysqli_query($conn, $sql);
                $total = $row['total'];
                $served_by = $row['employee'];
                
}
             
              while ($rows = mysqli_fetch_assoc($res)) {
                  // code...

                if ($rows['invoice'] == $originalInvoice) {
                    // code...

                    $output .= "

                  <tr >
                    <td >".$rows['item']."</td>
                  <td >".$rows['quantity']."</td>
                  <td >".$rows['price']."</td>
                   <td >".$rows['price']."</td>
                  </tr> 


              ";


                }


               
              }
              $output .= "

              <tr>
              <td></td>
              </tr>
                  <tr>
              <td></td>
              </tr>
                  
                  </tr>
                  <tr>
                  <td colspan ='2'></td>
                  <td><b>Total: ".$total."</td>

                  </tr>

              ";


        $output .= "

        <p style = 'font-size:12px'>served by: ".$served_by."</p>

        " ;

        echo $output;
        
   

echo "

    <script>
window.onload = function() {
  window.print();
};
</script>

";

?>