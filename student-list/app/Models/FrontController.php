<?php

Class FrontController
{	
	// Здесь нужна регулярка
	// удалить вызов методов для всех кроме списка ( там поиск )
	public function Response($url,Reg $reg, TDG $TDG, PDO $PDO){
		if($url == "/index.php" or $url == "/"){
			if($errors = $reg->isFormFilled($_POST)){require("../templates/registration.html"); exit(); };
			$wrongEntries = $reg->isFormFilledCorrectly($_POST);
			//$wrongEntries = $reg->isFormFilledCorrectly($_POST);
			require("../templates/registration.html");
		}
		elseif($url =="/index.php?notify=registered"){
			require("../templates/registration-success.html");
		}
		elseif($this->query($url, "list") == "/list.php"){
				if($url == "/list.php"){
					$students = $TDG->showStudents($PDO);
				}
				elseif($url == "/list.php?sorted=byfname"){
					$students = $TDG->ShowStudentsSortedByFirstName($PDO);
				}
				elseif($url == "/list.php?sorted=bysname"){
					$students = $TDG->ShowStudentSortedByLastName($PDO);
				}
				elseif($url == "/list.php?sorted=bygroupid"){
					$students = $TDG->ShowStudentSortedByGroupId($PDO);
				}
				elseif($url == "/list.php?sorted=bypoints"){
					$students = $TDG->ShowStudentSortedByPoints($PDO);
				}
				require("../templates/student-list.html");
		}
		elseif($this->query($url, "setting") == "/setting.php"){
			require("../templates/setting.html");
		}
		else{
			header("HTTP/1.0 404 Not Found");	
		}
		
	}
	
	
	private function query($url,$tag){
		if($tag == "list"){
			$reg = "/(list[.]php)[?]?(.)*/ui";
			return preg_replace($reg,"$1",$url);
		}
		elseif($tag == "setting"){
			$reg = "/(setting[.]php)[?]?(.)*/ui";
			return preg_replace($reg,"$1",$url);
		}
	}
}