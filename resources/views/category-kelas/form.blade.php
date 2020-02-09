<div class="card-body">
    {{-- jika variable admin di temukan --}}
    @if (isset($category_kelas))
        {!! Form::hidden('id_category_kelas', null) !!}
    @endif
    
    {{-- Form Username --}}
    <div class="form-group">
        {!! Form::label('nama_category_kelas', 'Nama Kategori Kelas', ['class' => 'control-label']) !!}
        @if($errors->has('nama_category_kelas'))
            {!! Form::text('nama_category_kelas', null, ['class' => 'form-control is-invalid', 'placeholder' => 'Nama Kategori Kelas', 'autocomplete' => 'off']) !!}
            <div class="invalid-feedback">
                {{  $errors->first('nama_category_kelas') }} 
            </div>
        @else
            {!! Form::text('nama_category_kelas', null, ['class' => 'form-control', 'placeholder' => 'Nama Kategori Kelas', 'autocomplete' => 'off']) !!}
        @endif
    </div>
    {!!  Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>


