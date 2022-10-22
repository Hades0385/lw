<?php
//The file name img.txt with the link to the picture is stored
$filename = "img.txt";
if(!file_exists($filename)){
     die('The file does not exist');
}
 
// get link from text
$pics = [];
$fs = fopen($filename, "r");
while(!feof($fs)){
     $line=trim(fgets($fs));
     if($line!=''){
         array_push($pics, $line);
     }
}
 
// get links randomly from array
$pic = $pics[array_rand($pics)];
 
//return the specified format
$type=$_GET['type'];
switch($type){
 
//JSON return
case 'json':
     header('Content-type:text/json');
     die(json_encode(['pic'=>$pic]));
 
default:
     die(header("Location: $pic"));
}
?>