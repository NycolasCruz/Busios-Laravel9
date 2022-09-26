@extends('layouts.main')
@section('dashboard')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5 pt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-3">

                        {{-- 
                            separar o código em componentes
                            criar um acessor para nome social 
                            barra de pesquisa por nome da loja
                            botão para ver e excluir os currículos pensentes da loja ou enviar um curículo para a loja (many to many) 
                            o proprietário poderá excluir a loja

                            máscaras
                            fazer arquivo request para a edição
                            exibir erros da request em toastrs
                            exibir os campos income e extras no formulário de edição
                            formatar extras na exibição dos dados
                            limpar campos dos formulários ao fechar o modal e remover fechamento do modl ao submitar o formulário, fazendo-o apenas quando o formulário for submetido com sucesso
                            validar cpf
                        --}}

                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-cart-shopping text-primary fs-1"></i>
                                <h1 class="ms-4 fs-1">Lojas</h2>
                            </div>
                            <div>
                                <button
                                    type="button"
                                    class="btn bg-primary text-white"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#register-modal"
                                >
                                    Nova Loja
                                </button>
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Proprietário</th>
                                    <th>Ramo de Negócio</th>
                                    <th class="text-end">Ações</th>
                                </tr>
                            </thead>
                            <tbody id="tbody" hidden>

                            </tbody>
                        </table>

                        {{-- loader --}}
                        <div class="d-flex justify-content-center">
                            <div id="loader-allData" class="spinner-border text-primary" role="status" hidden>
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- register modal --}}
<div class="modal fade" id="register-modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Loja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="register-form">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label mt-1">Nome da Loja</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Nome da Loja"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Ramo</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Ramo"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label mt-1">Descrição (opcional)</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Descrição"
                                autocomplete="none"
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Telefone</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Telefone"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Cpf do Proprietário</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Cpf do Proprietário"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Logradouro</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Logradouro"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Qual a renda mensal da loja?</label>
                            <select id="income" class="form-select" required>
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
                                type="checkbox"
                                id="check-1"
                                class="form-check-input me-2 check-extras"
                                value="Possui mais de 10 funcionários"
                                name="items[]"
                            >
                            <label class="form-check-label" for="check-1">
                                Possui mais de 10 funcionários
                            </label>
                        </div>
                        <div class="col-6 d-flex">
                            <input
                                type="checkbox"
                                id="check-2"
                                class="form-check-input me-2 check-extras"
                                value="Possui filiais"
                                name="items[]"
                            >
                            <label class="form-check-label" for="check-2">
                                Possui filiais
                            </label>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6 d-flex">
                            <input
                                type="checkbox"
                                id="check-3"
                                class="form-check-input me-2 check-extras"
                                value="Possui loja física e virtual"
                                name="items[]"
                            >
                            <label class="form-check-label" for="check-3">
                                Possui loja física e virtual
                            </label>
                        </div>
                        <div class="col-6 d-flex">
                            <input
                                type="checkbox"
                                id="check-4"
                                class="form-check-input me-2 check-extras"
                                value="Faz entregas à domicílio"
                                name="items[]"
                            >
                            <label class="form-check-label" for="check-4">
                                Faz entregas à domicílio
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn bg-light text-gray-500" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn bg-primary text-white" form="register-form">Salvar</button>
            </div>
        </div>
    </div>
</div>

{{-- show modal --}}
<div class="modal fade" id="show-modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Visualizar Loja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <div id="show-modal-body" class="modal-body">
                
            </div>

            {{-- loader --}}
            <div class="d-flex justify-content-center" style="margin-bottom: 2rem">
                <div id="loader-show" class="spinner-border text-primary" role="status" hidden>
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn bg-light text-gray-500" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

