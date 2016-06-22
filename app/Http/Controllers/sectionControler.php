<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Section;
use Auth;

class sectionControler extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showBooks($id)
    {
        //$sections  = Section::where('id',$id)->get();
         $section  = Section::find($id);
        /* $all_books = DB::table('sections')
                    ->join('books','sections.id','=','books.section_id')
                    ->where('sections.id',$id)
                    ->get(); */

        $all_books = $section->books;    
        $array_of_authors = [];
        $i = 0;

        foreach ($all_books as $book) {
                  
                  $array_of_authors  = array_add($array_of_authors,$i,
                           
                       /* DB::table('books')
                          ->join('books_authors_relationship','books.id','=','books_authors_relationship.book_id') 
                          ->join('authors','books_authors_relationship.author_id','=','authors.id')  
                          ->where('books.id',$book->id)
                          ->select('authors.first_name','authors.id')
                          ->get()); */
                        $book->authors()->select('authors.first_name','authors.id')->get());
                          $i++;  

              }      

        return view('books')->with('section',$section)
                            ->with('all_books',$all_books)
                            ->with('array_of_authors',$array_of_authors);

    }

    public function admin(){

    	//using query builder
    	//$sections = DB::table('sections')->get();
    	$sections  = Section::withTrashed()->get();
    	//$sections_count = Section::get()->count();

    	return view('admin')->with('sections',$sections);
    }


    public function create(Request $request){

        // validate 

    	$section_name = $request->input('section_name');
    	$file         = $request->file('image');
    	$path         = 'images';
    	$filename     = $file->getClientOriginalName();
    	$file->move($path,$filename);
    	
    	//using query builder
    	//DB::table('sections')->insert(['section_name'=>$section_name,'image_name'=>$filename]);
    	//Section::insert(['section_name'=>$section_name,'image_name'=>$filename]);
    	
    	$section = new Section();
    	$section->section_name = $section_name;
    	$section->image_name   = $filename;
    	$section->save();

        // how to add session
        session()->push('session_name','session_value');
        session()->push('session_name','session_value 2222222');
    	return redirect('library/admin');
    } 


    public function update(Request $request, $id){

    	$section_name =  $request->input('section_name');
    	//DB::table('sections')->where('id',$id)->update(['section_name'=>$section_name]);
    	//Section::where('id',$id)->update(['section_name'=>$section_name]);
    	
    	$section = Section::find($id);
    	$section->section_name = $section_name;
    	$section->save(); 

    	return redirect('library/admin');
    }


    public function delete($id){

    	//DB::table('sections')->where('id',$id)->delete();
    	//Section::where('id',$id)->delete();

    	$section = Section::find($id);
    	$section->delete();

    	//Section::destroy($id);

    	return redirect('library/admin');
    }


	public function restore($id){

		$section = Section::onlyTrashed()->find($id);
		$section->restore();

    	return redirect('library/admin');


	}

	public function deleteForever($id)
	{
		$section = Section::onlyTrashed()->find($id);
		$section->forceDelete();

    	return redirect('library/admin');
		
	}


}
