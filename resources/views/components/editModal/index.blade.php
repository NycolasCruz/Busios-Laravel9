<div class="modal fade" id="edit-modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Editar Loja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <div class="modal-body">
                {{-- loader --}}
                <div class="d-flex justify-content-center">
                    <div id="loader-edit" class="spinner-border text-primary" role="status" hidden>
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <form id="edit-form" hidden>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label mt-1">Nome da Loja</label>
                            <input
                                type="text"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                name="shop_name"
                                placeholder="Nome da Loja"
                                autocomplete="off"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Ramo</label>
                            <input
                                type="text"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                name="branch"
                                placeholder="Ramo"
                                autocomplete="off"
                                required
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label mt-1">Descri????o (opcional)</label>
                            <input
                                type="text"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                name="description"
                                placeholder="Descri????o"
                                autocomplete="off"
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Telefone</label>
                            <input
                                type="text"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                name="number"
                                placeholder="Telefone"
                                autocomplete="off"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Cpf do Propriet??rio</label>
                            <input
                                type="text"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                name="cpf"
                                placeholder="Cpf do Propriet??rio"
                                autocomplete="off"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Logradouro</label>
                            <input
                                type="text"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                name="address"
                                placeholder="Logradouro"
                                autocomplete="off"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Qual a renda mensal da loja?</label>
                            <select
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full edit-income"
                                name="income"
                                required
                            >
                                <option value="" selected disabled>Qual a renda mensal da loja?</option>
                                <option value="1">Menos que 10.000</option>
                                <option value="2">Entre 10.000 e 50.000</option>
                                <option value="3">Mais que 50.000</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row my-3">
                        <div class="col-6 d-flex">
                            <input
                                id="edit-check-1"
                                type="checkbox"
                                class="form-check-input me-2"
                                value="1"
                                name="characteristics[]"
                            >
                            <label class="form-check-label" for="edit-check-1">
                                Possui mais de 10 funcion??rios
                            </label>
                        </div>
                        <div class="col-6 d-flex">
                            <input
                                id="edit-check-2"
                                type="checkbox"
                                class="form-check-input me-2"
                                value="2"
                                name="characteristics[]"
                            >
                            <label class="form-check-label" for="edit-check-2">
                                Possui filiais
                            </label>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6 d-flex">
                            <input
                                id="edit-check-3"
                                type="checkbox"
                                class="form-check-input me-2"
                                value="3"
                                name="characteristics[]"
                            >
                            <label class="form-check-label" for="edit-check-3">
                                Possui loja f??sica e virtual
                            </label>
                        </div>
                        <div class="col-6 d-flex">
                            <input
                                id="edit-check-4"
                                type="checkbox"
                                class="form-check-input me-2"
                                value="4"
                                name="characteristics[]"
                            >
                            <label class="form-check-label" for="edit-check-4">
                                Faz entregas ?? domic??lio
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn bg-light text-gray-500" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn bg-primary text-white" form="edit-form">Salvar</button>
            </div>
        </div>
    </div>
</div>