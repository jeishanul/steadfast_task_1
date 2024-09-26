<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FieldTypes;
use App\Http\Controllers\Controller;
use App\Models\FormField;
use App\Models\FormTemplate;
use Illuminate\Http\Request;

class FormFieldController extends Controller
{
    public function create(FormTemplate $formTemplate)
    {
        $fieldTypes = FieldTypes::cases();
        return view('admin.form_field.create', compact('formTemplate', 'fieldTypes'));
    }

    public function store(Request $request, $formTemplateId)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'field_type' => 'required|in:' . implode(',', FieldTypes::cases()),
            'options' => 'nullable|json',
            'is_required' => 'boolean',
        ]);

        $formField = new FormField($validated);
        $formField->form_template_id = $formTemplateId;
        $formField->save();

        return redirect()->route('form_templates.index', $formTemplateId)->with('success', 'Form field created successfully');
    }

    public function edit($id)
    {
        $formField = FormField::findOrFail($id);
        return view('form_fields.edit', compact('formField'));
    }

    public function update(Request $request, $id)
    {
        $formField = FormField::findOrFail($id);
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'field_type' => 'required|in:text,textarea,checkbox,radio,select,number,date',
            'options' => 'nullable|json',
            'is_required' => 'boolean',
        ]);

        $formField->update($validated);
        return redirect()->route('form_templates.index', $formField->form_template_id)->with('success', 'Form field updated successfully');
    }

    public function destroy($id)
    {
        $formField = FormField::findOrFail($id);
        $formTemplateId = $formField->form_template_id;
        $formField->delete();
        return redirect()->route('form_templates.index', $formTemplateId)->with('success', 'Form field deleted successfully');
    }
}
