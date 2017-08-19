@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12   ">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body"> 
                    <h2>Users list</h2> 
                    <a href="{{route('create-new-user')}}" class="btn btn-info"> Create a new user </a>
                    <hr>            
                    @if(!is_null($all_users) && count($all_users) > 0)
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>User Name</th>
                            <th>Nick name</th>
                            <th>Age</th>
                            <th>Added by</th>
                            <th>Created At</th>
                            <th>Last Updated At</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach( $all_users as $user)
                              <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->nick_name}}</td>
                                <td>{{$user->age}}</td>
                                <td>{{($user->addedUser != null) ? $user->AddedUser->name.' (You)' : 'User not found'}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{( $user->created_at != $user->updated_at )? $user->updated_at : 'no update'}}</td>
                                <td>
                                    @if($user->added_user == Auth::user()->id )
                                    <a class="btn btn-sm btn-warning" href="{{route('edit-user',$user->id)}}"> Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{route('destroy-user',$user->id)}}"> Delete</a>
                                    @else
                                        <small class="warning"> no permissions </small>
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                         
                        </tbody>
                    </table>  
                    @else
                        <h5 class="text-center">Nothing to show. Add some users first</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
