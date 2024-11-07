@props([
    'submitBtnName' => 'Simpan',
    'closeBtnName' => 'Tutup',
    'modalType',
])

<!-- Modal -->
<div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $modalId }}Label">{{ $modalTitle }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if ($modalType == 'form')
                <form action="{{ route($formAction) }}" method="post">
                    @csrf
            @endif

            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">{{ $submitBtnName }}</button>
            </div>

            @if ($modalType == 'form')
                </form>
            @endif
        </div>
    </div>
</div>
