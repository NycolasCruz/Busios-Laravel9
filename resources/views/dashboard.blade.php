@extends('layouts.main')
@section('content')

<x-app-layout>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5 pt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-3">

                        {{-- 
                            nome
                            logradouro
                            telefone    
                            ramo
                            cpf válido
                            micro media ou grande empresa(sepearar por cores na tabela)
                            só eu posso editar minha loja, mas eu posso votar na loja do outro

                            show view    
                            email do proprietário = auth email
                            proprietário = auth user


                            filtro com laravel

                            menu minha loja
                            menu ranking de votação
                        --}}
                        

                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-cart-shopping text-primary fs-1"></i>
                                <h1 class="ms-4 fs-1">Lojas</h2>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary bg-primary">
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
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr> <tr class="align-middle">
                                    <td>1</td>
                                    <td>Intimus</td>
                                    <td>André Alves da Costa</td>
                                    <td>Roupas</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning ms-2 text-white" title="Editar Informações">
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

@endsection