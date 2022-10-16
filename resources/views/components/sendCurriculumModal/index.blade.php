<div class="modal fade" id="curriculum-modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Visualizar Loja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="curriculum-form">
                    <label class="form-label mt-1" for="curriculum">
                        Envie seu currículo inserindo seus principais dados
                    </label>
                    <textarea
                        type="text"
                        id="curriculum"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Insira seus dados aqui"
                        rows="4"
                    ></textarea>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn bg-light text-gray-500" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn bg-primary text-white" form="curriculum-form">Enviar</button>
            </div>
        </div>
    </div>
</div>