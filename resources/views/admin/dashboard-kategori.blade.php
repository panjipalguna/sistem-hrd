@extends('layout.app')
@section('main-content')

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('kategori.store')}}" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputEmail4">Nama Kategori</label>
              <input type="text" name="nama_kategori" class="form-control" id="inputEmail4">
          </div>
          <div class="form-group col-md-12">
              <label for="inputEmail4">Sub Kategori</label>
              <select name="sub_kategori" class="form-control">
                @foreach($data as $dt)
                  <option value="{{$dt->id}}">{{$dt->nama_kategori}}</option>
                @endforeach
              </select>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="riset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach ($data as $dp)
  <div class="modal fade" id="ubah-{{$dp->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ubah-{{$dp->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ubah-{{$dp->id}}Label">Ubah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('kategori.store')}}" method="post">
          @csrf
          @method('POST')
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="{{$dp->nama_kategori}}" class="form-control" id="inputEmail4" required>

                  <input type="hidden" name="id" value="{{$dp->id}}" class="form-control" id="inputEmail4" required>
                  <label for="inputEmail4">Nama Sub Kategori</label>
                  <select name="sub_kategori" class="form-control" required>
                  @foreach($data as $dt)
                    <option {{$dp->sub_kategori == $dt->id ? 'selected':''}} value="{{$dt->id}}">{{$dt->nama_kategori}} </option>
                  @endforeach
                
              </select>
                 

</div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="riset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endforeach

  <div class="list-data-karyawan">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kategori</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
          Tambah
        </button>
        {{-- <button class="btn btn-primary">Tambah</button> --}}
      </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Sub Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Sub Kategori</th>
                      <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
  </div>

<script>
  
	var table = $('#dataTable').DataTable({
		processing: true,
		serverSide: true,
		responsive: true,
		autoWidth:false,
		ajax: {
			url: "{{ route('kategori.index') }}",
			// data: function (d) {
			// 	d.jenis = $('#jenis').val(),
			// 	d.search = $('input[type="search"]').val()
			// 	}
		},
		columns: [
				{data: 'DT_RowIndex', name: 'DT_Row_Index', orderable: false, searchable: false},
				{data: 'nama_kategori', name: 'nama_kategori'},
        {data: 'sub_kategori', name: 'sub_kategori'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
		],
		});
    
    
</script>

@endsection
