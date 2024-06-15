<?php
session_start();
include('database.php');

$session_id = $_SESSION['session_id'];
 if($session_id == ''){
  header("Location: index.php");
 }


//Use the information to update product

if (isset($_POST['submit'])) {

    $new_status = $_POST['new_status'];
    $new_id = $_GET['id'];

  $sql = "UPDATE orders SET 
  Order_Status = '$new_status'
  WHERE Order_ID = $new_id";
  $stmt = $conn->exec($sql);
  
  header("Location: index.php?page=Orders");
}

?>

<div class="container">
  <div class="row">
    <div class="col-md-12 text-center py-4">
      <span style="font-weight: 100; font-size: 30px;">Food</span>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12" style="padding-left: 80px; padding-right: 80px">
      <form method="POST">
        <div class="row">
          <input name="page" type="hidden" value="Orders">
          <div class="col-md-12 mb-3">
            <label><strong>Update Order</strong></label>
            <select name="new_status" class="form-control">
              <option>---Select---</option>
              <option>Order Confirmed</option>
              <option>Order Shipped</option>
              <option>Out for Delivery</option>
              <option>Delivered</option>
            </select>
          </div>
          <div class="col-md-12 text-center">
            <button name="submit" class="btn btn-warning">Update Product</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
