<?php

class Date_Elapsion{
    public static function time_elapsed_string($datetime,$full= false){
        $now = new DateTime();
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'year',
            's' => 'year',
        );
        
        foreach($string as $k => &$v){
            if($diff->$k){
               $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            }
            else{
                unset($string[$k]);
            }
            if(!$full) $string = array_slice ($string, 0,1);
            return $string ? implode(', ', $string). ' ago':' just now';
        }
    }
    public static function timelapse($time_ago){
    	date_default_timezone_set('Asia/Manila');
        $time_ago = strtotime($time_ago);
        $current_time = time();
        $time_elapsed = $current_time - $time_ago;
        $seconds = $time_elapsed;
        $minute = round($time_elapsed / 60);
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400);
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640);
        $years = round($time_elapsed / 31207680);
        
       if($seconds <= 60){
            return "Just Now";
        }
        else if ($minute <= 60){
            if($minute==1){
                return " a Minute ago";
            }
            else {
                return " $minute minutes ago";
            }
        }
        else if ($hours <= 24){
            if($hours == 1){
                return " a hour ago";
            }
            else {
                return "$hours hrs ago";
            }
        }
        else if ($days <= 7){
            if($days==1){
                return "Yesterday";
            }
            else {
                return " $days days ago";
            }        
        }
        else if($weeks <= 4.3){
            if($weeks == 1){
                return " a week ago";
            }
            else{
                return "$weeks weeks ago";
            }
        }
        else if ($months <= 12){
            if($months == 1){
                return "a Month ago";
            }
            else{
                return "$months month ago";
            }
        }
        else {
            if($years==1){
                return " a year ago";
            }
            else {
                return "$years year ago";
            }
                
        }
        
    }
}

?>
