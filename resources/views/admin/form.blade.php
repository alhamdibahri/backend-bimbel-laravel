<div class="card-body">
    <h4 class="card-title">Akun Info</h4>
    <div class="border-top"></div>
    <br>

    @if(isset($admin->admin->user_id) == '')
        {{-- jika variable admin di temukan --}}
        <div class="form-group">
            {!! Form::label('kode_admin', 'Kode Admin', ['class' => 'control-label']) !!}
            @if($errors->has('kode_admin'))
                {!! Form::text('kode_admin', autonumber('admin','kode_admin','ADM-'), ['class' => 'form-control is-invalid', 'placeholder' => 'Kode Admin', 'autocomplete' => 'off']) !!}
                <div class="invalid-feedback">
                    {{  $errors->first('kode_admin') }} 
                </div>
            @else
                {!! Form::text('kode_admin', autonumber('admin','kode_admin','ADM-'), ['class' => 'form-control', 'placeholder' => 'Kode Admin', 'autocomplete' => 'off']) !!}
            @endif
        </div>
        
        {!! Form::hidden('user_id', $admin->id, ['class' => 'form-control', 'placeholder' => 'User ID', 'autocomplete' => 'off']) !!}
        
        <div class="form-group m-t-20">
            {!! Form::label('tanggal_lahir_admin', 'Tanggal Lahir', ['class' => 'control-label']) !!}
            @if($errors->has('tanggal_lahir_admin'))
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_admin', null, ['class' => 'form-control is-invalid mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <div class="invalid-feedback">{{ $errors->first('tanggal_lahir_admin') }}</div>
                </div>
            @else
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_admin', null, ['class' => 'form-control mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            @endif
        </div>
    
        {{-- Form Jenis Kelamin --}}
        <div class="form-group m-t-20">
            {!! Form::label('jenkel_admin', 'Jenis Kelamin', ['class' => 'control-label']) !!}
            @if($errors->has('jenkel_admin'))
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_admin', 'Pria', false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_admin', 'Wanita', false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_admin') }}</div>
            </div>
            @else
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_admin', 'Pria', false, ['class' => 'custom-control-input', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_admin', 'Wanita', false, ['class' => 'custom-control-input', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_admin') }}</div>
            </div>
            @endif
        </div>
    
        {{-- Form Agama --}}
        <div class="form-group m-t-20">
            {!! Form::label('agama_admin', 'Agama', ['class' => 'control-label']) !!}
            @if($errors->has('agama_admin'))
                {!! Form::select('agama_admin', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], null, ['class' => 'is-invalid custom-select']) !!}
            @else
                {!! Form::select('agama_admin', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], null, ['class' => 'select2 form-control custom-select']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('agama_admin') }}</div>
        </div>
    
    
        {{-- Form Alamat --}}
        <div class="form-group m-t-20">
            {!! Form::label('alamat_admin', 'Alamat', ['class' => 'control-label']) !!}
            @if($errors->has('alamat_admin'))
                {!! Form::textarea('alamat_admin', null, ['class' => 'form-control is-invalid', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @else
                {!! Form::textarea('alamat_admin', null, ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('alamat_admin') }}</div>
        </div>
    
        {{-- Form File Foto --}}
        <div class="form-group m-t-20">
            {!! Form::label('foto_admin', 'Foto', ['class' => 'control-label']) !!}
            @if($errors->has('foto_admin'))
                {!!  Form::file('foto_admin', ['class' => 'form-control is-invalid']) !!}
                <p><small>ekstensi yang diperbolehkan (png,jpg,jpeg). ukuran maks 1MB</small></p>
                <div class="invalid-feedback">{{ $errors->first('foto_admin') }}</div>
            @else
                {!!  Form::file('foto_admin', ['class' => 'form-control']) !!}
                <p><small>ekstensi yang diperbolehkan (*.jpg, *.jpeg, *.png). ukuran maks 1MB</small></p>
            @endif
        </div>
    @else
        {{-- Jika ID USER sudah di isi --}}
        <div class="form-group">
            {!! Form::label('kode_admin', 'Kode Admin', ['class' => 'control-label']) !!}
            @if($errors->has('kode_admin'))
                {!! Form::text('kode_admin', $admin->admin->kode_admin, ['class' => 'form-control is-invalid', 'placeholder' => 'Kode Admin', 'autocomplete' => 'off']) !!}
                <div class="invalid-feedback">
                    {{  $errors->first('kode_admin') }} 
                </div>
            @else
                {!! Form::text('kode_admin', $admin->admin->kode_admin, ['class' => 'form-control', 'placeholder' => 'Kode Admin', 'autocomplete' => 'off']) !!}
            @endif
        </div>
        
        {!! Form::hidden('user_id', $admin->id, ['class' => 'form-control', 'placeholder' => 'User ID', 'autocomplete' => 'off']) !!}
        
        <div class="form-group m-t-20">
            {!! Form::label('tanggal_lahir_admin', 'Tanggal Lahir', ['class' => 'control-label']) !!}
            @if($errors->has('tanggal_lahir_admin'))
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_admin', $admin->admin->tanggal_lahir_admin, ['class' => 'form-control is-invalid mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <div class="invalid-feedback">{{ $errors->first('tanggal_lahir_admin') }}</div>
                </div>
            @else
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_admin', $admin->admin->tanggal_lahir_admin, ['class' => 'form-control mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            @endif
        </div>
    
        {{-- Form Jenis Kelamin --}}
        <div class="form-group m-t-20">
            {!! Form::label('jenkel_admin', 'Jenis Kelamin', ['class' => 'control-label']) !!}
            @if($errors->has('jenkel_admin'))
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_admin', 'Pria',  ($admin->admin->jenkel_admin == 'Pria') ? true : false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_admin', 'Wanita',  ($admin->admin->jenkel_admin == 'Wanita') ? true : false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_admin') }}</div>
            </div>
            @else
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_admin', 'Pria', ($admin->admin->jenkel_admin == 'Pria') ? true : false, ['class' => 'custom-control-input', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_admin', 'Wanita', ($admin->admin->jenkel_admin == 'Wanita') ? true : false, ['class' => 'custom-control-input', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_admin') }}</div>
            </div>
            @endif
        </div>
    
        {{-- Form Agama --}}
        <div class="form-group m-t-20">
            {!! Form::label('agama_admin', 'Agama', ['class' => 'control-label']) !!}
            @if($errors->has('agama_admin'))
                {!! Form::select('agama_admin', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], $admin->admin->agama_admin, ['class' => 'is-invalid custom-select']) !!}
            @else
                {!! Form::select('agama_admin', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], $admin->admin->agama_admin, ['class' => 'select2 form-control custom-select']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('agama_admin') }}</div>
        </div>
    
    
        {{-- Form Alamat --}}
        <div class="form-group m-t-20">
            {!! Form::label('alamat_admin', 'Alamat', ['class' => 'control-label']) !!}
            @if($errors->has('alamat_admin'))
                {!! Form::textarea('alamat_admin', $admin->admin->alamat_admin, ['class' => 'form-control is-invalid', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @else
                {!! Form::textarea('alamat_admin', $admin->admin->alamat_admin, ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('alamat_admin') }}</div>
        </div>
    
        {{-- Form File Foto --}}
        <div class="form-group m-t-20">
            {!! Form::label('foto_admin', 'Foto', ['class' => 'control-label']) !!}
            @if($errors->has('foto_admin'))
                {!!  Form::file('foto_admin', ['class' => 'form-control is-invalid']) !!}
                <p><small>ekstensi yang diperbolehkan (png,jpg,jpeg). ukuran maks 1MB</small></p>
                <div class="invalid-feedback">{{ $errors->first('foto_admin') }}</div>
            @else
                {!!  Form::file('foto_admin', ['class' => 'form-control']) !!}
                <p><small>ekstensi yang diperbolehkan (*.jpg, *.jpeg, *.png). ukuran maks 1MB</small></p>
            @endif
        </div>
    
        {{-- Menampilkan Foto --}}
        <div class="form-group m-t-20">
            @if($admin->admin->foto_admin)
                <img src="{{ asset('fotoadmin/'. $admin->admin->foto_admin ) }}" width="50px" height="50px" />
            @else
                @if(isset($admin->admin->jenkel_admin) == 'Pria')
                    <img src="{{ asset('fotoadmin/male.png') }}" width="50px" height="50px" />
                @else
                    <img src="{{ asset('fotoadmin/female.png') }}" width="50px" height="50px" />
                @endif
            @endif
        </div>
    @endif

    {{-- jika variable admin di temukan --}}
    


</div>
<div class="card-body">
    {!!  Form::submit('Simpan', ['class' => 'btn btn-primary form-control']) !!}
</div>

