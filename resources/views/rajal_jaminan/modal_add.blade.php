<div class="modal modal-default fade" id="formModalAdd">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #ffffff">

            <div class="card-header py-2">
                <h6 class="m-0 font-weight-bold" style="font-size: 25px">JAMINAN</h6>
            </div>

            <div class="modal-body">
                {!! csrf_field() !!}
    
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama <code class="red">*</code></label>
                            <input class="form-control" name="nama" id="nama">
                        </div>
                    </div> 

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Perusahaan <code class="red">*</code></label>
                            <input class="form-control" name="perusahaan" id="perusahaan">
                        </div>
                    </div> 

                    <div class="col-md-12 mb-2">
                        <code>[<small class="red">*</small>] Wajib Isi</code>
                    </div>
                </div>
            </div>

            <div class="modal-header">
                <button type="button" class="btn btn-primary btn-xs" id="btn_save"><i class="fas fa-save"></i> SIMPAN</button>
            </div>

        </div>
    </div>
</div>