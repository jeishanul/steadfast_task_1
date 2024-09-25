<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmittedFormData extends Model
{
    use HasFactory;

    protected $fillable = [
        'submitted_form_id',
        'form_field_id',
        'field_value',
    ];

    public function submittedForm(): BelongsTo
    {
        return $this->belongsTo(SubmittedForm::class);
    }

    public function formField(): BelongsTo
    {
        return $this->belongsTo(FormField::class);
    }
}
