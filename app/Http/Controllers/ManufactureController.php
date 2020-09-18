<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();
class ManufactureController extends Controller
{
    public function index(){
    	return view('admin.add_manufacture');
    }

     public function all_manufacture() {
		
		$all_manufacture = DB::table('tbl_manufacture')->get();
		return view('admin.all_manufacture', compact('all_manufacture'));
	}


    public function save_manufacture(Request $Request){
    	$data=array();
		$data['manufacture_id']=$Request->manufacture_id;
		$data['manufacture_name']=$Request->manufacture_name;
		$data['manufacture_description']=$Request->manufacture_description;
		$data['publication_status']=$Request->publication_status;

		DB::table('tbl_manufacture')->insert($data);
		Session::put('add_manufacture','Manufacture Added succuesfully');
		return Redirect::to('/add_manufacture');
    }

    public function unactive_manufacture($manufacture_id){
		DB::table('tbl_manufacture')
		->where('manufacture_id',$manufacture_id)
		->update(['publication_status'=>0]);
		return Redirect::to('/all_manufacture');
	}

	public function active_manufacture($manufacture_id){
		DB::table('tbl_manufacture')
		->where('manufacture_id',$manufacture_id)
		->update(['publication_status'=>1]);
		return Redirect::to('/all_manufacture');
	}
	public function edit_manufacture($manufacture_id){
		$manufacture_edit = DB::table('tbl_manufacture')->where('manufacture_id', $manufacture_id)->first();
		 // return response()->json($category_edit);
		return view('admin.edit_manufacture', compact('manufacture_edit'));		
	}
	public function update_manufacture(Request $Request,$manufacture_id){
		$data=array();
		$data['manufacture_name']=$Request->manufacture_name;
		$data['manufacture_description']=$Request->manufacture_description;

		DB::table('tbl_manufacture')
		->where('manufacture_id',$manufacture_id)
		->update($data);
		Session::put('update_manufacture','Mnufacture Updated succuesfully');
		return Redirect::to('/all_manufacture');
	}

	public function delete_manufacture($manufacture_id){

		$del=DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->delete();
		Session::put('delete_manufacture','Manufacture_id Deleted succuesfully');
		return Redirect::to('/all_manufacture');		
	}

}
