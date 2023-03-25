<!DOCTYPE html>
<html>
<head>
	<title>Upload Images to S3</title>
<link rel="stylesheet" href="./Css/style.css">

<script src="https://kit.fontawesome.com/1049746e55.js" crossorigin="anonymous"></script>
</head>
<body>


	<form action="upload.php" method="post" enctype="multipart/form-data">
	<div class='file file--upload'>
	<label for='input-file'>
	<i class="fa-solid fa-cloud-arrow-up" style="color: #3F8624;"></i>Choose file
      </label>
		<input id='input-file' type="file" name="file" accept="image/*">
		</div>
		<div class="frame">
		<button type="submit" name="submit" class="custom-btn btn-15" >Upload to s3</button>
		</div>
	</form>
	<p id="Copyrghit">Copyright (c) <a href="">@azizbeniych</a> <br><span>The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.</span></p>



</body>
</html>
