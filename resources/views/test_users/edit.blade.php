@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body"> 
                    <h2>Update the user</h2> 
                    <a href="{{route('view-all-testusers')}}" class="btn btn-info">View all users </a>
                    <hr> 
                    @if ($errors->any()) 
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif 
					<form method="POST" class="form-horizontal js_input_form" id="edit_task_form" action="{{route('update-user',$test_user->id)}}" >
			            {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
			            <div class="form-group">
			                <label for="task_name" class="col-sm-2 control-label">name </label>
			                <div class="col-sm-5">
			                    <input type="text" class="form-control" id="task_name" name="name"  placeholder="   name " value="{{ (old('name') != null) ? old('name') : $test_user->name }}">
			                    <span class="help-block">update the user name here</span>
			                </div>
			            </div>
			            <div class="form-group">
			                <label for="nick_name" class="col-sm-2 control-label"> Nick name </label>
			                <div class="col-sm-5">
			                    <textarea class="form-control" id="nick_name" name="nick_name"  rows="3">{{ (old('nick_name') != null) ? old('nick_name') : $test_user->nick_name }}</textarea> 
			                </div>
			            </div>
			            <div class="form-group">
			                <label for="age" class="col-sm-2 control-label">Age </label>
			                <div class="col-sm-5">
			                  	<select name="age" class="form-control">
			                  		<?php $i = 1;
			                  			while($i <= 10){ ?>
			                  				<option value="{{$i}}" @if($test_user->age == $i) selected @endif>{{$i}}</option>
			                  		<?php $i++;} ?>

			                  	</select>
			                </div>
			            </div>
			            <div class="col-sm-offset-2">
			                <button type="submit" class="btn btn-primary">Update</button>
			                <button type="reset" class="btn btn-default">Reset </button>
			            </div>
		        	</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection