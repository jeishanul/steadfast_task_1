<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubmittedForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_template_id',
        'user_id',
    ];

    public function formTemplate(): BelongsTo
    {
        return $this->belongsTo(FormTemplate::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function formSubmissionData(): HasMany
    {
        return $this->hasMany(SubmittedFormData::class);
    }
}
