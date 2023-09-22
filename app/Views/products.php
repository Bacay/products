<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body, ul, .form-container {
            font-family: arial, sans-serif;
        }
        h2 {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            float: left;
            width: 30%;
            margin-top: 1px;
        }

        li {
            border: 1px solid #dddddd;
            margin-bottom: 5px;
            padding: 8px;
        }

        .delete {
            color: red;
        }

        .form-container {
            border: 1px solid #dddddd;
            padding: 10px;
            margin-left: 20px;
            float: left;
            width: 60%;
        }

        .form-container label {
            display: block;
            font-weight: bold; 
        }

        .form-container input[type="text"] {
            border: 1px solid #dddddd;
            padding: 8px;
            width: 90%;
        }

        .form-container input[type="submit"] {
            font-weight: bold;
        }

        .form-container select {
            border: 1px solid #dddddd;
            padding: 8px;
            width: 93%;
        }

      
        .form-container input[type="submit"] {
            font-weight: bold;
        }

        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <h2>Product Listing</h2>
    <ul>
        <?php foreach ($product as $pr): ?>
            <li>
                <strong>Product Name:</strong> <?= $pr['ProductName'] ?><br>
                <strong>Description:</strong> <?= $pr['ProductDescription'] ?><br>
                <strong>Category:</strong> <?= $pr['ProductCategory'] ?><br>
                <strong>Quantity:</strong> <?= $pr['ProductQuantity'] ?><br>
                <strong>Price:</strong> <?= $pr['ProductPrice'] ?><br>
                <a href="/delete/<?= $pr['ProdId'] ?>" class="delete">Delete</a> || <a href="/edit/<?= $pr['ProdId'] ?>">Update</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="form-container">
        <form action="/save" method="post">
            <h2>Form</h2>
            <label>Product Name</label>
            <input type="hidden" name="ProdId" value="<?= isset($pro) ? $pro['ProdId'] : '' ?>">
            <input type="text" name="ProductName" placeholder="Product Name" value="<?= isset($pro) ? $pro['ProductName'] : '' ?>">
            <br>
            <label>Description</label>
            <input type="text" name="ProductDescription" placeholder="Description" value="<?= isset($pro) ? $pro['ProductDescription'] : '' ?>">
            <br>
            <label for="ProductCategory">Category</label>
            <select name="ProductCategory" id="ProductCategory">
                <option value="Fresh Foods">Fresh Foods</option>
                <option value="Packaged Foods">Packaged Foods</option>
                <option value="Beverages">Beverages</option>
                <option value="Household and Personal Care">Household and Personal Care</option>
                <option value="Non-Food Items">Non-Food Items</option>
                <option value="Others">Others</option>
            </select>
            <br>
            <label>Quantity</label>
            <input type="text" name="ProductQuantity" placeholder="Quantity" value="<?= isset($pro) ? $pro['ProductQuantity'] : '' ?>">
            <br>
            <label>Price</label>
            <input type="text" name="ProductPrice" placeholder="Price" value="<?= isset($pro) ? $pro['ProductPrice'] : '' ?>">
            <br>
            <div style="margin-top: 10px;"></div>
            <input type="submit" value="Save">
        </form>
    </div>
    <div class="clear"></div>
</body>
</html>
