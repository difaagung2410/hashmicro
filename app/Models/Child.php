<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $guarded = [];

    use HasFactory;
    protected $table = 'childs';

    public function parent()
    {
        $this->hasOne(Parents::class, 'id', 'parent_id');
    }
}
