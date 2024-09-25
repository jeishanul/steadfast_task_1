<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FormTemplate;
use Illuminate\Http\Request;

class FormFieldController extends Controller
{
    public function index(Category $category)
    {
        $formTemplates = $category->formTemplates;
        return view('admin.form_template.index', compact('formTemplates'));
    }

    public function create($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return view('admin.form_template.create', compact('category'));
    }

    public function store(Request $request, $categoryId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $formTemplate = new FormTemplate($validated);
        $formTemplate->category_id = $categoryId;
        $formTemplate->save();

        return redirect()->route('admin.form.template.index', $categoryId)->with('success', 'Form template created successfully');
    }

    public function edit($id)
    {
        $formTemplate = FormTemplate::findOrFail($id);
        return view('admin.form_template.edit', compact('formTemplate'));
    }

    public function update(Request $request, $id)
    {
        $formTemplate = FormTemplate::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $formTemplate->update($validated);
        return redirect()->route('form_templates.index', $formTemplate->category_id)->with('success', 'Form template updated successfully');
    }

    public function destroy($id)
    {
        $formTemplate = FormTemplate::findOrFail($id);
        $categoryId = $formTemplate->category_id;
        $formTemplate->delete();
        return redirect()->route('form_templates.index', $categoryId)->with('success', 'Form template deleted successfully');
    }
}
