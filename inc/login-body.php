<?php
session_start();
include ('database.php');

// $id = $_GET['id'];

if(isset($_POST['submit'])){

    $useremail = $_POST['useremail'];
    $userpassword = $_POST['password'];
    $encrypted_password = md5($userpassword);
    
    $select_user = "SELECT * FROM users WHERE  user_email = '$useremail' AND user_password = '$encrypted_password'";
    $sql = $conn->prepare($select_user);
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_OBJ);
    if($data != NUll)
    {foreach ($data as $row);

    $user_id = $row->id;
    $user_name = $row->$user_name;
    $user_email = $row->$user_email;
    $user_mobile = $row->$user_mobile;


    if($user_id != ''){

        $_SESSION['session_id'] = $user_id;
        $_SESSION['session_name'] = $user_name;
        $_SESSION['session_email'] = $user_email;
        $_SESSION['session_mobile'] = $user_mobile;

        header("Location: index.php?page=Authenticate");
    }}
}

?>



<body>
    <!-- Admin Panel HTML Code written here -->
    <div class="container-fluid">
        <div class="row" style="padding-top: 7%;">
            <div class="col-md-4"></div>
            <div class="col-md-4"
                style="text-align: center; background-color: white; border-radius: 20px; padding: 30px;">
                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 15px;">
                        <img src="assets/foodlogo.png" height="170">
                    </div>
                    <div class="col-md-12">
                        <span
                            style=" font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight : 100; font-size: 18px;">Login
                            to Your Account</span>
                    </div>
                    <div class="col-md-12">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-12" style="text-align: left; padding-top: 15px;">
                                    <label style="font-size: 16px;">Your Email</label>
                                    <input type="email" name="useremail" placeholder="User Email" class="form-control">
                                </div>

                                <div class="col-md-12" style="text-align: left; padding-top: 15px;">
                                    <label style="font-size: 16px;">Your Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                </div>
                                <div class="col-md-12"
                                    style="text-align: center; font-size: 14px; font-weight: 200; padding: 10px 20px 10px 20px;">
                                    <!-- <a href="index.php?page=Authenticate" class="btn btn-warning">Login Now</a> -->

                                    <button name="submit" class="btn btn-warning">Login Now</button>
                                </div>
                                <div class="col-md-12"
                                    style="text-align: center; font-size: 14px; font-weight: 200; padding: 10px 20px 5px 20px;">
                                    <div class="row">
                                        <div class="col-md-6"
                                            style="text-align: left; font-size: 12px; font-weight: 100;">
                                            <a href="index.php?page=Register"
                                                style="text-decoration: none; color: blue;">No Account? Register Now</a>
                                        </div>
                                        <div class="col-md-6"
                                            style="text-align: right; font-size: 12px; font-weight: 100;">
                                            <a href="index.php?page=Forgot-Password"
                                                style="text-decoration: none; color: blue;">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>