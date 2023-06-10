@props(['contestId'])

<x-configs.menu-header>{{ __('Contest Info') }}</x-configs.menu-header>
<x-configs.menu-item link="{{ route('contests.show', $contestId) }}" icon="computer-desktop">{{ __('Contest Description') }}</x-configs.menu-item>

<x-configs.menu-header>{{ __('Edit Contest') }}</x-configs.menu-header>
<x-configs.menu-item link="{{ route('contests.edit', $contestId) }}" icon="pencil-square">{{ __('Update Information') }}</x-configs.menu-item>