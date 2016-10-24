<?php

class convertToAgo {
    function convert_datetime($str) {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        list($date, $time) = explode(' ', $str);
        list($year, $month, $day) = explode('-', $date);
        list($hour, $minute, $second) = explode(':', $time);
        $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
        return $timestamp;
    }

    function makeAgo($timestamp){
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $difference = time() - $timestamp;
        $periods = array("sec", "min", "hr", "day", "week", "month", "year", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");
        for($j = 0; $difference >= $lengths[$j]; $j++)
        $difference /= $lengths[$j];
        $difference = round($difference);
        if($difference != 1) $periods[$j].= "s";
        $text = "$difference $periods[$j]";
        return ' posted '.$text.' ago';
    }
} 