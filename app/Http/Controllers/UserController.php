<?php

namespace App\Http\Controllers;

use App\User;
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
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
     
        if ($request->ajax()) {
            if (session()->get('level') == 1){
                    $data = User::latest('id')->get();
            }else{
                $user = session()->get('user');
                $data = User::where('user',$user)->get();
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem"><i class="fas fa-user-edit"></i>  Edit</a>';
                        // $btn =  $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="show btn btn-info btn-sm showItem"><i class="fas fa-user-alt"></i>  Show</a>';
                        if (session()->get('level') == 1){
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-user-times"></i>  Delete</a>';
                        }
                        return $btn;
                    })
                    ->addColumn('status', function($row){
                        if ($row->status == 1){
                            $status ="Aktive";    
                        
                        }else{
                           $status ="Tidak Aktive" ; 
                        }
                        return $status;
                    })
                    ->addColumn('level', function($row){
                        if ($row->level == 1){
                            $level ="Admin";    
                        
                        }else{
                           $level ="User" ; 
                        }
                        return $level;
                    })
                    ->rawColumns(['action','level','status'])
                    ->make(true);
        }
        $page = "user";
        return view('user.index',compact('page'));
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
       if(empty($request->id)){
        $validator = Validator::make($request->all(), [
            'user' => 'required|unique:users',
            'password' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'level' => 'required'
        ]);
        if ($validator->passes()) {
            $post = User::updateOrCreate(['id' => $request->id], [
                'user' => $user,
                'password' => Hash::make($request->password),
                'nama' => $request->nama,
                'status' => $request->status,
                'level' => $request->level,
                'created_at' => new \DateTime()
            ]);
              return response()->json(['success'=>'Data User Berhasil Di Simpan.']);
              
        }
       }else{
        $validator = Validator::make($request->all(), [
            // 'user' => 'required|unique:users',
            'password' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'level' => 'required'
        ]); 
            if ($validator->passes()) {
                $post = User::updateOrCreate(['id' => $request->id], [
                    // 'user' => $user,
                    'password' => Hash::make($request->password),
                    'nama' => $request->nama,
                    'status' => $request->status,
                    'level' => $request->level,
                    'created_at' => new \DateTime()
                ]);
                return response()->json(['success'=>'Data User Berhasil Di Simpan.']);
                
            }
        }
        return response()->json(['error'=>$validator->errors()->all()]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $delete = User::find($id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Data User Berhasil Di Delete!";
        } else {
            $success = true;
            $message = "User Tidak Ada";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
        // User::find($id)->delete();
     
        // return response()->json(['success'=>'User deleted successfully.']);
    }
}
