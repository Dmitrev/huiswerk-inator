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
    
}