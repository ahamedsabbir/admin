<?php
class format{  
	public static function format_date($date){
        $date1 = strtr($date, '/', '-');
		return date('F j, Y g:i a', strtotime($date1));
 }
	public static function only_date($date){
        $date1 = strtr($date, '/', '-');
		return date('j/m/Y', strtotime($date1));
 }
	public static function text_shorten($text, $limit = 400){
	  $text = $text. " ";
	  $text = substr($text, 0, $limit);
	  $text = substr($text, 0, strrpos($text, ' '));
	  return $text." ";
 } 
	public static function remove_tag($text){
		$text = htmlspecialchars_decode(stripslashes($text));
		return $text;
	}
}