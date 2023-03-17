<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $guarded = [];

    use HasFactory;

    protected $table = 'parents';

    public function childs()
    {
        return $this->hasMany(Child::class, 'parent_id', 'id');
    }
}
