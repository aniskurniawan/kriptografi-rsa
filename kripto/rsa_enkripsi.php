<?php include "../fungsi/fungsi_rsa.php";
include("../assets/header.php");?>
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Enkripsi')" id="defaultOpen">Enkripsi</button>
    <button class="tablinks" onclick="openCity(event, 'Dekripsi')">Dekripsi</button>
    <button class="tablinks" onclick="openCity(event, 'Prima')">Cek Bilangan Prima</button>
</div>
<div id="Enkripsi" class="tabcontent">
    <h3 align="center">Proses Enkripsi</h3><hr>
    <p><b>Pembangkitan kunci :</b></p> 
    <form method="post" action="rsa_enkripsi.php">
    <input type="number" placeholder="p (bilangan prima)" name="p" required>
    <input type="number" placeholder="q (bilangan prima)" name="q" required>
    <p><b>Pesan :</b></p> 
    <textarea rows="4" cols="50" placeholder="Plainteks" name="teks" id="teks" required required></textarea>
    <button type="submit" class="submit" name="enkripsi" id="enkripsi" value="enkripsi">Enkripsi</button>
    </form>
    <?php if (isset($_POST['enkripsi'])){
        echo '
            <hr><h3 align="center">Hasil Enkripsi</h3><hr>
            <p><b>Pesan plainteks :</b></p>
            <textarea rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" disabled>'.$teks.' </textarea>
            <p><b>Kunci yang dibangkitkan :</b></p>
            <p>
            1. Nilai p = <span style="color:blue;">'.$p.'</span><br/>
            2. Nilai q (acak) = <span style="color:blue;">'.$q.'</span><br/>
            3. Nilai e (acak) = <span style="color:blue;">'.$e.'</span><br/>
            4. Nilai d = <span style="color:blue;">'.$d.'</span><br/>
            5. Kunci publik (e, N) = (<span style="color:blue;">'.$e.'</span>, <span style="color:blue;">'.$n.'</span>)<br/>
            6. Kunci privat (d, N) = (<span style="color:blue;">'.$d.'</span>, <span style="color:blue;">'.$n.'</span>)</p>
            <p><b>Kunci yang digunakan :</b></p>
            <p>Kunci publik (e, N) = (<span style="color:blue;">'.$e.'</span>, <span style="color:blue;">'.$n.'</span>)</p>
            <p><b>Hasil enkripsi pesan :</b></p> <textarea rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" disabled>'.$hasilenkripsi.' </textarea>
            <p style="color:gray;"><i>'.$duration.' detik</i></p>';
    }
    ?>
</div>
<div id="Dekripsi" class="tabcontent">
    <h3 align="center">Proses Dekripsi</h3><hr>
    <p><b>Kunci privat (d, N) :</b></p> 
    <form method="post" action="rsa_dekripsi.php">
    <input type="number" placeholder="d" name="d" value="<?php if(isset($_POST['enkripsi'])){echo $d;} ?>" required>
    <input type="number" placeholder="N" name="n" value="<?php if(isset($_POST['enkripsi'])){echo $n;} ?>" required>
    <p><b>Pesan :</b></p> 
    <textarea rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" required><?php if(isset($_POST['enkripsi'])){echo $hasilenkripsi;} ?></textarea>
    <button type="submit" class="submit" name="dekripsi" id="dekripsi" value="dekripsi">Dekripsi</button>
    </form>
</div>
<div id="Prima" class="tabcontent">
    <h3 align="center">Proses Pengecekan Bilangan Prima</h3><hr>
    <p><b>Angka yang dicek :</b></p> 
    <form method="post" action="rsa_cek_bilangan_prima.php">
    <input type="number" placeholder="Angka yang dianggap bilangan prima" name="n" required>
    <button type="submit" class="submit" name="prima" id="prima" value="prima">Cek Angka</button>
    </form>
</div>
<?php include("../assets/footer.php");?>
