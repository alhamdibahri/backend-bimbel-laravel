<div class="card-body">
    <h4 class="card-title">Akun Info</h4>
    <div class="border-top"></div>
    <br>

    {{-- jika variable admin di temukan --}}
    @if (isset($user))
        {!! Form::hidden('id', $user->id) !!}
    @endif
    
    {{-- Form Username --}}
    <div class="form-group">
        {!! Form::label('username', 'Username', ['class' => 'control-label']) !!}
        @if($errors->has('username'))
            {!! Form::text('username', null, ['class' => 'form-control is-invalid', 'placeholder' => 'Username', 'autocomplete' => 'off']) !!}
            <div class="invalid-feedback">
                {{  $errors->first('username') }} 
            </div>
        @else
            {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autocomplete' => 'off']) !!}
        @endif
    </div>

    {{-- Form Email --}}
    <div class="form-group m-t-20">
        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
        @if($errors->has('email'))
            {!! Form::email('email', null, ['class' => 'form-control is-invalid', 'placeholder' => 'Email', 'autocomplete' => 'off' ]) !!}
        @else
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'autocomplete' => 'off' ]) !!}
        @endif
            
        <div class="invalid-feedback">
            {{  $errors->first('email') }} 
        </div>
    </div>

    {{-- Form password --}}
    <div class="form-group m-t-20">
        {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
        @if($errors->has('password'))
            @if(isset($user))
                {!! Form::input('password', 'password', $user->password, ['class' => 'form-control is-invalid', 'placeholder' => '*********']) !!}
            @else
                {!! Form::input('password', 'password', null, ['class' => 'form-control is-invalid', 'placeholder' => '*********']) !!}
            @endif
        @else
            @if(isset($user))
                {!! Form::input('password','password', $user->password, ['class' => 'form-control', 'placeholder' => '*********']) !!}
            @else
                {!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => '*********']) !!}
            @endif
        @endif
        <div class="invalid-feedback">
            {{  $errors->first('password') }} 
        </div>
    </div>

    <div class="form-group m-t-20">
            {!! Form::label('nama', 'Nama', ['class' => 'control-label']) !!}
            @if($errors->has('nama'))
                {!! Form::text('nama', null, ['class' => 'form-control is-invalid', 'placeholder' => 'Nama', 'autocomplete' => 'off' ]) !!}
            @else
                {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama', 'autocomplete' => 'off' ]) !!}
            @endif
                
            <div class="invalid-feedback">
                {{  $errors->first('nama') }} 
            </div>
        </div>

    <div class="form-group m-t-20">
            {!! Form::label('level', 'Level', ['class' => 'control-label']) !!}
            @if($errors->has('level'))
                {!! Form::select('level', ['' => '--Pilih Level--','Admin' => 'Admin', 'Guru' => 'Guru', 'Siswa' => 'Siswa'], null, ['class' => 'is-invalid custom-select']) !!}
            @else
                {!! Form::select('level', ['' => '--Pilih Level--','Admin' => 'Admin', 'Guru' => 'Guru', 'Siswa' => 'Siswa'], null, ['class' => 'custom-select']) !!}
            @endif
            <div class="invalid-feedback">{{ $errors->first('level') }}</div>
        </div>

</div>
<div class="card-body">
    {!!  Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

