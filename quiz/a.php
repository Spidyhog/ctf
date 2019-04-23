<?php
//Ques_id's values must start from 0
	require'sql.php';
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_['img_name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)== false)
	   {
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) 
	   {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) 
	   {
         move_uploaded_file($file_tmp,"Ques/".$file_name);
         echo "Success";
      }
	   else
	   {
         print_r($errors);
      }
   }
   
$answer1=htmlentities(strtolower(isset($_POST["ans1"])));
echo $answer1;
echo $answer2=htmlentities(strtolower(isset($_POST["ans2"])));
echo $answer2;
echo $answer3=htmlentities(strtolower(isset($_POST["ans3"])));
echo $answer3;
echo $answer4=htmlentities(strtolower(isset($_POST["ans4"])));
echo $answer4;
echo $answer5=htmlentities(strtolower(isset($_POST["ans5"])));
echo $answer5;
echo $ques_id=isset($_POST["ques_id"]);
echo $ques_id;
if(isset($file_name)){
   $img_name=$file_name;
}
if(isset($_POST["ques_psswd"]) && $_POST["ques_psswd"]=="TSH")
{
	$query="INSERT INTO question (answer1, answer2, answer3, answer4, answer5, name, que_id) VALUES ('".$answer1."', '".$answer2."','".$answer3."', '".$answer4."', '".$answer5."','".$img_name."' ,'".$ques_id."')";
	if(mysqli_query($con,$query))
	{
		echo 'Pic inserted into the database correctly';
	}
	else
	{
		echo mysqli_error($con);
	}
}
   
   
?>
<html>
   <body>
      
 <form action = "" method = "POST" enctype = "multipart/form-data">
 SELECT IMAGE TO UPLOAD:
<input type = "file" name = "image" /><br>
Answer 1:
<input type="Text" name="ans1"><br>
Answer 2:
<input type="Text" name="ans2"><br>
Answer 3:
<input type="Text" name="ans3"><br>
Answer 4:
<input type="Text" name="ans4"><br>
Answer 5:
<input type="Text" name="ans5"><br>
Ques_id:
<input type="Text" name="ques_id"><br>
Question Password:
<input type="Text" name="ques_psswd"><br>
         <input type = "submit"/>
			
      </form>
      
   </body>
</html>