@props([
    'name',
    'label',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'prefix' => null
])

<x-form.group :for="$name" :label="$label" class="mb-4">
  @if($prefix)
    <div class="input-group">
      <span class="input-group-text border-secondary bg-dark-subtle text-white-50 form-input-prefix">
        {{ $prefix }}
      </span>
  @endif

  <input 
    type="{{ $type }}" 
    class="form-control text-white form-input-custom" 
    id="{{ $name }}" 
    name="{{ $name }}" 
    value="{{ old($name, $value) }}" 
    placeholder="{{ $placeholder }}" 
    @if($required) required @endif
  >

  @if($prefix)
    </div>
  @endif
</x-form.group>
