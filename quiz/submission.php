<?php
	require 'core.inc.php';
	require 'sql.php';
	$er_no=$_SESSION['er_no'];
	if(!isset($_SESSION['er_no'])&& empty($_SESSION['er_no']))
	{
		header("location: ../index.php?err_messg=You are not logged in.");
	}
	else
	{
			$query1="SELECT Score FROM users WHERE Er_No='".$er_no."'";
			$first_query=mysqli_query($con,$query1);
			$ro1=mysqli_fetch_assoc($first_query);
			$score=$ro1["Score"];
			$query2="SELECT answer1,answer2,answer3,answer4,answer5 FROM question WHERE que_id='".$score."'";
			$Seconed_query=mysqli_query($con,$query2);
			$ro2=mysqli_fetch_assoc($Seconed_query);
			$ans1=strtolower($ro2["answer1"]);
			$ans2=$ro2["answer2"];
			$ans3=$ro2["answer3"];
			$ans4=$ro2["answer4"];
			$ans5=$ro2["answer5"];
			if(!isset($_POST['answer']) || empty($_POST['answer']))
			{
				header('Location: quiz.php');
			}
			else
			{
				$ans=htmlentities(strtolower($_POST['answer']));
				function get_ip_address()
				{
					if(!empty($_SERVER['HTTP_CLIENT_IP'])){
						//ip from share internet
						$ip = $_SERVER['HTTP_CLIENT_IP'];
					}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
						//ip pass from proxy
						$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					}else{
						$ip = $_SERVER['REMOTE_ADDR'];
					}
					return $ip;
				}
				$ip=get_ip_address();
				$query4="INSERT INTO submission (er_no,que_id,ans,ip) VALUES ('".$er_no."','".$score."','".$ans."','".$ip."')";
				mysqli_query($con,$query4);
				if($ans == $ans1 || $ans==$ans2 || $ans == $ans3 || $ans==$ans4 || $ans==$ans5)
				{
					$time=time()+12780;
					$score=$score+1;
					$actual_time=date('Y-m-d H:i:s',$time);
					$query3="UPDATE users SET Score='".$score."',Time=NOW() WHERE er_no='".$er_no."'";
					mysqli_query($con,$query3);
					header("Location: quiz.php?response=Correct answer");
				}
				else
				{
					header('Location: quiz.php?response= Wrong Answer! Try Again');
				}
			}
	}
?>