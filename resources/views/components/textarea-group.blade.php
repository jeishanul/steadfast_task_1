<div class="form-group">
    <label for="{{ $id }}">
        {{ __($label) }}
        {!! $required ? '<span class="text-danger">*</span>' : '' !!}
    </label>
    <textarea type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}" rows="10"
        placeholder="{{ __($placeholder) }}" name="{{ $name }}" {{ $required ? 'required' : '' }}>{{ $value }}</textarea>
    @error($name)
        <span class="text-danger d-block mt-1">{{ $message }}</span>
    @enderror
</div>
