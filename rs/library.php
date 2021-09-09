<?php 
session_start();
class manajemen{

    protected function connect(){
        $connect = mysqli_connect('localhost','root','','gudang');
        return $connect;
    }

    protected function query($command){
        $query = mysqli_query($this->connect(),$command);
        return $query;
    }

    public function querys($command){
        return $this->query($command);
    }

    public function required_login(){
        $field = ['username','password'];
        $build['status'] = true;
        $index = 0;
        foreach($_POST as $key => $value){
            if(empty(trim($value))){
                $build['field'] = $field[$index];
                $build['status'] = false;
            }
            break;
            $index++;
        }
        return $build;
    }

    protected function user_check(){
        $query = $this->query("select * from user where username = '".$_POST['username']."'");
        $row = mysqli_num_rows($query);
        if($row == 0){
            return false;
        }else{
            return true;
        }
    }
    public function check_user(){
        return $this->user_check();
    }

    protected function check_pass(){
        $query = $this->query("select * from user where username = '".$_POST['username']."'");
        $result = mysqli_fetch_assoc($query);
        if(password_verify($_POST['password'],$result['password'])){
            $_SESSION['username'] = $_POST['username'];
            return true;
        }else{
            return false;
        }
    }

    public function pass_check(){
        return $this->check_pass();
    }

    public function pagination($command, $page, $limit_data){
        $query = $this->query($command);
        $count_data = mysqli_num_rows($query);
        $data['total_page'] = ceil(($count_data / $limit_data));
        $data['offset'] = ($page - 1) * $limit_data;
        $data['limit_data'] = $limit_data;
        return $data;
    }

    public function required_peralatan(){
        $field = ["tanggal","nama barang","keterangan","stok barang"];
        $index = 0;
        $build['status'] = true;

        foreach($_POST as $key => $value){
            if(empty(trim($value))){
                $build['field'] = $field[$index];
                $build['status'] = false;
            }
           break;
           $index++; 
        }
        return $build;
    }

    public function numeric_check(){
        $stok = $_POST['stok'];
        $numeric = is_numeric($stok);
        if($numeric == true){
            return true;
        }else{
            return false;
        }
    }

    protected function insert_peralatan(){
        $query = $this->query("insert into db_barang (tanggal,nama_barang,deskripsi,stok_barang,kategori) values(
            '".strip_tags($_POST['tanggal'])."',
            '".strip_tags($_POST['nama'])."',
            '".strip_tags($_POST['keterangan'])."',
            '".strip_tags($_POST['stok'])."',
            'Peralatan'
        )");
        return $query;
    }

    public function peralatan_insert(){
        return $this->insert_peralatan();
    }

    protected function delete_peralatan($id){
        $query = $this->query("delete from db_barang where id = $id");
        return $query;
    }
    public function peralatan_delete($id){
        return $this->delete_peralatan($id);
    }

    protected function insert_obat(){
        $query = $this->query("insert into db_barang (tanggal,nama_barang,deskripsi,stok_barang,kategori) values(
            '".strip_tags($_POST['tanggal'])."',
            '".strip_tags($_POST['nama'])."',
            '".strip_tags($_POST['keterangan'])."',
            '".strip_tags($_POST['stok'])."',
            'obat'
        )");
        return $query;
    }

    public function obat_insert(){
        return $this->insert_obat();
    }

    protected function insert_perlengkapan(){
        $query = $this->query("insert into db_barang (tanggal,nama_barang,deskripsi,stok_barang,kategori) values(
            '".strip_tags($_POST['tanggal'])."',
            '".strip_tags($_POST['nama'])."',
            '".strip_tags($_POST['keterangan'])."',
            '".strip_tags($_POST['stok'])."',
            'perlengkapan'
        )");
        return $query;
    }
    public function perlengkapan_insert(){
        return $this->insert_perlengkapan();
    }

    protected function obat_data(){
        $query = $this->query("select * from db_barang where kategori = 'obat'");
        while($show = mysqli_fetch_assoc($query)){
            $build[$show['id']] = $show;
        }
        return $build;
    }

    public function data_obat(){
        return $this->obat_data();
    }

    protected function setting_data(){
        $query = $this->query("select * from db_setting");
        while($show = mysqli_fetch_assoc($query)){
            $build[] = $show;
        }
        return $build;
    }
    protected function setting(){
        $build = $this->setting_data();
        foreach($build as $key => $value){
            $set_data[$value['title']] = $value['conf'];
        }
        return $set_data;
    }

    protected function setting_final(){
        $data = $this->setting();
        foreach($data as $key => $value){
            $query = $this->query("update db_setting set
            conf = '".$_POST[$key]."'
            where title = '".$key."' 
            ");
        }
        return $query;
    }

    public function data_pengaturan(){
        return $this->setting();
    }

    public function update_setting(){
        return $this->setting_final();
    }

    protected function peralatan_data(){
        $query = $this->query("select * from db_barang where kategori = 'peralatan'");
        while($show = mysqli_fetch_assoc($query)){
            $build[$show['id']] = $show; 
        }
        return $build;
    }

    public function data_peralatan(){
        return $this->peralatan_data();
    }

    protected function update_barang(){
        $query = $this->query("update db_barang set
        tanggal = '".$_POST['tanggal']."',
        nama_barang = '".$_POST['nama']."',
        deskripsi = '".$_POST['keterangan']."',
        stok_barang = '".$_POST['stok']."'
        where id = '".$_POST['id']."'
        ");
        return $query;
    }

    public function barang_update(){
        return $this->update_barang();
    }

    protected function perlengkapan_data(){
        $query = $this->query("select * from db_barang where kategori = 'perlengkapan'");
        while($show = mysqli_fetch_assoc($query)){
            $build[$show['id']] = $show;
        }
        return $build;
    }

    public function data_perlengkapan(){
        return $this->perlengkapan_data();
    }

}

?>