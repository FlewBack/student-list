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
	
	public function showTable($pdo,$paremetr)
	{	
		if($paremetr == "ask"){
			$query = $pdo->prepare("SELECT FirstName,LastName,groupId, points FROM student ORDER BY points limit 20");
			$query->execute();
		
			return $query->fetchAll();
		}
		
		elseif ($paremetr == "desc"){
			$query = $pdo->prepare("SELECT FirstName,LastName,groupId, points FROM student ORDER BY points DESC limit 20");
			$query->execute();
			
			return $query->fetchAll();	
		}
	}
	
	public function html($text,$number){
		$html = htmlspecialchars($this-> padRight($text, $number));
		
		return $html;
		
	}
	
	
	
	private function  padRight($text,$number){	
	$textLen = mb_strlen($text);
	$space ="";
	for (;$textLen < $number; $textLen++){
		$space .= " ";
	}
	
	return "$text$space";
	
	}
	
	
	
}