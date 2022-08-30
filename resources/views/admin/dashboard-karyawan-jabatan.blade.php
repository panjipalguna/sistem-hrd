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
      <form action="{{ route('KaryawanJabatan.store') }}" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-row">

            <div class="form-group col-md-12">
              <label for="inputEmail4">Nama Karyawan</label>
              <input type="text" name="nama_karyawan" value="<?= $nama; ?>" class="form-control" id="tahun">
                  <input type="hidden" name="karyawan_id" value="<?= $id_kar; ?>" class="form-control" id="tahun">
            </div>

            <div class="form-group col-md-12">
              <label for="inputEmail4">Jabatan</label>
              <select name="jabatan_id" class="form-control">
                @foreach($jabatan as $dt)
                  <option {{$id_jab == $dt->id ? 'selected':''}} value="{{$dt->id}}">{{$dt->nama_jabatan}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-12">
              <label for="inputEmail4">Tangal Mulai</label>
              <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai">
            </div>

            <div class="form-group col-md-12">
              <label for="inputEmail4">Tangal Selesai</label>
              <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai">
            </div>

            <div class="form-group col-md-12">
              <label for="inputEmail4">No Sk</label>
              <input type="number" name="no_sk" class="form-control" id="no_sk">
            </div>


            <div class="form-group col-md-12">
              <label for="inputEmail4">Tanggal Sk</label>
              <input type="date" name="tgl_sk" class="form-control" id="no_sk">
            </div>


            <div class="form-group col-md-12">
              <label for="inputEmail4">Is Current</label>
              <select name="is_current" class="form-control">
                <option value=""> </option>
                  <option value="true"> Aktif </option>
                    <option value="false"> Tidak Aktif </option>
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
        <form action="{{ route('KaryawanJabatan.store') }}" method="post">
          @csrf

          <div class="modal-body">
            <div class="form-row">

              <div class="form-group col-md-12">
                <label for="inputEmail4">Nama Karyawan</label>
                <input type="text" name="nama_karyawan" value="<?= $nama; ?>" class="form-control" id="tahun">
                    <input type="hidden" name="karyawan_id" value="<?= $id_kar; ?>" class="form-control" id="tahun">
                    <input type="hidden" name="id" value="<?= $dp->id; ?>" class="form-control" id="tahun">
              </div>

              <div class="form-group col-md-12">
                <label for="inputEmail4">Jabatan</label>
                <select name="jabatan_id" class="form-control">
                  @foreach($jabatan as $dt)
                    <option {{$id_jab == $dt->id ? 'selected':''}} value="{{$dt->id}}">{{$dt->nama_jabatan}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-12">
                <label for="inputEmail4">Tangal Mulai</label>
                <input type="date" name="tgl_mulai" value="<?= $dp->tgl_mulai; ?>" class="form-control" id="tgl_mulai">
              </div>

              <div class="form-group col-md-12">
                <label for="inputEmail4">Tangal Selesai</label>
                <input type="date" name="tgl_selesai" value="<?= $dp->tgl_selesai; ?>" class="form-control" id="tgl_selesai">
              </div>

              <div class="form-group col-md-12">
                <label for="inputEmail4">No Sk</label>
                <input type="number" name="no_sk" value="<?= $dp->no_sk; ?>" class="form-control" id="no_sk">
              </div>


              <div class="form-group col-md-12">
                <label for="inputEmail4">Tanggal Sk</label>
                <input type="date" name="tgl_sk" value="<?= $dp->tgl_sk; ?>" class="form-control" id="no_sk">
              </div>
<?php
$name_cur = $dp->is_current == 'true' ? 'Aktif' : 'Tidak Aktif';

  ?>

              <div class="form-group col-md-12">
                <label for="inputEmail4">Is Current</label>
                <select name="is_current" class="form-control">
                  <option value="<?=$dp->is_current; ?>"> <?= $name_cur; ?> </option>
                    <option value="true"> Aktif </option>
                      <option value="false"> Tidak Aktif </option>
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
        <h1 class="h3 mb-0 text-gray-800">Jabatan Karyawan</h1>
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
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Is Current</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Karyawan</th>
                      <th>Jabatan</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Is Current</th>
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
			url: "{{ url('KaryawanJabatan') }}",

		},
		columns: [
				{data: 'DT_RowIndex', name: 'DT_Row_Index', orderable: false, searchable: false},
				{data: 'karyawan_id', name: 'karyawan_id'},
				{data: 'jabatan_id', name: 'jabatan_id'},
        {data: 'tgl_mulai', name: 'tgl_mulai'},
        {data: 'tgl_selesai', name: 'tgl_selesai'},
        {data: 'is_current', name: 'is_current'},

        //{data: 'sub_departement', name: 'sub_departement'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
		],
		});
</script>

@endsection
