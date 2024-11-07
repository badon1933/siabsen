@props(['type', 'color', 'targetModal'])

@if ($type == 'anchor')
    <a href="#" class="btn btn-{{ $color }}" data-bs-toggle="modal" data-bs-target="#{{ $targetModal }}"">
        {{ $slot }}
    </a>
@elseif($type == 'badge')
    <a href="#" class="badge text-bg-{{ $color }}" data-bs-toggle="modal"
        data-bs-target="#{{ $targetModal }}"">
        {{ $slot }}
    </a>
@else
    <button type="button" class="btn btn-{{ $color }}" data-bs-toggle="modal"
        data-bs-target="#{{ $targetModal }}"">
        {{ $slot }}
    </button>
@endif
