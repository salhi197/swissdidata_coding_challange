<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    use HasFactory;
    protected $table = 'graphs';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'description',
    ];

    public function nodes()
    {
        return $this->hasMany('App\Models\Node');
    }
}
