<?php include("head.php") ?>

<?php  

	$cname = "user";
	$cvalue = "John Dos";

	setcookie($cname, $cvalue, time() + (86400 * 30), "/"); 
	// sets a cookie that expires after current year + 1day in seconds * 30 and is set in all paths
	// or directories

	//delete a cookie
	// setcookie($cname, " ", time() - (86400 * 30), "/");

?>

<?php 

	if(!isset($_COOKIE[$cname])){
		p('Cookie named ' . $cname . " is not set.");
	} else {
		p("Cookie name: $cname");
		p("Cookie value: " . $_COOKIE[$cname]);
	}
	if(count($_COOKIE) > 0){
		p("not empty");
	} else{
		p("empty");
	}
	print_r($_COOKIE);

	p(gethostbyname("abc.com"));

?>

<?php include("foot.php") ?>
