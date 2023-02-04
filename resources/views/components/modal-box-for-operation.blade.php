<div class="modal fade" {{ $attributes }} data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div {{ $attributes->merge(["class"=>"modal-dialog "]) }}>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $modaltitle }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{ $modalbody }}
        </div>
    </div>
</div>
