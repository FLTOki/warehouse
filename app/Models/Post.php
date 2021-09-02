<?php

namespace App\Models;

use App\Mail\DeletedPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    const SEARCHABLE_FIELDS = ['id', 'title', 'price'];

    public function toSearchableArray()
    {
        return $this->only(self::SEARCHABLE_FIELDS);
    }
}
