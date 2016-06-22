<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Author;
use App\Section;
use Auth;




class authorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAuthor($id)
    {

        $authors = Author::find($id);
       $author_books = $authors->books()->select('books.book_title')->get();


        return view('author')->with('authors',$authors)->with('author_books',$author_books);
    }

        public function index(){

        //$date  = date('Y-m-d');
        //$time  = date('H-i-s');
        //$arayofobjects = array('date' =>$date ,'time'=>$time );

        //$sections = DB::table('sections')->get();
        $sections  = Section::get();

        return view('welcome')->with('sections',$sections);
    }

}