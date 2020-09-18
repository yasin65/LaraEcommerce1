<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index(){
   	return view('login');
   }
   public function dashboard(){
   	return view('admin.dashboard');
   }

   public function admin_dashboard(Request $Request){
		$admin_email=$Request->admin_email;
		$admin_password=md5($Request->admin_password);
		$data=DB::table('tbl_admin')
		->where('admin_email',$admin_email)
		->where('admin_password',$admin_password)
		->first();
		
		if ($data) {
			Session::put('admin_name',$data->admin_name);
			Session::put('admin_id',$data->admin_id);
			return Redirect::to('/dashboard');
		}else{
			Session::put('msg','invalid email or password');
			return Redirect::to('/admin');
		}

	}


}
