<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MasterKategoriController extends Controller
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

    public function index(Kategori $kategori, Request $request)
    {
			$data = $kategori->get();
			if ($request->ajax()) {
					return DataTables::of($data)
						->addIndexColumn()
						->addColumn('action', function ($data){
							return '
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-'.$data->id.'"><i class="fas fa-pen"></i></button>
							<a onclick="confirm_delete( \''.route('kategori.destroy',$data->id).'\', \'Are you sure want to delete data ?\')" class="btn btn-danger text-light"><i class="fas fa-trash "></i></a>
							';
						})
            ->editColumn('sub_kategori',function ($data){

              $nama_kategori =	Kategori::where('id',$data->sub_kategori)->first();


          return $nama_kategori->nama_kategori;
        })
						->rawColumns(['action'])
						->make(true);
				}
			return view('admin.dashboard-kategori', compact('data'))->with(['cekNav2' => 'kategori']);
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
    public function store(Request $request, Kategori $kategori)
    {
      $validated = $request->validate([
        'nama_kategori' => 'required',
        'sub_kategori' => 'required',
    ]);
			try {
				$cek = $kategori->create($request->all());
				if ($cek) {
					return back()->with('success','Kategori Baru Behasil ditambah');
				} else {
					return back()->with('error','Kategori Gagal ditambah');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
			try {
				$cek = $kategori->update($request->all());
				if ($cek) {
					return back()->with('success','Kategori Behasil diubah');
				} else {
					return back()->with('error','Kategori Gagal diubah');
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


    public function destroy(Kategori $kategori)
    {
			try {
				$data = $kategori->delete();
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
