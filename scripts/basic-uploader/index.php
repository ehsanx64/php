<!DOCTYPE html>
<html>
<head>
  <title>The Uploader</title>
</head>
<body>
  <form enctype="multipart/form-data" action="" method="POST">
    <p>Select file to upload:</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>
<?PHP
if(!empty($_FILES['uploaded_file']))
{
	$path = __DIR__ . "/uploads/";
	$path = $path . basename( $_FILES['uploaded_file']['name']);

	echo "<p>";
	if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
		echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
			" has been uploaded";
	} else{
		echo "There was an error uploading the file, please try again!";
	}
	echo "</p>";
}
?>


