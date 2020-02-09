@extends('./template') @section('title', 'Profile User') @section('css') 
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
			<h4 class="page-title"><i class="fas fa-user"></i> Profile User</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ url('/') }}">Home</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Profile User</li>
				</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="container emp-profile">
		<form method="post" action="{{ route('profile') }}" enctype="multipart/form-data">
		@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="profile-img">
						@if(isset($admin->admin->foto_admin))
							<img src="{{ asset('fotoadmin/'. $admin->admin->foto_admin) }}" alt=""/>
						@endif
						<div class="file btn btn-lg btn-primary">
							Ubah Foto <input type="file" name="foto_admin"/>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="profile-head">
						<h5>{{ Auth::user()->nama }}</h5>
						<h6>{{ isset(Auth::user()->admin->alamat_admin) ? Auth::user()->admin->alamat_admin  : "" }}</h6>
						<p class="proile-rating">
							Agama : <span>{{ isset(Auth::user()->admin->agama_admin) ? Auth::user()->admin->agama_admin : ""  }}</span>
						</p>
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Diri</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Data Akun</a>
							</li>
						</ul>
					</div>
				</div>
                <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn btn btn-success" name="btnAddMore" value="Edit Profile"/>
                </div>
			</div>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-8">
					<div class="tab-content profile-tab" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="row" style="margin-bottom:20px;">
								<div class="col-md-3">
									<label>Nama</label>
								</div>
								<div class="col-md-9">
                                    <input type="text" class="form-control" value="{{ Auth::user()->nama }}"  placeholder="Nama Lengkap" name="nama">
								</div>
							</div>
							<div class="row" style="margin-bottom:20px;">
								<div class="col-md-3">
									<label>Tanggal Lahir</label>
								</div>
								<div class="col-md-9">
                                    <input type="text" class="form-control" value="{{ isset(Auth::user()->admin->tanggal_lahir_admin) ? Auth::user()->admin->tanggal_lahir_admin : '' }}" id="gg" placeholder="yyyy/mm/dd" name="tanggal_lahir_admin">
								</div>
							</div>
							<div class="row" style="margin-bottom:20px;">
								<div class="col-md-3">
									<label>Jenis Kelamin</label>
								</div>
								<div class="col-md-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customControlValidation1" name="jenkel_admin" value="Pria" name="jenkel_admin" {{ isset(Auth::user()->admin->jenkel_admin) ? (Auth::user()->admin->jenkel_admin == 'Pria' ? 'checked' : '')  : "" }}>
                                        <label class="custom-control-label" for="customControlValidation1">Pria</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customControlValidation2" name="jenkel_admin" value="Wanita" name="jenkel_admin" {{ isset(Auth::user()->admin->jenkel_admin) ? (Auth::user()->admin->jenkel_admin == 'Wanita' ? 'checked' : '')  : "" }}>
                                        <label class="custom-control-label" for="customControlValidation2">Wanita</label>
                                    </div>
								</div>
							</div>
							<div class="row" style="margin-bottom:20px;">
								<div class="col-md-3">
									<label>Agama</label>
								</div>
								<div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="agama_admin" style="width: 100%; height:36px;">
                                        <option selected>--Pilih Agama--</option>
                                        <option value="Islam" {{ isset(Auth::user()->admin->agama_admin) ? (Auth::user()->admin->agama_admin == 'Islam' ? 'selected' : '')  : "" }}>Islam</option>
                                        <option value="Kristen" {{ isset(Auth::user()->admin->agama_admin) ? (Auth::user()->admin->agama_admin == 'Kristen' ? 'selected' : '')  : "" }}>Kristen</option>
                                        <option value="Hindu" {{ isset(Auth::user()->admin->agama_admin) ? (Auth::user()->admin->agama_admin == 'Hindu' ? 'selected' : '')  : "" }}>Hindu</option>
                                        <option value="Budha" {{ isset(Auth::user()->admin->agama_admin) ? (Auth::user()->admin->agama_admin == 'Budha' ? 'selected' : '')  : "" }}>Budha</option>
                                        <option value="Konghucu" {{ isset(Auth::user()->admin->agama_admin) ? (Auth::user()->admin->agama_admin == 'Konghucu' ? 'selected' : '')  : "" }}>Konghucu</option>
                                    </select>
								</div>
							</div>
							<div class="row" style="margin-bottom:20px;">
								<div class="col-md-3">
									<label>Alamat</label>
								</div>
								<div class="col-md-9">
                                    <textarea class="form-control" placeholder="Alamat" rows="5" name="alamat_admin"> {{ isset(Auth::user()->admin->alamat_admin) ? Auth::user()->admin->alamat_admin  : "" }} </textarea>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row" style="margin-bottom:20px;">
								<div class="col-md-3">
									<label>Username</label>
								</div>
								<div class="col-md-9">
                                    <input type="text" class="form-control" value="{{ Auth::user()->username }}"  placeholder="Username" name="username">
								</div>
							</div>
							<div class="row" style="margin-bottom:20px;">
								<div class="col-md-3">
									<label>Email</label>
								</div>
								<div class="col-md-9">
                                    <input type="text" class="form-control" value="{{ Auth::user()->email }}"  placeholder="Email" name="email">
								</div>
							</div>
							<div class="row" style="margin-bottom:20px;">
								<div class="col-md-3">
									<label>Password</label>
								</div>
								<div class="col-md-9">
                                    <input type="password" class="form-control" value="{{ Auth::user()->password }}"  placeholder="Password" name="password">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
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