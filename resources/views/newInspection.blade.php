@extends('layouts.layout1')

@section('title', 'Blastoiz | Nova Inspeção')

@section('content')

    <div class="container mt-4">
        <div class="d-flex align-items-end text-start">
            <img src="/img/addInspection.svg" height="40" alt="Ícone nova inspeção">
            <h3 class="ms-2 mb-0">{{$inspection[0]["title"]}}</h3>
        </div>
        <hr>
        <div class="card mt-2">
            <div class="card-body">
                <h5 class="card-title">Informações Gerais</h5>
                <hr>
                <div class="mb-3">
                    <label class="form-label"><strong>Cliente inspecionado</strong></label>
                    <p class="border rounded-3 p-2"> {{$inspection[0]["customer"]["name"]}} </p>
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>Descrição</strong></label>
                    <p class="border rounded-3 p-2">{{$inspection[0]["description"]}}</p>
                    <!-- <textarea name="" class="form-control" rows="3">{{$inspection[0]["description"]}}</textarea> -->
                    <!-- <input class="form-control" type="text" value='{{$inspection[0]["description"]}}'> -->
                </div>
                <div class="mb-3 d-flex">
                    <label class="form-label me-1"><strong>Data de início:</strong></label>
                    <div class="d-inline ps-1"> {{$inspection[0]["start_date"]}} </div>
                    <label class="form-label ms-4 me-1"><strong>Situação:</strong></label>
                        @if($inspection[0]["is_finished"])
                            <div class="d-inline ps-1">Concluída</div>
                        @else
                            <div class="d-inline ps-1">Não Concluída</div>
                        @endif
                    @if($inspection[0]["is_finished"] == 1)
                        <div class="d-flex mx-3">
                            <label class="form-label"><strong>Data de conclusão:</strong></label>
                            <div class="d-inline ps-1">{{$inspection[0]["end_date"]}}</div>
                        </div>
                    @endif
                </div>
                <div class="mb-3 d-flex">
                    <label class="form-label me-1"><strong>Inspetor:</strong></label>
                    <div class="d-inline ps-1">{{$inspection[0]["user"]["name"]}}</div>
                </div>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Equipamentos</h5>
                    </div>
                    @if($inspection[0]["is_finished"] == 1 or session()->get('role') == 2)
                    
                    @else
                        <div class="col">
                                <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#extinguisher_register">NOVO EQUIPAMENTO</a>
                        </div>
                    @endif
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inspection[0]["extinguisher"] as $extinguisher)
                            <tr>
                                <th>{{$loop->index + 1}}</th>
                                <td>{{$extinguisher["name"]}}</td>
                                <td>{{$extinguisher["type"]}}</td>
                                <td>{{$extinguisher["weight"]}}kg</td>
                                <td>@if($extinguisher["is_approved"])
                                        Aprovado
                                    @else
                                        Reprovado
                                    @endif
                                </td>
                                <td>
                                    <div class="col text-end">
                                        <a data-bs-toggle="modal" data-bs-target='#viewExtinguisher-{{$extinguisher["id"]}}' class="btn btn-success">DETALHES</a>
                                        @if($inspection[0]["is_finished"] == 1 or session()->get('role') == 2)
                                        
                                        @else
                                            <button data-bs-toggle="modal" data-bs-target='#deleteExtinguisher-{{$extinguisher["id"]}}' class="btn btn-danger">EXCLUIR</button>
                                            <!--  
                                            <form action='/extinguisher/{{$extinguisher["id"]}}' method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">EXCLUIR</button>
                                            </form>-->
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            <!-- VISUALIZAR DADOS EXTINTOR -->
                            <div class="modal fade" id='viewExtinguisher-{{$extinguisher["id"]}}' tabindex="-1" aria-labelledby="visualizar" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">VISUALIZAR EXTINTOR</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nome Extintor:</label>
                                                <div class="fw-bold border rounded-3 p-2">{{$extinguisher["name"]}}</div>
                                                
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tipo Extintor:</label>
                                                <div class="fw-bold border rounded-3 p-2">{{$extinguisher["type"]}}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Peso:</label>
                                                <div class="fw-bold border rounded-3 p-2">{{$extinguisher["weight"]}}kg</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label mb-1">Status do Equipamento:</label>
                                                @if($extinguisher["is_approved"])
                                                    <div class="fw-bold border rounded-3 p-2">Aprovado</div>
                                                @else
                                                    <div class="fw-bold border rounded-3 p-2">Reprovado</div>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Descrição:</label>
                                                <div class="fw-bold border rounded-3 p-2">{{$extinguisher["description"]}}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Endereço da foto do extintor:</label>
                                                <div class="fw-bold border rounded-3 p-2">{{$extinguisher["extinguisher_url_photo"]}}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Endereço da foto do selo de inspeção:</label>
                                                <div class="fw-bold border rounded-3 p-2">{{$extinguisher["inspection_seal_url_photo"]}}</div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- DELETAR INSPEÇÃO -->
                            <div class="modal fade" id='deleteExtinguisher-{{$extinguisher["id"]}}' tabindex="-1" aria-labelledby="deletar" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que quer excluir este extintor?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <p class="text-muted text-center mt-2">Id: <b>{{$extinguisher["id"]}}</b><br>Nome: <b>{{$extinguisher["name"]}}</b></p>
                                <form action='/extinguisher/{{$extinguisher["id"]}}' method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
                                    <button type="submit" class="btn btn-danger">EXCLUIR</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if(session()->get('role') !=1)
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h5 class="card-title">Finalização</h5>
                        </div>
                        <div class="col">
                            @if($inspection[0]["is_finished"] == 0)
                                <form action='/inspection/{{$inspection[0]["id"]}}/finish' method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">FINALIZAR INSPEÇÃO</button>
                                </form>
                            @else
                                <form action='/inspection/{{$inspection[0]["id"]}}/unfinished' method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">RETOMAR INSPEÇÃO</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- MODAL DE CADASTRO DE EXTINTOR -->
    <div class="modal fade" id="extinguisher_register" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CADASTRAR EXTINTOR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action='/extinguisher/{{$inspection[0]["id"]}}' method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nome Extintor</label>
                            <input name="name" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo Extintor</label>
                            <input name="type" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Peso</label>
                            <input name="weight" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status do Equipamento</label>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" value=1 type="radio" name="is_approved" id="approved">
                                        <label class="form-check-label" for="approved">
                                            Aprovado
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input name="is_approved" value=0 class="form-check-input" type="radio" id="rejected" checked>
                                        <label class="form-check-label" for="rejected">
                                            Reprovado
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto do extintor</label>
                            <input name="extinguisher_url_photo" class="form-control" type="file" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto do selo de inspeção</label>
                            <input name="inspection_seal_url_photo" class="form-control" type="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
                        <button type="submit" class="btn btn-primary">CADASTRAR</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>


    <!-- MODAL FINALIZAÇÃO DE INSPEÇÃO -->
    <div class="modal fade" id="finish" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CADASTRAR EXTINTOR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- SIGNATURE PAD AQUI DPS -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">VOLTAR</button>
                    <button type="button" class="btn btn-primary">FINALIZAR</button>
                </div>
            </div>
        </div>
    </div>
@endsection