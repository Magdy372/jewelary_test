<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user_role = $_SESSION['user_role'];
if ($user_role !== "1") {
    // Redirect to another page or display an access denied message
    header("Location: access_denied.php");
    exit();
}

define('__ROOT__', "../");

require_once(__ROOT__ . "model/Product.php");
require_once(__ROOT__ . "controller/ProductController.php");

$model = new Product();
$productController = new ProductController($model);
$totalProducts = $productController->getTotalProducts();



require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/AdminController.php");

$modeladmin = new Users();
$adminController = new AdminController($modeladmin);
$totalAdmins = $adminController->getTotalAdmins();



require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UserController.php");

$modeluser = new Users();
$userController = new UserController($modeluser);
$totalUsers = $userController->getTotalUsers();


?>
<!DOCTYPE html>
<html>

<head>
    <title>Jewelry Website</title>
    <style>
        /* CSS for styling the navbar */
        .navbar {
            width: 250px;
            height: 100%;
            background-color: white;
            position: fixed;
            left: 0;
            top: 0;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        body {
    color: black;
    background: #D3D3D3;
    font-family: 'Lato', sans-serif;
    font-size: 15px;
    line-height: 1.42857;
    margin-left: 300px; /* Increase the margin to shift the content further right */
}

        .navbar a {
            display: block;
            width: 60%;
            padding: 10px 20px;
            text-decoration: none;
            text-align: center;
            color: white;
            font-weight: bold;
            margin: 10px 0;
            border-radius: 5px;
            background-color: gray;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }

        .content {
            margin-left: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .stat-box {
            width: 30%;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
            }

            .navbar {
                width: 200px;
                height: 100%;
                background-color: #333;
                position: fixed;
                left: 0;
                top: 0;
                color: white;
                padding: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .content {
                margin-left: 0;
            }
        }

        .logo {
            width: 150px;
            height: auto;
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .navbar {
                width: 100%;
                background-color: #007BFF;
                padding: 10px;
                align-items: flex-start;
            }

            .navbar a {
                padding: 10px 20px;
                margin: 10px 0;
            }

            .logo {
                width: 100px;
                margin: 10px 0;
            }
        }

    </style>
</head>

<body>

    <div class="navbar">
        <img src="alhedia.png" alt="Jewelry Website Logo" class="logo">
        <!-- Logo inside the navbar -->
        <a href="admin.php">Admin Dashboard</a>
        <!-- <a href="add_admin.php">Add Admin</a> -->
        <a href="crud.php">Product</a>
        <a href="usercrud.php">Users</a>
        <a href="Admins.php">Admins</a>
    </div>

    <div class="content"> 
        <h2>Admin Dashboard</h2>
        <div class="stats">
            <div class="stat-box">
                <h3>Total Products</h3>
                <h4><?php echo $totalProducts; ?></h4>
            </div>
            <div class="stat-box">
                <h3>Total Admins</h3>
                <h4><?php echo $totalAdmins; ?></h4>    
            </div>
            <div class="stat-box">
                <h3>Total Users</h3>
                <h4><?php echo $totalUsers; ?></h4> 
            </div>
        </div>
    </div>
</body>

</html>