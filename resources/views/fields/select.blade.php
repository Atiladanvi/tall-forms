<x-tall-field-wrapper :inline="$field->inline ?? $inline" :field="$field->name" :label="$field->label" :labelSuffix="$field->labelSuffix" :labelW="$field->labelW" :fieldW="$field->fieldW">
    <x-tall-select :field="$field->key" :id="$field->name" :placeholder="$field->placeholder" :help="$field->help"
        :options="$field->options" :errorMsg="$field->errorMsg" :fieldClass="$field->class" />
</x-tall-field-wrapper>
