<?php

namespace App\Http\Controllers;

use App\Vineinfo;
use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
   public function index()
   {
   		//$vines = DB::table('users')->get();

        if(!Auth::guest() && Auth::user()->type == 'admin' )
        {
            return redirect('/admin/create');
        }
         
        return view('admin/login');
   		
   }


   public function create(Request $request)
   {

	    if(!Auth::guest() && Auth::user()->type == 'admin' )
	    {
	    	//
	    	if(!empty($_POST))
	    	{
	    		$name = $request['name'];
	    		$grapes = $request['grapes'];
	    		$country = $request['country'];
	    		$region = $request['region'];
	    		$year = $request['year'];
	    		$notes = $request['notes'];

	    		$vine_info = new Vineinfo;

	    		$vine_info->created_by = Auth::user()->id;
	    		$vine_info->name = $name;
	    		$vine_info->grapes = $grapes;
	    		$vine_info->country = $country;
	    		$vine_info->region = $region;
	    		$vine_info->year = $year;
	    		$vine_info->notes = $notes;

	    		if(Input::file())
		        {
		  
		            $image = Input::file('image');
		            $filename  = time() . '.' . $image->getClientOriginalExtension();

		            $path = public_path('assets/images/' . $filename);
		 				
		        	$request->image->move(public_path('assets/images/'), $filename);
		           // Image::make($image->getRealPath())->save($path);
		            $vine_info->image = $filename;
		        }

	    		$vine_info->save();
	    		//print_r($vine_info);
                
	    		//print_r($_POST);die;
	    	}
	        return view('Admin.create')->with('success','Saved successfully.');
	    }
	    else
	    {
	    	Auth::logout();
	    	return redirect('/admin');
	    }
     	
   }


   public function store(Request $request)
   {
   	  
   	  if(Auth::attempt(['email' => $_POST['email'], 'password' => $_POST['password']]))
   	  {
   	  		return redirect('/admin/create');
   	  }
   	  else
   	  {
   	  		return redirect('/admin');
   	  }

   }


   public function show($id){
      echo 'show';
   }
   public function edit($id){
      echo 'edit';
   }
   public function update(Request $request, $id){
      echo 'update';
   }
   public function destroy($id){
      echo 'destroy';
   }
}