{{-- edit modal --}}
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
                                class="form-control"
                                placeholder="Nome da Loja"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Ramo</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Ramo"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label mt-1">Descrição (opcional)</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Descrição"
                                autocomplete="none"
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Telefone</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Telefone"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Cpf do Proprietário</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Cpf do Proprietário"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Logradouro</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Logradouro"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Qual a renda mensal da loja?</label>
                            <select id="edit-income" class="form-select" required>
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
                                type="checkbox"
                                id="check-1"
                                class="form-check-input me-2 edit-check-extras"
                                value="Possui mais de 10 funcionários"
                                name="editItems[]"
                            >
                            <label class="form-check-label" for="check-1">
                                Possui mais de 10 funcionários
                            </label>
                        </div>
                        <div class="col-6 d-flex">
                            <input
                                type="checkbox"
                                id="check-2"
                                class="form-check-input me-2 edit-check-extras"
                                value="Possui filiais"
                                name="editItems[]"
                            >
                            <label class="form-check-label" for="check-2">
                                Possui filiais
                            </label>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6 d-flex">
                            <input
                                type="checkbox"
                                id="check-3"
                                class="form-check-input me-2 edit-check-extras"
                                value="Possui loja física e virtual"
                                name="editItems[]"
                            >
                            <label class="form-check-label" for="check-3">
                                Possui loja física e virtual
                            </label>
                        </div>
                        <div class="col-6 d-flex">
                            <input
                                type="checkbox"
                                id="check-4"
                                class="form-check-input me-2 edit-check-extras"
                                value="Faz entregas à domicílio"
                                name="editItems[]"
                            >
                            <label class="form-check-label" for="check-4">
                                Faz entregas à domicílio
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
@endsection

