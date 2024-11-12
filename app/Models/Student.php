<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Relasi antara Student dan Grade
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    // Relasi antara Student dan Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
