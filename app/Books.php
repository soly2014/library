<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //
            protected $table = 'books';

          
            public function section()
            {

            	// the foriegn key should be written before the another key
            	return $this->belongsTO('App\Section','section_id','id');
            }


            public function authors()
            {
            	return $this->belongsToMany('App\Author','books_authors_relationship','book_id','author_id');
            }

}

