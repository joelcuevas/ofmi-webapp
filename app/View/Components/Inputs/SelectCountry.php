<?php

namespace App\View\Components\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use NerdSnipe\LaravelCountries\Models\Country;
use Illuminate\Support\Facades\App;

class SelectCountry extends Component
{
    public $countries;

    public function __construct()
    {
        $this->countries = Cache::rememberForever('laravel-countries.countries', function () {
            $countries = (new Country())->getCountries();
            $locale = App::currentLocale();
            
            $collection = collect($countries)->mapWithKeys(function ($item, int $key) use ($locale) {
                $name = $item->translations[$locale] ?? $item->name;

                return [$item->iso2 => $name];
            })->all();

            asort($collection);

            return $collection;
        });
    }

    public function render(): View|Closure|string
    {
        return view('components.inputs.select-country');
    }
}
