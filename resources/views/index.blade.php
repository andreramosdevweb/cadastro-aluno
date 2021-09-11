@extends('master')

@section('content')
    <main>

        <div class="container mt-5 mb-3">
            <form action="{{route('report')}}" method="post">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <input type="text" class="form-control @error('age') is-invalid @enderror" name="age"
                               placeholder="Informe uma idade. Ex: 18">
                        @if($errors->all())
                            @foreach($errors->all() as $error)
                                <div class="text-galileu-color-danger text-sm">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>

                    <div class="mx-3">
                        <button type="submit" class="btn btn-galileu-color-success text-white">Gerar
                            Relatório
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <div class="container mt-5 d-flex justify-content-center">
            <a href="{{route('students.create')}}" class="btn btn-galileu-color-success text-white">Cadastrar
                Aluno</a>
        </div>

        <div class="container">

            @if(empty($students->total()))
                <div class="alert alert-galileu-color-info mt-3" role="alert">
                    Não existem alunos cadastrados!
                </div>
            @else
                <div class="content_app_box">
                    <div class="table-responsive">
                        <table id="table-students" class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 40%" class="text-center">Nome Completo</th>
                                <th scope="col" style="width: 20%" class="text-center">Data de Nascimento</th>
                                <th scope="col" style="width: 20%" class="text-center">Renda Familiar</th>
                                <th scope="col" style="width: 20%" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{$student->id}}</th>
                                    <td>{{$student->full_name}}</td>
                                    <td>{{$student->birth_date}}</td>
                                    <td>{{$student->family_income}}</td>
                                    <td class="text-center">
                                        <a href="{{route('students.edit', $student->id )}}"
                                           class="btn btn-galileu-color btn-sm text-white mb-2 mb-sm-0">Editar</a>
                                        <button type="button"
                                                class=" btn btn-galileu-color-danger btn-sm text-white"
                                                data-bs-toggle="modal"
                                                data-full-name="{{$student->full_name}}"
                                                data-action="{{ route('students.destroy',$student->id ) }}"
                                                data-bs-target="#modal-delete">Excluir
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{$students->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            @endif
        </div>
    </main>


    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-delete">Atenção!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja exluir esse aluno?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-galileu-color text-white" data-bs-dismiss="modal">Fechar
                    </button>
                    <form id="form-delete" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-galileu-color-danger text-white">Sim, Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


