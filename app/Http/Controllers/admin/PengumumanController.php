<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\PengumumanModel;
use App\Models\Log;
use Illuminate\Support\Str;

use Auth;
use Illuminate\Support\Facades\DB;

class PengumumanController extends Controller
{
  public function __construct()
  {
    return $this->middleware('isAuth');
  }

  public function index(PengumumanModel $pengumumanModel, Request $request)
  {

    $data = $pengumumanModel->get();
    $nama = auth()->guard('karyawan')->user()->nama_lengkap;
    $id_kar = auth()->guard('karyawan')->user()->id;


  //  $karyawan = Karyawan::get();
    if ($request->ajax()) {
        return DataTables::of($data)
          ->addIndexColumn()
          ->addColumn('action', function ($data){
            return '
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-'.$data->id.'"><i class="fas fa-pen"></i></button>
            <a onclick="confirm_delete( \''.url('/pengumuman/'.$data->id.'').'\', \'Are you sure want to delete data ?\')" class="btn btn-danger text-light"><i class="fas fa-trash "></i></a>
            ';
          })

          ->rawColumns(['action'])
          ->make(true);
      }
    return view('admin.dashboard-pengumuman', compact('data'));
  }



  public function store(Request $request)
  {
    try {
      $image = $request->file('url_image');
      $gambar='';
      $cek;
      $id_kar = auth()->guard('karyawan')->user()->id;
      if ($request->file('url_image') != null) {
        $imageName = 'profile_pengguna_'.Str::random(5).'.'.$image->extension();
        $image->storeAs('/public/images/',$imageName);
        $gambar = 'http://localhost/stikom_admin/storage/app/public/images/'.$imageName;

        $cek = PengumumanModel::updateOrCreate(['id' => $request->id], [
              'tgl_pengumuman' => date('Y-m-d'),
              'judul'=>  $request->judul,
              'isi_pengumuman'=> $request->isi_pengumuman,
              'created_by'=> $id_kar,
              'is_enable'=> $request->is_enable,
              'url_image'=> $gambar,
         ]);

      }else {

        $cek = PengumumanModel::updateOrCreate(['id' => $request->id], [
              'tgl_pengumuman' => date('Y-m-d'),
              'judul'=>  $request->judul,
              'isi_pengumuman'=> $request->isi_pengumuman,
              'created_by'=> $id_kar,
              'is_enable'=> $request->is_enable,
            //  'url_image'=> $gambar,
         ]);

      }

      if ($cek) {
        return back()->with('success','Behasil ditambah');
      }

    } catch (\Throwable $th) {
        return back()->with('error',$th->getMessage());
    }
  }

  public function update(Request $request,PengumumanModel $pengumuman, Log $log)
  {
    DB::beginTransaction();
    try {
      $image = $request->file('url_image');
        $gambar= '';
      if ($request->file('url_image') != null) {
        $imageName = 'profile_pengguna_'.Str::random(5).'.'.$image->extension();

        $destination = storage_path('app/public/images');

        if ($pengumuman->url_image != null) {
          try {
            unlink($destination.$pengumuman->url_image);
          } catch (\Throwable $th) {}
        }

        $image->storeAs('/public/images/',$imageName);
        $gambar = 'http://localhost/stikom_admin/storage/app/public/images/'.$imageName;

      }


      $logs =[
        'tanggal'=>now(),
        'tabel'=> 'pengumumans',
        'aksi'=> 'Update',
        'user' => auth()->guard('karyawan')->user()->hak_akses.'-'.auth()->guard('karyawan')->user()->id,
        'ip' => $request->ip(),
        'keterangan' => $pengumuman,
        'serial' => route('pengumuman.update',$pengumuman->id),
      ];

      $log->create($logs);
      $id_kar = auth()->guard('karyawan')->user()->id;

      $data = ([
            'tgl_pengumuman' => date('Y-m-d'),
            'judul'=>  $request->judul,
            'isi_pengumuman'=> $request->isi_pengumuman,
            'created_by'=> $id_kar,
            'is_enable'=> $request->is_enable,
            'url_image'=> $gambar,
       ]);

       $cek = DB::table('pengumumans')->where('id',$request->id)->update($data);
      if ($cek) {
        DB::commit();
        return back()->with('success','Data Pengguna Berhasil Ditambah');
      } else {
        DB::rollBack();
        return back()->with('error','Data Pengguna Gagal Ditambah');
      }

    } catch (\Throwable $th) {
        DB::rollBack();
        return back()->with('error', $th->getMessage());
    }
  }

  public function destroy($id)
  {
    try {
      $data =  PengumumanModel::find($id)->delete();

      if ($data) {
        return response()->json(['success'=>'Success']);
      }
      else {
        return response()->json(['error'=>'Product Update failed.']);
      }
    } catch (\Throwable $th) {
      return response()->json(['error'=>$th->getMessage()]);
    }
  }





}
