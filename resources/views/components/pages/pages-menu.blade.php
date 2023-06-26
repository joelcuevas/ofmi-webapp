@props(['pageId', 'pageSlug'])

<x-configs.menu-header>Página</x-configs.menu-header>
<x-configs.menu-item link="{{ route('pages.show', $pageId) }}" icon="computer-desktop">Vista Previa</x-configs.menu-item>

<x-configs.menu-header>Configuración</x-configs.menu-header>
<x-configs.menu-item link="{{ route('pages.edit', $pageId) }}" icon="pencil-square">Editar Página</x-configs.menu-item>