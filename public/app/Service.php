<?php
Class Service
{
	public function addStudent($pdo){
		$query =$pdo->prepare("INSERT INTO student VALUES(:FN,:LN,:GI,:POINTS,:EMAIL,:SEX,:REGISTRATION)");
		$query->bindValue(':FN',$_POST['FirstName']);
		$query->bindValue(':LN',$_POST['LastName']);
		$query->bindValue(':GI',$_POST['groupId']);
		$query->bindValue(':POINTS',$_POST['points']);
		$query->bindValue(':EMAIL',$_POST['email']);
		$query->bindValue(':SEX', $_POST['sex']);
		$query->bindValue(':REGISTRATION',$_POST['registration']);
		$query->execute();
	}

	public function setCookie(){
		$string = $_POST['FirstName'].$_POST['LastName'].$_POST['points'];
		setcookie("student",$string, time() + 100);
	}
}