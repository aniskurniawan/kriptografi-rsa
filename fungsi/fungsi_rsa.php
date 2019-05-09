<?php
/* 
keterangan Masing Masing Fungsi yang dipake dari Library gmp & PHP --

gmp_mod    = Sisa Hasil Bagi;
gmp_pow    = Raise number into power;
ord        = Mengembalikan Nilai Karakter Ke ASCII;
strlen     = Dapatkan Panjang String;
gmp_strval = Convert Nomer ke String;
chr        = Mengembalikan ke Nilai Karakter;
explode    = Memecah String;

*/  
    // Acak e semua bilangan bilangan yang relatif prima terhadap (p-1), (p+1), (q-1) dan (q+1)
    function e($p,$q){
            return rand(1,$p-1);
    }
    // Proses Enkripsi
    function enkripsi($teks, $n, $e){
    //Pesan dikodekan menjadi kode ASCII, Kemudian di Enkripsi Per Karakter
        $hasil='';
        for($i=0; $i<strlen($teks); ++$i){
            //Rumus Enkripsi
            $hasil.=gmp_strval(gmp_mod(gmp_pow(ord($teks[$i]),$e),$n));
            //Antar Tiap Karakter dipisahkan dengan spasi
            if($i!=strlen($teks)-1){
                $hasil.=" ";
            }
        }
        
    return $hasil;
    }

    // Proses Dekripsi
    function dekripsi($teks, $d, $n){
        //Pesan Enkripsi dipecah menjadi array dengan batasan spasi
        $hasilteks = '';
        $hasil = '';
        $teks=explode(" ", $teks);
        foreach($teks as $nilai){
        //Rumus Deskripsi
        $hasilteks.=chr(gmp_strval(gmp_mod(gmp_pow($nilai,$d),$n)));  
        //$gm1 = gmp_pow($nilai,gmp_strval($d));
        //$gm2 = gmp_mod($gm1,$n);
        //$gm3 = gmp_strval($gm2);
        //$hasilteks.=chr($gm3); 
        } 
        return $hasilteks;
    }


    // Jika Button Enkripsi ditekan
    if(!empty($_POST['enkripsi'])){
        $time_start = microtime(true); // Timer mulai eksekusi
        $p=$_POST['p'];
        $q=$_POST['q'];
        $e=e($p,$q);
        $teks=$_POST['teks'];
        // Inisialisasi P & Q (Masing Masing adalah Bilangan Prima) <--- Lebih Besar Lebih Bagus
        // Menghitung N = P*Q
        $n = gmp_mul($p, $q);
        $valn = gmp_strval($n);
        // Menghitung Nilai M =(p-1)*(q-1)
        $m = gmp_mul(gmp_sub($p, 1),gmp_sub($q, 1));
        // Mencari E (Kunci Public --> (e,n))
        // Membuktikan E = FPB (Faktor Persekutuan Terbesar) dari E dan M = 1
        for($e; $e < 1000; $e++){  // Mencoba dengan Perulangan 1000 Kali 
            $fpb = gmp_gcd($e, $m);
            if(gmp_strval($fpb)=='1') // Jika Benar E adalah FPB dari E dan M = 1 <-- Hentikan Proses
            break;
        }
        // Menghitung D (Kunci Private --> (d,n))
        // D = (($m * $i) + 1) / e = $key[1] <-- Perulangan Do While
        $i=1;
         do {      
            $key = gmp_div_qr(gmp_add(gmp_mul($m,$i),1), $e);
            $i++;
            if($i==1000) // Dengan Perulangan 1000 Kali
                break;
        } 
        // Sampai $key[1]=0
        while(gmp_strval($key[1])!='0');
        // Hasil D = $key[0] 
        $d = $key[0];
        $vald =gmp_strval($d); 
        $hasilenkripsi = enkripsi($teks, $n, $e);
        $time_end = microtime(true); // Timer stop eksekusi
        // Waktu Eksekusi
        $duration = $time_end - $time_start;
    }

    // Jika Button Deskripsi ditekan
    if(!empty($_POST['dekripsi'])){
        $time_start = microtime(true); // Timer mulai eksekusi
        $n=$_POST['n'];
        $d=$_POST['d'];
        $teks=$_POST['teks'];
        $hasildeskripsi = dekripsi($teks, $d, $n);
        $time_end = microtime(true); // Timer stop eksekusi
        // Waktu Eksekusi
        $duration = $time_end - $time_start;
    }
?>