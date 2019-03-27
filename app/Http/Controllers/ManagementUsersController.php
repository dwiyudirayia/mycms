<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\ManagementUsersRequest;
use Hash;
use DataTables;
use Auth;

class ManagementUsersController extends Controller
{
    public function usersIndex()
    {
        return view('admin.managementUsers.usersIndex');
    }
    public function createUsers()
    {        
        return view('admin.managementUsers.createUsers');
    }
    // public function callAPI($method, $url, $data){
    //     $curl = curl_init();
    //     switch ($method){
    //         case "POST":
    //             curl_setopt($curl, CURLOPT_POST, 1);
    //             if ($data)
    //             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //         break;
    //         case "PUT":
    //             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    //             if ($data)
    //                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
    //             break;
    //         default:
    //         if ($data)
    //         $url = sprintf("%s?%s", $url, http_build_query($data));
    //     }     
    //     // OPTIONS:
    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, array(        
    //         'Content-Type: application/json',
    //     ));
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     // EXECUTE:
    //     $result = curl_exec($curl);
    //     if(!$result){die("Connection Failure");}
    //     curl_close($curl);
    //     return $result;
    // }
    // public function getApi()
    // {
        // $get_data = $this->callAPI('GET', 'http://curl.mandira.id/api/book', false);
        // $response = json_decode($get_data, true);
        // $manipulateArray = $response['produk'];
        
        // $collection = collect($manipulateArray);
        // $filtered = $collection->filter(function ($item) {
        //     return $item['kategori'] =="RECOMENDASI" OR $item['kategori'] =="REKOMENDASI";
        // });
        
        // foreach ($filtered as $key => $value) {
        //     echo $value['kode_paket'];
        // }
        // foreach($manipulateArray as $key => $value)
        // {
        //     if($manipulateArray[$key]['kategori'] === "RECOMENDASI")
        //     {
        //         $manipulateArray[$key]['kategori'] = str_replace("RECOMENDASI","REKOMENDASI","RECOMENDASI");
        //     }
        // }        
        // $collection = collect($manipulateArray);
        
        // $filtered = $collection->where('kategori','REKOMENDASI');
        
        // foreach($filtered as $value)
        // {
        //     echo $value['kode_paket']."<br>";
        // }
    // }
    public function getUsers()
    {
        $getUser = User::select(['id', 'name'])->where('id', '!=', Auth::user()->id)->get();

        return Datatables::of($getUser)
            ->addColumn('action',function($user){
                return view('admin.managementUsers.buttonRole',['user' => $user])->render();
            })
            ->make(true);
    }
    public function storeUsers(ManagementUsersRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('usersIndex');
    }
    public function destroyUsers($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
    public function editUsers($id)
    {
        $user = User::findOrFail($id);
        return response($user,200);
    }
    public function updateUsers(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
    }
}