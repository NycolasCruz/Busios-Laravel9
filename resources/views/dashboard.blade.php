@extends('layouts.main')
@section('dashboard')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5 pt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-3">

                        {{-- 
                            usar Format Data
                            criar um acessor para nome social 
                            barra de pesquisa por nome da loja
                            botão para ver os currículos pensentes da loja ou enviar um curículo para a loja (many to many) 
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

@include('components.registerModal.index')
@include('components.showModal.index')
@include('components.editModal.index')
@include('components.sendCurriculumModal.index')
@endsection

@include('components.scripts.index')
