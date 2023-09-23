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
        .form-container input[type="number"] {
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
            <h2>Product Form</h2>
            <label>Product Name</label>
            <input type="hidden" name="ProdId" value="<?= isset($pro) ? $pro['ProdId'] : '' ?>">
            <input type="text" name="ProductName" placeholder="Product Name" value="<?= isset($pro) ? $pro['ProductName'] : '' ?>">
            <br>
            <label>Description</label>
            <input type="text" name="ProductDescription" placeholder="Description" value="<?= isset($pro) ? $pro['ProductDescription'] : '' ?>">
            <br>
            <label for="ProductCategory">Category</label>
            <select name="ProductCategory" id="ProductCategory">
                <option>Select a Category</option>
                <?php foreach ($category as $cat) {
                    echo "<option value =".$cat['ProductCategory'].">".$cat['ProductCategory']."</option>";
                }?>
            </select>
            <br>
            <label>Quantity</label>
            <input type="text" name="ProductQuantity" placeholder="Quantity" value="<?= isset($pro) ? $pro['ProductQuantity'] : '' ?>">
            <br>
            <label>Price</label>
            <input type="number" name="ProductPrice" placeholder="Price" value="<?= isset($pro) ? $pro['ProductPrice'] : '' ?>">
            <br>
            <div style="margin-top: 10px;"></div>
            <input type="submit" value="Save">
        </form> 
        <div class="form-container1" style="margin-top: 20px;">
        <form action="/saveCat" method="post">
    <h2>Add New Category</h2>
    <label>Category Name</label>
    <input type="hidden" name="CatId" value="<?= $cate['CatId'] ?? '' ?>">
    <input type="text" name="ProductCategory" placeholder="Category" value="<?= $_POST['ProductCategory'] ?? $cate['ProductCategory'] ?? '' ?>">
    <br>
    <input type="submit" style="margin-top: 5px;" value="Add Category">
</form>

<h2>Product Category List</h2>
    <ul>
        <?php foreach ($category as $cate): ?>
            <li>
            <strong>Category:</strong> <?= $cate['ProductCategory'] ?><br>
                    <a href="/deleteCat/<?= $cate['CatId'] ?>" class="delete">Delete</a> || <a href="/editCat/<?= $cate['CatId'] ?>">Update</a>
            </li>
        <?php endforeach; ?>
    </ul>

    </div>
    </div>
    <div class="clear"></div>
</body>
</html>
