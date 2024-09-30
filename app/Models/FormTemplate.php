<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'category_id',
        'name',
        'description'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function formFields(): HasMany
    {
        return $this->hasMany(FormField::class);
    }

    public function submittedForm(): HasMany
    {
        return $this->hasMany(SubmittedForm::class);
    }
}
