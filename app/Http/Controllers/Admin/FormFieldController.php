<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FieldTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormFieldRequest;
use App\Models\FormField;
use App\Models\FormTemplate;
use Illuminate\Http\Request;

class FormFieldController extends Controller
{
    public function create(FormTemplate $formTemplate)
    {
        $fieldTypes = FieldTypes::cases();
        $formTemplate->load('formFields');
        $fields = $formTemplate->formFields;
        return view('admin.form_field.create', compact('formTemplate', 'fields', 'fieldTypes'));
    }

    public function store(FormFieldRequest $request, FormTemplate $formTemplate)
    {
        // dd($request->all());
        $fields = collect($request->inputs)->map(function ($input) {
            return [
                'name' => strtolower(str_replace(' ', '_', $input['label'])),
                'label' => $input['label'],
                'type' => $input['field_type'],
                // 'options' => json_encode($input['options']),
                'is_required' => $input['is_required'],
            ];
        });

        $formTemplate->formFields()->delete();

        $formTemplate->formFields()->createMany($fields);

        return redirect()->route('admin.form.template.index', $formTemplate)->withSuccess(__('Form field created successfully'));
    }
}
