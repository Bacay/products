<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
       
        body, table, .form-container {
            font-family: arial, sans-serif;
        }
        h2 {
            text-align: center;
        }

        
        table {
            border-collapse: collapse;
            width: 70%;
            float: left;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .delete {
            color: red;
        }

        .form-container {
            border: 1px solid #dddddd;
            padding: 10px;
            margin-left: 20px;
            float: left;
            width: 25%;
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
             width: 95%;
}

/* Style the submit button */
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
    <table>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
           
        </tr>
        <?php foreach ($product as $pr): ?>
            <tr>
                <td><?= $pr['ProductName'] ?></td>
                <td><?= $pr['ProductDescription'] ?></td>
                <td><?= $pr['ProductCategory'] ?></td>
                <td><?= $pr['ProductQuantity'] ?></td>
                <td><?= $pr['ProductPrice'] ?></td>
                <td><a href="/delete/<?= $pr['ProdId'] ?>" class="delete">Delete</a> || <a href="/edit/<?= $pr['ProdId'] ?>">Update</a></td>
               
            </tr>
        <?php endforeach; ?>
    </table>
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
            <option value="Non-Food Items">Others</option>
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