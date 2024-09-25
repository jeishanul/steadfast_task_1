<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
        'description'
    ];

    public function formTemplates()
    {
        return $this->hasMany(FormTemplate::class);
    }
}
