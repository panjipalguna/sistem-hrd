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
      <form action="{{route('pengumuman.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-row">

            <div class="form-group col-md-12">
              <label for="inputEmail4">Judul</label>
              <input type="text" name="judul" class="form-control" id="judul">
            </div>

            <div class="form-group col-md-12">
              <label for="inputEmail4">Isi Pengumuman</label>
              <textarea class="form-control" name="isi_pengumuman" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group col-md-12">
              <label for="inputEmail4">Is Enable</label>
              <select class="form-control" name="is_enable">

                <option value="false"> Aktif </option>
                <option value="true"> Tidak Aktif </option>

              </select>
            </div>

            <div class="form-group col-md-12">
              <label for="inputEmail4">Image</label>
              <input type="file" name="url_image" class="form-control">
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
        <form action="{{ route('pengumuman.update',$dp->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-row">

              <div class="form-group col-md-12">
                <label for="inputEmail4">Judul</label>
                <input type="text" value="<?= $dp->judul; ?>" name="judul" class="form-control" id="judul">
                <input type="hidden" value="<?= $dp->id; ?>" name="id" class="form-control" id="judul">
              </div>

              <div class="form-group col-md-12">
                <label for="inputEmail4">Isi Pengumuman</label>
                <textarea class="form-control" name="isi_pengumuman" value="" id="exampleFormControlTextarea1" rows="3"> <?= $dp->isi_pengumuman; ?> </textarea>
              </div>
            <?php $enable = $dp->is_enable == 'true' ? 'Aktif' : 'Tidak Aktif';  ?>
              <div class="form-group col-md-12">
                <label for="inputEmail4">Is Enable</label>
                <select class="form-control" name="is_enable">
                  <option value="<?= $dp->is_enable; ?>"> <?= $enable; ?> </option>
                  <option value="false"> Tidak Aktif </option>
                  <option value="true">  Aktif </option>
                </select>
              </div>

              <div class="form-group col-md-12">
                <label for="inputEmail4">Image</label>
                <input type="file" name="url_image" class="form-control">
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
        <h1 class="h3 mb-0 text-gray-800">Pengumuman</h1>
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
                        <th>Judul</th>
                        <th>Pengumuman</th>
                        <th>Is Enable </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Pengumuman</th>
                      <th>Is Enable </th>
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
			url: "{{ route('pengumuman.index') }}",
			// data: function (d) {
			// 	d.jenis = $('#jenis').val(),
			// 	d.search = $('input[type="search"]').val()
			// 	}
		},
		columns: [
				{data: 'DT_RowIndex', name: 'DT_Row_Index', orderable: false, searchable: false},
				{data: 'judul', name: 'judul'},
				{data: 'isi_pengumuman', name: 'isi_pengumuman'},
        {data: 'is_enable', name: 'is_enable'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
		],
		});
</script>

@endsection
