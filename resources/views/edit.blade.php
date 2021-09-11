@extends('master')

@section('content')
    <div class="container">
        <div class="content_app_box d-flex flex-column">
            <div class="text-center m-2">
                <span class="fw-bold fs-3">Editar Aluno</span>
            </div>
            <hr class="mt-1 mb-5">

            {{--  Mensagem de erro  --}}
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-galileu-color-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            <form action="{{route('students.update',  $student->id )}}" method="post" class="mx-3" autocomplete="off"
                  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="content_app_box-container d-flex justify-content-center flex-column flex-wrap">
                    <div class="content_app_box_left mb-3 mx-auto col-md-8 order-1">
                        <div class="row g-3">
                            <div class="col-lg-7">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" name="full_name"
                                       value="{{old('full_name') ??  $student->full_name}}">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Data de Nascimento</label>
                                <input type="tel" class="form-control mask-date" name="birth_date"
                                       value="{{old('birth_date') ??  $student->birth_date}}">
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label class="form-label">Renda Familiar</label>
                                <input type="tel" class="form-control mask-money" name="family_income"
                                       value="{{old('family_income') ??  $student->family_income}}">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">CEP</label>
                                <input type="text" class="form-control mask-zipcode zip_code_search" name="zipcode"
                                       value="{{ $student->zipcode }}">
                            </div>
                            <div class="col-lg-9">
                                <label class="form-label">Logradouro</label>
                                <input type="text" class="form-control street" name="street"
                                       value="{{ $student->street }}">
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <label class="form-label">Número</label>
                                <input type="text" class="form-control" name="number" value="{{ $student->number }}">
                            </div>
                            <div class="col-lg-5 col-md-8">
                                <label class="form-label">Complemento</label>
                                <input type="text" class="form-control" name="complement"
                                       value="{{ $student->complement }}">
                            </div>
                            <div class="col-lg-5">
                                <label class="form-label">Bairro</label>
                                <input type="text" class="form-control neighborhood" name="neighborhood"
                                       value="{{ $student->neighborhood }}">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Cidade</label>
                                <input type="text" class="form-control city" name="city" value="{{ $student->city }}">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Estado</label>
                                <input type="text" class="form-control state" name="state"
                                       value="{{ $student->state }}">
                            </div>
                        </div>
                    </div>
                    <div class="content_app_box_right mx-auto col-md-4 mb-2 mb-md-5 order-0">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar"
                                         style="background-size: cover; width: 120px; height: 120px ;background-image: url({{ (empty($student->url_avatar) ? asset('assets/images/avatar.png') : asset( $student->url_avatar)) }})">
                                    </div>
                                </div>
                                <input type="file" name="avatar" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex  justify-content-center  m-3">
                    <a href="{{route('students.index')}}"
                       class="btn btn-lg btn-galileu-color text-white mx-2">Voltar</a>
                    <button type="submit" class="btn btn-lg btn-galileu-color-success  text-white mx-2">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
