<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KaryawanJabatanModel;
use App\Models\Jabatan;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Auth;

class KaryawanJabatan extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct()
  {
    return $this->middleware('isAuth');
  }

  public function index(Request $request, KaryawanJabatanModel $karyawanJabatan)
  {
    $data = $karyawanJabatan->get();
    $jabatan = Jabatan::get();
  //  dd(auth()->guard('karyawan')->user()->nama_lengkap);
    $nama = auth()->guard('karyawan')->user()->nama_lengkap;
    $id_kar = auth()->guard('karyawan')->user()->id;
    $id_jab = auth()->guard('karyawan')->user()->jabatan_id;

    if ($request->ajax()) {
        return DataTables::of($data)
          ->addIndexColumn()
          ->addColumn('action', function ($data){
            return '
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-'.$data->id.'"><i class="fas fa-pen"></i></button>
            <a onclick="confirm_delete( \''.url('/KaryawanJabatan/'.$data->id.'').'\', \'Are you sure want to delete data ?\')" class="btn btn-danger text-light"><i class="fas fa-trash "></i></a>
            ';
          })
          ->editColumn('karyawan_id',function ($data){


            return $data->karyawan->nama_lengkap;
          })

          ->editColumn('jabatan_id',function ($data){


            return $data->jabatan->nama_jabatan;
          })


          ->rawColumns(['action'])
          ->make(true);
      }
    return view('admin.dashboard-karyawan-jabatan', compact('data','nama','id_kar','jabatan','id_jab'))->with(['cekNav3' => 'Jabatan']);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $cek = KaryawanJabatanModel::updateOrCreate(['id' => $request->id],[

                  'karyawan_id' => $request->karyawan_id,
                  'jabatan_id'=> $request->jabatan_id,
                  'tgl_mulai'=>  date('Y-m-d', strtotime($request->tgl_mulai)),
                  'tgl_selesai'=> date('Y-m-d', strtotime($request->tgl_selesai)),
                  'no_sk'=> $request->no_sk,
                  'tgl_sk'=> date('Y-m-d', strtotime($request->tgl_sk)),
                  'is_current'=> $request->is_current,
             ]);
      if ($cek) {
        return back()->with('success','Data  Behasil ditambah');
      } else {
        return back()->with('error','Data  Gagal ditambah');
      }
    } catch (\Throwable $th) {
      return back()->with('error',$th->getMessage());
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Agama $agama)
  {
    try {
      $cek = $agama->update($request->all());
      if ($cek) {
        return back()->with('success','Data Agama Behasil Diubah');
      } else {
        return back()->with('error','Data Agama Gagal Diubah');
      }
    } catch (\Throwable $th) {
      return back()->with('error',$th->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $data =  KaryawanJabatanModel::find($id)->delete();
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
