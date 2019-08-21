<!DOCTYPE html>
<html>
<head>
    <title>Image upload</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<h2 style="text-align: center;">Upload System</h2>
<!-- CODE START to upload an image -->
<div class="center">
	<H3>Upload an Image</H3>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
</div>
<!-- CODE END -->
<br>
<br>
<!-- CODE START for showing already uploaded images -->
<div class="center">
	<h3>Already uploaded</h3>
<?php
// Include the database configuration file
include 'config.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'imago/'.$row["file_name"];
?>
    <!-- code to show image -->
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
</div>
<!-- CODE END -->


</body>
</html>