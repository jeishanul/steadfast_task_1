<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormTemplateRequest;
use App\Models\Category;
use App\Models\FormTemplate;

class FormTemplateController extends Controller
{
    public function index(Category $category)
    {
        $formTemplates = $category->formTemplates()->paginate(10);;
        return view('admin.form_template.index', compact('formTemplates', 'category'));
    }

    public function create(Category $category)
    {
        return view('admin.form_template.create', compact('category'));
    }

    public function store(FormTemplateRequest $request, Category $category)
    {
        $request->user()->formTemplates()->create([
            'category_id' => $category->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.form.template.index', $category)->with('success', 'Form template created successfully');
    }

    public function edit(FormTemplate $formTemplate)
    {
        return view('admin.form_template.edit', compact('formTemplate'));
    }

    public function update(FormTemplateRequest $request, FormTemplate $formTemplate)
    {
        $formTemplate->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect()->route('admin.form.template.index', $formTemplate->category_id)->with('success', 'Form template updated successfully');
    }

    public function destroy($id)
    {
        $formTemplate = FormTemplate::findOrFail($id);
        $categoryId = $formTemplate->category_id;
        $formTemplate->delete();
        return redirect()->route('form_templates.index', $categoryId)->with('success', 'Form template deleted successfully');
    }
}
