<label for="{{ $name }}">{{ $label }} @if($required == 'true') <span>*</span> @endif</label>
<select name="{{ $name }}" id="{{ $name }}" class="@error($name) is-invalid @enderror" @if($required == 'true') required @endif>
    <option value="">Please select</option>
    @if ($collection)
        @foreach ($collection as $item)
            <option value="{{ $item->id }}" {{ $item->id == $selectedValue ? 'selected' : '' }}>
                {{ $item->name }} <!-- Change this based on the field you need from the DB -->
            </option>
        @endforeach
    @else
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ $key == $selectedValue ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    @endif
</select>
