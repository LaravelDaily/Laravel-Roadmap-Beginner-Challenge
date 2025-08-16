@props(['disabled' => false] )
<select name="{{ $name }}" id="{{ $id }}" @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
    @if(!$attributes->has('multiple')) <option value="">Select</option> @endif
    @foreach ($options as $value)
        <option value="{{ $value->id }}"
                @if (is_array($selected))
                    @if(in_array($value->id, $selected)) selected @endif
                @else
                    @if ($value->id === (int)$selected) selected @endif
                @endif
        >
            {{ $value->name }}
        </option>
    @endforeach
</select>
