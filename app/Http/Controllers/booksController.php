<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Books;
use Auth;


class booksController extends Controller
{


	public function create(Request $request,$id)
	{
		
        $auther_id = 1;
        $author_two = $request->input('author_two');

        $auther2    = DB::table('authors')
                                ->where('first_name',$author_two)
                                ->select('id')
                                ->first();


	    $book_title       = $request->input('book_title');
	    $book_edition     = $request->input('book_edition');
        $book_description = $request->input('book_description');
    	$section_id       = $id;
    	
    	//$books = new Books();
    	//$books->book_title         = $book_title;
       // $books->book_edition       = $book_edition;
       // $books->book_description   = $book_description;
       // $books->section_id         = $id;
    	//$books->save();

         $ID_Book  =   DB::table('books')
                                ->insertGetId(['book_title'=>$book_title,
                                               'book_edition'=>$book_edition,
                                               'book_description'=>$book_description,
                                               'section_id'    =>$section_id]);

        if ($auther2 != null) {
            // insert the two authors id db
            // insert in intermediate table
            $auther2_id = $auther2->id;
            DB::table('books_authors_relationship')
                                                ->insert([
                                                           ['book_id'=>$ID_Book,'author_id'=>$auther_id],
                                                           ['book_id'=>$ID_Book,'author_id'=>$auther2_id]
                                        ]);
        }else{
           
            DB::table('books_authors_relationship')
                                                ->insert(
                                                    ['book_id'=>$ID_Book,'author_id'=>$auther_id]);

       // insert the single author has been authanticated id db
      // insert in intermediate table

        }
        
        return redirect()->route('books',[$id]);

	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        public function update(Request $request, $id){

        $book_title       = $request->input('book_title');
        $book_edition     = $request->input('book_edition');
        $book_description = $request->input('book_description');
        $book_id          = $request->input('book_id');
        //DB::table('sections')->where('id',$id)->update(['section_name'=>$section_name]);
        //Section::where('id',$id)->update(['section_name'=>$section_name]);
        
        $books = Books::find($book_id);
        $books->book_title       = $book_title;
        $books->book_edition     = $book_edition;
        $books->book_description = $book_description;
        $books->save(); 

        return redirect()->route('books',[$id]);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////    
    public function delete(Request $request, $id){

        //DB::table('sections')->where('id',$id)->delete();
        //Section::where('id',$id)->delete();
        $book_id          = $request->input('book_id');

        $book = Books::find($book_id);
        $book->delete();

        //Section::destroy($id);

        return redirect()->route('books',[$id]);
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function summery()
    {
        $results = Books::with('section')->with('authors')->get();

        return view('summery',compact('results',$results));
    }


}