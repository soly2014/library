<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
        protected $table = 'authors';


            public function books()
            {
            	return $this->belongsToMany('App\Books','books_authors_relationship','author_id','book_id');
            }

}
