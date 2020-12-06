<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;
    protected $table = 'relations';
    public $timestamps = true;
    protected $fillable = [
        'parent',
        'child',
    ];
    // public function nodes()
    // {
    //     return $this->hasMany('App\Models\Node');
    // }
}
