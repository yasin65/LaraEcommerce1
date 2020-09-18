@extends('admin_layout')
@section('admin_content')
<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					
				</li>
				
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Manufacture</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
				<form class="form-horizontal"action="{{url('/save_manufacture')}}" method="post">
	              @csrf
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Manufacture Name </label>
					 <div class="controls">
						<input type="text" class="input-xlarge" name="manufacture_name"required>
					  </div>
					</div>         
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Manufacture Description</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3"name="manufacture_description"required></textarea>
					  </div>
					</div>

					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Publication Status</label>
					  <div class="controls">
						<input type="checkbox" name="publication_status"value="1"required>
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Add Manufacture</button>
					 <button type="reset" class="btn"> <a href="{{URL::to('/dashboard')}}">Cancel</a></button>
					</div>
				  </fieldset>
				</form>  

					</div>
				</div><!--/span-->

			</div>
@endsection