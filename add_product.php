<!DOCTYPE html>
<html>
<head>
    <title>Jewelry Website</title>
    <style>

.container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select#category {
            font-size: 16px;
            padding: 10px;
            background-color: #fff;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
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
        }

        body {
    color: #666666;
    font-family: 'Lato', sans-serif;
    font-size: 15px;
    line-height: 1.42857;
        }

        .navbar a {
            display: block;
            padding: 10px 0;
            text-decoration: none;
            color: white;
        }

        .content {
            margin-left: 220px; /* Adjust based on your design */
            padding: 20px;
        }
        @media (max-width: 768px) {
            .container {
                width: 100%;
            }

            .navbar {
                width: 100%;
                height: auto;
                position: static;
                padding: 10px;
            }

            .content {
                margin-left: 0;
            }
        }
        
    </style>
</head>
<body>

<div class="navbar">
        <a href="admin.php">Admin Dashboard</a>
        <a href="add_admin.php">Add Admin</a>
        <a href="add_product.php">Add Product</a>
        <a href="view_sold_products.php">View Sold Products</a>
    </div>

<div class="container">
        <h2>Add a New Product</h2>
        <form action="process_product.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" required>
            </div>

            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" id="company" required>
            </div>

            <div class="form-group">
                <label for="grams">Grams</label>
                <input type="number" name="grams" id="grams" required>
            </div>

            <div class="form-group">
                <label for="product_description">Description</label>
                <textarea name="product_description" id="product_description" rows="4" required></textarea>
            </div>

            <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" required>
            <option value="Necklaces">Necklaces</option>
            <option value="Rings">Rings</option>
            <!-- Add more options here -->
            </select>
            </div>

            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" name="product_image" id="product_image" accept="image/*" required>
            </div>

            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
</html>
