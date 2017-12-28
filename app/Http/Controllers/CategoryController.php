<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
class CategoryController extends Controller
{
    // index
    public function index()
    {    
        $data["categories"] = DB::table('categories')
        ->where('active',1)
        ->paginate(18);
        return view('categories.index', $data);
    }

    // create
    public function create()
    {
        return view("categories.create");
    }

    // create
    public function edit($id)
    {
        $data['category'] = DB::table('categories')
        ->where('active',1)
        ->where('id', $id)
        ->first();
        return view("categories.edit", $data);
    }
     // update 
     public function update(Request $r)
     {
         $data = array(
             'name' => $r->name
         );
        
         $i = DB::table('categories')->where('id', $r->id)->update($data);
 
         $r->session()->flash('sms', 'All changes have been saved successfully!');
         return redirect('/category/edit/'.$r->id);
     }
    // delete a user by his/her id
    public function delete($id)
    {
        
        DB::table('categories')->where('id', $id)->update(['active'=>0]);
        return redirect('/category');
    }
    // insert
    public function save(Request $r)
    {
        $data = array(
            "name" => $r->name
        );
        $i = DB::table('categories')->insert($data);
        if($i)
        {
            $r->session()->flash("sms", "New category has been created successfully!");
            return redirect("/category/create");
        }
        else{
            $r->session()->flash("sms1", "Fail to create new category!");
            return redirect("/category/create")->withInput();
        }
    }
}
