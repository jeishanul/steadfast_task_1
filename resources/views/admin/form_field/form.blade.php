<div class="card-body">
    <div class="card p-3" id="field-container">
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
                        <input class="form-check-input" type="radio" name="inputs[1][is_required]" id="is_required1"
                            value="true">
                        <label class="form-check-label" for="is_required1">{{ __('Required') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputs[1][is_required]" id="is_required2"
                            value="false" checked>
                        <label class="form-check-label" for="is_required2">{{ __('Optional') }}</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 margin_top_40">
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm" id="add-field">
                        <i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
