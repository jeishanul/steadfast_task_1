<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FormTemplate;
use App\Models\SubmittedForm;
use App\Models\SubmittedFormData;
use Illuminate\Http\Request;

class SubmittedFormController extends Controller
{
    public function index()
    {
        $submissions = request()->user()->submittedForms;
        return view('user.submitted_forms.index', compact('submissions'));
    }

    public function showForm($formTemplateId)
    {
        $formTemplate = FormTemplate::with('formFields')->findOrFail($formTemplateId);
        return view('form_submissions.show', compact('formTemplate'));
    }

    public function storeSubmission(Request $request, $formTemplateId)
    {
        $formTemplate = FormTemplate::with('formFields')->findOrFail($formTemplateId);
        $submission = new SubmittedForm([
            'user_id' => $request->user()->id,
            'form_template_id' => $formTemplateId,
        ]);
        $submission->save();

        foreach ($formTemplate->formFields as $field) {
            $value = $request->input('field_' . $field->id);
            SubmittedFormData::create([
                'form_submission_id' => $submission->id,
                'form_field_id' => $field->id,
                'field_value' => $value,
            ]);
        }

        return redirect()->route('user.submitted.forms.index')->with('success', 'Form submitted successfully');
    }

    public function showSubmission(SubmittedForm $submittedForm)
    {
        $submission = $submittedForm->load('formSubmissionData');
        return view('user.form_submissions.show', compact('submission'));
    }
}
