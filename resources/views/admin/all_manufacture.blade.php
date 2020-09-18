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
								  <th>Manufacture Id</th>
								  <th>Manufacture Name</th>
								  <th>Manufacture Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>

	@foreach($all_manufacture as $all_manu)

			<tr>
				<td>{{$all_manu->manufacture_id}}</td>
				<td class="center">{{$all_manu->manufacture_name}}</td>
				<td class="center">{{$all_manu->manufacture_description}}</td>
				<td class="center">
					@if($all_manu->publication_status==1)
					<a class="btn btn-success" href="{{URL::to('unactive_manufacture/'.$all_manu->manufacture_id)}}">
						<i class=""></i><span class="label label-success">Active</span></a>
					@else
					<a class="label label-danger" href="{{URL::to('active_manufacture/'.$all_manu->manufacture_id)}}">
						<i class=""></i> <span class="label label-danger">Unactive</span>  	</a>
					@endif

				</td>
				<td class="center">
					<a class="btn btn-success" href="{{URL::to('/edit_manufacture/'.$all_manu->manufacture_id)}}">
						<i class="">Edit</i> 
					</a>
					<a class="btn btn-danger" href="{{URL::to('/delete_manufacture/'.$all_manu->manufacture_id)}}">
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