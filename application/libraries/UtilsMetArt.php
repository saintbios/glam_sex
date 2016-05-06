<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UtilsMetArt {
	public static function toAscii($str, $replace=array(), $delimiter='-') {
		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}

		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("~[^a-zA-Z0-9/_|+ -]~", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("~[/_|+ -]+~", $delimiter, $clean);

		return $clean;
	}

	public function sortArray($pArray) {
		$ordered = false;
	    $size = count($pArray);
	    while(!$ordered){
	        $ordered = true;
	        for($i=0 ; $i < $size-1 ; $i++) {
	            if($pArray[$i]->date > $pArray[$i+1]->date)
	            {
	                $temp = $pArray[$i+1];
	                $pArray[$i+1] = $pArray[$i];
	                $pArray[$i] = $temp;
	                $ordered = false;
	            }
	        }
	        $size--;
	    }
	    $pArray = array_reverse($pArray);
	    return $pArray;
	}
}
?>