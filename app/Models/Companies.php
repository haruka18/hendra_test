<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'nama',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Companies::class, 'parent_id', 'id');
    }

    public function childs()
    {
        return $this->hasMany(Companies::class, 'id', 'parent_id');
    }
}
