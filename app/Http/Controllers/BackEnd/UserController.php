<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Validator;

class UserController extends Controller
{
    public function view(){
        $all_user = User::all();
        return view('BackEnd.User.view_users', compact('all_user'));
    }

    public function add(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_role = $request->user_role;
        $user->save();
        return response()->json($user);
    }

    public function getdata(){
        // $user = User::find($id);
        // return response()->json($user);
        dd('ok');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'password' => 'required|max:191',
            'user_role' => 'required|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $user = new User();
           
           $data = $request->input('image');
           $name = $data.getClientOriginalName();
         
        //    $user->name = $request->input('name');
        //    $user->email = $request->input('email');
        //    $user->password = Hash::make($request->input('password'));
        //    $user->user_role = $request->input('user_role');
        //    $user->save();

        //     return response()->json([
        //         'status'=>200,
        //         'message'=>'User Added Successfully'
        //     ]);
        }
    }

    public function fetch_user(){
        $users = User::all();
        return response()->json([
            'users' => $users
        ]);
    }

    public function edit_user(Request $request){
        $id = $request->user_id;
        $user = User::find($id);
        
        if($user){
            return response()->json([
                'status' => 200,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Not Found'
            ]);
        }

    }

    public function update_user(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'user_role' => 'required|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $id = $request->input('user_id');
            $user = User::find($id);  
            
            if($user){
                $user->name = $request->input('name');
           $user->email = $request->input('email');
           $user->user_role = $request->input('user_role');
           $user->save();
            return response()->json([
                'status'=>200,
                'message'=>'User Updated Successfully'
            ]);
        } else {
            return response()->json([
                'status'=>404,
                'message'=>'User Not Found'
            ]);
        }

        }
    }
}