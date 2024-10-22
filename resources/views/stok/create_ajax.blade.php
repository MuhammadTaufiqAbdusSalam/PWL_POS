<form action="{{ url('/stok/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="form-control" required>
                        <option value="">- Pilih supplier -</option>
                        @foreach($supplier as $l)
                            <option value="{{ $l->supplier_id }}">{{ $l->supplier_nama }}</option>
                        @endforeach
                    </select>
                    <small id="error-supplier_id" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama Barang </label>
                    <select name="barang_id" id="barang_id" class="form-control" required>
                        <option value="">- Pilih barang -</option>
                        @foreach($barang as $l)
                            <option value="{{ $l->barang_id }}">{{ $l->barang_nama }}</option>
                        @endforeach
                    </select>
                    <small id="error-barang_id" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama User </label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">- Pilih user -</option>
                        @foreach($user as $l)
                            <option value="{{ $l->user_id }}">{{ $l->username }}</option>
                        @endforeach
                    </select>
                    <small id="error-user_id" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Stok tanggal</label>
                    <input value="" type="datetime-local" name="stok_tanggal" id="stok_tanggal" class="form-control"
                    required>
                    <small id="error-stok_kode" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Stok jumlah</label>
                    <input value="" type="number" name="stok_jumlah" id="stok_jumlah" class="form-control"
                    required>
                    <small id="error-stok_nama" class="error-text form-text text-danger"></small>
                </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#form-tambah").validate({
            rules: {
                supplier_id: {required: true, number: true},
                barang_id: {required: true, number: true},
                user_id: {required: true, number: true},
                stok_tanggal: {required: true,},
                stok_jumlah: {required: true, number: true},
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if(response.status){
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            dataStok.ajax.reload();
                        }else{
                            $('.error-text').text('');
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-'+prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>