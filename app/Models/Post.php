<?php

namespace App\Models;

use App\Mail\DeletedPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function mail(User $user)
    // {
    //     Mail::to($user['email'])->send(new DeletedPost());
    // }
}
