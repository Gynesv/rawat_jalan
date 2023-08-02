@extends('layouts.template')

@section('css')


@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-2">
        <h6 class="m-0 font-weight-bold" style="font-size: 25px">JAMINAN</h6>
    </div>
    <div class="m-0 card-header">
        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" id="btn_add"><i class="fas fa-plus-circle"> TAMBAH DATA</i></button>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Perusahaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabel_data"></tbody>
            </table>
        </div>

    </div>
</div>

@include('rajal_jaminan.modal_add')
@include('rajal_jaminan.modal_edit')

@endsection

@section('js')
<script type="text/javascript">

    $(document).ready(function(){
        $('#datatable').DataTable();
        view();
    });


    /* ==AJAX TAMPILKAN DATA */

    function view() {

        $.ajax({
            type: 'GET',
            url: "{{ route('jaminan.view') }}",
            dataType: 'JSON',
            async: true,
            success: function(result) {

                $('#datatable').DataTable().destroy();
                $('#tabel_data').empty();

                var i;
                data = result.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {
                        var tr = $('<tr>').append([
                            $('<td width="10%" align="center">'),
                            $('<td width="20%">'),
                            $('<td width="30%">'),
                            $('<td width="20%">'),
                            $('<td width="10%" align="center">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].jam_kode)));

                        tr.find('td:nth-child(3)').append($('<div>')
                        .html((data[i].jam_nama)));

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].jam_perusahaan)));

                        tr.find('td:nth-child(5)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-warning btn-icon-split-act btn-xs item_edit" data="' +  data[i].jam_id + '"><i class="fa fa-edit"></i></a><a href="javascript:;" class="btn btn-danger btn-icon-split-act btn-xs item_delete" data="' + data[i].jam_id + '"><i class="fa fa-trash"></i></a></div>');

                        tr.appendTo($('#tabel_data'));
                    }
                } else {

                    $('#tabel_data').append('<tr><td colspan="3">Data Kosong</td></tr>');

                }

                $('#datatable').DataTable('refresh'); 

            }
        });
    }

    $('#btn_add').on('click', function(){
        $('#nama').val("");
        $('#perusahaan').val("");
        $('#formModalAdd').modal('show');

    });

    $('#formModalAdd').on('shown.bs.modal', function () {
        $('#nama').focus();
    })  

    $("#nama").keypress(function(event) {
        if (event.keyCode === 13) {
            $("#perusahaan").focus();
        }
    });

    $("#perusahaan").keypress(function(event) {
        if (event.keyCode === 13) {
            $("#btn_save").click();
        }
    });

        $('#btn_save').on('click', function(){

        var nama = $('#nama').val();
        var perusahaan = $('#perusahaan').val();
        var token = $('[name=_token]').val();

        var formData = new FormData();
        formData.append('nama', nama);
        formData.append('perusahaan', perusahaan);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('jaminan.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {
                $('#formModalAdd').modal('hide');
                // swal("Berhasil!", "Data Berhasil Disimpan", "success");
                view();
            }
        });

        return false;

    });

    $('#tabel_data').on('click','.item_edit',function(){

        var id=$(this).attr('data');

        $.ajax({
            type : "GET",
            url   : "{{ route('jaminan.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){
                $('#formModalEdit').modal('show');
                $('#formModalEdit').find('[name="id_edit"]').val(data.jam_id);
                $('#formModalEdit').find('[name="kode_edit"]').val(data.jam_kode);
                $('#formModalEdit').find('[name="nama_edit"]').val(data.jam_nama);
                $('#formModalEdit').find('[name="perusahaan_edit"]').val(data.jam_perusahaan);
            }
        });
        
        return false;

    });

    $('#formModalEdit').on('shown.bs.modal', function () {
        $('#nama_edit').focus();
    })  

    $("#nama_edit").keypress(function(event) {
        if (event.keyCode === 13) {
            $("#perusahaan_edit").focus();
        }
    });

    $("#perusahaan_edit").keypress(function(event) {
        if (event.keyCode === 13) {
            $("#btn_update").click();
        }
    });

    $('#btn_update').on('click',function(){

        var id=$('#id_edit').val();
        var nama=$('#nama_edit').val();
        var perusahaan=$('#perusahaan_edit').val();
        var token=$('[name=_token]').val();

        var formData = new FormData();
        formData.append('id',id);
        formData.append('nama',nama);
        formData.append('perusahaan',perusahaan);
        formData.append('_token',token);

        $.ajax({
            type : "POST",
            url   : "{{ route('jaminan.update') }}",
            dataType : "JSON",
            data : formData,
            cache : false,
            processData : false,
            contentType : false,
            success: function(data){
                $('#formModalEdit').modal('hide');
                view();
            }
        });

        return false;
    });
</script>
@endsection