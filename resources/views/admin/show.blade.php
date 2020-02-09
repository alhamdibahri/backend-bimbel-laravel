
<div class="modal" id="yourModal{{$admin->id}}">
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
          @if(isset($admin->admin->foto_admin))
            <img src="{{ asset('fotoadmin/'. $admin->admin->foto_admin ) }}" width="150px" height="170px" />
          @else
            @if(isset($admin->admin->jenkel_admin) == 'Pria')
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
              <div class="col-sm-7">{{ $admin->nama }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Username</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ $admin->username }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Email</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ $admin->email }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Tanggal Lahir</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ isset($admin->admin->tanggal_lahir_admin) ? $admin->admin->tanggal_lahir_admin  : "-" }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Jenis Kelamin</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ isset($admin->admin->jenkel_admin) ?  $admin->admin->jenkel_admin  : "-" }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Agama</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ isset($admin->admin->agama_admin) ?  $admin->admin->agama_admin  : "-"  }}</div>
            </div>
            <div class="row">
              <div class="col-sm-4">Alamat</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-7">{{ isset($admin->admin->alamat_admin) ? $admin->admin->alamat_admin : "-" }}</div>
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

