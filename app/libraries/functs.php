<?php

class Functs {

    static function clickableLinks($text){
 	   return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
	}

	static function plotLastWeek() {
        $jour = date("Y-m-d"); 
        for ($i=0; $i < 7; $i++) { 
            $day = date('Y-m-d', strtotime($jour. ' - '.$i.' days'));
            $nextDay = date('Y-m-d', strtotime($day. ' + 1 day'));

            $date[$i] = date('l',strtotime($day));
            
            $dayCount = DB::table('posts')
                    ->where('created_at', '>=', $day)
                    ->where('created_at', '<', $nextDay)
                    ->count();

            $data[$i] = $dayCount;  
        }

        $barChartData = array('labels' => array($date[6], $date[5], $date[4], $date[3], $date[2], $date[1], $date[0]), 
                              'datasets' => array(array('fillColor' => "rgba(151,187,205,0.5)", 
                                                 'strokeColor' => "rgba(151,187,205,1)", 
                                                 'data' => [$data[6], $data[5], $data[4], $data[3], $data[2], $data[1], $data[0]]),
                                            
                                            array('fillColor' => "rgba(220,220,220,0.5)", 
                                                  'strokeColor' => "rgba(220,220,220,1)", 
                                                  'data' => [$data[6], $data[5], $data[4], $data[3], $data[2], $data[1], $data[0]])
         ) );
        return $barChartData;
    }

    static function plotLastYear() {
        $jour = date("Y-m"); 
        for ($i=0; $i < 12; $i++) { 
            $month = date('Y-m', strtotime($jour. ' - '.$i.' months'));
            $nextmonth = date('Y-m-d', strtotime($month. ' + 1 month'));

            $date[$i] = date('F',strtotime($month));
            
            $monthCount = DB::table('posts')
                    ->where('created_at', '>=', $month)
                    ->where('created_at', '<', $nextmonth)
                    ->count();

            $data[$i] = $monthCount;  
        }

        $barChartData = array('labels' => array($date[11], $date[10], $date[9], $date[8], $date[7], $date[6], $date[5], $date[4], $date[3], $date[2], $date[1], $date[0]), 
                              'datasets' => array(array('fillColor' => "rgba(151,187,205,0.5)", 
                                                 'strokeColor' => "rgba(151,187,205,1)", 
                                                 'data' => [$data[11], $data[10], $data[9], $data[8], $data[7], $data[6], $data[5], $data[4], $data[3], $data[2], $data[1], $data[0]])
         ) );
        return $barChartData;
    }
}