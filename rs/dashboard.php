<?php
require_once('library.php');
$call = new manajemen;
if (!isset($_SESSION['username'])) {
    header('location:index.php');
}
$bulan = (isset($_GET['bulan'])) ? $_GET['bulan'] : date('M');
$tahun = (isset($_GET['tahun'])) ? $_GET['tahun'] : date('Y');
$page = null;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    header("location: dashboard.php?page=home");
}
?>
<?php require_once('header.php') ?>
<div class="sidebar">
    <form method="GET" action="">
        <input type="hidden" name="page" value="<?php echo $page ?>">
        <div class="filter-waktu">
            <div class="filter-heading">
                <h2><i class="far fa-clock" style="float: left; color:white; margin-left:10px; margin-top:-10px;"></i></h2>
                <p>Filter Waktu</p>
            </div>
            <?php
            $bulan = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec"];
            $hitung = count($bulan) - 1;
            ?>
            <select name="bulan">
                <?php
                for ($a = 0; $a <= $hitung; $a++) {  ?>
                    <option <?php if ($bulan[$a] == $bulan) ?>><?php echo $bulan[$a]; ?></option>
                <?php } ?>
            </select>

            <select name="tahun">
                <?php
                for ($a = 2017; $a <= date('Y'); $a++) { ?>
                    <option <?php if ($tahun == $a) echo "selected"; ?>><?php echo $a ?></option>
                <?php } ?>
            </select>
            <button type="submit">Terapkan</button>
    </form>
</div>

<div class="data-barang">
    <div class="header-barang">
        <h2><i class="fas fa-bars" style="color: white; margin-left:10px; margin-top:-10px; float: left; font-weight:bold;"></i></h2>
        <p>Data Barang</p>
    </div>

    <div class="list-data">
        <img src="img/logo1.png">
        <p style="position: relative; left:20px; top:5px;"><a href="peralatan.php?page=1">Peralatan</a></p>
    </div>

    <div class="list-data">
        <img src="img/logo2.png">
        <p style="position: relative; left:20px; top:5px;"><a href="obat.php?page=1">Obat-obatan</a></p>
    </div>

    <div class="list-data">
        <img src="img/logo3.png">
        <p style="position: relative; left:20px; top:5px;"><a href="perlengkapan.php?page=1">Perlengkapan</a> </p>
    </div>

    <div class="list-data">
        <img src="img/logo4.png">
        <p style="position: relative; left:20px; top:5px;"><a href="total.php">Total Barang</a> </p>
    </div>

</div>
</div>
<?php if ($page == 'home') { ?>
    <div class="content">
        <h2>Selamat Datang Di Aplikasi Manajemen</h2>
        <p>System Manajemen Gudang Berbasis Web</p>
        <p style="font-size: 18px; color:#d2d6d2;"> - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>
        <div class="content-menu">
            <img src="img/logo1.png">
            <div class="footer-menu">
                <h3><a href="peralatan.php?page=1">Peralatan</a></h3>
            </div>
        </div>

        <div class="content-menu">
            <img src="img/logo2.png">
            <div class="footer-menu">
                <h3><a href="obat.php?page=1">Obat-obatan</a></h3>
            </div>
        </div>

        <div class="content-menu">
            <img src="img/logo3.png">
            <div class="footer-menu">
                <h3><a href="perlengkapan.php?page=1">Perlengkapan</a></h3>
            </div>
        </div>

        <div class="content-menu">
            <img src="img/logo4.png">
            <div class="footer-menu">
                <h3><a href="total.php?page=1">Total</a> </h3>
            </div>
        </div>

        <div class="garis"></div>
        <h3>Informasi Instansi</h3>
        <img src="img/gedung.png">
        <?php   $data = $call->data_pengaturan();?>
        <div class="info">
            <p>Nama Instansi <span style="margin-left:20%;">: <?php echo $data['nama']?></span> </p>
            <p>Alamat <span style="margin-left:209px;">: <?php echo $data['alamat']?></span> </p>
            <p>E-mail <span style="margin-left:214px;">: <?php echo $data['email']?></span> </p>
            <p>No. Telephone <span style="margin-left:157px;">: <?php echo $data['tlp']?></span> </p>
        </div><br>
        <div class="garis"></div>
        <p style="font-size: 18px;">Aplikasi Manajemen ini dibuat dengan tujuan untuk memenuhi tanggung jawab akan tugas matakuliah Penulisan Ilmiah. Yang mana sistem yang ada didalamnya berdasarkan semua yang telah kami pelajari selama mengikuti perkuliahan.</p>
        <div class="garis" style="margin-top: 0px;"></div>
        <span style="position:relative; top:10px; left:10px; font-size:12px;">2021 © Sistem Manajemen Gudang</span>
    </div>
<?php } elseif ($page == 'pengaturan') { ?>
    <div class="content" style="height: 470px;">
        <img src="img/setting.png" style="width: 35px; height:35px; margin-top:10px; float:left;">
        <h3 style="color:#505250; position:relative; left:10px;">Pengaturan Dasar</h3>
        <p style="font-size: 18px; color:#d2d6d2;"> - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>
        <form method="POST" action="update_setting.php">
        <?php   $data = $call->data_pengaturan();?>
            <h5 style="margin-top: -20px; margin-left:20px; float:left;">Nama Instansi</h5>
            <input type="text" name="nama" placeholder="Nama Instansi" value="<?php echo $data['nama']?>">
            <div class="example" style="margin-top:-40px;">
                <span>* Nama Lengkap Perusahaan Ex : Pt. Nutri Food Indonesia</span>
            </div><br><br>

            <h5 style="margin-top: -10px; margin-left:20px; float:left;">Alamat</h5>
            <input type="text" name="alamat" placeholder="Alamat Instansi" style="position:relative; left:45px;" value="<?php echo $data['alamat']?>">
            <div class="example">
                <span>* Alamat Lengkap Perusahaan</span>
            </div><br><br>

            <h5 style="margin-top: -10px; margin-left:20px; float:left;">Bidang Usaha</h5>
            <input type="text" name="bidang" placeholder="Bidang Instansi" style="position:relative; left:0px;" value="<?php echo $data['bidang']?>">
            <div class="example">
                <span>* Jenis usaha Perusahaan Anda</span>
            </div><br><br><br>

            <h5 style="margin-top: -18px; margin-left:20px; float:left;">E-Mail</h5>
            <input type="text" name="email" placeholder="Email Instansi" style="position:relative; top:-15px; left:50px;" value="<?php echo $data['email']?>">
            <div class="example" style="margin-top: -35px;">
                <span>* Email resmi perusahaan Ex : Info@dikertas.com</span>
            </div><br>

            <h5 style="margin-top: 10px; margin-left:20px; float:left;">No Telepone</h5>
            <input type="text" name="tlp" placeholder="Nomor telepon perusahaan" style="position:relative; left:10px; top:8px;" value="<?php echo $data['tlp']?>">
            <div class="example" style="margin-top: -10px;">
                <span>* Nomor telepon perusahaan</span>
            </div>
            <div class="garis" style="margin-top: 40px;"></div>
            <button type="submit">Simpan</button>
    </div>
    </form>
<?php } ?>
<script src="jquery.js"></script>
<script src="index.js?<?php echo time() ?>"></script>
<?php require_once('footer.php') ?>