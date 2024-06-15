<?php
session_start();
include('database.php');

$session_id = $_SESSION['session_id'];
 if($session_id == ''){
  header("Location: index.php");
 }

//Use the information to update product

if (isset($_POST['submit'])) {
  $pro_name = $_POST['Productname'];
  $pro_rp = $_POST['Regularprice'];
  $pro_desc = addslashes($_POST['Productdesc']);
  $pro_img = $_POST['photo'];

  $sql = "UPDATE products SET 
  pro_name = '$pro_name' ,
  pro_rp = '$pro_rp' ,
  pro_desc = '$pro_desc' ,
  pro_img = '$pro_img'
  WHERE products.prod_id = 3";
  $stmt = $conn->exec($sql);
}

//Select Statement.

$stmt = "SELECT * FROM products where prod_id = 3";
$sql = $conn->prepare("$stmt");
$sql->execute();
$result = $sql->fetchAll(PDO :: FETCH_OBJ);
foreach($result as $data){
  $p_id = $data->prod_id;
  $p_name = $data->pro_name;
  $p_desc = $data->pro_desc;
  $p_rp = $data->pro_rp;
  $p_img = $data->pro_img;
}

?>

<div class="container">
  <div class="row">
    <div class="col-md-12 text-center py-4">
      <span style="font-weight: 100; font-size: 30px;">Food</span>
    </div>
  </div>
</div>

<div class="countainer">
  <div class="row">
    <div class="col-md-3" style="text-align:center" >
      <img src=<?php echo $p_img?> height="320px" width="240px" class="main-product" alt="Main Burger Image">
    </div>

    <div class="col-md-9">
      <form method="POST">
        <div class="row">

          
            <div class="col-md-12 mb-3">
              <label for="Productname"><strong>Item Name</strong></label>
              <input type="text" name="Productname" class="form-control"
                value=<?php echo $p_name?>>
            </div>
            <div class="col-md-6 mb-3">
              <label for="Regularprice"><strong>Regular Price($)</strong></label>
              <input type="text" id="Regularprice" name="Regularprice" class="form-control" value=<?php echo $p_rp?>>
            </div>
            <div class="col-md-12 mb-3">
              <label for="Productdesc"><strong>Description</strong></label>
              <textarea class="form-control" id="Productdesc" name="Productdesc"
                style="height: 160px;"><?php echo $p_desc?></textarea>
            </div>
            <div class="col-md-6 mb-3">
            <label for="photo-1"><strong>Image Url</strong></label>
              <input type="url" name="photo" class="form-control" value=<?php echo $p_img?>>
            </div>
            <div class="col-md-12 text-center">
              <button name="submit" class="btn btn-warning">Update Product</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>