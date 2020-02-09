<div class="card-body">
    <h4 class="card-title">Akun Info</h4>
    <div class="border-top"></div>
    <br>

    {{-- jika variable admin di temukan --}}
    @if (isset($berita))
        {!! Form::hidden('id', $berita->id) !!}
    @endif
    {!! Form::hidden('user_id', Auth::user()->id) !!}
    {{-- Form Username --}}
    <div class="form-group">
        {!! Form::label('nama_berita', 'Nama Berita', ['class' => 'control-label']) !!}
        @if($errors->has('nama_berita'))
            {!! Form::text('nama_berita', null, ['class' => 'form-control is-invalid', 'placeholder' => 'Nama Berita', 'autocomplete' => 'off']) !!}
            <div class="invalid-feedback">
                {{  $errors->first('nama_berita') }} 
            </div>
        @else
            {!! Form::text('nama_berita', null, ['class' => 'form-control', 'placeholder' => 'Nama Berita', 'autocomplete' => 'off']) !!}
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('tanggal_berita', 'Tanggal Berita', ['class' => 'control-label']) !!}
        @if($errors->has('tanggal_berita'))
            {!! Form::text('tanggal_berita', null, ['class' => 'form-control is-invalid','autocomplete' => 'off', 'id' => 'gg','placeholder' => 'yyyy/mm/dd']) !!}
            <div class="invalid-feedback">
                {{  $errors->first('tanggal_berita') }} 
            </div>
        @else
            {!! Form::text('tanggal_berita', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'gg', 'placeholder' => 'yyyy/mm/dd']) !!}
        @endif
    </div>

    <div class="form-group m-t-20">
        {!! Form::label('foto_berita', 'Foto', ['class' => 'control-label']) !!}
        @if($errors->has('foto_berita'))
            {!!  Form::file('foto_berita', ['class' => 'form-control is-invalid']) !!}
            <p><small>ekstensi yang diperbolehkan (png,jpg,jpeg). ukuran maks 1MB</small></p>
            <div class="invalid-feedback">{{ $errors->first('foto_berita') }}</div>
        @else
            {!!  Form::file('foto_berita', ['class' => 'form-control']) !!}
            <p><small>ekstensi yang diperbolehkan (*.jpg, *.jpeg, *.png). ukuran maks 1MB</small></p>
        @endif
    </div>

    @if (isset($berita))
        <img src="{{ asset('fotoberita/'. $berita->foto_berita ) }}" width="50px" height="50px" />
    @endif

    <div class="form-group m-t-20">
            {!! Form::label('deskripsi', 'Deskripsi', ['class' => 'control-label']) !!}
            @if($errors->has('deskripsi'))
                {!! Form::textarea('deskripsi', null, ['class' => 'form-control is-invalid','autocomplete' => 'off', 'id' => 'froala-editor']) !!}
            @else
                {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'froala-editor']) !!}
            @endif
                
            <div class="invalid-feedback">
                {{  $errors->first('deskripsi') }} 
            </div>
        </div>
</div>
<div class="card-body">
    {!!  Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

