<?php include "../fungsi/fungsi_rsa.php";
include("../assets/header.php");?>
<a href="../index.php"><p align="left">Kembali</p></a>
<h2 align="center">ALGORTMA RSA</h2>
<p align="center">RSA di bidang kriptografi adalah sebuah algoritme pada enkripsi public key. RSA merupakan algoritme pertama yang cocok untuk digital signature seperti halnya ekripsi, dan salah satu yang paling maju dalam bidang kriptografi public key. RSA masih digunakan secara luas dalam protokol electronic commerce, dan dipercaya dalam mengamnkan dengan menggunakan kunci yang cukup panjang.</p>
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Enkripsi')">Enkripsi</button>
    <button class="tablinks" onclick="openCity(event, 'Dekripsi')" id="defaultOpen">Dekripsi</button>
</div>
<div id="Enkripsi" class="tabcontent">
    <h3 align="center">Proses Enkripsi</h3><hr>
    <p><b>Pembangkitan Kunci :</b></p> 
    <form method="post" action="rsa_enkripsi.php">
    <input type="number" placeholder="p (Bilangan Prima)" name="p" required>
    <input type="number" placeholder="q (Bilangan Prima)" name="q" required>
    <p><b>Pesan :</b></p> 
    <textarea min-height="100px" max-height="100px" min-width="100%" max-width="100%" rows="4" cols="50" placeholder="Plainteks" name="teks" id="teks" required required></textarea>
    <button type="submit" class="submit" name="enkripsi" id="enkripsi" value="enkripsi">Enkripsi</button>
    </form>
</div>
<div id="Dekripsi" class="tabcontent">
    <h3 align="center">Proses Dekripsi</h3><hr>
    <p><b>Kunci Privat (d, N) :</b></p> 
    <form method="post" action="rsa_dekripsi.php">
    <input type="number" placeholder="d" name="d" required>
    <input type="number" placeholder="N" name="n" required>
    <p><b>Pesan :</b></p> 
    <textarea min-height="100px" max-height="100px" min-width="100%" max-width="100%" rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" required></textarea>
    <button type="submit" class="submit" name="dekripsi" id="dekripsi" value="dekripsi">Dekripsi</button>
    </form>
    
    <?php
    if (isset($_POST['dekripsi'])){
        echo '<p style="color:red;">'.$duration.' detik</p>
        Kunci Privat (d, N) = (<b>'.$d.'</b>, <b>'.$n.'</b>)
        <br/><br/>
        <p><b>Hasil dekripsi pesan <span style="color:blue;">'.$teks.'</span> :</b></p> <textarea min-height="100px" max-height="100px" min-width="100%" max-width="100%" rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" disabled>'.$hasildeskripsi.' </textarea>';
    }
    ?>
<?php include("../assets/footer.php");?>