<?php

namespace App\Http\Controllers;

use App\Vineinfo;
use Illuminate\Http\Request;
use Session;
use DB;
use Hash;
use Auth;
use Redirect;
use View;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //print_r($_SESSION);
        
        $vines = DB::table('vine_info')->paginate(3);
        
        //print_r($vines);
        return View::make('welcome',compact('vines'));
    }

    public function show($id)
    {
        $bottle = Vineinfo::find($id);
       // print_r($bottle);die;
        
        return View::make('show',compact('bottle'));
    }
	
	public function update(Request $request, $id){
		
        if(Auth::guest())
        {
            return redirect('/home');
        }

		$bottle = Vineinfo::find($id);

        if(!empty($_POST))
            {
                $name = $request['name'];
                $grapes = $request['grapes'];
                $country = $request['country'];
                $region = $request['region'];
                $year = $request['year'];
                $notes = $request['notes'];

                $bottle->created_by = Auth::user()->id;
                $bottle->name = $name;
                $bottle->grapes = $grapes;
                $bottle->country = $country;
                $bottle->region = $region;
                $bottle->year = $year;
                $bottle->notes = $notes;


                if(Input::file())
                {
          
                    $image = Input::file('image');
                    $filename  = time() . '.' . $image->getClientOriginalExtension();

                    $path = public_path('assets/images/' . $filename);
                        
                    $request->image->move(public_path('assets/images/'), $filename);
                   // Image::make($image->getRealPath())->save($path);
                    $bottle->image = $filename;
                }

                Session::flash('message', 'Successfully updated!');

                $bottle->save();
                
            }

        return View::make('update',compact('bottle'));

   }

   public function delete($id)
   {
        if(Auth::guest())
        {
            return redirect('/home');
        }

        Vineinfo::find($id)->delete();

        return redirect('/home');
   }
}
