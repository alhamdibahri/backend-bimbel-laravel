
<div class="modal" id="yourModal{{$user->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Detail Data Admin</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="row">
          <div class="col-sm-4">
          @if(isset($user->foto_admin))
            <img src="{{ asset('fotoadmin/'. $user->foto_admin ) }}" width="150px" height="170px" />
          @else
            @if($user->jenkel_admin == 'Pria')
              <img src="{{ asset('fotoadmin/male.png') }}" width="150px" height="170px" />
            @else
              <img src="{{ asset('fotoadmin/female.png') }}" width="150px" height="170px" />
            @endif
          @endif
          </div>
          <div class="col-sm-8">
            <div class="row">
              <div class="col-sm-4">Nama</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ $user->nama_admin }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Username</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ $user->username_admin }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Email</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ $user->email_admin }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Tanggal Lahir</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ tgl_indo($user->tanggal_lahir_admin) }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Jenis Kelamin</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ $user->jenkel_admin }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Agama</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ $user->agama_admin }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Alamat</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ $user->alamat_admin }}</div>
            </div>
          </div>
        </div>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

