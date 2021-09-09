function modal(){
    var bgmodal = $(".bg-modal").css('display');
    var modal = $("#tambah").css('top');

    if(bgmodal == 'none' && modal == '-435px'){
        $(".bg-modal").show();
        var margin = "30px";
    }else{
        $(".bg-modal").hide();
        var margin = "-435px";
    }

    $("#tambah").animate({
        top : margin
    },400);
}

function ubah_data(id){
    var bgmodal = $(".bg-modal").css('display');
    var modal = $("#obat").css('top');

    if(bgmodal == 'none' && modal == '-435px'){
        $(".bg-modal").show();
        var margin = "30px";
    }else{
        $(".bg-modal").hide();
        var margin = "-435px";
    }

    $("#obat").animate({
        top : margin
    },400);

    $.ajax({
        type : "POST",
        url : "data_obat.php",
        data : {
            id : id
        },
        success : function(event){
            var json = event;
            $("#id").val(json[id].id);
            $("#tanggal").val(json[id].tanggal);
            $("#nama").val(json[id].nama_barang);
            $("#desc").val(json[id].deskripsi);
            $("#stok").val(json[id].stok_barang);
        }
    })
}

function drop_total(){
    var list = $("#list").css('display');
    if(list == 'none'){
        $("#list").show(300);
    }else{
        $("#list").hide(300);
    }
}

function total(kategori,bulan,tahun){
    $.ajax({
        type : "POST",
        url : "data_total.php",
        data : {
            kategori : kategori,
            bulan : bulan,
            tahun : tahun
        },
        success : function(event){
            $("#table-data").html(event);
            $("#param").html(kategori);
        }
    })
}

function ubah_peralatan(id){
    var bg = $(".bg-modal").css('display');
    var modal = $("#peralatan").css('top');

    if(bg == 'none' && modal == '-435px'){
        $(".bg-modal").show()
        var margin = '30px';
    }else{
        $(".bg-modal").hide()
        var margin = '-435px';
    }

    $("#peralatan").animate({
        top : margin
    },400);

    $.ajax({
        type : "POST",
        url : "data_peralatan.php",
        data : {
            id : id
        },
        success : function(event){
            var json = event;
            $("#id").val(json[id].id);
            $("#tanggal").val(json[id].tanggal);
            $("#nama").val(json[id].nama_barang);
            $("#desc").val(json[id].deskripsi);
            $("#stok").val(json[id].stok_barang);

        }
    })
}

function ubah_perlengkapan(id){
    var bg = $(".bg-modal").css('display');
    var modal = $("#perlengkapan").css('top');

    if(bg == 'none' && modal == '-435px'){
        $(".bg-modal").show()
        var margin = '30px';
    }else{
        $(".bg-modal").hide()
        var margin = '-435px';
    }

    $("#perlengkapan").animate({
        top : margin
    },400);

    $.ajax({
        type : "POST",
        url : "data_perlengkapan.php",
        data : {
            id : id
        },
        success : function(event){
            var json = event;
            $("#id").val(json[id].id);
            $("#tanggal").val(json[id].tanggal);
            $("#nama").val(json[id].nama_barang);
            $("#desc").val(json[id].deskripsi);
            $("#stok").val(json[id].stok_barang);

        }
    })
}  