<?php

Midterm2DB('一上第一次月考', 14, '14班1上第一次月考.csv');

function Midterm2DB($midterm, $class, $file) {
    $handle = fopen($file, "r");
    if ($handle) {
        $count = 0;
        while (($line = fgets($handle)) !== false) {
            $line = str_replace(array("\r", "\n"), '', $line);
            $count++;  
            $arr = explode(",",$line);
            if ($count==1) {
                $arrSubject = $arr;      
            } else if ($count==2) {
                $arrWeight = $arr;
            } else {
                AddStudent2DB($midterm, $class, $arrSubject, $arrWeight, $arr);
            }
        }
        fclose($handle);              
    }
}

// Array ( [0] => 姓名 [1] => 國文 [2] => 英文 [3] => 數學 [4] => 歷史 )
// Array ( [0] => 加權 [1] => 4 [2] => 4 [3] => 4 [4] => 2 )
// $arr= Array ( [0] => 黃先逸 [1] => 100 [2] => 100 [3] => 100 [4] => 90 )
function AddStudent2DB($midterm, $class, $arrSubject, $arrWeight, $arr){
    // print_r($arrSubject);echo "<br>";  print_r($arrWeight);echo "<br>";print_r($arr);echo "<br>";
    foreach ($arr as $key => $value) {
        if ($key == 0) {  
            $name = $value;
        } else {
            _AddScore($midterm, $class, $name, $arrSubject[$key], $value, $arrWeight[$key]);
        }
    }
}

$link = mysqli_connect("localhost","leader","6010230500", 'ck');

function DbQuery($sql) {
	$link = mysqli_connect("localhost","leader","6010230500", 'ck');
	return mysqli_query($link, $sql);
}

function DbGetRow($sql) {		// mysql SELECT; return one data
	$link = mysqli_connect("localhost","leader","6010230500", 'ck');
	$result = mysqli_query($link, $sql);
	if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysqli_error($link)."<BR>";
        $row = null;
	} else {
		if ( mysqli_num_rows($result) == 0 ) {
	        $row = null;
            echo("No Data:{$sql}<br>");
		} else {
			$row = mysqli_fetch_object($result);
		}
		mysqli_free_result($result);
	}
  return $row;
}

// INSERT INTO `score`(`id`, `student_id`, `subject`, `midterm`, `score`, `weight`) VALUES (1,1,1,1,100,4)
function _AddScore($midterm, $class, $name, $subject, $score, $weight) {
    $dbAcc = DbGetRow("SELECT * FROM `account` WHERE `name`= '{$name}' AND `class`='{$class}'");
    $dbSub = DbGetRow("SELECT * FROM `subject` WHERE `name`='{$subject}'");
    $dbMid = DbGetRow("SELECT * FROM `midterm` WHERE `name`='{$midterm}'");
    echo "_AddStudent: $name $subject $score $weight<BR>";
    if ($dbAcc!=null && $dbSub != null && $dbMid!=null){
        echo "account id:{$dbAcc->id},subject id:{$dbSub->id},midterm id:{$dbMid->id},<br>";
        $dbScore = DbGetRow("SELECT * FROM `score` WHERE `student_id`={$dbAcc->id} AND `subject`={$dbSub->id} 
                          AND `midterm`={$dbMid->id}");
        if ($dbScore==null){
            $sql = "INSERT INTO `score`(`student_id`,`subject`,`midterm`,`score`,`weight`) VALUES 
                                       ('{$dbAcc->id}','{$dbSub->id}','{$dbMid->id}','{$score}','{$weight}')";
        }else{
            // print_r($dbScore);echo"<br>";
            $sql="UPDATE `score` SET `score`='{$score}',`weight`='{$weight}' WHERE id={$dbScore->id}";
        }
        DbQuery($sql);
    }
    


}   

?>