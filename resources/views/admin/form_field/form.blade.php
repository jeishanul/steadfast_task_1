<div class="card-body">
    <div class="card p-3" id="field-container">
        @if ($fields->isNotEmpty())
            @foreach ($fields as $key => $field)
                <div class="row">
                    <div class="col-lg-4">
                        <x-input-group label="Field Label" type="text" name="inputs[{{ $key }}][label]"
                            id="label{{ $key }}" placeholder="Enter your form field name" required
                            value="{{ $field->label }}" />
                    </div>
                    <div class="col-lg-4">
                        <x-select-group label="Field Type" name="inputs[{{ $key }}][field_type]"
                            id="field_type{{ $key }}" placeholder="Select your form field type" required
                            attribute="{{ $key }}">
                            @foreach ($fieldTypes as $type)
                                <option value="{{ $type }}" {{ $field->type == $type ? 'selected' : '' }}>
                                    {{ ucfirst($type->value) }}</option>
                            @endforeach
                        </x-select-group>
                    </div>
                    <div class="col-lg-3 margin_top_40">
                        <div class="form-group text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="inputs[{{ $key }}][is_required]" id="is_required{{ $key }}"
                                    value="1" {{ $field->is_required == 1 ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="is_required{{ $key }}">{{ __('Required') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="inputs[{{ $key }}][is_required]"
                                    id="is_required{{ $key }}" value="0"
                                    {{ $field->is_required == 0 ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="is_required{{ $key }}">{{ __('Optional') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 margin_top_40">
                        <div class="form-group">
                            @if ($key == 0)
                                <button type="button" class="btn btn-primary btn-sm" id="add-field">
                                    <i class="fas fa-plus"></i>
                                </button>
                            @else
                                <button type="button" class="btn btn-danger btn-sm remove-field">
                                    <i class="fas fa-times"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-lg-4">
                    <x-input-group label="Field Label" type="text" name="inputs[1][label]" id="label"
                        placeholder="Enter your form field name" required />
                </div>
                <div class="col-lg-4">
                    <x-select-group label="Field Type" name="inputs[1][field_type]" id="field_type"
                        placeholder="Select your form field type" required>
                        @foreach ($fieldTypes as $type)
                            <option value="{{ $type }}">{{ ucfirst($type->value) }}</option>
                        @endforeach
                    </x-select-group>
                </div>
                <div class="col-lg-3 margin_top_40">
                    <div class="form-group text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inputs[1][is_required]"
                                id="is_required1" value="1">
                            <label class="form-check-label" for="is_required1">{{ __('Required') }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inputs[1][is_required]"
                                id="is_required2" value="0" checked>
                            <label class="form-check-label" for="is_required2">{{ __('Optional') }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 margin_top_40">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-sm" id="add-field">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
