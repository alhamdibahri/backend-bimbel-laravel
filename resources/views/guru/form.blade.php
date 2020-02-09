<div class="card-body">
    <h4 class="card-title">Akun Info</h4>
    <div class="border-top"></div>
    <br>

    @if(isset($guru->guru->user_id) == '')
        {{-- jika variable guru di temukan --}}
        <div class="form-group">
            {!! Form::label('kode_guru', 'Kode Guru', ['class' => 'control-label']) !!}
            @if($errors->has('kode_guru'))
                {!! Form::text('kode_guru', autonumber('guru','kode_guru','GR-'), ['class' => 'form-control is-invalid', 'placeholder' => 'Kode Guru', 'autocomplete' => 'off']) !!}
                <div class="invalid-feedback">
                    {{  $errors->first('kode_guru') }} 
                </div>
            @else
                {!! Form::text('kode_guru', autonumber('guru','kode_guru','GR-'), ['class' => 'form-control', 'placeholder' => 'Kode Guru', 'autocomplete' => 'off']) !!}
            @endif
        </div>
        
        {!! Form::hidden('user_id', $guru->id, ['class' => 'form-control', 'placeholder' => 'User ID', 'autocomplete' => 'off']) !!}
        
        <div class="form-group m-t-20">
            {!! Form::label('tanggal_lahir_guru', 'Tanggal Lahir', ['class' => 'control-label']) !!}
            @if($errors->has('tanggal_lahir_guru'))
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_guru', null, ['class' => 'form-control is-invalid mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <div class="invalid-feedback">{{ $errors->first('tanggal_lahir_guru') }}</div>
                </div>
            @else
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_guru', null, ['class' => 'form-control mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            @endif
        </div>
    
        {{-- Form Jenis Kelamin --}}
        <div class="form-group m-t-20">
            {!! Form::label('jenkel_guru', 'Jenis Kelamin', ['class' => 'control-label']) !!}
            @if($errors->has('jenkel_guru'))
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_guru', 'Pria', false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_guru', 'Wanita', false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_guru') }}</div>
            </div>
            @else
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_guru', 'Pria', false, ['class' => 'custom-control-input', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_guru', 'Wanita', false, ['class' => 'custom-control-input', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_guru') }}</div>
            </div>
            @endif
        </div>
    
        {{-- Form Agama --}}
        <div class="form-group m-t-20">
            {!! Form::label('agama_guru', 'Agama', ['class' => 'control-label']) !!}
            @if($errors->has('agama_guru'))
                {!! Form::select('agama_guru', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], null, ['class' => 'is-invalid custom-select']) !!}
            @else
                {!! Form::select('agama_guru', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], null, ['class' => 'select2 form-control custom-select']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('agama_guru') }}</div>
        </div>
    
    
        {{-- Form Alamat --}}
        <div class="form-group m-t-20">
            {!! Form::label('alamat_guru', 'Alamat', ['class' => 'control-label']) !!}
            @if($errors->has('alamat_guru'))
                {!! Form::textarea('alamat_guru', null, ['class' => 'form-control is-invalid', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @else
                {!! Form::textarea('alamat_guru', null, ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('alamat_guru') }}</div>
        </div>

        <div class="form-group">
            {!! Form::label('no_handphone_guru', 'Handphone Guru', ['class' => 'control-label']) !!}
            @if($errors->has('no_handphone_guru'))
                {!! Form::text('no_handphone_guru', null, ['class' => 'form-control is-invalid', 'placeholder' => 'Handphone Guru', 'autocomplete' => 'off']) !!}
                <div class="invalid-feedback">
                    {{  $errors->first('no_handphone_guru') }} 
                </div>
            @else
                {!! Form::text('no_handphone_guru', null, ['class' => 'form-control', 'placeholder' => 'Handphone Guru', 'autocomplete' => 'off']) !!}
            @endif
        </div>
    
        {{-- Form File Foto --}}
        <div class="form-group m-t-20">
            {!! Form::label('foto_guru', 'Foto', ['class' => 'control-label']) !!}
            @if($errors->has('foto_guru'))
                {!!  Form::file('foto_guru', ['class' => 'form-control is-invalid']) !!}
                <p><small>ekstensi yang diperbolehkan (png,jpg,jpeg). ukuran maks 1MB</small></p>
                <div class="invalid-feedback">{{ $errors->first('foto_guru') }}</div>
            @else
                {!!  Form::file('foto_guru', ['class' => 'form-control']) !!}
                <p><small>ekstensi yang diperbolehkan (*.jpg, *.jpeg, *.png). ukuran maks 1MB</small></p>
            @endif
        </div>
    @else
        {{-- Jika ID USER sudah di isi --}}
        <div class="form-group">
            {!! Form::label('kode_guru', 'Kode Guru', ['class' => 'control-label']) !!}
            @if($errors->has('kode_guru'))
                {!! Form::text('kode_guru', $guru->guru->kode_guru, ['class' => 'form-control is-invalid', 'placeholder' => 'Kode Guru', 'autocomplete' => 'off']) !!}
                <div class="invalid-feedback">
                    {{  $errors->first('kode_guru') }} 
                </div>
            @else
                {!! Form::text('kode_guru', $guru->guru->kode_guru, ['class' => 'form-control', 'placeholder' => 'Kode Guru', 'autocomplete' => 'off']) !!}
            @endif
        </div>
        
        {!! Form::hidden('user_id', $guru->id, ['class' => 'form-control', 'placeholder' => 'User ID', 'autocomplete' => 'off']) !!}
        
        <div class="form-group m-t-20">
            {!! Form::label('tanggal_lahir_guru', 'Tanggal Lahir', ['class' => 'control-label']) !!}
            @if($errors->has('tanggal_lahir_guru'))
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_guru', $guru->guru->tanggal_lahir_guru, ['class' => 'form-control is-invalid mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <div class="invalid-feedback">{{ $errors->first('tanggal_lahir_guru') }}</div>
                </div>
            @else
                <div class="input-group">
                        {!! Form::text('tanggal_lahir_guru', $guru->guru->tanggal_lahir_guru, ['class' => 'form-control mydatepicker', 'placeholder' => 'yyyy/mm/dd', 'autocomplete' => 'off' ]) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            @endif
        </div>
    
        {{-- Form Jenis Kelamin --}}
        <div class="form-group m-t-20">
            {!! Form::label('jenkel_guru', 'Jenis Kelamin', ['class' => 'control-label']) !!}
            @if($errors->has('jenkel_guru'))
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_guru', 'Pria',  ($guru->guru->jenkel_guru == 'Pria') ? true : false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_guru', 'Wanita',  ($guru->guru->jenkel_guru == 'Wanita') ? true : false, ['class' => 'custom-control-input is-invalid', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_guru') }}</div>
            </div>
            @else
            <div class="custom-control custom-radio">
                {!! Form::radio('jenkel_guru', 'Pria', ($guru->guru->jenkel_guru == 'Pria') ? true : false, ['class' => 'custom-control-input', 'id' => 'customControlValidation2']) !!}
                <label class="custom-control-label" for="customControlValidation2">Pria</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                {!! Form::radio('jenkel_guru', 'Wanita', ($guru->guru->jenkel_guru == 'Wanita') ? true : false, ['class' => 'custom-control-input', 'id' => 'customControlValidation3']) !!}
                <label class="custom-control-label" for="customControlValidation3">Wanita</label>
                <div class="invalid-feedback">{{ $errors->first('jenkel_guru') }}</div>
            </div>
            @endif
        </div>
    
        {{-- Form Agama --}}
        <div class="form-group m-t-20">
            {!! Form::label('agama_guru', 'Agama', ['class' => 'control-label']) !!}
            @if($errors->has('agama_guru'))
                {!! Form::select('agama_guru', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], $guru->guru->agama_guru, ['class' => 'is-invalid custom-select']) !!}
            @else
                {!! Form::select('agama_guru', ['' => '--Pilih Agama--','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], $guru->guru->agama_guru, ['class' => 'select2 form-control custom-select']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('agama_guru') }}</div>
        </div>
    
    
        {{-- Form Alamat --}}
        <div class="form-group m-t-20">
            {!! Form::label('alamat_guru', 'Alamat', ['class' => 'control-label']) !!}
            @if($errors->has('alamat_guru'))
                {!! Form::textarea('alamat_guru', $guru->guru->alamat_guru, ['class' => 'form-control is-invalid', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @else
                {!! Form::textarea('alamat_guru', $guru->guru->alamat_guru, ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('alamat_guru') }}</div>
        </div>

        <div class="form-group">
            {!! Form::label('no_handphone_guru', 'Handphone Guru', ['class' => 'control-label']) !!}
            @if($errors->has('no_handphone_guru'))
                {!! Form::text('no_handphone_guru', $guru->guru->no_handphone_guru, ['class' => 'form-control is-invalid', 'placeholder' => 'Handphone', 'autocomplete' => 'off']) !!}
                <div class="invalid-feedback">
                    {{  $errors->first('no_handphone_guru') }} 
                </div>
            @else
                {!! Form::text('no_handphone_guru', $guru->guru->no_handphone_guru, ['class' => 'form-control', 'placeholder' => 'Handphone', 'autocomplete' => 'off']) !!}
            @endif
        </div>
    
        {{-- Form File Foto --}}
        <div class="form-group m-t-20">
            {!! Form::label('foto_guru', 'Foto', ['class' => 'control-label']) !!}
            @if($errors->has('foto_guru'))
                {!!  Form::file('foto_guru', ['class' => 'form-control is-invalid']) !!}
                <p><small>ekstensi yang diperbolehkan (png,jpg,jpeg). ukuran maks 1MB</small></p>
                <div class="invalid-feedback">{{ $errors->first('foto_guru') }}</div>
            @else
                {!!  Form::file('foto_guru', ['class' => 'form-control']) !!}
                <p><small>ekstensi yang diperbolehkan (*.jpg, *.jpeg, *.png). ukuran maks 1MB</small></p>
            @endif
        </div>
    
        {{-- Menampilkan Foto --}}
        <div class="form-group m-t-20">
            @if($guru->guru->foto_guru)
                <img src="{{ asset('fotoguru/'. $guru->guru->foto_guru ) }}" width="50px" height="50px" />
            @else
                @if(isset($guru->guru->jenkel_guru) == 'Pria')
                    <img src="{{ asset('fotoguru/male.png') }}" width="50px" height="50px" />
                @else
                    <img src="{{ asset('fotoguru/female.png') }}" width="50px" height="50px" />
                @endif
            @endif
        </div>
    @endif
</div>
<div class="card-body">
    <h4 class="card-title">Info Kelas & Materi Guru</h4>
    <div class="border-top"></div>
    @if(isset($guru->guru->kode_guru) != '')
        <div class="form-group m-t-20">
            {!! Form::label('id_category_kelas', 'Kategori Kelas', ['class' => 'control-label']) !!}
            @if(count($category) > 0)
                @if($errors->has('id_category_kelas'))
                    {!! Form::select('id_category_kelas', $category, $guru->guru->id_category_kelas, ['class' => 'is-invalid custom-select', 'placeholder' => '-Pilih Kelas-']) !!}
                @else
                    {!! Form::select('id_category_kelas', $category, $guru->guru->id_category_kelas, ['class' => 'custom-select', 'placeholder' => '-Pilih Kelas-']) !!}
                @endif
                <div class="invalid-feedback">{{ $errors->first('id_category_kelas') }}</div>
            @else
                <p><b>Form Kelas di isi dulu ya..! </b> <a href="{{ url('category-kelas/create') }}">klik disini</a> </p>
            @endif
        </div>

        <div class="form-group m-t-20">
            {!! Form::label('id_mata_pelajaran', 'Mata Pelajaran', ['class' => 'control-label']) !!}
                @if($errors->has('id_mata_pelajaran'))
                    {!! Form::select('id_mata_pelajaran', [] ,$mata_pelajaran, $guru->guru->id_mata_pelajaran, ['class' => 'is-invalid custom-select', 'placeholder' => '-Pilih Mata Pelajaran-']) !!}
                @else
                    @if (isset($guru->guru->kode_guru))
                        {!! Form::select('id_mata_pelajaran', $mata_pelajaran, $guru->guru->id_mata_pelajaran, ['class' => 'custom-select', 'placeholder' => '-Pilih Kategori Kelas Terlebih Dahulu-', 'id' => 'cities']) !!}
                    @else 
                        {!! Form::select('id_mata_pelajaran', [], $mata_pelajaran, $guru->guru->id_mata_pelajaran, ['class' => 'custom-select', 'placeholder' => '-Pilih Kategori Kelas Terlebih Dahulu-', 'id' => 'cities']) !!}
                    @endif
                @endif
                <div class="invalid-feedback">{{ $errors->first('id_mata_pelajaran') }}</div>
        </div>
    @else
        <div class="form-group m-t-20">
            {!! Form::label('id_category_kelas', 'Kategori Kelas', ['class' => 'control-label']) !!}
            @if(count($category) > 0)
                @if($errors->has('id_category_kelas'))
                    {!! Form::select('id_category_kelas', $category, null, ['class' => 'is-invalid custom-select', 'placeholder' => '-Pilih Kelas-']) !!}
                @else
                    {!! Form::select('id_category_kelas', $category, null, ['class' => 'custom-select', 'placeholder' => '-Pilih Kelas-']) !!}
                @endif
                <div class="invalid-feedback">{{ $errors->first('id_category_kelas') }}</div>
            @else
                <p><b>Form Kelas di isi dulu ya..! </b> <a href="{{ url('category-kelas/create') }}">klik disini</a> </p>
            @endif
        </div>

        <div class="form-group m-t-20">
            {!! Form::label('id_mata_pelajaran', 'Mata Pelajaran', ['class' => 'control-label']) !!}
                @if($errors->has('id_mata_pelajaran'))
                    {!! Form::select('id_mata_pelajaran', [] ,null, ['class' => 'is-invalid custom-select', 'placeholder' => '-Pilih Mata Pelajaran-']) !!}
                @else
                    @if (isset($guru->guru->kode_guru))
                        {!! Form::select('id_mata_pelajaran', $mata_pelajaran, null, ['class' => 'custom-select', 'placeholder' => '-Pilih Kategori Kelas Terlebih Dahulu-', 'id' => 'cities']) !!}
                    @else 
                        {!! Form::select('id_mata_pelajaran', [], null, ['class' => 'custom-select', 'placeholder' => '-Pilih Kategori Kelas Terlebih Dahulu-', 'id' => 'cities']) !!}
                    @endif
                @endif
                <div class="invalid-feedback">{{ $errors->first('id_mata_pelajaran') }}</div>
        </div>
    @endif
    
</div>
<div class="card-body">
    {!!  Form::submit('Simpan', ['class' => 'btn btn-primary form-control']) !!}
</div>

