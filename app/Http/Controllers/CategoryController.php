<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();


class CategoryController extends Controller
{
    public function index(){
    	return view('admin.add_category');
    }


    public function all_category() {
		
		$all_category = DB::table('tbl_category')->get();
		return view('admin.all_category', compact('all_category'));
	}


    public function save_category(Request $Request){
		$data=array();
		$data['category_id']=$Request->category_id;
		$data['category_name']=$Request->category_name;
		$data['category_description']=$Request->category_description;
		$data['publication_status']=$Request->publication_status;

		DB::table('tbl_category')->insert($data);
		Session::put('add_category','Category Added succuesfully');
		return Redirect::to('/add_category');
		
	}

	public function unactive_category($category_id){
		DB::table('tbl_category')
		->where('category_id',$category_id)
		->update(['publication_status'=>0]);
		return Redirect::to('/all_category');
	}

	public function active_category($category_id){
		DB::table('tbl_category')
		->where('category_id',$category_id)
		->update(['publication_status'=>1]);
		return Redirect::to('/all_category');
	}

	public function edit_category($category_id){
		$category_edit = DB::table('tbl_category')->where('category_id', $category_id)->first();
		 // return response()->json($category_edit);
		return view('admin.edit_category', compact('category_edit'));	
	}

	public function update_category(Request $Request,$category_id){
		$data=array();
		$data['category_name']=$Request->category_name;
		$data['category_description']=$Request->category_description;

		DB::table('tbl_category')
		->where('category_id',$category_id)
		->update($data);
		Session::put('update_category','Category Updated succuesfully');
		return Redirect::to('/all_category');
	}

	public function delete_category($category_id){

		$del=DB::table('tbl_category')->where('category_id',$category_id)->delete();
		Session::put('delete_category','Contact Deleted succuesfully');
		return Redirect::to('/all_category');	
	}

}
