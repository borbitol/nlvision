<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc & Lithuanian Translation Team (http://www.joomla123.lt)
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * lt-LT localise class
 *
 * @package		Joomla.Site
 * @since		1.6
 */
abstract class lt_LTLocalise {
	/**
	 * Returns the potential suffixes for a specific number of items
	 *
	 * @param	int $count  The number of items.
	 * @return	array  An array of potential suffixes.
	 * @since	1.6
	 */
	public static function getPluralSuffixes($count) {
		if ($count == 0) {
			$return =  array('0');
		}
		elseif($count == 1) {
			$return =  array('1');
		}
		else {
			$return = array('MORE');
		}
		return $return;
	}
	

	public static function transliterate($string)
	{
		$str = JString::strtolower($string);

		$glyph_array = array(
			'a' => 'ą',
			'c' => 'č',
			'e' => 'ę',
			'e' => 'ė',
			'i' => 'į',
			's' => 'š',
			'u' => 'ų',
			'u' => 'ū',
			'z' => 'ž',
		);

		foreach ($glyph_array as $letter => $glyphs) {
			$glyphs = explode(',', $glyphs);
			$str = str_replace($glyphs, $letter, $str);
		}

		$str = preg_replace('#\&\#?[a-z0-9]+\;#ismu', '', $str);

		return $str;
	}

	/**
	 * Returns the ignored search words
	 *
	 * @return	array  An array of ignored search words.
	 * @since	1.6
	 */
	public static function getIgnoredSearchWords() {
		$search_ignore = array();
		$search_ignore[] = "ir";
		$search_ignore[] = "į";
		$search_ignore[] = "per";
		$search_ignore[] = "bet";
		$search_ignore[] = "nes";
		$search_ignore[] = "tačiau";
		$search_ignore[] = "o";
		$search_ignore[] = "iš";
		$search_ignore[] = "ant";
		$search_ignore[] = "už";
		$search_ignore[] = "kol";
		$search_ignore[] = "ar";
		$search_ignore[] = "arba";
		$search_ignore[] = "kadangi";
		$search_ignore[] = "ligi";
		$search_ignore[] = "vos";
		$search_ignore[] = "jei";
		return $search_ignore;
	}
	/**
	 * Returns the lower length limit of search words
	 *
	 * @return	integer  The lower length limit of search words.
	 * @since	1.6
	 */
	public static function getLowerLimitSearchWord() {
		return 3;
	}
	/**
	 * Returns the upper length limit of search words
	 *
	 * @return	integer  The upper length limit of search words.
	 * @since	1.6
	 */
	public static function getUpperLimitSearchWord() {
		return 50;
	}
	/**
	 * Returns the number of chars to display when searching
	 *
	 * @return	integer  The number of chars to display when searching.
	 * @since	1.6
	 */
	public static function getSearchDisplayedCharactersNumber() {
		return 200;
	}
}

