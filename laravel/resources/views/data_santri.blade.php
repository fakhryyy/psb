@extends('index')
@section('css')

<style>
    .dataTables_wrapper {
        font-family: tahoma;
        font-size: 12px;
        position: relative;
        clear: both;
        *zoom: 1;
        zoom: 1;
    }
</style>

@endsection
@section('page')

<main role="main" class="container-fluid" style="padding:100px 50px 70px 50px;">
    <div class="row">
        
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        @if(Auth::user()->role == 'admin')
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kategori">Pilih Lembaga</label>
                                <select class="form-control" name="sort-by-kategori" id="kategori">
                                    <option value="all">Semua</option>
                                    <option value="1">Madin</option>
                                    <option value="2">SMA</option>
                                    <option value="3">SMP</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="all">Semua</option>
                                    <option value="0" selected>Belum diverifikasi</option>
                                    <option value="1">Terverifikasi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="pb-2">
                        <a href="{{url('/daftar')}}" rel="noopener noreferrer" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New</a>
                        <a href="#" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success" id="exportExcel"><i class="fas fa-file-excel"></i> Export Excel</a>
                    </div>
                    <table id="datatable" class="table table-bordered table-striped display">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="100">No. Pendaftaran</th>
                                <th>NIK</th>
                                <th width="150">Nama</th>
                                <th width="150">TTL</th>
                                <th width="100">JK</th>
                                <th>Ayah</th>
                                <th>Ibu</th>
                                <th width="100">Tanggal Daftar</th>
                                <th>Status Santri</th>
                                <th>Lembaga</th>
                                <th>Verifikasi</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>
                     
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</main>
@endsection

@section('js')

<script>
$(document).ready(function(){
    // $('#datatable').DataTable({
    //     responsive: true,
    // });
    var status = '0';
    var kat = 'all';
    var url = "{{ url('api-datasantri') }}";
    $('#kategori').on('change', function(){ 
        kat = $('#kategori').val();
        table.ajax.url(url + "/" + kat + "/" + status);
        table.ajax.reload();
    });

    $('#status').on('change', function(){ 
        status = $('#status').val();
        table.ajax.url(url + "/" + kat + "/" + status);
        table.ajax.reload();
    });
    
    $('#exportExcel').on('click', function(){ 
        kat = $('#kategori').val();
        window.location.href = "{{url('excel')}}" + "/" + kat
    });

    var table = $('#datatable').DataTable({
                processing: true,
                serverSide: false,
                "responsive": true,
                "autoWidth": true,
                // "scrollX": true,
                ajax: url + "/" + kat + "/" + status,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'no_urut', name: 'no_urut'},
                    {data: 'nik', name: 'nik'},
                    {data: 'nama', name: 'nama'},
                    {data: 'ttl', name: 'ttl'},
                    {data: 'jk', name: 'jk'},
                    {data: 'ayah', name: 'ayah'},
                    {data: 'ibu', name: 'ibu'},
                    {data: 'tgl_daftar', name: 'tgl_daftar'},
                    {data: 'santri', name: 'santri'},
                    {data: 'lembaga', name: 'lembaga'},
                    {data: 'is_verif', name: 'is_verif'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    
                ]
            });
})
</script>

@endsection