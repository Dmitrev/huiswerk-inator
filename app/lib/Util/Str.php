<?php
namespace Util;
use Config;
class Str {

    protected $string;

    public function __construct( $string = NULL)
    {
        $this->string = $string ? $string : '';

    }


    public function monthName( $string, $short = false )
    {

        $type = $short ? 'short' : 'full';

        $month = ltrim( $string, 0 );

        return Config::get('months')[ $month ][$type];
    }

    public function objectToFriendlyDate($short = false, $displayYear = false)
    {
        if( !is_object($this->string) )
            return NULL;

        $date = $this->string;
        $output = $date->day;
        $output.= ' '. $this->monthName( $date->month, false );

        if( $displayYear )
        {
            $output.= ' '.$date->year;
        }

        return $output;
    }

    public static function enters( $string = '' )
    {

      // Remove existing HTML formatting to avoid double-wrapping things
      $string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);
      return '<p>'.preg_replace("/([\n]{1,})/i", "</p>\n<p>", trim($string)).'</p>';

    }

    public static function comment( $string ){
        return strip_tags($string, "<img><p><span><br><ul><li><ol>");
    }

    public function dayOfWeek($short = true)
    {
      $days =  Config::get('days');
      if( !array_key_exists($this->string, $days))
        return NULL;

      if( $short )
        return $days[$this->string]['short'];
      else
        return $days[$this->string]['full'];
    }

}
