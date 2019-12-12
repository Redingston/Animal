<?php 
$text_bgcolor= '#fff';
$highlith_today=1;
$today_bgcolor='#2f2f2f';
$today_textcolor='#fff';
$column_with=22;

function genSetStop($month, $year)
{
    if ($month == '12') {
        $month = 1;
        $year++;
    } else $month++;
    $stop = date("d", mktime(0, 0, 0, $month, 0, $year));
    return $stop;
}
function genCalendar($month, $year, $stop, $column_with)
{
    global $today_bgcolor, $highlith_today, $today_textcolor;

    $month = (intval($month));

    if($month==12){
        $prev_month = $month-1;
        $prev_year=$year;
        $next_month = 1;
        $next_year=$year+1;
    }
    elseif($month==1){
        $prev_month = 12;
        $prev_year=$year-1;
        $next_month = $month+1;
        $next_year=$year;
    }
    else{
        $prev_month = $month-1;
        $prev_year=$year;
        $next_month = $month+1;
        $next_year=$year;
    }
    $Month_text['1']='January';
    $Month_text['2']='February';
    $Month_text['3']='March';
    $Month_text['4']='April';
    $Month_text['5']='May';
    $Month_text['6']='June';
    $Month_text['7']='July';
    $Month_text['8']='August';
    $Month_text['9']='September';
    $Month_text['10']='October';
    $Month_text['11']='November';
    $Month_text['12']='December';

    $string = '<tr>'.
    '<td colspan="7">'.$year.' '.$Month_text['$month'].'</td>'.
    '<tr>'.
    '<tr><td width="'.$column_with.'">Mo</td>'.
    '<tr><td width="'.$column_with.'">Tu</td>'.
    '<tr><td width="'.$column_with.'">We</td>'.
    '<tr><td width="'.$column_with.'">Th</td>'.
    '<tr><td width="'.$column_with.'">Fr</td>'.
    '<tr><td width="'.$column_with.'" style="color:#f63e3e;">Sa</td>'.
    '<tr><td width="'.$column_with.'" style="color:#f63e3e;">Su</td>'.
    '<tr>';
    $start =date("u",mktime());

    
}

