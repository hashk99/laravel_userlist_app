<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestUser;
use App\Http\Requests\StoreTestUserRequest;
use Auth;
use Log;

class TestUserController extends Controller
{    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$all_users = TestUser::orderBy('id','desc')->get();
        return view('home',compact('all_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test_users.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestUserRequest $request)
    {

        try{

            $name = $request->input('name');
            $age = $request->input('age');
            $nick_name = $request->input('nick_name');

            $test_user = new TestUser();
            $test_user->name = $name;
            $test_user->age = $age;
            $test_user->nick_name = $nick_name;
            $test_user->added_user = null;
            $test_user->save();
            
            //$request->session()->flash('success', 'Task was successful!');
            return redirect()
                    ->route('view-all-testusers')
                    ->with('success', 'New user added successful!');

        }catch (\Exception $e) {
            Log::error( $e->getMessage() );
            $request->session()->flash('error', $e->getMessage() );
            return back()->withInput();
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$test_user = TestUser::find($id);
    	if(is_null( $test_user )){
        	return redirect()->route('view-all-testusers');
    	}
        if($test_user->added_user  != Auth::user()->id){
            return redirect()
                ->route('view-all-testusers')
                ->with('error', 'You do not have permissions to access this user');
        }

        return view('test_users.edit',compact('test_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTestUserRequest $request, $id)
    {

        try{

            $element = TestUser::find($id);
            if($element == null){
                return redirect()
                    ->route('view-all-testusers')
                    ->with('error', 'User not found !. please try again or refresh the page'); 
            } 
            if($element->added_user  != Auth::user()->id){
                return redirect()
                    ->route('view-all-testusers')
                    ->with('error', 'You do not have permissions to access this user');
            }

            $name = $request->input('name');
            $nick_name = $request->input('nick_name');
            $age = $request->input('age');

            $element->name = $name;
            $element->nick_name = $nick_name;
            $element->age = $age;
            $element->added_user = null;
            $element->save();
             
            return redirect()
                    ->route('view-all-testusers')
                    ->with('success', 'user updated successfully!');

        }catch (\Exception $e) {
            Log::error( $e->getMessage() );
            $request->session()->flash('error', $e->getMessage() );
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try{ 

            $element = TestUser::find($id);
            if($element == null || $element->added_user != Auth::user()->id){
                return redirect()
                    ->route('view-all-testusers')
                    ->with('error', 'user not found or you do not have access to delete this user !. please try again or refresh the page'); 
            }

            $element->delete();

            $request->session()->flash('success', 'Element Deleted !' );
              return redirect()
                    ->route('view-all-testusers')
                    ->with('success', 'user deleted !');
        }catch (\Exception $e) {

            Log::error( $e->getMessage() ); 
          
            return redirect()
                ->route('view-all-testusers')
                ->with('error', 'Something went wrong!. please try again or refresh the page'); 
        }
         
    }
}
