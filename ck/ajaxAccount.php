<?php
if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'add_account') {
        _AddAccount();
    } 
}

function _AddAccount() {
    $link = mysqli_connect("localhost","leader","6010230500", 'ck');
	// Check connection
	if (mysqli_connect_errno()) {
 	 	echo "<BR>!!!!! Failed to connect to MySQL: " . mysqli_connect_error();
		return null;
	} else {
		mysqli_query($link, "SET NAMES 'utf8'");
        $sql = "INSERT INTO `account`(`student_id`, `name`, `class`, `seat`, `phone`) VALUES ('{$_REQUEST['student_id']}',
        '{$_REQUEST['name']}','{$_REQUEST['class']}','{$_REQUEST['seat']}','{$_REQUEST['phone']}')";
        echo $sql."<br>";
        mysqli_query($link, $sql);
    }
}
        
?>