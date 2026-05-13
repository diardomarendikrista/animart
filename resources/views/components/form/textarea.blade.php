@props([
    'name',
    'label',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'rows' => 5
])

<x-form.group :for="$name" :label="$label" class="mb-4">
  <textarea 
    class="form-control text-white form-textarea-custom" 
    id="{{ $name }}" 
    name="{{ $name }}" 
    rows="{{ $rows }}" 
    placeholder="{{ $placeholder }}" 
    @if($required) required @endif
  >{{ old($name, $value) }}</textarea>
</x-form.group>
