<option value="{{ $value }}" {{ $attributes->merge(['selected' => $attributes->get('selected') ? 'selected' : null]) }}>{{ $slot }}</option>
