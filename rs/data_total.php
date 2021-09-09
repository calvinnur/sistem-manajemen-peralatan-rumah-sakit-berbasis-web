<?php
require_once('library.php');
$call = new manajemen;
if (isset($_POST['kategori']))
    $_SESSION['kategori'] = $_POST['kategori'];
$waktu = strtotime('1 ' . $_POST['bulan'] . ' ' . $_POST['tahun']);
$waktu = date('Y-m', $waktu);
if(isset($_GET['kategori'])) echo $_GET['kategori'];
?>
<table cellpadding=3 border="1" cellspacing=0 style="margin-left: 5px; ">
    <tr>
        <th style="width: 530px;">Kategori</th>
        <th style="width: 530px;">Total Barang</th>
    </tr>
    <?php 
    $query = $call->querys("select * from db_barang where tanggal like ('%$waktu%') and kategori = '".$_POST['kategori']."'");
    $jumlah = 0;
    $count_data = mysqli_num_rows($query);
    if($count_data == 0){
        echo "<tr>
        <td colspan='7' style='text-align:center;'>Tidak ada data</td>
        </tr>";
    }else{
         while($show = mysqli_fetch_assoc($query)){
    ?>
    <tr>
    <td style="display: none;"><?php echo $jumlah += $show['stok_barang']?></td>
    </tr>
    <?php }?>
    <tr>
        <td style="text-align:center; font-size:14px; background-color:white;"><?php echo $_POST['kategori']?></td>
        <td style="text-align: center; background-color:white;"><?php echo $jumlah;?></td>
    </tr>
    <?php  }?>
</table>