<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }
    
    public function enrolledUsers() {
        return $this->belongsToMany(User::class);
    }
    
}
