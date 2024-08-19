<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        "title",
        "discription",
        "employer_name",
        "project",
        "time_expected",
        "priority",
        "updated_at",
        "created_at"
    ];
    use HasFactory;
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
