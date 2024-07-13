<?php

function karakterTerbanyak($kata) {
    $counts = count_chars($kata, 1);
    $maxCount = max($counts);
    $characters = [];
    foreach ($counts as $char =>$count){
        if ($count == $maxCount){
            $characters[] = chr($char)." $count" . "x";
        }
    }
    return implode (", ", $characters);
}

echo karakterTerbanyak("wellcome")."\n";
echo karakterTerbanyak("strawberry");
?>