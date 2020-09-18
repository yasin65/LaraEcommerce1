@extends('admin_layout')
@section('admin_content')

<form class="form-horizontal"action="{{url('update_category/'.$category_edit->category_id)}}" method="post">
	@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Category Name </label>
							 <div class="controls">
								<input type="text" class="input-xlarge" name="category_name"value="{{$category_edit->category_name}}">
							  </div>
							</div>         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3"name="category_description">{{$category_edit->category_description}}</textarea>
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Category</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form> 

@endsection