<div class="card-body">
    <x-input-group label="Template Name" type="text" name="name" id="name" placeholder="Enter your template name"
        value="{{ $formTemplate->name ?? old('name') }}" required />

    <x-textarea-group label="Description" type="text" name="description" id="description"
        placeholder="Enter your category description" value="{{ $formTemplate->description ?? old('description') }}" />
</div>
