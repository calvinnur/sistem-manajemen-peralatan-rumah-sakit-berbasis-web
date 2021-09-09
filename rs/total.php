<?php
require_once('library.php');
$call = new manajemen;
$page = (isset($_GET['page'])) ? $_GET['page'] : '1';
$kategori = (isset($_GET['kategori'])) ? $_GET['kategori'] : 'perlengkapan';
$bulan = (isset($_GET['bulan'])) ? $_GET['bulan'] : date('M');
$tahun = (isset($_GET['tahun'])) ? $_GET['tahun'] : date('Y');
$obat = (isset($_GET['obat'])) ? $_GET['obat'] : 'obat';
$perlengkapan = (isset($_GET['perlengkapan'])) ? $_GET['perlengkapan'] : 'perlengkapan';
$peralatan = (isset($_GET['peralatan'])) ? $_GET['peralatan'] : 'peralatan';
$tanggal = '1' . $bulan . $tahun;
$akhir_bulan = date("t-M-Y", strtotime($tanggal));
$replace = str_replace('-', ' ', $akhir_bulan);
?>
<?php require_once('header.php') ?>



<div class="sidebar">
    <form method="GET" action="">
        <div class="filter-waktu">
            <div class="filter-heading">
                <h2><i class="far fa-clock" style="float: left; color:white; margin-left:10px; margin-top:-10px;"></i></h2>
                <p>Filter Waktu</p>
            </div>
            <?php
            $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul ", "Aug", "Sep", "Oct", "Nov", "Dec"];
            $count_months = count($months) - 1; ?>
            <select name="bulan">
                <?php for ($a = 0; $a <= $count_months; $a++) {
                    $time = strtotime($months[$a]);
                    $bulannya = date('M', $time);
                ?>
                    <option <?php if ($bulannya == $bulan) echo 'selected'; ?>><?php echo $bulannya ?></option>
                <?php  } ?>
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
        <p style="position: relative; left:20px; top:5px;"><a href="obat.php?page=1">Obat-obatan</a> </p>
    </div>

    <div class="list-data">
        <img src="img/logo3.png">
        <p style="position: relative; left:20px; top:5px;"><a href="perlengkapan.php?page=1">Perlengkapan</a></p>
    </div>

    <div class="list-data" <?php if ($page) echo "style='background-color:#9bf598;'" ?>>
        <img src="img/logo4.png">
        <p style="position: relative; left:20px; top:5px;"><a href="total.php">Total Barang</a></p>
    </div>

</div>
</div>


<div class="content-table">
    <img src="img/logo4.png">
    <p style="position:relative; left:10px; font-size:20px;">Total Barang: <span id="param"><?php echo $kategori ?></span><i class="fas fa-caret-down" style="cursor: pointer; margin-left:10px;" onclick="drop_total()"></i></p><br><br>
    <p style="font-size: 18px; color:#d2d6d2; margin-top:-45px;">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>
    <p style="margin-left: 10px;">Periode <?php echo $replace; ?></p>
    <div class="list-total" id="list">
        <a style="top: 8px;" href="total.php?kategori=<?php echo $peralatan?>&bulan=<?php echo $bulan?>&tahun=<?php echo $tahun?>"><?php echo $peralatan?></a><br>
        <a style="top: 12px;" href="total.php?kategori=<?php echo $obat?>&bulan=<?php echo $bulan?>&tahun=<?php echo $tahun?>"><?php echo $obat?></a><br>
        <a style="top: 15px;" href="total.php?kategori=<?php echo $perlengkapan?>&bulan=<?php echo $bulan?>&tahun=<?php echo $tahun?>"><?php echo $perlengkapan?></a>
    </div>
    <div id="table-data"></div>
</div>
<script src="jquery.js"></script>
<script src="index.js?<?php echo time()?>"></script>
<script>
  $(document).ready(function() {
           total('<?php echo $kategori?>', '<?php echo $bulan?>', '<?php echo $tahun?>');
        }); 
</script>
<?php require_once('footer.php') ?>