<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasSlug;

    protected $fillable=['title','slug','description','content','image','published','viewed','created_by','modified_by'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public static function add($fields)
    {
        $news = new static;
        $news->fill($fields);
        $news->save();

        return $news;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->remImg();
        $this->delete();
    }

    public function remImg()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function upImg($image)
    {
        if($image == null) { return; }

        $this->remImg();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImg()
    {

        return '/uploads/' . $this->image;

    }

}
