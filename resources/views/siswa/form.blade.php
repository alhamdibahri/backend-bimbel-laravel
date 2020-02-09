<div class="card-body">
    <h4 class="card-title">Akun Info</h4>
    <div class="border-top"></div>
    <br>

    @if(isset($siswa->siswa->user_id) == '')
        {{-- jika variable siswa di temukan --}}
        <div class="form-group">
            {!! Form::label('kode_siswa', 'Kode Siswa', ['class' => 'control-label']) !!}
            @if($errors->has('kode_siswa'))
                {!! Form::text('kode_siswa', autonumber('siswa','kode_siswa','SWS-'), ['class' => 'form-control is-invalid', 'placeholder' => 'Kode Siswa', 'autocomplete' => 'off']) !!}
                <div class="invalid-feedback">
                    {{  $errors->first('kode_siswa') }} 
                </div>
            @else
                {!! Form::text('kode_siswa', autonumber('siswa','kode_siswa','SWS-'), ['class' => 'form-control', 'placeholder' => 'Kode Siswa', 'autocomplete' => 'off']) !!}
            @endif
        </div>
        
        {!! Form::hidden('user_id', $siswa->id, ['class' => 'form-control', 'placeholder' => 'User ID', 'autocomplete' => 'off']) !!}
        
        <div class="form-group m-t-20">
            {!! Form::label('tanggal_lahir_siswa', 'Tanggal Lahir', ['class' => 'control-label']) !!}
            @if($errors->has('tanggal_lahir_siswa'))
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_siswa', null, ['class' => 'form-control is-invalid mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <div class="invalid-feedback">{{ $errors->first('tanggal_lahir_siswa') }}</div>
                </div>
            @else
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_siswa', null, ['class' => 'form-control mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            @endif
        </div>
    
        {{-- Form Jenis Kelamin --}}
        <div class="form-group m-t-20">
            {!! Form::label('jenkel_siswa', 'Jenis Kelamin', ['class' => 'control-label']) !!}
            @if($errors->has('jenkel_siswa'))
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_siswa', 'Pria', false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_siswa', 'Wanita', false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_siswa') }}</div>
            </div>
            @else
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_siswa', 'Pria', false, ['class' => 'custom-control-input', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_siswa', 'Wanita', false, ['class' => 'custom-control-input', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_siswa') }}</div>
            </div>
            @endif
        </div>
    
        {{-- Form Agama --}}
        <div class="form-group m-t-20">
            {!! Form::label('agama_siswa', 'Agama', ['class' => 'control-label']) !!}
            @if($errors->has('agama_siswa'))
                {!! Form::select('agama_siswa', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], null, ['class' => 'is-invalid custom-select']) !!}
            @else
                {!! Form::select('agama_siswa', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], null, ['class' => 'select2 form-control custom-select']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('agama_siswa') }}</div>
        </div>
    
    
        {{-- Form Alamat --}}
        <div class="form-group m-t-20">
            {!! Form::label('alamat_siswa', 'Alamat', ['class' => 'control-label']) !!}
            @if($errors->has('alamat_siswa'))
                {!! Form::textarea('alamat_siswa', null, ['class' => 'form-control is-invalid', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @else
                {!! Form::textarea('alamat_siswa', null, ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('alamat_siswa') }}</div>
        </div>

        <div class="form-group">
            {!! Form::label('no_handphone_siswa', 'Handphone Siswa', ['class' => 'control-label']) !!}
            @if($errors->has('no_handphone_siswa'))
                {!! Form::text('no_handphone_siswa', null, ['class' => 'form-control is-invalid', 'placeholder' => 'Handphone Siswa', 'autocomplete' => 'off']) !!}
                <div class="invalid-feedback">
                    {{  $errors->first('no_handphone_siswa') }} 
                </div>
            @else
                {!! Form::text('no_handphone_siswa', null, ['class' => 'form-control', 'placeholder' => 'Handphone Siswa', 'autocomplete' => 'off']) !!}
            @endif
        </div>
    
        {{-- Form File Foto --}}
        <div class="form-group m-t-20">
            {!! Form::label('foto_siswa', 'Foto', ['class' => 'control-label']) !!}
            @if($errors->has('foto_siswa'))
                {!!  Form::file('foto_siswa', ['class' => 'form-control is-invalid']) !!}
                <p><small>ekstensi yang diperbolehkan (png,jpg,jpeg). ukuran maks 1MB</small></p>
                <div class="invalid-feedback">{{ $errors->first('foto_siswa') }}</div>
            @else
                {!!  Form::file('foto_siswa', ['class' => 'form-control']) !!}
                <p><small>ekstensi yang diperbolehkan (*.jpg, *.jpeg, *.png). ukuran maks 1MB</small></p>
            @endif
        </div>
    @else
        {{-- Jika ID USER sudah di isi --}}
        <div class="form-group">
            {!! Form::label('kode_siswa', 'Kode Siswa', ['class' => 'control-label']) !!}
            @if($errors->has('kode_siswa'))
                {!! Form::text('kode_siswa', $siswa->siswa->kode_siswa, ['class' => 'form-control is-invalid', 'placeholder' => 'Kode Siswa', 'autocomplete' => 'off']) !!}
                <div class="invalid-feedback">
                    {{  $errors->first('kode_siswa') }} 
                </div>
            @else
                {!! Form::text('kode_siswa', $siswa->siswa->kode_siswa, ['class' => 'form-control', 'placeholder' => 'Kode Siswa', 'autocomplete' => 'off']) !!}
            @endif
        </div>
        
        {!! Form::hidden('user_id', $siswa->id, ['class' => 'form-control', 'placeholder' => 'User ID', 'autocomplete' => 'off']) !!}
        
        <div class="form-group m-t-20">
            {!! Form::label('tanggal_lahir_siswa', 'Tanggal Lahir', ['class' => 'control-label']) !!}
            @if($errors->has('tanggal_lahir_siswa'))
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_siswa', $siswa->siswa->tanggal_lahir_siswa, ['class' => 'form-control is-invalid mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <div class="invalid-feedback">{{ $errors->first('tanggal_lahir_siswa') }}</div>
                </div>
            @else
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_siswa', $siswa->siswa->tanggal_lahir_siswa, ['class' => 'form-control mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            @endif
        </div>
    
        {{-- Form Jenis Kelamin --}}
        <div class="form-group m-t-20">
            {!! Form::label('jenkel_siswa', 'Jenis Kelamin', ['class' => 'control-label']) !!}
            @if($errors->has('jenkel_siswa'))
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_siswa', 'Pria',  ($siswa->siswa->jenkel_siswa == 'Pria') ? true : false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_siswa', 'Wanita',  ($siswa->siswa->jenkel_siswa == 'Wanita') ? true : false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_siswa') }}</div>
            </div>
            @else
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_siswa', 'Pria', ($siswa->siswa->jenkel_siswa == 'Pria') ? true : false, ['class' => 'custom-control-input', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_siswa', 'Wanita', ($siswa->siswa->jenkel_siswa == 'Wanita') ? true : false, ['class' => 'custom-control-input', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_siswa') }}</div>
            </div>
            @endif
        </div>
    
        {{-- Form Agama --}}
        <div class="form-group m-t-20">
            {!! Form::label('agama_siswa', 'Agama', ['class' => 'control-label']) !!}
            @if($errors->has('agama_siswa'))
                {!! Form::select('agama_siswa', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], $siswa->siswa->agama_siswa, ['class' => 'is-invalid custom-select']) !!}
            @else
                {!! Form::select('agama_siswa', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], $siswa->siswa->agama_siswa, ['class' => 'select2 form-control custom-select']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('agama_siswa') }}</div>
        </div>
    
    
        {{-- Form Alamat --}}
        <div class="form-group m-t-20">
            {!! Form::label('alamat_siswa', 'Alamat', ['class' => 'control-label']) !!}
            @if($errors->has('alamat_siswa'))
                {!! Form::textarea('alamat_siswa', $siswa->siswa->alamat_siswa, ['class' => 'form-control is-invalid', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @else
                {!! Form::textarea('alamat_siswa', $siswa->siswa->alamat_siswa, ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('alamat_siswa') }}</div>
        </div>

        <div class="form-group">
            {!! Form::label('no_handphone_siswa', 'Handphone Siswa', ['class' => 'control-label']) !!}
            @if($errors->has('no_handphone_siswa'))
                {!! Form::text('no_handphone_siswa', $siswa->siswa->no_handphone_siswa, ['class' => 'form-control is-invalid', 'placeholder' => 'Handphone', 'autocomplete' => 'off']) !!}
                <div class="invalid-feedback">
                    {{  $errors->first('no_handphone_siswa') }} 
                </div>
            @else
                {!! Form::text('no_handphone_siswa', $siswa->siswa->no_handphone_siswa, ['class' => 'form-control', 'placeholder' => 'Handphone', 'autocomplete' => 'off']) !!}
            @endif
        </div>
    
        {{-- Form File Foto --}}
        <div class="form-group m-t-20">
            {!! Form::label('foto_siswa', 'Foto', ['class' => 'control-label']) !!}
            @if($errors->has('foto_siswa'))
                {!!  Form::file('foto_siswa', ['class' => 'form-control is-invalid']) !!}
                <p><small>ekstensi yang diperbolehkan (png,jpg,jpeg). ukuran maks 1MB</small></p>
                <div class="invalid-feedback">{{ $errors->first('foto_siswa') }}</div>
            @else
                {!!  Form::file('foto_siswa', ['class' => 'form-control']) !!}
                <p><small>ekstensi yang diperbolehkan (*.jpg, *.jpeg, *.png). ukuran maks 1MB</small></p>
            @endif
        </div>
    
        {{-- Menampilkan Foto --}}
        <div class="form-group m-t-20">
            @if($siswa->siswa->foto_siswa)
                <img src="{{ asset('fotosiswa/'. $siswa->siswa->foto_siswa ) }}" width="50px" height="50px" />
            @else
                @if(isset($siswa->siswa->jenkel_siswa) == 'Pria')
                    <img src="{{ asset('fotosiswa/male.png') }}" width="50px" height="50px" />
                @else
                    <img src="{{ asset('fotosiswa/female.png') }}" width="50px" height="50px" />
                @endif
            @endif
        </div>
    @endif
</div>
<div class="card-body">
    {!!  Form::submit('Simpan', ['class' => 'btn btn-primary form-control']) !!}
</div>

