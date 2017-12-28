<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
class SlideshowController extends Controller
{
    // index
    public function index()
    {    
        $data['slideshows'] = DB::table('slideshows')
        ->where('active',1)
        ->get();
        return view('slideshow.index' , $data);
    }

    // create
    public function create()
    {
        return view("slideshow.create");
    }

    // delete a user by his/her id
    public function delete($id)
    {
        DB::table('slideshows')->where('id', $id)->update(['active'=>0]);
        return redirect('/slideshow');
    }
    // insert
    public function save(Request $r)
    {
        $file_name = '';
        if($r->slideshow) {
            $file = $r->file('slideshow');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'uploads/slideshows';
            $file->move($destinationPath, $file_name);
        }
        $data['image'] = $file_name;
        $sms = "The new slideshow has been created successfully.";
        $sms1 = "Fail to create the new slideshow, please check again!";
        $i = DB::table('slideshows')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/slideshow/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/slideshow/create')->withInput();
        }
    }
}
