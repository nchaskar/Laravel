<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MyController extends Controller
{
   public function index(){

   		//$pdo = DB::connection()->getPdo();
   		$vines = DB::table('users')->get();
   		print_r($vines);
      	echo 'index';
   }
   public function create(){
      echo 'create';
   }
   public function store(Request $request){
      echo 'store';
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
