<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable=['text','email','name','published'];

    public function remove()
    {
        $this->delete();
    }
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
    public static function add($fields)
    {
        $guests = new static;
        $guests->fill($fields);
        $guests->save();

        return $guests;
    }
}
