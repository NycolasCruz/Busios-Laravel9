@extends('layouts.main')
@section('dashboard')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5 pt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-3">

                        {{-- 
                            register view
                            nome
                            logradouro
                            telefone
                            ramo
                            cpf válido
                            checkbox em json
                            select => micro media ou grande empresa(sepearar por cores na tabela)
                            só o user pode editar sua loja, mas eu posso votar na loja do outro

                            show view    
                            email do proprietário = auth email
                            proprietário = auth user

                            menu minha loja
                            menu ranking de votação
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
                            <tbody id="tbody">

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <div id="loader" class="spinner-border text-primary" role="status" hidden>
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
                    @csrf
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
                                type="number"
                                class="form-control"
                                placeholder="Telefone"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-1">Cpf do Proprietário</label>
                            <input
                                type="number"
                                class="form-control"
                                placeholder="Cpf do Proprietário"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-7">
                            <label class="form-label mt-1">Logradouro</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Logradouro"
                                autocomplete="none"
                                required
                            >
                        </div>
                        <div class="col-5">
                            <label class="form-label mt-1">Qual a renda mensal da loja?</label>
                            <select class="form-select" required>
                                <option value="" selected disabled>Qual a renda mensal da loja?</option>
                                <option value="1">Menos que 10.000</option>
                                <option value="2">Entre 10.000 e 50.000</option>
                                <option value="3">Mais que 50.000</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row my-3">
                        <div class="col-6 d-flex">
                            <input class="form-check-input me-2" value="1" type="checkbox" id="check-1">
                            <label class="form-check-label" for="check-1">
                                Possui mais de 10 funcionários?
                            </label>
                        </div>
                        <div class="col-6 d-flex">
                            <input class="form-check-input me-2" value="2" type="checkbox" id="check-2">
                            <label class="form-check-label" for="check-2">
                                Possuis filiais?
                            </label>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6 d-flex">
                            <input class="form-check-input me-2" value="3" type="checkbox" id="check-3">
                            <label class="form-check-label" for="check-3">
                                Possui loja física e virtual?
                            </label>
                        </div>
                        <div class="col-6 d-flex">
                            <input class="form-check-input me-2" value="4" type="checkbox" id="check-4">
                            <label class="form-check-label" for="check-4">
                                Faz entregas à domicílio?
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

<script>
    async function showStores() {
        const loader = document.querySelector('#loader');
        loader.removeAttribute('hidden');

        const response = await axios.get('/dashboard/getAxios');

        loader.setAttribute('hidden', true);

        response.data.map((dataStore, i) => {
            console.log(dataStore);
            document.querySelector('#tbody').innerHTML += `
                <tr class="align-middle">
                    <td>${i + 1}</td>
                    <td>${dataStore.name}</td>
                    <td>Proprietário</td>
                    <td>${dataStore.branch}</td>
                    <td class="text-end">
                        <button class="btn bg-primary text-white" title="Ver Detalhes">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn bg-warning ms-2 text-white" title="Editar Informações">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>    
            `
        });
    }

    showStores()

    // register form
    document.querySelector('#register-form').addEventListener('submit', async (event) => {
        event.preventDefault();
        const inputData = Array.from(event.target.querySelectorAll('div.row div input'));

        Toast.fire({
            icon: 'info',
            title: 'Aguarde um pouco..'
        })

        $('#register-modal').modal('hide');

        try {
            const response = await axios.post('/dashboard', {
                name: inputData[0].value,
                branch: inputData[1].value,
                description: inputData[2].value,
                cpf: inputData[3].value,
                number: inputData[4].value,
                place: inputData[5].value
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

</script>
@endsection