<!-- YOU NEED REPLACE :
Fontawsom Kit LINK
YOURAWS_ACCESS_KEY_ID
YOURAWS_ACCESS_KEY
YOUR-s3-buck
FOLDERNAME/YOUR-s3-buck
-->


<link rel="stylesheet" href="./Css/style.css">
<!-- Fontawsom Kit-->
<script src="https://kit.fontawesome.com/YOURKIT.js" crossorigin="anonymous"></script>
<?php
// Include the AWS SDK for PHP library
require 'vendor/autoload.php';

// Set your AWS access key and secret key
putenv('AWS_ACCESS_KEY_ID=YOURAWS_ACCESS_KEY_ID');
putenv('AWS_SECRET_ACCESS_KEY=YOURAWS_SECRET_ACCESS_KEY_KEY');

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// Set the S3 bucket name and the path where the image will be stored
$bucket_name = 'YOUR-s3-buck';
$bucket_path = 'FOLDERNAME/YOUR-s3-buck';

// Check if the form was submitted
if(isset($_POST["submit"])) {
	// Get the image file and its attributes
	$file = $_FILES["file"];
	$filename = $file["name"];
	$filetype = $file["type"];
	$filetemp = $file["tmp_name"];
	$filesize = $file["size"];

	// Check if the file is an image
	$allowed_types = array("image/jpeg", "image/png", "image/gif");
	if (!in_array($filetype, $allowed_types)) {
		echo "<h1 id='SuccessUperror'>Sorry, only JPEG, PNG, and GIF files are allowed.</h1><a href='index.php'><button class='custom-btn btn-15' id='btn154'>go back</button></a>";
	} else {
		// Set up the S3 client
		$s3 = new S3Client([
			'region' => 'us-west-2',
			'version' => 'latest'
		]);

		// Generate a unique file name for the image
		$new_filename = uniqid() . '_' . $filename;

		try {
			// Upload the image to S3
			$result = $s3->putObject([
				'Bucket' => $bucket_name,
				'Key' => $bucket_path . $new_filename,
				'Body' => fopen($filetemp, 'r'),
				'ContentType' => $filetype
			]);

			// Display a success message
			echo "<h1 id='SuccessUp'>Image uploaded successfully.</h1><a href='index.php'><button class='custom-btn btn-15' id='btn154'>go back</button></a>";

		} catch (S3Exception $e) {
			// Display an error message
			echo "Error uploading image: " . $e->getMessage();
		}
	}
}
?>
