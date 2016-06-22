<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Section extends Model
{
    //
    	use softDeletes;
        protected $table = 'sections';


        public function books()
        {
        	
        	return $this->hasMany('App\Books','section_id','id');

        }


}
