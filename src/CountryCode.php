<?php
/**
 * @package   SadaTech\Packages
 * @author    PT. SADA INDONESIA <info@sada.id>
 * @license   MIT
 * @link      http://www.sada.co.id/
 * @copyright 2020 PT. SADA INDONESIA, Andika Muhammad Cahya
 */
namespace SadaTech\Packages;

class CountryCode
{
    const DB_LOCATION = 'data/iso3166.json';

    public static function GetNameFromCode($string, $variant = 'alpha-2')
    {
        $data = file_get_contents(realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.self::DB_LOCATION));
        $data = json_decode($data);
        $_TEMP = null;
        foreach ($data as $key => $value)
        {
            if ($value->$variant == $string)
            {
                $_TEMP = $value->name;
            }
        }
        return ucfirst($_TEMP);
    }

    public static function GetCodeFromName($string, $variant = 'alpha-2')
    {
        $data = file_get_contents(realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.self::DB_LOCATION));
        $data = json_decode($data);
        $_TEMP = null;
        foreach ($data as $key => $value)
        {
            if ($value->name == $string)
            {
                $_TEMP = $value->$variant;
            }
        }
        return strtoupper($_TEMP);
    }

    public static function GetDetail($string, $variant = 'name')
    {
        $data = file_get_contents(realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.self::DB_LOCATION));
        $data = json_decode($data);
        $_TEMP = null;
        foreach ($data as $key => $value)
        {
            if ($value->$variant == $string)
            {
                $_TEMP = $value;
            }
        }
        return $_TEMP;
    }
}