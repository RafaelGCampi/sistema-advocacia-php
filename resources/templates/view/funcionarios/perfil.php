


    <div id="funcionario-conteudo" class="conteudo" data-funcionario-id="{{$funcionario->id}}">
        <h1>Perfil do funcionario</h1>
{{--        <h3> {{$funcionario->name}}</h3>--}}
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Últimas ações</a>
            </li>
            {{--  <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Últimas ações</a>
            </li>  --}}

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div id="tabela-acoes">

                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div id="tabela-acessos">

                </div>

            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>

        window.addEventListener('load', function () {
            ultimas_acoes_list();
            ultimos_acessos_list();
        });
        function ultimas_acoes_list(){
            var el = document.getElementById("funcionario-conteudo");
            let id =el.dataset.funcionarioId;
            console.log(id);
        $('#tabela-acoes').html("Carregando...");
        $('#tabela-acoes').load("/perfil-funcionario/acoes/tabela/"+id);
        }

        function ultimos_acessos_list(){
            var el = document.getElementById("funcionario-conteudo");
            let id =el.dataset.funcionarioId;
            $('#tabela-acessos').html("Carregando...");
            $('#tabela-acessos').load("/perfil-funcionario/acessos/tabela/"+id);
        }

        function detalhes(id){
            // var el = document.getElementById("funcionario-conteudo");
            // let id =el.dataset.funcionarioId;
            console.log(id);
            $('#modal-geral').modal('show');
            $('#modal-body-geral').html('Carregando....');
            $('#modal-geral-title').html('Detalhes');
            $('#modal-body-geral').load('/perfil-funcionario/detalhes/'+id);
        }
    </script>
