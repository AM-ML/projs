<?php include("head.php") ?>

<?php  if(isset($_POST['submit'])){

	if(!$_FILES['image']['name']){
		echo 'Please submit a file at '. '<a href="form.php">Main Page</a>';
		exit();
	}
	$bool = 0;
	$dir = 'uploads/';
	if(!is_dir($dir)){mkdir($dir, 0777, true);}
	$file_dir = $dir . basename($_FILES['image']['name']);
	$type = strtolower(pathinfo($file_dir, PATHINFO_EXTENSION));


	if(!$_FILES['image']['name']){
		echo 'Please submit a file at '. '<a href="form.php">Main Page</a>';
		exit();
	}

	$maxFileSize = 2000000; // 2MB in bytes

	if ($_FILES['image']['size'] >= $maxFileSize) {
	    echo "File Can't be larger than 2 MB";
	    exit();
	}

	$check = getimagesize($_FILES['image']['tmp_name']);

	if(!$check){
		echo 'Not an Image.';
		exit();
	}
	if(file_exists($file_dir)){
		echo 'File already Exists.';
		echo '<img src='. $file_dir .' alt="" width="600" style="display:block;">';
		dbtn();
		exit();
	}
	if($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
	    echo "only JPG, JPEG, PNG & GIF files are allowed.";
	    exit();
	}
	echo 'image - ' . $check['mime'];

	if(move_uploaded_file($_FILES['image']['tmp_name'], $file_dir)){
		echo ' File Uploaded Successfully.';
	} else{
		echo ' Error while Uploading File.';
		exit();
	}
	echo '<img src='. $file_dir .' alt="" width="600" style="display:block;">';
	dbtn();
} else{echo 'please submit an image at' . '<a href="form.php">Main Page</a>';}?>

<?php include("foot.php") ?>
