<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=['path','name'];
    public function imageable()
    {

        return $this->morphTo();
    }
}
