@extends('admin_layout')
@section('admin_content')

			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
<p class="alert-success"style="font-size:20px;color:white;background: blue;">
	<?php 
	$update_category=Session::get('update_category');
	if($update_category){
		echo $update_category;
		Session::put('update_category',null);
	}
	?>
</p>

<p class="alert-success"style="font-size:20px;color:white;background: red;">
	<?php 
	$delete_category=Session::get('delete_category');
	if($delete_category){
		echo $delete_category;
		Session::put('delete_category',null);
	}
	?>
</p>



			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>


						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">

						  <thead>

							  <tr>
								  <th>Category Id</th>
								  <th>Category Name</th>
								  <th>Category Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
@foreach($all_category as $all_cat)

			<tr>
				<td>{{$all_cat->category_id}}</td>
				<td class="center">{{$all_cat->category_name}}</td>
				<td class="center">{{$all_cat->category_description}}</td>
				<td class="center">
					@if($all_cat->publication_status==1)
					<a class="btn btn-success" href="{{URL::to('unactive_category/'.$all_cat->category_id)}}">
						<i class=""></i><span class="label label-success">Active</span>  </a>
					@else
					<a class="label label-danger" href="{{URL::to('active_category/'.$all_cat->category_id)}}">
						<i class=""></i> <span class="label label-danger">Unactive</span>  	</a>
					@endif

				</td>
				<td class="center">
					<a class="btn btn-success" href="{{URL::to('/edit_category/'.$all_cat->category_id)}}">
						<i class="">Edit</i> 
					</a>
					<a class="btn btn-danger" href="{{URL::to('/delete_category/'.$all_cat->category_id)}}">
						<i class="">Delete</i> 
					</a>
				</td>
			</tr>
@endforeach

							
						  </tbody>
   
					  </table>        
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection