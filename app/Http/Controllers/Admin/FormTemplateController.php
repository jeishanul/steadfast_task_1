<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FormTemplate;
use Illuminate\Http\Request;

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

    public function store(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

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

    public function update(Request $request, FormTemplate $formTemplate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

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
