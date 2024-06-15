<?php 
  session_start();
  $session_id = $_SESSION['session_id'];

   if($session_id == ''){
    header("Location: index.php");
   }
?>

<div class="container">
      <div class="row">
        <div class="col-md-12" style="text-align: center; padding: 20px 0px 1px 0px">
          <span style="font-weight: 100; font-size: 30px;">
          Welcome Back!</span>
        </div>
      </div>
      <div class="row mt-5 text-center">
        <div class="col-md-4">
          <div class="card">
            <a href="index.php?page=Dashboard" style="text-decoration: none; font-weight: 500; font-size: 18px;">
              <img src="assets/house.png" height="120px">
              <span class="text-below-image">Dashboard</span>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <a href="index.php?page=Fooditem" style="text-decoration: none; font-weight: 500; font-size: 18px;">
              <img src="assets/fast-food.png" height="120px">
              <span class="text-below-image">Food</span>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <a href="index.php?page=Locations" style="text-decoration: none; font-weight: 500; font-size: 18px;">
              <img src="assets/map.png" height="120px">
              <span class="text-below-image">Locations</span>
            </a>
          </div>
        </div>
      </div>
      <div class="row mt-5 text-center">
        <div class="col-md-2"></div>
        <div class="col-md-4">
          <div class="card">
            <a href="index.php?page=Orders" style="text-decoration: none; font-weight: 500; font-size: 18px;">
              <img src="assets/order.png" height="120px">
              <span class="text-below-image">Orders</span>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <a href="index.php?page=Logout" style="text-decoration: none; font-weight: 500; font-size: 18px;">
              <img src="assets/check-out.png" height="120px">
              <span class="text-below-image">Logout</span>
            </a>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>