<?php

class Reg
{

	public function isFormFilled(array $array){
		if($array['Submit']){
			
			// Удаляем пробелы
			foreach($array as $key=>$var){
				$var = trim($var);
				$array[$key] =$var;
			}
			
			// Проверяем заполнены ли формы
			if(!$array['FirstName']){
				$errors[] = 'Имя';
			}
			
			if(!$array['LastName']){
				$errors[] = 'Фамилия';
			}
			
			if(!isset($array['Sex'])){
				$errors[] = "Пол";
			}
			
			if(!$array['GroupId']){
				$errors[] = 'Номер группы';
			}
			
			if(!$array['Points']){
				$errors[] = 'Количество баллов';
			}
			
			if(!$array['Year']){
				$errors[] = 'Год рождения';
			}
			
			if(!isset($array['Registration'])){
				$errors[] = 'Регистрация';
				
			}
		return $errors;
		}
		
	}
	
	public function isFormFilledCorrectly(array $array){
		if($array['Submit']){
			
			if(!$this->CheksName($array['FirstName'])){
				$wrongEntries[] = "Имя может содержать только буквы русского алфавита и не должна быть длинее 200 символов";
			}
			
			if(!$this->CheksName($array['LastName'])){
				$wrongEntries[] = "Фамилия может содержать только буквы русского алфавита и не должна быть длинее 200 символов";
			}
			
			if(!$this->CheksGroupId($array['GroupId'])){
				$wrongEntries[] = "Номер группы может состоять только из цифр и букв от 2 до 6";
			}
			
			if($result = $this->ChecksPoints($array['Points'])){
				$wrongEntries[] = $result;
			}
			
			if($result = $this->ChecksYear($array['Year'])){
				$wrongEntries[] = $result;
			}
			
			
			return $wrongEntries;
		}
		
		
	}
	
	// Проверяет Имя и Фамилию студента
	private function CheksName($info){
		$regExp = "/^([а-яё]){2,200}$/ui";
		return preg_match($regExp,$info);
	}
	
	private function CheksGroupId($info){
		$regExp ="/^[а-яё0-9]{2,6}$/ui";
		return preg_match($regExp, $info);
	}
	
	// Проверяет баллы студента
	private function ChecksPoints($info){
		
		// Баллов не больше 300
		if ($info > 300 ){
			return "Баллов не должно быть больше 300";
		}
		
		// Баллов не меньше 150
		elseif ($info < 150){
			return "Сумма баллов не должна быть меньше 150";
		}
		
		// В случае непредвиденной ситуации возврат NULL'а
		else {
			return NULL;
			}
	}
	
	// Проверяет год рождения студента
	private function ChecksYear($info){
		
		// Год рождения не позже текущей даты
		if($info > date(Y)){
			return "Абитуриент родился позже текущей даты ($info год )";
		}
		
		// Год рождения не должен быть очень давно от текущего года
		elseif ($info < date(Y) - 100){
			return "Абитуриент родился слишком давно ($info год )";
		}
		
		// В случае непредвиденной ситуации возврат NULL'а
		else {
			return NULl;
		}
	}
	
}