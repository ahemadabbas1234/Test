<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Redirect;

class Logincontroller extends Controller
{
    function login(Request $req)
    {

        $username = $req->input('email');
        $password = $req->input('password');

        // dd($username,$password);

        $usercheck = DB::table('user')->select('username','email_id','password')->where('email_id',$username)->where('password',$password)->get();

         
        if(count($usercheck) > 0)
        {
          $req->session()->put('username',$usercheck[0]->username);

          return redirect::to('/');
         
        }
        else
        {
                ?>
                   <script type="text/javascript">
                       alert("Enter Valid Username Or Password.");
                       window.history.go(-1);
                   </script>
                <?php
        }

        // return redirect('login');
    }

    function user_data()
    {
       $all_data = DB::select("SELECT * FROM user ");

       return view('/add_user',['data' => $all_data]);
    }

    function addUser(Request $req)
    {
       $array = array("username" => $req->input('username'),"mobile_no" => $req->input('mobileno'),"email_id" => $req->input('email'),"password" => $req->input('password'));

       DB::table('user')->insert($array);

       echo json_encode(array("response" => true));

       $req->session()->flash('message','Add successfully...!');    


       // return Redirect::to('/add_user')->with('message', 'Add successfully...!');
    }

    function delete($id)
    {
       DB::table('user')->where('id',$id)->delete();

       return Redirect::to('/add_user')->with('message', 'Delete successfully...!');
    }

    function update($id)
    {
       // $single_data = DB::select("SELECT * FROM user WHERE id = '$id' ");
       $single_data = DB::table('user')->where('id',$id)->get();

       return view('/update_user',['single_data' => $single_data]);
    }

    function update_user_post_co(Request $req)
    {

       $array = array("username" => $req->input('username_update'),"mobile_no" => $req->input('mobileno_update'),"email_id" => $req->input('email_update'),"password" => $req->input('password_update'));

       $id = $req->input('hidden_id');

       DB::table('user')->where('id',$id)->update($array);

       return Redirect::to('/add_user')->with('message', 'Update successfully...!');
    }
}
