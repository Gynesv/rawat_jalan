@extends('layouts.template')

@section('css')


@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">JAMINAN</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabel_data"></tbody>
            </table>
        </div>

    </div>
</div>


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
            url: "{{ route('icd.view') }}",
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
                            $('<td width="20%">'),
                            $('<td width="20%" align="center">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].icd_kode)));

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].icd_nama)));

                        tr.find('td:nth-child(4)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-primary btn-icon-split item_edit" data="' +  data[i].layanan_id + '"><i class="fa fa-edit"></i></a><a href="javascript:;" class="btn btn-danger btn-icon-split item_delete" data="' + data[i].layanan_id + '"><i class="fa fa-trash"></i></a></div>');

                        tr.appendTo($('#tabel_data'));
                    }
                } else {

                    $('#tabel_data').append('<tr><td colspan="3">Data Kosong</td></tr>');

                }

                $('#datatable').DataTable('refresh'); 

            }
        });
    }

</script>
@endsection