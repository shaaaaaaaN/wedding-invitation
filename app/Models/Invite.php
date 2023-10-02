<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;

    public function relationship()
    {
        // return $this->belongsTo(Relationship::class, 'relationship_id');
        return $this->belongsTo('App\Models\Relationship');
        return $this->belongsTo("App\Models\User");
    }

}