@extends('layouts.main')
@section('content')

<x-app-layout>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-3">

                        {{-- 
                            botão de adicionar novas lojas padrao regulação


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
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Proprietário</th>
                                    <th scope="col">Ramo de Negócio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
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