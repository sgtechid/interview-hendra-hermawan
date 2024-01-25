<?php

namespace App\Http\Controllers;

use App\Ppdb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use DataTables;
use Validator;
use DB;
use Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PDF;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ppdb::latest('id')->where('softdelete',0)->OrderBy('created_at',"DESC")->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('print_pdf', function($row){
                        $btn = '<a href="'.url('/print_pdf/'.$row->nisn).'" target="_blank" data-toggle="tooltip" data-original-title="Show" class="show btn btn-success btn-sm showItem"> Print Pdf </a>';
                        return $btn;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.url('/status/'.$row->nisn).'" data-toggle="tooltip" data-original-title="Show" class="show btn btn-info btn-sm showItem"> Approve Datang Kesekolah </a> &nbsp;';
                        $btn = $btn.'<a href="'.url('/EditPpdb/'.$row->nisn).'"  data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem"> Edit</a>&nbsp;';
                        if (session()->get('level') == 1){
                            $btn = $btn.'<a href="'.url('/softdelete/'.$row->nisn).'" data-toggle="tooltip"  data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
                        }
                        return $btn;
                    })
                    ->addColumn('status', function($row){
                        if ($row->status == 0){
                            $status ="Belum Datang Kesekolah" ; 
                        }elseif ($row->status == 1){
                            $status ="Sudah Datang Kesekolah";    
                        
                        }else{
                           $status ="Tidak Datang" ; 
                        }
                        return $status;
                    })
                    ->addColumn('tgllahir', function($row){
                        $tgllahir = $row->tempat_lahir .',  '. date('d F Y', strtotime($row->tanggal_lahir));
                        return $tgllahir;
                    })
                    ->rawColumns(['print_pdf','tgllahir','action','status'])
                    ->make(true);
        }
        $page = "Ppdb";
        return view('Ppdb.index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DafarPpdb()
    {
        $page = "Ppdb";
        return view('Ppdb.DaftarPpdb',compact('page'));
    }
    public function DafarPpdb_user()
    {
        $page = "Ppdb";
        return view('Ppdb.DaftarPpdb_use',compact('page'));
    }
    public function EditPpdb($id)
    {
        $data = ppdb::latest('id')->where('nisn',$id)->first();
        $page = "Ppdb";
        return view('Ppdb.EditPpdb',compact('page','data'));
    }

    public function print_pdf($id)
    {
        
        $data = ppdb::latest('id')->where('nisn',$id)->first();
        $pdf = PDF::loadview('ppdb.print_pdf', compact('data'))->setPaper('A4', 'portrait');
        return $pdf->stream('ppdb_'.$id.'.pdf');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $time = strtotime($request->tanggal_lahir);
        $request->validate([
            'nisn'=>'required|unique:ppdb',
            'nik' => 'required|unique:ppdb',
            'nama'=> ['required', 'max:255'], 
            'jenis_kelamin'=> ['required', 'max:255'],
            'tempat_lahir'=> ['required', 'max:255'],
            'tanggal_lahir'=> ['required', 'max:255'],
            'tinggi_badan'=> ['required', 'max:255'],
            'berat_badan'=> ['required', 'max:255'],
            'agama'=> ['required', 'max:255'],
            'kewarganegaraan'=> ['required', 'max:255'],
            'jumlah_saudara'=> ['required', 'max:255'],
            'asal_sekolah'=> ['required', 'max:255'],
            'alamat_tinggal'=> ['required', 'max:255'],
            'rt'=> ['required', 'max:255'],
            'rw'=> ['required', 'max:255'],
            'desa'=> ['required', 'max:255'],
            'kecamatan'=> ['required', 'max:255'],
            'kota'=> ['required', 'max:255'], 
            'provinsi'=> ['required', 'max:255'],
            'no_hp'=> ['required', 'max:255'],
            'jenis_tinggal'=> ['required', 'max:255'],
            'jarak_tempat'=> ['required', 'max:255'],
            'alat_transportasi'=> ['required', 'max:255'],
            'riwayat_beasiswa'=> ['required', 'max:255'],
            'catatan_prestasi'=> ['required', 'max:255'],
            'nama_ayah_kandung'=> ['max:255'],
            'tahun_lahir_ayah'=> ['max:255'],
            'pendidikan_terakhir_ayah'=> ['max:255'],
            'pekerjaan'=> ['max:255'],
            'penghasilan_bulanan_ayah'=> ['max:255'],
            'no_hp_ayah'=> ['max:255'],
            'nama_ibu_kandung'=> ['max:255'],
            'pendidikan_terakhir_ibu'=> ['max:255'],
            'tahun_lahir_ibu'=> ['max:255'],
            'pekerjaan_ibu'=> ['max:255'],
            'penghasilan_ibu'=> ['max:255'],
            'no_tlp_ibu'=> ['max:255'],
            'nama_wali'=> ['max:255'],
            'tahun_lahir_wali'=> ['max:255'],
            'pendidikan_terakhir_wali'=> ['max:255'], 
            'pekerjaan_wali'=> ['max:255'],
            'penghasilan_wali'=> ['max:255'],
            'no_tlp_wali'=> ['max:255'],
            'alamat_orangtua_wali'=> ['required', 'max:255'],
            'rt_ortu'=> ['required', 'max:255'],
            'rw_ortu'=> ['required', 'max:255'], 
            'desa_ortu'=> ['required', 'max:255'],
            'kecamatan_ortu'=> ['required', 'max:255'],
            'kota_ortu'=> ['required', 'max:255'],
            'provinsi_ortu'=> ['required', 'max:255']
        ]);
        $DataPpdb  =  DB::table('ppdb')->insert([
            'nisn'=> (integer)$request->nisn,
            'nik' =>  (integer)$request->nik ,
            'nama'=> $request-> nama, 
            'jenis_kelamin'=> $request->jenis_kelamin,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=>  date('Y-m-d',$time),
            'tinggi_badan'=> $request->tinggi_badan,
            'berat_badan'=> $request->berat_badan,
            'agama'=> $request->agama,
            'kewarganegaraan'=> $request->kewarganegaraan,
            'jumlah_saudara'=> $request->jumlah_saudara,
            'asal_sekolah'=> $request->asal_sekolah,
            'alamat_tinggal'=> $request->alamat_tinggal,
            'rt'=>  (integer)$request->rt,
            'rw'=>  (integer)$request->rw,
            'desa'=> $request->desa,
            'kecamatan'=> $request->kecamatan,
            'kota'=> $request-> kota, 
            'provinsi'=> $request->provinsi,
            'no_hp'=>  (integer)$request->no_hp,
            'jenis_tinggal'=> $request->jenis_tinggal,
            'jarak_tempat'=> $request->jarak_tempat,
            'alat_transportasi'=> $request->alat_transportasi,
            'riwayat_beasiswa'=> $request->riwayat_beasiswa,
            'catatan_prestasi'=> $request->catatan_prestasi,
            'nama_ayah_kandung'=> $request->nama_ayah_kandung,
            'tahun_lahir_ayah'=>  (integer)$request->tahun_lahir_ayah,
            'pendidikan_terakhir_ayah'=> $request->pendidikan_terakhir_ayah,
            'pekerjaan'=> $request->pekerjaan,
            'penghasilan_bulanan_ayah'=> (double)str_replace(',','',strval($request->penghasilan_bulanan_ayah)),
            'no_hp_ayah'=>  (integer)$request->no_hp_ayah,
            'nama_ibu_kandung'=> $request->nama_ibu_kandung,
            'pendidikan_terakhir_ibu'=> $request->pendidikan_terakhir_ibu,
            'tahun_lahir_ibu'=>  (integer)$request->tahun_lahir_ibu,
            'pekerjaan_ibu'=> $request->pekerjaan_ibu,
            'penghasilan_ibu'=> (double)str_replace(',','',strval($request->penghasilan_ibu)),
            'no_tlp_ibu'=>  (integer)$request->no_tlp_ibu,
            'nama_wali'=> $request->nama_wali,
            'tahun_lahir_wali'=>  (integer)$request->tahun_lahir_wali,
            'pendidikan_terakhir_wali'=> $request-> pendidikan_terakhir_wali, 
            'pekerjaan_wali'=> $request->pekerjaan_wali,
            'penghasilan_wali'=> (double)str_replace(',','',strval($request->penghasilan_wali)),
            'no_tlp_wali'=> $request->no_tlp_wali,
            'alamat_orangtua_wali'=> $request->alamat_orangtua_wali,
            'rt_ortu'=>  (integer)$request->rt_ortu,
            'rw_ortu'=>  (integer)$request-> rw_ortu, 
            'desa_ortu'=> $request->desa_ortu,
            'kecamatan_ortu'=> $request->kecamatan_ortu,
            'kota_ortu'=> $request->kota_ortu,
            'provinsi_ortu'=> $request->provinsi_ortu,
            'status'=> 0,
            'created_at' => new \DateTime()
        ]);
        if (!empty(session()->get('user'))){
            if(!is_null($DataPpdb)) {            
                return redirect('ppdb')->with('success' , 'Data Sukses Tersimpan');
            }    
            else {
                return redirect('ppdb')->with('gagal' , 'Data Gagal Tersimpan');
            }
        }else{
            if(!is_null($DataPpdb)) {            
                return redirect('/DafarPpdb_user')->with('success' , 'Data Sukses Tersimpan');
            }    
            else {
                return redirect('/DafarPpdb_user')->with('gagal' , 'Data Gagal Tersimpan');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function softdelete($id)
    {
        $DataPpdb  =  DB::table('ppdb')->where('nisn',$id)->update([
            'softdelete'=> 1
        ]);
      
         if(!is_null($DataPpdb)) {            
             return redirect('/ppdb')->with('success' , 'Data Sukses Hapus');
         }    
         else {
             return redirect('/ppdb')->with('gagal' , 'Data Gagal Hapus');
         }
    }
    public function status($id)
    {
        $DataPpdb  =  DB::table('ppdb')->where('nisn',$id)->update([
            'status'=> 1
        ]);
      
         if(!is_null($DataPpdb)) {            
             return redirect('/ppdb')->with('success' , 'Data Status Siswa Kesekolah Berhasil');
         }    
         else {
             return redirect('/ppdb')->with('gagal' , 'Data Status Siswa Kesekolah Gagal');
         }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $id
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
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //    dd($request->all());
           $time = strtotime($request->tanggal_lahir);
           $request->validate([
               'nama'=> ['required', 'max:255'], 
               'jenis_kelamin'=> ['required', 'max:255'],
               'tempat_lahir'=> ['required', 'max:255'],
               'tanggal_lahir'=> ['required', 'max:255'],
               'tinggi_badan'=> ['required', 'max:255'],
               'berat_badan'=> ['required', 'max:255'],
               'agama'=> ['required', 'max:255'],
               'kewarganegaraan'=> ['required', 'max:255'],
               'jumlah_saudara'=> ['required', 'max:255'],
               'asal_sekolah'=> ['required', 'max:255'],
               'alamat_tinggal'=> ['required', 'max:255'],
               'rt'=> ['required', 'max:255'],
               'rw'=> ['required', 'max:255'],
               'desa'=> ['required', 'max:255'],
               'kecamatan'=> ['required', 'max:255'],
               'kota'=> ['required', 'max:255'], 
               'provinsi'=> ['required', 'max:255'],
               'no_hp'=> ['required', 'max:255'],
               'jenis_tinggal'=> ['required', 'max:255'],
               'jarak_tempat'=> ['required', 'max:255'],
               'alat_transportasi'=> ['required', 'max:255'],
               'riwayat_beasiswa'=> ['required', 'max:255'],
               'catatan_prestasi'=> ['required', 'max:255'],
               'nama_ayah_kandung'=> ['max:255'],
               'tahun_lahir_ayah'=> ['max:255'],
               'pendidikan_terakhir_ayah'=> ['max:255'],
               'pekerjaan'=> ['max:255'],
               'penghasilan_bulanan_ayah'=> ['max:255'],
               'no_hp_ayah'=> ['max:255'],
               'nama_ibu_kandung'=> ['max:255'],
               'pendidikan_terakhir_ibu'=> ['max:255'],
               'tahun_lahir_ibu'=> ['max:255'],
               'pekerjaan_ibu'=> ['max:255'],
               'penghasilan_ibu'=> ['max:255'],
               'no_tlp_ibu'=> ['max:255'],
               'nama_wali'=> ['max:255'],
               'tahun_lahir_wali'=> ['max:255'],
               'pendidikan_terakhir_wali'=> ['max:255'], 
               'pekerjaan_wali'=> ['max:255'],
               'penghasilan_wali'=> ['max:255'],
               'no_tlp_wali'=> ['max:255'],
               'alamat_orangtua_wali'=> ['required', 'max:255'],
               'rt_ortu'=> ['required', 'max:255'],
               'rw_ortu'=> ['required', 'max:255'], 
               'desa_ortu'=> ['required', 'max:255'],
               'kecamatan_ortu'=> ['required', 'max:255'],
               'kota_ortu'=> ['required', 'max:255'],
               'provinsi_ortu'=> ['required', 'max:255']
           ]);
           $DataPpdb  =  DB::table('ppdb')->where('nisn',$request->nisn)->update([
               'nik' =>  (integer)$request->nik ,
               'nama'=> $request-> nama, 
               'jenis_kelamin'=> $request->jenis_kelamin,
               'tempat_lahir'=> $request->tempat_lahir,
               'tanggal_lahir'=>  date('Y-m-d',$time),
               'tinggi_badan'=> $request->tinggi_badan,
               'berat_badan'=> $request->berat_badan,
               'agama'=> $request->agama,
               'kewarganegaraan'=> $request->kewarganegaraan,
               'jumlah_saudara'=> $request->jumlah_saudara,
               'asal_sekolah'=> $request->asal_sekolah,
               'alamat_tinggal'=> $request->alamat_tinggal,
               'rt'=>  (integer)$request->rt,
               'rw'=>  (integer)$request->rw,
               'desa'=> $request->desa,
               'kecamatan'=> $request->kecamatan,
               'kota'=> $request-> kota, 
               'provinsi'=> $request->provinsi,
               'no_hp'=>  (integer)$request->no_hp,
               'jenis_tinggal'=> $request->jenis_tinggal,
               'jarak_tempat'=> $request->jarak_tempat,
               'alat_transportasi'=> $request->alat_transportasi,
               'riwayat_beasiswa'=> $request->riwayat_beasiswa,
               'catatan_prestasi'=> $request->catatan_prestasi,
               'nama_ayah_kandung'=> $request->nama_ayah_kandung,
               'tahun_lahir_ayah'=>  (integer)$request->tahun_lahir_ayah,
               'pendidikan_terakhir_ayah'=> $request->pendidikan_terakhir_ayah,
               'pekerjaan'=> $request->pekerjaan,
               'penghasilan_bulanan_ayah'=> (double)str_replace(',','',strval($request->penghasilan_bulanan_ayah)),
               'no_hp_ayah'=>  (integer)$request->no_hp_ayah,
               'nama_ibu_kandung'=> $request->nama_ibu_kandung,
               'pendidikan_terakhir_ibu'=> $request->pendidikan_terakhir_ibu,
               'tahun_lahir_ibu'=>  (integer)$request->tahun_lahir_ibu,
               'pekerjaan_ibu'=> $request->pekerjaan_ibu,
               'penghasilan_ibu'=> (double)str_replace(',','',strval($request->penghasilan_ibu)),
               'no_tlp_ibu'=>  (integer)$request->no_tlp_ibu,
               'nama_wali'=> $request->nama_wali,
               'tahun_lahir_wali'=>  (integer)$request->tahun_lahir_wali,
               'pendidikan_terakhir_wali'=> $request-> pendidikan_terakhir_wali, 
               'pekerjaan_wali'=> $request->pekerjaan_wali,
               'penghasilan_wali'=> (double)str_replace(',','',strval($request->penghasilan_wali)),
               'no_tlp_wali'=> $request->no_tlp_wali,
               'alamat_orangtua_wali'=> $request->alamat_orangtua_wali,
               'rt_ortu'=>  (integer)$request->rt_ortu,
               'rw_ortu'=>  (integer)$request-> rw_ortu, 
               'desa_ortu'=> $request->desa_ortu,
               'kecamatan_ortu'=> $request->kecamatan_ortu,
               'kota_ortu'=> $request->kota_ortu,
               'provinsi_ortu'=> $request->provinsi_ortu,
               'updated_at' => new \DateTime()
           ]);
         
            if(!is_null($DataPpdb)) {            
                return redirect('/ppdb')->with('success' , 'Data Sukses Tersimpan');
            }    
            else {
                return redirect('/ppdb')->with('gagal' , 'Data Gagal Tersimpan');
            }
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
