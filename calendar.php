<?php
$text_bgcolor = '#fff';
$highlith_today = 1;
$today_bgcolor = '#2f2f2f';
$today_textcolor = '#fff';
$column_with = 22;

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

    if ($month == 12) {
        $prev_month = $month - 1;
        $prev_year = $year;
        $next_month = 1;
        $next_year = $year + 1;
    } elseif ($month == 1) {
        $prev_month = 12;
        $prev_year = $year - 1;
        $next_month = $month + 1;
        $next_year = $year;
    } else {
        $prev_month = $month - 1;
        $prev_year = $year;
        $next_month = $month + 1;
        $next_year = $year;
    }
    $Month_text['1'] = 'January';
    $Month_text['2'] = 'February';
    $Month_text['3'] = 'March';
    $Month_text['4'] = 'April';
    $Month_text['5'] = 'May';
    $Month_text['6'] = 'June';
    $Month_text['7'] = 'July';
    $Month_text['8'] = 'August';
    $Month_text['9'] = 'September';
    $Month_text['10'] = 'October';
    $Month_text['11'] = 'November';
    $Month_text['12'] = 'December';

    $string = '<tr>' .
        '<td colspan="7">' . $year . ' ' . $Month_text["$month"] . '</td>' .
        '<tr>' .
        '<td width="' . $column_with . '">Mo</td>' .
        '<td width="' . $column_with . '">Tu</td>' .
        '<td width="' . $column_with . '">We</td>' .
        '<td width="' . $column_with . '">Th</td>' .
        '<td width="' . $column_with . '">Fr</td>' .
        '<td width="' . $column_with . '" style="color:#f63e3e;">Sa</td>' .
        '<td width="' . $column_with . '" style="color:#f63e3e;">Su</td>' .
        '<tr>';
    $start = date("w", mktime(0, 0, 0, $month, 1, $year)) - 1;
    if ($start == -1) $start = 6;
    for ($i = 0; $i < $start; $i++) $string .= '<td>&nbsp;</td>';

    $frame = $start - 1;
    for ($i = 1; $i < $stop; $i++) {
        $day = mktime(0, 0, 0, date("m"), $i, date("Y"));
        $frame++;
        if ($frame > 6) {
            $string .= '</tr>';
            if ($i < $stop) $string .= '<tr>';
            $frame = 0;
        }

        if ($month == date("m", $day) && $year == date("Y", $day) && date("d") == date("d", $day) && $highlith_today == 1) {
            $string .= '<td width="' . $column_with . '" style="background:' . $today_bgcolor . '; color:' . $today_textcolor .
                ';">' . $i . '</td>';
            continue;
        }
        if ($frame == 5 || $frame == 6) {
            $string .= '<td width="' . $column_with . '" style="color:#f63e3e;">' . $i . '</td>';
        } else {
            $string .= '<td width="' . $column_with . '" style="color:#666;">' . $i . '</td>';
        }
    }
    for ($i = 1; $frame < 6; $frame++) {
        $string .= '<td>&nbsp;</td>';
    }
    if ($frame < 6) $string .= '</tr>';
    return $string;
}
?>
<table border="0" align="center">
    <?php
    if (@!$month) {
        $month = date('m');
        $year = date("Y");
    }
    $day_number = genSetStop($month, $year);
    print $mid_html = genCalendar($month, $year, $day_number, $column_with);
    ?>
</table>
</body>