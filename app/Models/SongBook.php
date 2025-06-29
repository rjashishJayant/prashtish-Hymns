<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $lyrics_id
 * @property string $lyrics_title
 * @property boolean $lyrics_status
 * @property string $lyrics_worshipper_name
 * @property string $lyrics_words
 * @property int $lyrics_cat_id
 * @property int $cat_id
 */
class SongBook extends Model
{
    protected $primaryKey = 'lyrics_id';
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;
}
