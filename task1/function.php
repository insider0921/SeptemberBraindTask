<?php

	function cropString($articlePreview, $size = 200){
		$articlePreview = substr($articlePreview,0, 200);// отрезаем строку до 200 символов
		$articlePreview =substr($articlePreview, 0, strrpos($articlePreview, ' ' ));//последний пробел
		$array = array();
		$array = explode(" ", ($articlePreview));//разбиваем текст на слова для массива
		$arrBeg = array_splice($array, -3);//массив от начала
		$arrEnd = array_slice($arrBeg, -3);//достаем 3 последних слова
		$arrText = implode(" ", $arrEnd); //последние 3 элемента, чтобы сделать из них ссылку
		$arrFull = implode(" ", $array);//получаем текст без 3-х последних элементов

		$articlePublic = 'public.php';	
		$dot = "...";

		$articleLink = "<a href =\"{$articlePublic}\">$arrText$dot</a>";

		return $arrFull." ". $articleLink;
	}
?>