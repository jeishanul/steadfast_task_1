<?php

namespace App\Models;

use App\Enums\FieldTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'name',
        'label',
        'type',
        'options',
        'is_required',
    ];

    protected $casts = [
        'type' => FieldTypes::class,
    ];

    public function form()
    {
        return $this->belongsTo(FormTemplate::class);
    }
}
