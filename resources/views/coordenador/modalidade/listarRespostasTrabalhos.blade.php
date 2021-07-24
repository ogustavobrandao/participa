@extends('coordenador.detalhesEvento')

@section('menu')
    <!-- Trabalhos -->
    <div id="divListarTrabalhos" style="display: block">

      <div class="row ">
        <div class="col-sm-6">
            <h1 class="">Trabalhos</h1>
        </div>
      </div>

    {{-- Tabela Trabalhos --}}
    <div class="row table-trabalhos">
      <div class="col-sm-12">

        <form action="{{route('atribuicao.check')}}" method="post">
          @csrf
          <div class="row">
            <div class="col-sm-12">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            </div>
          </div>

          <input type="hidden" name="eventoId" value="{{$evento->id}}">
          <br>
          <table class="table table-hover table-responsive-lg table-sm table-striped">
            <thead>
              <tr>
                <th scope="col">
                  Título
                  <a href="{{route('coord.respostasTrabalhos',[ 'eventoId' => $evento->id, 'titulo', 'asc'])}}">
                    <i class="fas fa-arrow-alt-circle-up"></i>
                  </a>
                  <a href="{{route('coord.respostasTrabalhos',[ 'eventoId' => $evento->id, 'titulo', 'desc'])}}">
                    <i class="fas fa-arrow-alt-circle-down"></i>
                  </a>
                </th>
                <th scope="col">
                  Área
                  <a href="{{route('coord.respostasTrabalhos',[ 'eventoId' => $evento->id, 'areaId', 'asc'])}}">
                    <i class="fas fa-arrow-alt-circle-up"></i>
                  </a>
                  <a href="{{route('coord.respostasTrabalhos',[ 'eventoId' => $evento->id, 'areaId', 'desc'])}}">
                    <i class="fas fa-arrow-alt-circle-down"></i>
                  </a>
                </th>
                 <th scope="col">
                  Autor
                  <a href="{{route('coord.respostasTrabalhos',[ 'eventoId' => $evento->id, 'autor', 'asc'])}}">
                    <i class="fas fa-arrow-alt-circle-up"></i>
                  </a>
                  <a href="{{route('coord.respostasTrabalhos',[ 'eventoId' => $evento->id, 'autor', 'desc'])}}">
                    <i class="fas fa-arrow-alt-circle-down"></i>
                  </a>
                </th>
                <th scope="col" style="width:15%">
                  Modalidade
                  <a href="{{route('coord.respostasTrabalhos',[ 'eventoId' => $evento->id, 'modalidadeId', 'asc'])}}">
                    <i class="fas fa-arrow-alt-circle-up"></i>
                  </a>
                  <a href="{{route('coord.respostasTrabalhos',[ 'eventoId' => $evento->id, 'modalidadeId', 'desc'])}}">
                    <i class="fas fa-arrow-alt-circle-down"></i>
                  </a>
                </th>
                <th scope="col">
                  Revisores
                  {{-- <a href="{{route('coord.listarTrabalhos',[ 'eventoId' => $evento->id, 'areaId', 'desc'])}}">
                    <i class="fas fa-arrow-alt-circle-up"></i>
                  </a>
                  <a href="{{route('coord.listarTrabalhos',[ 'eventoId' => $evento->id, 'areaId', 'desc'])}}">
                    <i class="fas fa-arrow-alt-circle-down"></i>
                  </a> --}}
                </th>
                <th scope="col" style="text-align:center">Revisões</th>
              </tr>
            </thead>

            <tbody>
              @php $i = 0; @endphp
              @foreach($trabalhos as $trabalho)

              <tr>
                  <td>
                    @if ($trabalho->arquivo && count($trabalho->arquivo) > 0)
                        <a href="{{route('downloadTrabalho', ['id' => $trabalho->id])}}">
                            <span class="d-inline-block text-truncate" class="d-inline-block" tabindex="0" data-toggle="tooltip" title="{{$trabalho->titulo}}" style="max-width: 150px;">
                                {{$trabalho->titulo}}
                            </span>
                        </a>
                    @else
                        <span class="d-inline-block text-truncate" class="d-inline-block" tabindex="0" data-toggle="tooltip" title="{{$trabalho->titulo}}" style="max-width: 150px;">
                            {{$trabalho->titulo}}
                        </span>
                    @endif
                  </td>
                  <td>
                    <span class="d-inline-block text-truncate" class="d-inline-block" tabindex="0" data-toggle="tooltip" title="{{$trabalho->area->nome}}" style="max-width: 150px;">
                      {{$trabalho->area->nome}}
                    </span>

                  </td>
                  <td>{{$trabalho->autor->name}}</td>
                  <td>
                    <span class="d-inline-block text-truncate" class="d-inline-block" tabindex="0" data-toggle="tooltip" title="{{$trabalho->modalidade->nome}}" style="max-width: 150px;">
                      {{$trabalho->modalidade->nome}}
                    </span>

                  </td>
                  <td>
                    {{count($trabalho->atribuicoes)}}
                  </td>

                  <td style="text-align:center">
                    <a href="#" data-toggle="modal" data-target="#modalTrabalho{{$trabalho->id}}">
                      <i class="fas fa-file-alt"></i>
                    </a>
                  </td>

                </tr>
              @endforeach
            </tbody>
          </table>
        </form>
      </div>

    </div>

