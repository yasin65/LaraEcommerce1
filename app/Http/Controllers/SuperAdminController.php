<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SuperAdminController extends Controller
{
	public function index(){
		// Session::put('admin_name',null);
		// Session::put('admin_id',null);
		Session::flush();
		return Redirect::to('/admin');
	}
	

}
