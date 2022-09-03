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
                            <tbody>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn bg-primary text-white" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn bg-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>              
                            </tbody>
                        </table>
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
                        <label class="form-label mt-1">Descrição</label>
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
                    <div class="col-12">
                        <label class="form-label mt-1">Logradouro</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Logradouro"
                            autocomplete="none"
                            required
                        >
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn bg-light text-gray-500" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn bg-primary text-white">Salvar</button>
            </div>
        </div>
    </div>
</div>

@endsection