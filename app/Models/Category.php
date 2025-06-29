<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $cat_name
 * @property string $cat_status
 * @property string $cat_desc
 * @property \DateTime|string|null $created_at
 */
class Category extends Model
{
    protected $primaryKey = 'cat_id';
    protected $guarded = [];
    public $timestamps = false;

    use HasFactory;
}
