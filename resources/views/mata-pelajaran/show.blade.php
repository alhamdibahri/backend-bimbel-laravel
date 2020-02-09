@extends('./template') @section('title', 'Detail Guru') @section('css') 
<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.1/dist/sweetalert2.min.css" integrity="sha256-SXt8PUM3De2jpzjApkqTHl3rO6I8+lijRFzNQw255BE=" crossorigin="anonymous">
<!-- Custom CSS -->
<link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/gg.css') }}" rel="stylesheet">
<style>.box-button{
        display: inline-block;
    }</style>
 @stop @section('content')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title"><i class="fas fa-user"></i> Detail Guru</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ url('/') }}">Home</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Detail Guru</li>
				</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="{{ asset('fotoguru/'. $guru->foto_guru) }}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">{{ $guru->nama_guru }}</h2>
                                    <h6 class="d-block">{{ $guru->kode_guru }}</h6>
                                    <h6 class="d-block">{{ $guru->jenkel_guru }} </h6>
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Data diri</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Info Akun</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Nama Lengkap</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $guru->nama_guru }}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ tgl_indo($guru->tanggal_lahir_guru)  }}
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$guru->jenkel_guru}}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Agama</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$guru->agama_guru}}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Alamat</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$guru->alamat_guru}}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Nomor Handphone</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$guru->no_handphone_guru}}
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Kode Guru</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$guru->kode_guru}}
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Username</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$guru->username_guru}}
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$guru->email_guru}}
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Password</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$guru->password_guru}}
                                            </div>
                                        </div>
                                        <hr/>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop @section('js')
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
	<!-- This Page JS -->
	<script src="{{ asset('assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
	<script src="{{ asset('dist/js/pages/mask/mask.init.js') }}"></script>
	<script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
	<script src="{{ asset('assets/libs/jquery-asColor/dist/jquery-asColor.min.js') }}"></script>
	<script src="{{ asset('assets/libs/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
	<script src="{{ asset('assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js') }}"></script>
	<script src="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
	<script src="{{ asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('assets/libs/quill/dist/quill.min.js') }}"></script>
	<script>
			//***********************************//
			// For select 2
			//***********************************//
			$(".select2").select2();
			/*colorpicker*/
			$('.demo').each(function() {
			//
			// Dear reader, it's actually very easy to initialize MiniColors. For example:
			//
			//  $(selector).minicolors();
			//
			// The way I've done it below is just for the demo, so don't get confused
			// by it. Also, data- attributes aren't supported at this time...they're
			// only used for this demo.
			//
			$(this).minicolors({
					control: $(this).attr('data-control') || 'hue',
					position: $(this).attr('data-position') || 'bottom left',
					change: function(value, opacity) {
						if (!value) return;
						if (opacity) value += ', ' + opacity;
						if (typeof console === 'object') {
							console.log(value);
						}
					},
					theme: 'bootstrap'
				});
			});
			/*datwpicker*/
			$("#gg").inputmask({
				placeholder: "yyyy-mm-dd",
				alias: "yyyy/mm/dd"
			});
			jQuery('#datepicker-autoclose').datepicker({
				autoclose: true,
				todayHighlight: true
			});
			var quill = new Quill('#editor', {
				theme: 'snow'
			});
		</script>
	@include('_partial/flash_message')
@stop