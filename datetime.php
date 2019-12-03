<?php

function longdate($timestamp)
{
    return date("l F jS Y" );
}

echo longdate(time());
?>