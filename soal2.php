<?php

class Nilai {
    public $mapel;
    public $nilai;
    public function __construct($mapel, $nilai){
        $this -> mapel = $mapel;
        $this -> nilai = $nilai;
    }
}

class Siswa {
    public $nrp;
    public $nama;
    public $daftarNilai;

    public function __construct($nrp, $nama){
        $this -> nrp = $nrp;
        $this -> nama = $nama;
        $this -> daftarNilai = [];
    }

    public function tambahNilai($nilai){
        if(count($this->daftarNilai) < 3){
            $mapelSudahAda = false;
            foreach ($this->daftarNilai as $nilaiSudahAda){
                if($nilaiSudahAda->mapel === $nilai->mapel){
                    $mapelSudahAda = true;
                    break;
                }
            }

            if(!$mapelSudahAda){
                $this->daftarNilai[] = $nilai;
            }
        }
        else {
            throw new Exception ("Daftar Nilai hanya 3");
        }
    }

    public function tampilkanInfo()
    {
        echo "Nama: {$this->nama}, NRP: {$this->nrp}\n";
        foreach ($this -> daftarNilai as $index => $nilai){
            echo "Mapel: {$nilai->mapel}, Nilai: {$nilai->nilai}\n";
        }
    }
}

function generateRandomString($length = 10)
{
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function generateRandomNilai(){
    return rand (0,100);
}

function generateRandomMapel()
{
    $mapel = ["Inggris", "Indonesia", "Jepang"];
    return $mapel [array_rand($mapel)];
}

$siswaB = new Siswa(11, "Atarika");
$nilaiInggris = new Nilai ("inggris", 100);
$siswaB->tambahNilai($nilaiInggris);

echo "Siswa Baru: ";
$siswaB->tampilkanInfo();
echo "\n";

for ($i = 1; $i <= 10; $i++){
    $nama = generateRandomString();
    $siswa = new Siswa ($i, $nama);
    $mapel = generateRandomMapel();

    for ($j = 0; $j < 3; $j++){
        $siswa->tambahNilai(new Nilai($mapel, generateRandomNilai()));
    }

    $siswa->tampilkanInfo();
}

?>