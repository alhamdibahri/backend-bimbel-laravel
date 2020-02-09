<div class="card-body">
    {{-- jika variable admin di temukan --}}
    @if (isset($mata_pelajaran))
        {!! Form::hidden('mata_pelajaran', null) !!}
    @endif
    
    {{-- Form Category Kelas --}}
    <div class="form-group">
        {!! Form::label('id_category_kelas', 'Kelas', ['class' => 'control-label']) !!}
        @if(count($list_category) > 0)
            @if($errors->has('id_category_kelas'))
                {!! Form::select('id_category_kelas', $list_category, null, ['class' => 'is-invalid custom-select', 'placeholder' => '-Pilih Kelas-']) !!}
            @else
                {!! Form::select('id_category_kelas', $list_category, null, ['class' => 'custom-select', 'placeholder' => '-Pilih Kelas-']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('id_category_kelas') }}</div>
        @else
            <p><b>Form Kelas di isi dulu ya..! </b> <a href="{{ url('category-kelas/create') }}">klik disini</a> </p>
        @endif
    </div>

    {{-- Form Mata Pelajaran --}}
    <div class="form-group">
        {!! Form::label('mata_pelajaran', 'Nama Mata Pelajaran', ['class' => 'control-label']) !!}
        @if($errors->has('mata_pelajaran'))
            {!! Form::text('mata_pelajaran', null, ['class' => 'form-control is-invalid', 'placeholdser' => 'Nama Mata Pelajaran', 'autocomplete' => 'off']) !!}
            <div class="invalid-feedback">
                {{  $errors->first('mata_pelajaran') }} 
            </div>
        @else
            {!! Form::text('mata_pelajaran', null, ['class' => 'form-control', 'placeholder' => 'Nama Mata Pelajaran', 'autocomplete' => 'off']) !!}
        @endif
    </div>
    {!!  Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>


