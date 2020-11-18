@extends('template')

@section('header')

    <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/vendors/css/datatables/dataTables.bootstrap4.min.css')}}">

    <style>
        .tabela{
            /* min-height: 66vh; */
            align-self: center;
            width: 90%;
        }
    </style>

@stop

@section('conteudo')

    <!-- Alunos Atuais -->
    <div class="tabela">
        
        @if (session()->has('message'))
            <div class="alertas">
                <div class="msg alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('message') }}
                </div>
            </div>
        @endif

        {{-- <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Tabs</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <p>Takes the basic nav from above and adds the <code>.nav-tabs</code> class to generate a tabbed interface.</p>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Tab 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Tab 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="base-tab13" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Tab 3</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab11">
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Alunos Atuais - REMATRÍCULA</h4>
                                        </div>
                                        <div class="card-content collpase show">
                                            <div class="card-body">
                                                <p> Alunos Rematrícula
                                                </p>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered ajax-sourced" id="table_rematricula">
                                                        <thead>
                                                            <tr>
                                                                <th>Código</th>
                                                                <th>Nome</th>
                                                                <th>Status</th>
                                                                <th>Criado em</th>
                                                                <th>Ações</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab2" aria-labelledby="base-tab12">
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Alunos Novos - MATRÍCULA</h4>
                                        </div>
                                        <div class="card-content collpase show">
                                            <div class="card-body">
                                                <p> Alunos Novos
                                                </p>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered ajax-sourced" id="table_matricula">
                                                        <thead>
                                                            <tr>
                                                                <th>Código</th>
                                                                <th>Nome</th>
                                                                <th>Status</th>
                                                                <th>Criado em</th>
                                                                <th>Ações</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab3" aria-labelledby="base-tab13">
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Ex-Alunos Retornando - REMATRÍCULA</h4>
                                        </div>
                                        <div class="card-content collpase show">
                                            <div class="card-body">
                                                <p> Alunos Antigos Retornando
                                                </p>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered ajax-sourced" id="table_antigo_matricula">
                                                        <thead>
                                                            <tr>
                                                                <th>Código</th>
                                                                <th>Nome</th>
                                                                <th>Status</th>
                                                                <th>Criado em</th>
                                                                <th>Ações</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <section id="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Alunos Atuais - REMATRÍCULA</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered ajax-sourced" id="table_rematricula">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nome</th>
                                                <th>Status</th>
                                                <th>Criado em</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Alunos Novos - MATRÍCULA -->
        <section id="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Alunos Novos - MATRÍCULA</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered ajax-sourced" id="table_matricula">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nome</th>
                                                <th>Status</th>
                                                <th>Criado em</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ex-Alunos Retornando -->
        <section id="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ex-Alunos Retornando - REMATRÍCULA</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered ajax-sourced" id="table_antigo_matricula">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nome</th>
                                                <th>Status</th>
                                                <th>Criado em</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

    @stop
    
@section('footer')
    <script src="{{URL::asset('app-assets/vendors/js/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('app-assets/vendors/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    {{-- <script src="{{URL::asset('app-assets/js/data-tables/dt-data-sources.js')}}"></script> --}}

    <script>
        $(function() {

            var table = $('#table_rematricula').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('dados_rematricula') !!}',
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nome', name: 'nome' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name:'created_at'},
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
            "language": {"sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
            
            });

        });

        $(function() {

            var table = $('#table_matricula').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('dados_matricula') !!}',
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nome', name: 'nome' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name:'created_at'},
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
            "language": {"sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
            
            });

        });

        $(function() {

            var table = $('#table_antigo_matricula').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('dados_antigo_matricula') !!}',
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nome', name: 'nome' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name:'created_at'},
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
            "language": {"sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }

            });
        });

    </script>
@stop