@props(['contestId'])

<x-configs.menu-header>{{ __('Contest') }}</x-configs.menu-header>
<x-configs.menu-item link="{{ route('contests.show', $contestId) }}" icon="computer-desktop">{{ __('Contest Description') }}</x-configs.menu-item>

<x-configs.menu-header>{{ __('Settings') }}</x-configs.menu-header>
<x-configs.menu-item link="{{ route('contests.edit', $contestId) }}" icon="power">{{ __('Activate Contest') }}</x-configs.menu-item>
<x-configs.menu-item link="{{ route('contests.edit', $contestId) }}#update" icon="pencil-square">{{ __('Update Information') }}</x-configs.menu-item>