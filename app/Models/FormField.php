<?php

namespace App\Models;

use App\Enums\FieldTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormField extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'form_id',
        'name',
        'label',
        'type',
        'is_required',
    ];

    protected $casts = [
        'type' => FieldTypes::class,
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(FormTemplate::class);
    }
}
