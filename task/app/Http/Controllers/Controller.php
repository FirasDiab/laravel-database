<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function Read(){
        $show = User::all();
        return view('show',compact('show'));
    }

//    public function Show($id){
//        $showOne = User::findOrFail($id);
//        return view('showOne',compact('showOne'));
//    }

    public function Edit($id){
        $user = User::findOrFail($id);
        return view('edit',compact('user'));
    }

//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'mobile' => ['required', 'string', 'digits:14'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);
//    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
//00000778870794
    public function Update(Request $request, $id){
          User::where('id',$id)->update([
           'name' => $request['name'],
            'mobile' => $request['mobile'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
//        $user = User::find($id);
//
//        $user->email = $request->input('email');
//        $user->name = $request->input('name');
//        $user->mobile = $request->input('mobile');
//        $user->password = $request->input('password');
//
//        $user->save();



    }

    public function Delete($id){
        User::where('id',$id)->delete();
    }
}
