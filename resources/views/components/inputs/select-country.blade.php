@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    <option value="" disabled selected>{{ __('Choose...') }}</option>
    @foreach ($countries as $code => $country)
        <option value="{{ $code }}">{{ $country }}</option>
    @endforeach
</select>