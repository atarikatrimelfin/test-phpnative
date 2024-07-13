<?php

function nilaiTerbesarKedua($array){
    rsort($array);
    return $array[1];
}

$arrayAngka = [15, 16, 17, 20, 21];
$nilaiTerbesarKedua = nilaiTerbesarKedua($arrayAngka);

echo "Array: ".implode(", ", $arrayAngka)."\n";
echo "Nilai terbesar kedua: ". $nilaiTerbesarKedua;
?>