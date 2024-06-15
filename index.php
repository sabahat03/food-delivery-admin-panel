<?php

// Check if the 'page' key exists in the $_GET array
$page_name = isset($_GET['page']) ? $_GET['page'] : '';

// Include the appropriate files based on the value of the 'page' parameter
switch ($page_name) {
    case 'Register':
        include 'inc/header.php';
        include 'inc/register-body.php';
        include 'inc/footer.php';
        break;
    case 'Forgot-Password':
        include 'inc/header.php';
        include 'inc/forgot-password-body.php';
        include 'inc/footer.php';
        break;
    case 'Authenticate':
        include 'inc/header.php';
        include 'inc/authenticate-body.php';
        include 'inc/footer.php';
        break;
    case 'Dashboard':
        include 'inc/header-1.php';
        include 'inc/nav-bar.php';
        include 'inc/dashboard-body.php';
        include 'inc/footer-1.php';
        break;
    case 'Fooditem':
        include 'inc/header.php';
        include 'inc/nav-bar.php';
        include 'inc/fooditem-body.php';
        include 'inc/footer.php';
        break;
    case 'Locations':
        include 'inc/header.php';
        include 'inc/nav-bar.php';
        include 'inc/locations-body.php';
        include 'inc/footer.php';
        break;
    case 'Orders':
        include 'inc/header.php';
        include 'inc/nav-bar.php';
        include 'inc/order-body.php';
        include 'inc/footer.php';
        break;
    case 'Logout':
        include 'inc/header.php';
        include 'inc/logout-body.php';
        include 'inc/footer.php';
        break;
    case 'Delete-Order':
        include 'inc/header.php';
        include 'inc/header-1.php';
        include 'inc/delete-order.php';
        include 'inc/footer-1.php';
        include 'inc/footer.php';
        break;
    case 'Update-Order':
        include 'inc/header.php';
        include 'inc/header-1.php';
        include 'inc/update-order.php';
        include 'inc/footer-1.php';
        include 'inc/footer.php';
        break;
    default:
        include 'inc/header.php';
        include 'inc/login-body.php';
        include 'inc/footer.php';
        break;
}

?>
