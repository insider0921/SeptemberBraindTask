<?php
	if (empty($_POST)) {
		exit('Введите значения');
	}
	//получаем данные из полей, обрезаем пробелы
	$fatal = trim($_POST['fatal']);
	$warnings = trim($_POST['warnings']);
	//проверяем на пустоту
	if (empty($_POST['fatal']) && empty($_POST['warnings'])){
		exit('Введите значения');
	}
	echo "Ваши данные: ".$fatal." и ".$warnings."<br/>";

	if ($warnings == 0 && $fatal % 2 != 0){
		$commit = -1;
	} else {
		$commit = 0;
		while (fmod(($fatal + $warnings / 2), 2) != 0) { 
		    $warnings++;
		    $commit++;
		}
		$commit += $warnings / 2;
		$fatal += $warnings / 2;
		$commit += $fatal / 2;
	}
	echo "Для исправления кода нужно ".$commit." коммитов";
?>