@extends('admin_layout')
@section('admin_content')

               <form class="form-horizontal"action="{{url('/save_category')}}" method="post">
	              @csrf
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Category Name </label>
					 <div class="controls">
						<input type="text" class="input-xlarge" name="category_name"required>
					  </div>
					</div>         
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Category Description</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3"name="category_description"required></textarea>
					  </div>
					</div>

					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Publication Status</label>
					  <div class="controls">
						<input type="checkbox" name="publication_status"value="1"required>
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Add Category</button>
					  <button type="reset" class="btn">Cancel</button>
					</div>
				  </fieldset>
				</form> 
			

@endsection