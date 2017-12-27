<?php
Class Service
{
 // Регистрация
	
	// Добавить студента в БД
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
	
	// Установить куки
	public function setCookie(){
		$string = $_POST['email'];
		setcookie("student",$string, time() + (60*60*24*365*10) );
	}
	
 // Список
 
	// Вывести таблицу из студентов с выбранной сортировкой
	public function showTable($pdo,$paremetr){	
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
	
	// Вывести таблицу из студентов по поиску имени/фамилии/номеру группы
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
	
	// Экранизирует вывод
	public function html($text,$number){
		$html = htmlspecialchars($this-> padRight($text, $number));
		
		return $html;
		
	}
	
 // Настройки
 
	// Выводит данные о студенте в форму.
	public function loadInfo($pdo,$cookie){
		$query = $pdo->prepare("SELECT FirstName, LastName, groupId, points FROM student where email = :EM");
		$query->bindValue(':EM', $cookie);
		$query->execute();
		return $query->fetchAll();
		
	}
	
	// Изменить информацию о студенте
	public function changeInfo($pdo){
		$query = $pdo->prepare("UPDATE student SET FirstName = :FN, LastName = :LN, groupId = :GI, points = :PO, sex = :SEX, registration = :REG where email = :EM");
		$query->bindValue(':FN',$_POST['FirstName']);
		$query->bindValue(':LN',$_POST['LastName']);
		$query->bindValue(':GI',$_POST['groupId']);
		$query->bindValue(':PO',$_POST['points']);
		$query->bindValue(':SEX',$_POST['sex']);
		$query->bindValue(':REG',$_POST['registration']);
		$query->bindValue(':EM',$_COOKIE['student']);
		
		$query->execute();
	}
	
	
	
 // Приватные методы
 
	// Создает пространство для правильного вывода
	private function  padRight($text,$number){	
	$textLen = mb_strlen($text);
	$space ="";
	for (;$textLen < $number; $textLen++){
		$space .= " ";
	}
	
	return "$text$space";
	
	}
	
	// Добавляет спец символы для запроса
	private function AddQueryForm($search){
		if(!empty($search)){
			$search = "%" . $search . "%";
		}
		return $search;
		
	}
	
	
}