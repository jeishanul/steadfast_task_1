<?php

namespace App\Enums;

enum FieldTypes : string
{
    case TEXT = 'text';
    case EMAIL = 'email';
    case NUMBER = 'number';
    case DATE = 'date';
    case SELECT = 'select';
    case FILE = 'file';
    case RADIO = 'radio';
    case CHECKBOX = 'checkbox';
    case TEXTAREA = 'textarea';
}
