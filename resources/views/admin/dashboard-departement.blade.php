@extends('layout.app')
@section('main-content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<style>

.ui-autocomplete {
  z-index:2147483647;
}
</style>
<script type="text/javascript">
var availableTags = [

       <?php foreach ($karyawan as $key) {  ?>
           {
             label :'<?php echo $key->nama_lengkap ?>',
             id : '<?php echo $key->id ?>',
           },
     <?php } ?>
];

$( function() {

     $("#fooInput").autocomplete({
     source: availableTags,
     select: function(event, ui) {
       var e = ui.item;
       var result = "<p>label : " + e.label + " - id : " + e.id + "</p>";
       // $("#result").append(result);

    //   console.log(e.id);

       $('#karyawan_id').val(e.id);


     }
     });







 });

 function autoc(id) {
   $("#fooInput"+id).autocomplete({
   source: availableTags,
   select: function(event, ui) {
     var e = ui.item;
     var result = "<p>label : " + e.label + " - id : " + e.id + "</p>";

     console.log(result);;

     $('#karyawan_id'+id).val(e.id);

   }
   });

  // alert('l');
 }
</script>



<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('dapartement.store')}}" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputEmail4">Nama Dapartemen</label>
              <input type="text" name="nama_departement" class="form-control" id="inputEmail4" required>
            </div>
            <div class="form-group col-md-12">
              <label for="inputEmail4">Sub Dapartemen</label>
              <input type="text" name="sub_departement" class="form-control" id="inputEmail4" required>
            </div>
            <div class="form-group col-md-12">
              <label for="inputEmail4">Nama Pemimpin</label>
              <input type="text" name="nama_karyawan" class="form-control" id="fooInput">
              <input type="hidden" name="pimpinan" class="form-control" id="karyawan_id" required>
              <!-- <input type="text" name="pimpinan" class="form-control" id="inputEmail4"> -->
            </div>
            <div class="form-group col-md-12">
              <label for="inputEmail4">Jabatan</label>
              <input type="text" name="jabatan" class="form-control" id="inputEmail4" required>
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
        <form action="{{route('dapartement.store')}}" method="post">
          @csrf

          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">Nama Dapartemen</label>
                <input type="text" name="nama_departement" value="{{$dp->nama_departement}}" class="form-control" id="inputEmail4">

                  <input type="hidden" name="id" value="{{$dp->id}}" class="form-control" id="inputEmail4">
              </div>
              <div class="form-group col-md-12">
                <label for="inputEmail4">Sub Dapartemen</label>
                <select name="sub_departement" class="form-control">
                  @foreach($data as $dt)
                  <option {{$dp->sub_departement == $dt->id ? 'selected':''}} value="{{$dt->id}}">{{$dt->nama_departement}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-12">
                <label for="inputEmail4">Nama Pemimpin</label>
                <input type="text" name="nama_karyawan" onclick="autoc(<?= $dp->id; ?>)"  class="form-control" value="<?= $dp->karyawan->nama_lengkap;  ?>" id="fooInput<?= $dp->id; ?>" required>
                <input type="hidden" name="pimpinan" class="form-control" value="<?=  $dp->pimpinan;  ?>" id="karyawan_id<?= $dp->id; ?>">
              </div>
              <div class="form-group col-md-12">
                <label for="inputEmail4">Jabatan</label>
                <input type="text" name="jabatan" value="{{$dp->jabatan}}" class="form-control" id="inputEmail4">
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

<!-- Section Content -->
      <div class="section-content" data-aos="fade-up">
        <div class="container">
          <div class="main-content">

            <div class="header row">
                          <div class="col-md-12">
                            <p class="header-title">
                              Departemen
                            </p>
                            
                            <br />
                          </div>
                        </div>
                <div class="table-responsive">
               <table class="table table-bordered" id="dataTable">
             
                   
                        <thead>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
          Tambah
        </button>
                            <tr>
                                <th>No</th>
                                <th>Dapartemen</th>
                                <th>Sub Dapartemen</th>
                                <th>Pimpinan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Dapartemen</th>
                              <th>Sub Dapartemen</th>
                              <th>Pimpinan</th>
                              <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                        </tbody>

                    </table>
                </div>
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
			url: "{{ route('dapartement.index') }}",

		},
		columns: [
				{data: 'DT_RowIndex', name: 'DT_Row_Index', orderable: false, searchable: false},
				{data: 'nama_departement', name: 'nama_departement'},
				{data: 'sub_departement', name: 'sub_departement'},
        {data: 'pimpinan', name: 'pimpinan'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
		],
		});
</script>

@endsection
