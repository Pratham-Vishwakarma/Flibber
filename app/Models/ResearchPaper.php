<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchPaper extends Model
{
    use HasFactory;

    // You can define other properties or methods for your model here

    protected $fillable = [
        'title', 
        'description', 
        'file_path',
        'user_id', // Added user_id here
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function processedContent()
    {
        return $this->hasOne(ProcessedPaper::class);
    }

}
