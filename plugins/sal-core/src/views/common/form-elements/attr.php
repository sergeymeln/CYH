<?php
/* @var $list [] */
foreach ($list as $key => $value)
{
    $out = $key . ((isset($value) && !empty($value)) ? '="' . $value . '" ' : ' ');
    echo $out;
}
