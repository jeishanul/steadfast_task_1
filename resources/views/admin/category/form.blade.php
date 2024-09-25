<div class="card-body">
    <x-input-group label="Name" type="text" name="name" id="name" placeholder="Enter your category name"
        value="{{ $category->name ?? old('name') }}" required />

    <x-textarea-group label="Description" type="text" name="description" id="description"
        placeholder="Enter your category description" value="{{ $category->description ?? old('description') }}" />
</div>
