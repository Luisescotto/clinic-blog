<?php

namespace App;

use App\Notifications\PostNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use App\User;

class Post extends Model
{
    use Notifiable;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'excerpt',
        'body',
        'category_id',
        'iframe',
        'published_at',
    ];

    protected $dates = [
        'published_at',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function my_store($request){
        $post = self::create($request->all()+[
           'slug'=> Str::slug($request->title, '_'),
           'published_at'=> Carbon::now(),
        ]);
        self::make_post_notification($post);
        return $post;
    }

    public function my_update($request){
        if ($request->published_at) {
            $this->update($request->all()+[
                'slug'=> Str::slug($request->title, '_'),
            ]);
        }else{
            $request->merge([
                'published_at' => Carbon::now(),
            ]);

            $this->update($request->all()+[
                'slug'=> Str::slug($request->title, '_'),
            ]);
        }
        $this->tags()->sync($request->get('tags'));        
    }

    public function post_status(){
        if($this->status == 'Public'){
            return [
                'color' => 'success',
                'text' => 'Público'
            ];
        }elseif($this->status == 'Hidden'){
            return [
                'color' => 'secondary',
                'text' => 'Oculto'
            ];
        }elseif($this->status == 'Draft'){
            return [
                'color' => 'primary',
                'text' => 'Borrador'
            ];
        }elseif($this->status == 'Program'){
            return [
                'color' => 'info',
                'text' => 'Programado'
            ];
        } 
    }


    static function make_post_notification($post){
        User::role(['Client'])->each(function(User $user) use ($post){
            $user->notify(new PostNotification($post));
        });
    }
    
}
