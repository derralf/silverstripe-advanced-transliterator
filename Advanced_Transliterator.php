<?php

class Advanced_Transliterator extends SS_Transliterator {

	protected function useStrTr($source) {
	
		// default table is copy of array in SS_Transliterator::useStrTr()
		$table_default = array(
			'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
			'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'Ae', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
			'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
			'Õ'=>'O', 'Ö'=>'Oe', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'Ue', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss',
			'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'ae', 'å'=>'a', 'æ'=>'ae', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
			'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
			'ô'=>'o', 'õ'=>'o', 'ö'=>'oe', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'ue', 'ý'=>'y', 'ý'=>'y',
			'þ'=>'b', 'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
			'Ā'=>'A', 'ā'=>'a', 'Ē'=>'E', 'ē'=>'e', 'Ī'=>'I', 'ī'=>'i', 'Ō'=>'O', 'ō'=>'o', 'Ū'=>'U', 'ū'=>'u',
			'œ'=>'oe', 'ß'=>'ss', 'ĳ'=>'ij', 'ą'=>'a','ę'=>'e', 'ė'=>'e', 'į'=>'i','ų'=>'u','ū'=>'u', 'Ą'=>'A',
			'Ę'=>'E', 'Ė'=>'E', 'Į'=>'I','Ų'=>'U','Ū'=>'U',
			"ľ"=>"l", "Ľ"=>"L", "ť"=>"t", "Ť"=>"T", "ů"=>"u", "Ů"=>"U",
			'ł'=>'l', 'Ł'=>'L', 'ń'=>'n', 'Ń'=>'N', 'ś'=>'s', 'Ś'=>'S', 'ź'=>'z', 'Ź'=>'Z', 'ż'=>'z', 'Ż'=>'Z',
		);
		
		// Passport 2013 table taken from https://github.com/unisolutions/silverstripe-cyrillic-transliterator/blob/master/code/CyrillicTransliterator.php
		// see also http://en.wikipedia.org/wiki/Romanization_of_Russian#Transliteration_table
		$table_cyrillic = array(
			'А' => 'A', 'а' => 'a', 'Б' => 'B', 'б' => 'b', 'В' => 'V', 'в' => 'v', 'Г' => 'G', 'г' => 'g',
			'Д' => 'D', 'д' => 'd', 'Е' => 'E', 'е' => 'e', 'Ё' => 'E', 'ё' => 'e', 'Ж' => 'Zh', 'ж' => 'zh',
			'З' => 'Z', 'з' => 'z', 'И' => 'I', 'и' => 'i', 'Й' => 'I', 'й' => 'i', 'К' => 'K', 'к' => 'k', 
			'Л' => 'L', 'л' => 'l', 'М' => 'M', 'м' => 'm', 'Н' => 'N', 'н' => 'n', 'О' => 'O', 'о' => 'o',
			'П' => 'P', 'п' => 'p', 'Р' => 'R', 'р' => 'r', 'С' => 'S', 'с' => 's', 'Т' => 'T', 'т' => 't',
			'У' => 'U', 'у' => 'u', 'Ф' => 'F', 'ф' => 'f', 'Х' => 'Kh', 'х' => 'kh', 'Ц' => 'Ts', 'ц' => 'ts',
			'Ч' => 'Ch', 'ч' => 'ch', 'Ш' => 'Sh', 'ш' => 'sh', 'Щ' => 'Shch', 'щ' => 'shch',  'Ъ' => 'Ie',
			'ъ' => 'ie', 'Ы' => 'Y', 'ы' => 'y', 'Ь' => '', 'ь' => '', 'Э' => 'E', 'э' => 'e', 'Ю' => 'Iu',
			'ю' => 'iu', 'Я' => 'Ia', 'я' => 'ia'
		);
		
		// transliterate using default table
		$source = strtr($source, $table_default);
		
		// transliterate using cyrillic table
		if ($this->config()->use_cyrillic_table) {
			$source = strtr($source, $table_cyrillic);
		}
		
		// transliterate using transliterator_transliterate
		// see http://php.net/manual/de/transliterator.transliterate.php
		if(function_exists('transliterator_transliterate') && $this->config()->use_transliterator_transliterate) {
			$source = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $source);
		}
		
		return $source;
	}
}