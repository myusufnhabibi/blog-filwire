<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function scopePublished($query)
    {
        return $query->where("published_at", '<=', Carbon::now());
    }
    public function scopeFeatured($query)
    {
        return $query->where('featured', false);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function getReadingTime()
    {
        $min = round(str_word_count($this->body) / 250);
        return ($min < 1) ? 1 : $min;
    }
}
