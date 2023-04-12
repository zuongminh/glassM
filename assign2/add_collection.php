<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Add Collection</title>
</head>

<body>

<?php
include("connect.php");
?>

	<form method="POST" enctype="multipart/form-data">

		<section>
			<h2 class="title">Add Collection</h2>

			
				<label> Collection ID</label>
				<input type="text" name="collection_id">

				<label> Collection Name</label>
				<input type="text" name="collection_name">


				<button type="submit" name="add_collection" value="Add">Add</button>
			
		</section>
	</form>

	<?php

	if (isset($_POST['add_collection'])) {

		$collection_id = $_POST['collection_id'];
		$collection_name = $_POST['collection_name'];
		//Lấy ảnh từ thư mục bất kỳ của máy tính
		//Thêm sản phẩm vào cơ sở dữ liệu
		$sql = "INSERT INTO Collection VALUES($collection_id,'$collection_name')";
		$result = mysqli_query($connect, $sql);
		if ($result) {
			echo "<script>alert('Adding Successful') </script>";

		} else {
			echo "<script>alert('Something wrong here, try later') </script>";
		}
	}
	?>
</body>

</html>