<?php
session_start();
include('database.php');

$message = '';

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $useremail = $_POST['email'];
    $usermobile = $_POST['yourmobile'];
    $userpassword = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($userpassword === $confirmpassword) {
        $encrypted_password = md5($userpassword);

        $sql = "INSERT INTO users (user_name, user_email, user_mobile, user_password) VALUES (:username, :useremail, :usermobile, :userpassword)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':useremail', $useremail);
        $stmt->bindParam(':usermobile', $usermobile);
        $stmt->bindParam(':userpassword', $encrypted_password);

        if ($stmt->execute()) {
            $message = 'User registered successfully.';
            $last_id = $conn->lastInsertId();

        } else {
            $message = 'There was an error registering the user.';
        }
    } else {
        $message = 'Password and confirm password do not match.';
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <!-- Admin Panel HTML Code written here -->
    <div class="container-fluid">
        <div class="row justify-content-center" style="padding-top: 20px;">
            <div class="col-md-6 col-lg-4" style="text-align: center; background-color: white; border-radius: 20px; padding: 30px;">
                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 20px;">
                        <img src="assets/foodlogo.png" height="170">
                    </div>
                    <div class="col-md-12">
                        <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 100; font-size: 18px;">Register A New Account For Free</span>
                
                        <?php
                        if ($message != '') {
                            echo "<br>";
                            echo "<span style='color:red'>$message</span>";
                        }
                        ?>
                    </div>

                    <?php if ($message == 'User registered successfully.'): ?>
                        <div class="col-md-12">
                            Dear <?php echo htmlspecialchars($username); ?>, your registration is successful, you can now <a href="index.php?page=Login">Login</a>.
                        </div>
                    <?php endif; ?>

                    <div class="col-md-12">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-12" style="text-align: left; padding-top: 15px;">
                                    <label style="font-size: 16px;">Your Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control" required>
                                </div>

                                <div class="col-md-12" style="text-align: left; padding-top: 15px;">
                                    <label style="font-size: 16px;">Your Email (Email Will Be the Username)</label>
                                    <input type="email" name="email" placeholder="Email ID" class="form-control" required>
                                </div>

                                <div class="col-md-12" style="text-align: left; padding-top: 15px;">
                                    <label style="font-size: 16px;">Your Mobile</label>
                                    <input type="number" name="yourmobile" placeholder="11 Digit Mobile Number" class="form-control" required>
                                </div>

                                <div class="col-md-12" style="text-align: left; padding-top: 15px;">
                                    <label style="font-size: 16px;">Your Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                                </div>

                                <div class="col-md-12" style="text-align: left; padding-top: 15px;">
                                    <label style="font-size: 16px;">Confirm Password</label>
                                    <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" required>
                                </div>

                                <div class="col-md-12" style="text-align: center; padding-top: 20px;">
                                    <button name="submit" class="btn btn-warning">Register Now</button>
                                </div>
                                <div class="col-md-12" style="text-align: center; padding-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-12" style="font-size: 12px;">
                                            <a href="index.php" style="text-decoration: none; color: blue;">Already Have an Account? Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>