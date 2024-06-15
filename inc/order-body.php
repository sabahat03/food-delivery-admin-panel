<?php
include ('database.php');
session_start();
$session_id = $_SESSION['session_id'];

if ($session_id == '' || $session_id == 0) {
  header("Location: index.php");
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12" style="text-align: center; padding: 20px 0px 1px 0px">
      <span style="font-weight: 100; font-size: 30px;">
        Your Orders </span>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped-columns">
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Customer ID</th>
              <th scope="col">Order Date</th>
              <th scope="col">Order Address</th>
              <th scope="col">Order Price</th>
              <th scope="col">Order Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            try {
              $sql = "SELECT * FROM orders";
              $stmt = $conn->query($sql);
              $stmt->execute();


              while ($row = $stmt->fetch()) {
                $O_id = $row['Order_ID'];
                $c_id = $row['C_ID'];
                $o_date = $row['Order_Date'];
                $O_address = $row['Order_Destination'];
                $O_status = $row['Order_Status'];
                $O_price = $row['Order_Price'];
                if ($row != null) {
                  ?>
                  <tr>
                    <th scope="row"><?php echo $O_id ?></th>
                    <td><?php echo $c_id ?></td>
                    <td><?php echo $o_date ?></td>
                    <td><?php echo $O_address ?></td>
                    <td><?php echo $O_price ?></td>
                    <td><?php echo $O_status ?></td>
                    <td>
                      <a href="index.php?page=Update-Order&id=<?php echo $O_id ?>">
                        <i class="fa-solid fa-pen-to-square"></i></a>
                      <a onclick="myFunction()" href="index.php?page=Delete-Order&id=<?php echo $O_id ?>">
                        <i class="fa-solid fa-delete-left"></i></a>
                    </td>
                  </tr>
                  <?php
                }
              }
            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    function myFunction() {
      alert("Are you sure you want to delete this order?");
    }
  </script>