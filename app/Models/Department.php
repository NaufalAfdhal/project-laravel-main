<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // If your table name is different from the plural form of the model name, specify it like this:
    // protected $table = 'departments'; // Uncomment this line if your table name is different

    // Specify the fillable columns to protect against mass-assignment vulnerabilities
    protected $fillable = [
        'name', // Add more fields if necessary
    ];

    /**
     * Get the students for the department.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