@section('js')
<script>
    // get all stores
    async function showStores() {
        const loader = document.querySelector('#loader-allData');
        const tbody = document.querySelector('#tbody');

        loader.removeAttribute('hidden');
        tbody.setAttribute('hidden', true);

        const response = await axios.get('{{ route('dashboard.getAllData') }}');

        loader.setAttribute('hidden', true);
        tbody.innerHTML = ''

        response.data.map((dataStore, i) => {

            let status = {{ Auth::user()->id }} != dataStore.user.id && "d-none"

            tbody.innerHTML += `
                <tr class="align-middle">
                    <td>${i + 1}</td>
                    <td>${dataStore.name}</td>
                    <td>${dataStore.user.name}</td>
                    <td>${dataStore.branch}</td>
                    <td class="text-end">
                        <button
                            class="btn bg-primary text-white show-button"
                            title="Ver Detalhes"
                            data-bs-toggle="modal"
                            data-bs-target="#show-modal"
                            data-id="${dataStore.id}"
                        >
                            <i class="fas fa-eye"></i>
                        </button>
                        <button
                            class="btn bg-warning ms-2 text-white edit-button ${status}"
                            title="Editar Informações"
                            data-bs-toggle="modal"
                            data-bs-target="#edit-modal"
                            data-id="${dataStore.id}"x
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
            `
        });

        tbody.removeAttribute('hidden');    
        getSpecificStore();
        getDataToEditStore();
    }

    window.onload = showStores;

    // register form
    document.querySelector('#register-form').addEventListener('submit', async (event) => {
        event.preventDefault();
        const inputData = Array.from(event.target.querySelectorAll('div.row div input[type="text"]'));
        const incomeValue = document.querySelector('#income').value;

        const checkboxes = Array.from(event.target.querySelectorAll('input.check-extras'));
        const checkboxesChecked = checkboxes.filter((checkbox) => checkbox.checked);
        const checkboxesValues = checkboxesChecked.map(checkbox => checkbox.value);

        Toast.fire({
            icon: 'info',
            title: 'Aguarde um pouco..'
        })

        $('#register-modal').modal('hide');

        try {
            const response = await axios.post('{{ route('dashboard.store') }}', {
                name: inputData[0].value,
                branch: inputData[1].value,
                description: inputData[2].value,
                number: inputData[3].value,
                cpf: inputData[4].value,
                place: inputData[5].value,
                income: incomeValue,
                extras: checkboxesValues
            });

            Toast.fire({
                icon: 'success',
                title: 'Loja cadastrada com sucesso!'
            })

            inputData.forEach(input => input.value = '');
            document.querySelector('#tbody').innerHTML = '';
            showStores();
        } catch (error) {
            console.error(error);

            Toast.fire({
                icon: 'error',
                title: 'Erro ao cadastrar a loja'
            })
        }
    });

    let id = 0;

    // get specific store (show)
    function getSpecificStore() {
        document.querySelectorAll('.show-button').forEach(button => {
            button.addEventListener('click', async (event) => {
                const loader = document.querySelector('#loader-show');
                const button = event.relatedTarget;
                id = event.currentTarget.dataset.id;
                
                loader.removeAttribute('hidden');
                document.querySelector('#show-modal-body').innerHTML = '';

                const response = await axios.get('{{ route('dashboard.show', ':id') }}'.replace(':id', id));

                const data = response.data

                let income = ''

                switch(data.income) {
                    case 1:
                        income = 'Menos de R$ 10.000,00'
                        break;
                    case 2:
                        income = 'Entre R$ 10.000,00 e R$ 50.000,00'
                        break;
                    case 3:
                        income = 'Mais que R$ 50.000,00'
                        break;
                }

                loader.setAttribute('hidden', true);

                document.querySelector('#show-modal-body').innerHTML = `
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Proprietário:
                        <span class="fw-normal">
                            ${data.user.name}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Email do proprietário:
                        <span class="fw-normal">
                            ${data.user.email}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Nome da loja:
                        <span class="fw-normal">
                            ${data.name}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Ramo:
                        <span class="fw-normal">
                            ${data.branch}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Descrição:
                        <span class="fw-normal">
                            ${data.description}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Telefone:
                        <span class="fw-normal">
                            ${data.number}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Cpf:
                        <span class="fw-normal">
                            ${data.cpf}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Logradouro:
                        <span class="fw-normal">
                            ${data.place}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Renda mensal:
                        <span class="fw-normal">
                            ${income}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Extras
                    </p>
                    <span class="d-flex align-items-center fw-normal ms-4">
                        <i class="fa-solid fa-caret-right me-2"></i>
                        ${data.extras}
                    </span>
                `;
            })
        })
    }

    // get specific store (edit)
    function getDataToEditStore() {
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', async (event) => {
                const loader = document.querySelector('#loader-edit');
                const button = event.relatedTarget;
                const editForm = document.querySelector('#edit-form')
                id = event.currentTarget.dataset.id;

                const inputData = Array.from(editForm.querySelectorAll('div.row div input[type="text"]'));
                inputData.forEach(input => input.value = '');

                loader.removeAttribute('hidden');
                editForm.setAttribute('hidden', true);

                const response = await axios.get('{{ route('dashboard.show', ':id') }}'.replace(':id', id));

                loader.setAttribute('hidden', true);
                editForm.removeAttribute('hidden');

                inputData[0].value = response.data.name;
                inputData[1].value = response.data.branch;
                inputData[2].value = response.data.description;
                inputData[3].value = response.data.number;
                inputData[4].value = response.data.cpf;
                inputData[5].value = response.data.place;
                // income
                // extras
            })
        })
    }

    // edit store
    document.querySelector('#edit-form').addEventListener('submit', async (event) => {
        event.preventDefault();

        const inputData = Array.from(event.target.querySelectorAll('div.row div input[type="text"]'));
        const incomeValue = document.querySelector('#edit-income').value;

        const checkboxes = Array.from(event.target.querySelectorAll('input.edit-check-extras'));
        const checkboxesChecked = checkboxes.filter((checkbox) => checkbox.checked);
        const checkboxesValues = checkboxesChecked.map(checkbox => checkbox.value);

        Toast.fire({
            icon: 'info',
            title: 'Aguarde um pouco..'
        })

        $('#edit-modal').modal('hide');

        try {
            const response = await axios.put('{{ route('dashboard.update', ':id') }}'.replace(':id', id), {
                name: inputData[0].value,
                branch: inputData[1].value,
                description: inputData[2].value,
                number: inputData[3].value,
                cpf: inputData[4].value,
                place: inputData[5].value,
                income: incomeValue,
                extras: checkboxesValues
            })

            Toast.fire({
                icon: 'success',
                title: 'Loja editada com sucesso!'
            })

            showStores();
        } catch (error) {
            console.error(error);

            Toast.fire({
                icon: 'error',
                title: 'Erro ao editar loja!'
            })
        }
    })
</script>
@endsection
