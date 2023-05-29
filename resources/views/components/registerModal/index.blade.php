<div class="modal fade" id="register-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5">Cadastrar Loja</h5>
                <button type="button" class="btn-close pb-3" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>

            <form id="register-form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label mt-1">Nome da Loja</label>
                            <input
                                type="text"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full number"
                                name="shop_name"
                                placeholder="Nome da loja"
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
                            <label class="form-label mt-1">Descrição (opcional)</label>
                            <input
                                type="text"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                name="description"
                                placeholder="Descrição"
                                autocomplete="off"
                            >
                        </div>

                        <div class="col-6">
                            <label class="form-label mt-1">Telefone</label>
                            <input
                                type="text"
                                id="numberMask"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                name="number"
                                placeholder="Telefone"
                                autocomplete="off"
                                required
                            >
                        </div>

                        <div class="col-6">
                            <label class="form-label mt-1">Cpf do Proprietário</label>
                            <input
                                type="text"
                                id="cpfMask"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                name="cpf"
                                placeholder="Cpf do proprietário"
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
                            <label class="form-label mt-1">Quantos funcionários a loja têm?</label>
                            <select
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                name="employees"
                                required
                            >
                                <option value="" selected disabled>Selecione?</option>
                                <option value="1">Menos que 10</option>
                                <option value="2">Entre 10 e 100</option>
                                <option value="3">Mais 100</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row my-3">
                        <div class="col-6 flex">
                            <input
                                type="checkbox"
                                class="form-check-input me-2"
                                value="1"
                                name="characteristics[]"
                            >
                            <label class="form-check-label" for="check-1">
                                Possui site próprio
                            </label>
                        </div>
                        <div class="col-6 flex">
                            <input
                                type="checkbox"
                                id="check-2"
                                class="form-check-input me-2"
                                value="2"
                                name="characteristics[]"
                            >
                            <label class="form-check-label" for="check-2">
                                Possui filiais
                            </label>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6 flex">
                            <input
                                type="checkbox"
                                id="check-3"
                                class="form-check-input me-2"
                                value="3"
                                name="characteristics[]"
                            >
                            <label class="form-check-label" for="check-3">
                                Possui loja física e virtual
                            </label>
                        </div>
                        <div class="col-6 flex">
                            <input
                                type="checkbox"
                                id="check-4"
                                class="form-check-input me-2"
                                value="4"
                                name="characteristics[]"
                            >
                            <label class="form-check-label" for="check-4">
                                Faz entregas à domicílio
                            </label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer flex justify-center border-0">
                    <button
                        type="button"
                        class="btn bg-slate-200 hover:bg-slate-300 focus:bg-slate-300 hover:border-slate-300 focus:border-slate-300 text-gray-600 hover:text-gray-600 focus:ring-2 focus-ring-slate-200"
                        data-bs-dismiss="modal"
                    >
                        Fechar
                    </button>
                    <button
                        type="submit"
                        class="btn bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 border-sky-500 focus:border-sky-600 focus:ring-2 text-white"
                    >
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
