<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * Fillable fields.
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'path',
        'thumbnail_path'
    ];

    /**
     * Relationship File with Tag.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}