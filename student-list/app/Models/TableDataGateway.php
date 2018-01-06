<?php

class TDG
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
	
	public function showQueryTable($pdo,$search){
		// обрабатывает поиск
		$search = $this->AddQueryForm($search);
		
		//подготоваливаем и возвращаем запрос
		$query = $pdo->prepare("SELECT FirstName, LastName, groupId, points FROM student WHERE FirstName LIKE :FN OR LastName LIKE :LN OR groupId LIKE :GI limit 20");
		$query->bindValue(':FN', $search);
		$query->bindValue(':LN', $search);
		$query->bindValue(':GI', $search);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function showStudents($pdo){
		
		$query = $pdo->prepare("SELECT FirstName, LastName, groupId, points FROM STUDENT ORDER BY points desc");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function ShowStudentsSortedByFirstName($pdo){
		$query = $pdo->prepare("SELECT FirstName, LastName, groupId, points FROM STUDENT ORDER BY FirstName");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function ShowStudentSortedByLastName($pdo){
		$query = $pdo->prepare("SELECT FirstName, LastName, groupId, points FROM STUDENT ORDER BY LastName");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function ShowStudentSortedByGroupId($pdo){
		$query = $pdo->prepare("SELECT FirstName, LastName, groupId, points FROM STUDENT ORDER BY groupId");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function ShowStudentSortedByPoints($pdo){
		$query = $pdo->prepare("SELECT FirstName, LastName, groupId, points FROM STUDENT ORDER BY points");
		$query->execute();
		return $query->fetchAll();
	}
}