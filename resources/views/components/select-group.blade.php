<div class="form-group">
    <label for="{{ $id }}">
        {{ __($label) }}
        {!! $required ? '<span class="text-danger">*</span>' : '' !!}
    </label>

    <select class="form-control field_type @error($name) is-invalid @enderror" name="{{ $name }}"
        {{ $required ? 'required' : '' }} data-attribute="{{ $attribute }}" id="{{ $id }}">
        <option selected disabled>{{ __($placeholder) }}</option>
        {{ $slot }}
    </select>
    @error($name)
        <span class="text-danger d-block mt-1">{{ $message }}</span>
    @enderror
</div>
