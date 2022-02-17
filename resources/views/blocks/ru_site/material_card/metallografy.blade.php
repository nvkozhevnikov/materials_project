@if(mb_strlen($material->photo_src))
<h2>Микроструктура</h2>
<div class="metallografy-gellery">
    @foreach($photos as $photo)
    <img src="{{ route('main-page') }}/source/images/microstructures{{ $photo->photo_src }}" class="img-thumbnail w-15" alt="{{ $photo->photo_alt }}" loading="lazy">
    @endforeach
</div>
<!-- Modal for Metallografy -->
<div class="modal fade" id="metallografy-popup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-popup"></div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="modal-img" alt="">
            </div>
        </div>
    </div>
</div>
<!-- End Modal for Metallografy -->
@endif
