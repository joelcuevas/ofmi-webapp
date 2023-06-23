@props(['pageId', 'pageSlug'])

<x-configs.menu-header>{{ __('Page') }}</x-configs.menu-header>
<x-configs.menu-item link="{{ route('pages.show', $pageId) }}" icon="computer-desktop">{{ __('Page Preview') }}</x-configs.menu-item>

<x-configs.menu-header>{{ __('Settings') }}</x-configs.menu-header>
<x-configs.menu-item link="{{ route('pages.edit', $pageId) }}" icon="pencil-square">{{ __('Edit Page') }}</x-configs.menu-item>