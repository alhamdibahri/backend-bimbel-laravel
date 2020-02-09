@extends('./template')

@section('title', 'Data Berita')

@section('css')
<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
<link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.1/dist/sweetalert2.min.css" integrity="sha256-SXt8PUM3De2jpzjApkqTHl3rO6I8+lijRFzNQw255BE=" crossorigin="anonymous">
<style>
    .box-button{
        display: inline-block;
    }
</style>

@stop

@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><i class="fas fa-database"></i> Data Berita</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Berita</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Berita</th>
                                                <th>Tanggal Berita</th>
                                                <th>Foto Berita</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($data_berita as $berita)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $berita->nama_berita }}</td>
                                                <td>{{ tgl_indo($berita->tanggal_berita) }}</td>
                                                <td>
                                                    <img src="{{ asset('fotoberita/'. $berita->foto_berita ) }}" width="50px" height="50px" />
                                                </td>
                                                <td align="center">
                                                    <div class="box-button">
                                                        <a href="{{ url('berita/edit/'. $berita->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    </div>
                                                    <div class="box-button">
                                                        <a href="{{ url('berita/destroy/'. $berita->id) }}" class="btn btn-danger confirm_delete"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
            </div>

@stop

@section('js')
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.1/dist/sweetalert2.all.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
        $('#zero_config').DataTable();
            
    </script>
    <script>
        $(document).ready(function(){
            $('.confirm_delete').on('click', function (e){
                const href = $(this).attr('href');
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin ingin menghapus data ini?',
                    text: "Data user akan di hapus!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus data!'
                }).then((result) => {
                    if (result.value == true) {
                        document.location.href = href;
                    }
                })
            });
        });
    </script>
    @include('_partial/flash_message')
@stop