@extends('./template') @section('title', 'Edit Data Berita') @section('css') 
<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">
<!-- Custom CSS -->
<link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
 @stop @section('content')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title"><i class="fas fa-edit"></i> Edit Data Berita</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ url('/') }}">Home</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Form Berita</li>
				</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
            {!!  Form::model($berita, ['method' =>  'PATCH', 'files' => 'true' ,'action' => ['BeritaController@update', $berita->id], 'class' => 'form-horizontal']) !!}
				@include('berita.form', ['submitButtonText' => 'Update'])
			{!! Form::close() !!}
            </div>
		</div>
	</div>
</div>
 @stop @section('js')
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.0.6/css/froala_editor.css" integrity="sha256-1xgUnsvkhqcV8O7U84d7Ht4xj6rg7sQ0wDedAb88O58=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.0.6/js/froala_editor.min.js" integrity="sha256-joxULkTPclk+UODdJi39bPDPfOR9yYTPUxukFbO8HY4=" crossorigin="anonymous"></script>
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
        $('.mydatepicker').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                todayHighlight: true
        });
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        new FroalaEditor('textarea#froala-editor', {
            attribution: false
        });

        $("#gg").inputmask({
			placeholder: "yyyy-mm-dd",
			alias: "yyyy/mm/dd"
		});
    </script>
@stop