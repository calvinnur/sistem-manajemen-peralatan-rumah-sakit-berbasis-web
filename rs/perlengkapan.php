<?php 
require_once('library.php');
$call = new manajemen;
$page = (isset($_GET['page'])) ? $_GET['page'] : '1';
$tahun = (isset($_GET['tahun'])) ? $_GET['tahun'] : date('Y');
$bulan = (isset($_GET['bulan'])) ? $_GET['bulan'] : date('M');
$waktu = strtotime('1'.$bulan.' '.$tahun);
$waktu = date('Y-m',$waktu);
?>
<?php require_once('header.php');?>

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
                  $bulannya = date('M',$time);
                ?>
                <option <?php if($bulannya == $bulan) echo 'selected';?>><?php echo $bulannya ?></option>
            <?php  } ?>
        </select>

            <select name="tahun">
                <?php
                for ($a = 2017; $a <= date('Y'); $a++) { ?>
                    <option <?php if($tahun == $a) echo "selected";?>><?php echo $a ?></option>
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

    <div class="list-data" <?php if($page) echo "style='background-color:#9bf598;'"?>>
        <img src="img/logo3.png">
        <p style="position: relative; left:20px; top:5px;"><a href="perlengkapan.php?page=1">Perlengkapan</a></p>
    </div>

    <div class="list-data">
            <img src="img/logo4.png">
            <p style="position: relative; left:20px; top:5px;"><a href="total.php">Total Barang</a> </p>
    </div>

</div>
</div>


<div class="content-table">
    <img src="img/logo3.png">
    <p style="position:relative; left:10px; font-size:20px;">List Perlengkapan</p>
    <button type="button" onclick="modal()"><i class="fas fa-plus" style="float: left;"></i>Tambah Data</button>
    <p style="font-size: 18px; color:#d2d6d2; margin-top:-45px;">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>

    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th style="width: 150px;">Tanggal</th>
            <th style="width:180px;">Nama Barang</th>
            <th style="width: 400px;">Keterangan</th>
            <th style="width: 200px;">Stok Barang</th>
            <th style="width: 10%;">#</th>
        </tr>
    <?php 
    $pagination = $call->pagination("select * from db_barang where kategori = 'perlengkapan'",$page,10);
    $total = $pagination['total_page'];
    $limit = $pagination['limit_data'];
    $offset = $pagination['offset'];

    $query = $call->querys("select * from db_barang where tanggal like ('%$waktu%') and kategori = 'perlengkapan' order by tanggal desc limit $offset,$limit");
    $row = mysqli_num_rows($query);
    if($row == 0){
        echo "<tr>
        <td colspan='7' style = 'text-align:center;'>Tidak ada data</td>
        </tr>
        ";
    }else{
        while($show = mysqli_fetch_assoc($query)){
        $tanggal = strtotime($show['tanggal']);
        $tanggal = date('d-M-Y',$tanggal); 
        $replace = str_replace("-"," ",$tanggal);   
            ?> 
        <tr>
            <td style="text-align: center;"><?php echo $replace?> </td>
            <td style="text-align:center;"><?php echo $show['nama_barang']?></td>
            <td style="text-align: center;"><?php echo $show['deskripsi']?></td>
            <td style="text-align: center;"><?php echo $show['stok_barang']?></td>
            <td style="text-align: center;"><img onclick="ubah_perlengkapan(<?php echo $show['id']?>)" src="img/edit.png" style="width: 25px; height:25px; position:relative; left:10px; top:-5px; cursor:pointer;">
            <a  onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini?')" href="delete_perlengkapan.php?id=<?php echo $show['id']?>"><img  style="width: 25px; height:25px; position:relative; left:5px; top:-5px;" src="img/trash.png"></a>
        </tr>
        <?php        
        }
    }
    ?>
    </table>
   

<div class="bg-modal"></div>
<form method="POST" action="insert_perlengkapan.php">
    <div class="modal" id="tambah">
        <h2>Tambah Data</h2><i onclick="modal()" class="fas fa-times" style="float: right; margin-right:30px; margin-top:-50px; cursor:pointer;"></i>
        <div class="garis" style="margin-left:0px; margin-top: 0px; width:100%;"></div><br>
        <label>Tanggal</label><br>
        <input type="date" name="tanggal"><br>
        <label>Nama Barang</label><br>
        <input type="text" name="nama" placeholder="nama barang"><br>
        <label>Keterangan</label><br>
        <input type="text" name="keterangan" placeholder="keterangan"><br>
        <label>Stok Barang</label><br>
        <input type="text" name="stok" placeholder="stok barang"><br>
        <button type="submit" class="submit">Simpan</button><button type="button"  onclick="modal()" class="cancel">Tutup</button>
    </div>
</form>

<form method="POST" action="update_perlengkapan.php">
    <div class="modal" id="perlengkapan">
      <input type="hidden" id="id" name="id">
        <h2>Ubah data</h2><i onclick="ubah_perlengkapan()" class="fas fa-times" style="float: right; margin-right:30px; margin-top:-50px; cursor:pointer;"></i>
        <div class="garis" style="margin-left:0px; margin-top: 0px; width:100%;"></div><br>
        <label>Tanggal</label><br>
        <input type="date" name="tanggal" id="tanggal"><br>
        <label>Nama Barang</label><br>
        <input type="text" name="nama" placeholder="nama barang" id="nama"><br>
        <label>Keterangan</label><br>
        <input type="text" name="keterangan" placeholder="keterangan" id="desc"><br>
        <label>Stok Barang</label><br>
        <input type="text" name="stok" placeholder="stok barang" id="stok"><br>
        <button type="submit" class="submit">Simpan</button><button type="button" onclick="ubah_perlengkapan()" class="cancel">Tutup</button>
    </div>
</form>

</div>

<script src="jquery.js"></script>
<script src="index.js?<?php echo time()?>"></script>





<?php require_once('footer.php');?>