<?php
$strings = [
	'Аргентина манит негра',
	'Sum summus mus',
	'Банана'
];

foreach ($strings as  $str) {
	echo isPolindrom($str); echo '<br>';
}


// Про Манакера знаю, но не помнил его реализацию, поэтому решил сделать чуть по своему.
function isPolindrom($str){
	if(empty($str)) return false; // Если пустая строка - вернём ошибку

	// Подготавливаем строку
	$str_o = $str;
	$str = str_replace(' ', '', $str);
	$str_f = mb_strtolower($str);
	$str = preg_split('//u', $str_f, null, PREG_SPLIT_NO_EMPTY);

	// Если короткая то сразу вернём первый символ
	if (count($str)<3) return $str[0];

	$polindrom = '';
	$polindrom1 = '';
	
	$m = 0;

	// Ищем нечётный
	for ($i=1; $i+$m<count($str) ; $i++) { 
		$s = 1;
		$test_poli = $str[$i];
		while ($i-$s >= 0 && $i+$s+1<=count($str)) {
			if($str[$i-$s] == $str[$i+$s]){
				$test_poli = $str[$i-$s].$test_poli.$str[$i+$s];
				if(strlen($test_poli)>2 && strlen($polindrom)<strlen($test_poli)){
					$polindrom = $test_poli;
					$m = $s;
				}
			} else {
				break;
			}
			$s++;
		}
	}

	$m = 0;

	// Ищем чётный
	for ($i=1; $i+1+strlen($polindrom1)<count($str) ; $i++) { 
		if($str[$i] != $str[$i+1])
			continue;

		$s = 1;

		$test_poli = $str[$i].$str[$i+1];

		while ($i-$s >= 0 && $i+$s+2<=count($str)) {
			if($str[$i-$s] == $str[$i+$s+1]){
				$test_poli = $str[$i-$s].$test_poli.$str[$i+$s+1];
				if(strlen($test_poli)>2 && strlen($polindrom1)<strlen($test_poli)){
					$polindrom1 = $test_poli;
					$m = $s;
				}
			} else {
				break;
			}
			$s++;
		}
	}

	// Проверяем какой полиндром больше
	if(strlen($polindrom) < strlen($polindrom1) )
		$polindrom = $polindrom1;

	// Возвращаем результат согластно условию
	if(strlen($str_f) == strlen($polindrom)){
		return $str_o;
	} elseif (strlen($polindrom)>2) {
		return $polindrom;
	} else {
		return $str[0];
	}
}