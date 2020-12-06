<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;
    protected $table = 'nodes';
    public $timestamps = true;

    public function parents()
    {
        return $this->hasMany('App\Models\Relation','parent');
    }
        
    public function childs()
    {
        return $this->hasMany('App\Models\Relation','child');
    }

    public function graph()
    {
        return $this->belongsTo('App\Models\Graph');
    }

}