</div>
<!-- End Trabalhos -->
@foreach ($trabalhos as $trabalho)
    <!-- Modal Trabalho -->
  <div class="modal fade" id="modalTrabalho{{$trabalho->id}}" tabindex="-1" role="dialog" aria-labelledby="labelModalTrabalho{{$trabalho->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #114048ff; color: white;">
          <h5 class="modal-title" id="exampleModalCenterTitle">Trabalho</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-sm-6">
              <h5>Título</h5>
              <p id="tituloTrabalho">{{$trabalho->titulo}}</p>
            </div>
            <div class="col-sm-6">
              <h5>Autores</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">E-mail</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Vinculação</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$trabalho->autor->email}}</td>
                    <td>{{$trabalho->autor->name}}</td>
                    <td>Autor</td>
                  </tr>
                  @foreach ($trabalho->coautors as $coautor)
                  @if($coautor->user->id != $trabalho->autorId)
                  <tr>
                    <td>{{$coautor->user->email}}</td>
                    <td>{{$coautor->user->name}}</td>
                    <td>
                      Coautor
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          @if ($trabalho->resumo != "")
            <div class="row justify-content-center">
              <div class="col-sm-12">
                <h5>Resumo</h5>
                <p id="resumoTrabalho">{{$trabalho->resumo}}</p>
              </div>
            </div>
          @endif
          @if (count($trabalho->atribuicoes) > 0)
            <div class="row justify-content-center">
              <div class="col-sm-12">
                <h5>Revisores atribuídos ao trabalho</h5>
              </div>
          @else
            <div class="row justify-content-center">
              <div class="col-sm-12">
                <h5>0</h5>
              </div>
          @endif
          @foreach ($trabalho->atribuicoes as $i => $revisor)
            @if ($i % 3 == 0) </div><div class="row"> @endif
              <div class="col-sm-4">
                <div class="card" style="width: 13.5rem; text-align: center;">
                  <img class="" src="{{asset('img/icons/user.png')}}" width="100px" alt="Revisor" style="position: relative; left: 30%; top: 10px;">
                  <div class="card-body">
                    <h6 class="card-title">{{$revisor->user->name}}</h6>
                    <strong>E-mail</strong>
                    <p class="card-text">{{$revisor->user->email}}</p>
                    <button type="button" class="btn btn-primary" onclick="window.location='{{ route('coord.visualizarRespostaFormulario', ['eventoId' => $evento->id, 'modalidadeId' => $trabalho->modalidadeId, 'trabalhoId' => $trabalho->id, 'revisorId' => $revisor->id]) }}'">Exibir Revisão</button>
                  </div>
                </div>
              </div>
          @endforeach
          </div>
          <br>
          </div>
          </div>
        <div class="modal-footer">


        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection
