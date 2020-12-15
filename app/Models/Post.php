<?php
/// HOOKS events tway ko Model mr lr tone lo ya.. Create event yway m lr br nyr yway loh yat tal
namespace App\Models;

use App\Mail\PostStored;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    protected static function booted()              // got it from Eloquent ORM doc events laravel
    {
        static::created(function ($post) {
            Mail::to('kothaung@gmail.com')->send(new PostStored($post)); // PostStored ka xml (manual). PostCreated (markdown built)
        });
        static::updated(function ($post) {
            Mail::to('kothaung@gmail.com')->send(new PostStored($post)); // PostStored ka xml (manual). PostCreated (markdown built)
        });
    }
}
