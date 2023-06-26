@props(['contestId'])

<x-configs.menu-header>Concurso</x-configs.menu-header>
<x-configs.menu-item link="{{ route('contests.show', $contestId) }}" icon="computer-desktop">Vista Previa</x-configs.menu-item>

<x-configs.menu-header>Configuración</x-configs.menu-header>
<x-configs.menu-item link="{{ route('contests.edit', $contestId) }}" icon="power">Activar Concurso</x-configs.menu-item>
<x-configs.menu-item link="{{ route('contests.edit', $contestId) }}#update" icon="pencil-square">Editar Información</x-configs.menu-item>