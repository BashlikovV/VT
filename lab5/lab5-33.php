<?php
function processArray($arr): array
{
    $result = array();
    foreach ($arr as $item) {
        if (is_array($item)) {
            $result = array_merge($result, processArray($item));
        } else {
            $result[] = $item;
        }
    }
    return array_unique($result);
}

$multidimensional_array = array(
    0 => array(1, 2, 3),
    1 => array(4, 5, 6),
    2 => array(7, 8, 9, 1),
    3 => array(10, 11, 2)
);
printf("%s\n", json_encode(processArray($multidimensional_array)));