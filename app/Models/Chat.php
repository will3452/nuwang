<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    const SEPARATOR = '!!*!19_19!_)*';
    protected $with = [
        'messages',
    ];
    protected $fillable = [
        'members',
    ];

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
