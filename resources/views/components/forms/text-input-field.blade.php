<label for="{{ $name }}">{{ $label }} @if($required == 'true') <span>*</span> @endif</label>
@if($type == 'textarea')
    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror @if($isTinyEditor == 'yes') tinyEditor @endif" cols="30" rows="10" @if($required == 'true') required @endif>{{ old($name, $value) }}</textarea>
@elseif($type == 'number')
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $value) }}" @if($required == 'true') required @endif step="any">
@else
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $value) }}" @if($required == 'true') required @endif>
@endif
<x-forms.form-field-errors name="{{ $name }}"/>
