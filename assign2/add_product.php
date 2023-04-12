<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Add Product</title>
</head>

<body>
<?php
include("connect.php");
?>

    <form method="POST" enctype="multipart/form-data">
    <section>
        <h2 class="title">Add Products</h2>

        <label> Product Name</label>
        <input type="text" name="product_name">

        <label> Product Price</label>
        <input type="text" name="product_price">

        <label> Product Image</label>
        <td><input type="file" name="product_image"> </td>

        <label> Product Description</label>
        <td><input type="text" name="product_description"> </td>

        <label> Product Quantity</label>
        <label><input type="text" name="product_quantity"> </label>

        <label>Collections</label>
        <td colspan='3'>
            <select name='collections_id'>
                <?php 
                                    
                                $sql2 = 'select * from collection';
                                $result2 = mysqli_query($connect, $sql2);
                                while($row_cat =  mysqli_fetch_array($result2)){
                                    $collection_id =$row_cat['collection_id'];
                                    $collection_name =$row_cat['collection_name'];
                                    echo "<option value='$collection_id'>$collection_name</option>";        
                                }
                            ?>
            </select>
        </td>


        <button type="submit" name="add_product" value="Add"> Add </button>

    </section>
</form>

    <?php 
	
	if(isset($_POST['add_product'])){
		
		$product_name = $_POST['product_name'];
		$product_price = $_POST['product_price'];
					//Lấy ảnh từ thư mục bất kỳ của máy tính
		$product_image = $_FILES['product_image']['name'];
					// di chuyển ảnh từ thư mục bất kỳ sang thư mục tmp của htdocs
		$product_image_tmp = $_FILES['product_image']['tmp_name'];

					// Đưa ảnh từ thư mục tmp sang thư mục cần lưu 

	    $product_description = $_POST['product_description'];
        $product_quantity = $_POST['product_quantity'];
		$collection_id = $_POST['collections_id'];
					//Thêm sản phẩm vào cơ sở dữ liệu
		$sql = "INSERT INTO products VALUES(NULL,'$product_name','$product_price','$product_image','$product_description','$product_quantity','$collection_id')";
		$result = mysqli_query($connect,$sql);
		if($result){
			echo"<script>alert('Adding Successful') </script>";
			
		}
		else{
			echo"<script>alert('Something wrong here, try later') </script>";
		}
	}
	?>
</body>

</html>