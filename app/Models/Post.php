<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';         //no need to do this if model name is same as table name.
    // protected $fillable = ['name','description'];
    protected $guarded =[];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category','category_id');   //(Model_path,foreign_key). hasMany and this is belongsTo.
    }
}
