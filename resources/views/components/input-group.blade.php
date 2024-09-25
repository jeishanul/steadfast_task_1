<div class="form-group">
    <label for="{{ $id }}">
        {{ __($label) }}
        {!! $required ? '<span class="text-danger">*</span>' : '' !!}
    </label>
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}" placeholder="{{ __($placeholder) }}"
        name="{{ $name }}" value="{{ $value }}" {{ $required ? 'required' : '' }} />
    @error($name)
        <span class="text-danger d-block mt-1">{{ $message }}</span>
    @enderror
</div>
