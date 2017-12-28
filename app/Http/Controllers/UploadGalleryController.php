<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
class UploadGalleryController extends Controller
{
    // index
    public function index()
    {    
        $data["categories"] = DB::table('categories')
        ->where('active',1)
        ->get();
        
        $data["gallerys"] = DB::table('gallerys')
        ->join('categories' , 'categories.id', "=", "gallerys.category_id")
        ->select("gallerys.*", "categories.*", "gallerys.id as id")
        ->where('gallerys.active',1)
        ->where('categories.active',1)
        ->paginate(25);
        return view('upload_gallerys.index', $data);
    }

    // create
    public function create()
    {
        $data['categories'] = DB::table('categories')
        ->where('active',1)
        ->get();
        return view("upload_gallerys.create", $data);
    }
    // delete a user by his/her id
    public function delete($id)
    {
        DB::table('gallerys')->where('id', $id)->update(['active'=>0]);
        return redirect('/upload-gallery');
    }
    // insert image
    public function save(Request $r)
    {
        $gallerys=array();
        if($r->file('gallery')){ 
            $files = $r->file('gallery');
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                // resize image
                $image_resize = Image::make($name->getRealPath())->resize(120, 120)->save('uploads/gallerys/resizes'.$name);

                dd($image_resize);

                $description = pathinfo($name, PATHINFO_FILENAME);
                $destinationPath = 'uploads/gallerys/'; // usually in public folder
                
                $file->move($destinationPath, $name);
                $gallerys[]=$name;

                foreach($gallerys as $img) {
                    $product = array (
                        'gallery' => $img,
                        'description' => $description,
                        'category_id' => $r->category
                    );
                }
                $p = DB::table('gallerys')->insert($product);
            }
            $r->session()->flash("sms", "New upload gallery has been created successfully!");
            return redirect('/upload-gallery/create');
        } else  {
            $r->session()->flash("sms1", "Fail to upload new gallery, Please try again!");
            return redirect('/upload-gallery/create');
        }
    }
}
