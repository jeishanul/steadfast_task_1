<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FormTemplate;
use Illuminate\Http\Request;

class SubmittedFormController extends Controller
{
    public function index()
    {
        $formTemplates = FormTemplate::paginate(10);
        return view('user.submitted_form.index', compact('formTemplates'));
    }

    public function showForm(FormTemplate $formTemplate)
    {
        $formTemplate->load('formFields');
        return view('user.submitted_form.show', compact('formTemplate'));
    }

    public function storeSubmission(Request $request, FormTemplate $formTemplate)
    {
        $request->validate([
            'formFields' => 'required|array',
        ]);

        $submission = $request->user()->submittedForm()->create([
            'form_template_id' => $formTemplate->id,
        ]);

        $fields = collect($request->formFields)->map(function ($value, $key) {
            return [
                'form_field_id' => $key,
                'field_value' => $value,
            ];
        });

        $submission->formSubmissionData()->createMany($fields);

        return redirect()->route('user.submitted.forms.index')->with('success', 'Form submitted successfully');
    }
}
