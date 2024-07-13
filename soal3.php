<?php

$rambuLaluLintas = ["Merah", "Kuning", "Hijau"];
$indeks =  0;

function rambuLaluLintas(){
    global $rambuLaluLintas, $indeks;

    $nilai = $rambuLaluLintas[$indeks];
    $indeks = ($indeks + 1) % count($rambuLaluLintas);

    return $nilai;
}

echo rambuLaluLintas()."\n";
echo rambuLaluLintas()."\n";
echo rambuLaluLintas()."\n";
echo rambuLaluLintas()."\n";
echo rambuLaluLintas()."\n";
echo rambuLaluLintas();

?>