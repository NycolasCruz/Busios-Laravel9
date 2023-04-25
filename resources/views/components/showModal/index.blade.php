<div class="modal fade" id="show-modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Visualizar Loja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <div id="show-modal-body" class="modal-body"></div>

            {{-- loader --}}
            <div class="d-flex justify-content-center" style="margin-bottom: 2rem">
                <div id="loader-show" class="spinner-border text-primary" role="status" hidden>
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <div class="modal-footer flex justify-center border-0">
                <button
                    type="button"
                    class="btn bg-slate-200 hover:bg-slate-200 text-gray-600 hover:text-gray-600" data-bs-dismiss="modal"
                >
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>