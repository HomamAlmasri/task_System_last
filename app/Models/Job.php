<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public function tag(String $name)
    {
        $tag = Tag::firstOrcreate(['name' => $name]);

        $this->tags()->attach($tag);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }



    public function employer()
    {
        return  $this->belongsTo(Employer::class);
    }
}
