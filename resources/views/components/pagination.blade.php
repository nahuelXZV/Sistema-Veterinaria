@props(['modelo'])
@if ($modelo->hasPages())
    <div class="d-flex flex-row mt-1">
        {{ $modelo->links() }}
    </div>
@endif
