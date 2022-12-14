@extends('layouts.main')
@section('dashboard')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5 pt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-3">

                        {{--
                            adicionar label: envie um currículo para ser analisado pela loja, ela poderá contratar você

                            criar um log de status no perfil (currículo enviado, pendente, aprovado ou reprovado)

                            many to many: a loja vai verificar em uma página diferente[essa página de detalhes da loja será acessada pelo botão na tabela da própria loja] quem está interessado em trabalhar nela (através dos currículos) e adicionar ou remover os interessados, caso o currículo seja aprovado, o usuário será adicionado como funcionário da loja, fazendo assim a relação, onde uma loja pode ter vários funcionários e um funcionário pode trabalhar em várias lojas

                            adicionar campo horário de funcionamento na loja no local da faixa salarial (manha e tarde, tarde e noite, noite e madrugada, madrugada e manha, apenas manha, apenas tarde, apenas noite, apenas madrugada)

                            criar um acessor para nome social
                            máscaras
                            fazer arquivo request para a edição currículo
                            exibir erros da request em toasts
                            exibir os campos income e extras no formulário de edição
                            formatar características na exibição dos dados
                            validar cpf
                        --}}

                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-cart-shopping text-primary fs-1"></i>
                                <h1 class="ms-4 fs-1">Lojas</h2>
                            </div>
                            <div class="d-flex justify-content-lg-end">
                                <div class="card-title pe-3">
                                    <div class="d-flex align-items-center position-relative">
                                        <span class="svg-icon svg-icon-1 position-absolute text-gray ms-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control form-control-solid border-1 ps-15" data-kt-filter="search" placeholder="Pesquisar Loja">
                                    </div>
                                </div>
                               
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
