@extends('template')

@section('header')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .tabela{
            min-height: 66vh;
            align-self: center;
            width: 90%;
        }
        .badge.bg-light-danger{
            cursor: text;
        }
    </style>

@stop

@section('conteudo')

    {{-- @if($matricula->status == 'Em Análise')
        <div class="msg alert alert-warning alert-dismissible horizontal-form-layout mt-2">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Dados do aluno em análise.
        </div>
    @endif --}}

    @if($matricula->status == 'Concluído')
        <div class="msg alert alert-success alert-dismissible horizontal-form-layout mt-2">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Migração de dados do aluno para matrícula já foi concluída.
        </div>
    @endif

    <form class="conteudo" id="matricular_aluno" method="POST" action="{{ route('concluir', [$aluno->id]) }}">
        @csrf

     <!-- Ficha de Matrícula -->
        <section class="horizontal-form-layout">
            <div class="row match-height">
                <!-- Basic Form starts -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ficha de Matrícula</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Tipo: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$matricula->tipo_matricula}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Ano ou Período: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$matricula->serie_periodo}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Curso: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$matricula->curso}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Turno: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$matricula->turno}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Form ends -->
            </div>
        </section>

        <!-- Identificação do Aluno -->
         <section class="horizontal-form-layout">
            <div class="row match-height">
                <!-- Basic Form starts -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Identificação do Aluno</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Nome: </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->nome}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Data de Nascimento: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->dataNascimento()}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Sexo: </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->sexo}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Naturalidade: </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->naturalidade}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Cor/Raça: </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->cor}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Celular: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->celular}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Endereço</label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->endereco}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Bairro</label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->bairro}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">CEP</label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->cep}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Form ends -->
            </div>
        </section>
        
        <!-- Dados de Filiação - PAI -->
        @if($aluno->pais != null)
            <section class="horizontal-form-layout">
                <div class="row match-height">
                    <!-- Basic Form starts -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dados de Filiação - PAI</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Nome do Pai: </label>
                                                <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->pais->nome}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Data de Nascimento: </label>
                                                <label class="badge bg-light-danger font-weight-bold">{{$aluno->pais->dataNascimento()}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mb-2 grupo_cpf">
                                                <label class="font-weight-bold">CPF: </label>
                                                <label class="badge bg-light-danger font-weight-bold">{{$aluno->pais->cpf}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">RG: </label>
                                                <label class="badge bg-light-danger font-weight-bold">{{$aluno->pais->rg}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Orgão Expedidor: </label>
                                                <label class="badge bg-light-danger font-weight-bold">{{$aluno->pais->orgao_expedidor}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Data de Expedição: </label>
                                                <label class="badge bg-light-danger font-weight-bold">{{$aluno->pais->dataExpedicao()}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Grau de Instrução: </label>
                                                <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->pais->grau_instrucao}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Email: </label>
                                                <label class="badge bg-light-danger text-lowercase font-weight-bold">{{$aluno->pais->email}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Celular: </label>
                                                <label class="badge bg-light-danger font-weight-bold">{{$aluno->pais->celular}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Local de Trabalho: </label>
                                                <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->pais->local_trabalho}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Profissão: </label>
                                                <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->pais->profissao}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Tel. Trabalho: </label>
                                                <label class="badge bg-light-danger font-weight-bold">{{$aluno->pais->telefone_trabalho}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Basic Form ends -->
                </div>
            </section>
        @endif
        
        <!-- Dados de Filiação - MÃE -->
        <section class="horizontal-form-layout">
            <div class="row match-height">
                <!-- Basic Form starts -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Dados de Filiação - MÃE</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Nome do Mãe: </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->maes->nome}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Data de Nascimento: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->maes->dataNascimento()}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2 grupo_cpf">
                                            <label class="font-weight-bold">CPF: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->maes->cpf}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">RG: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->maes->rg}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Orgão Expedidor: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->maes->orgao_expedidor}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Data de Expedição: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->maes->dataExpedicao()}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Grau de Instrução: </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->maes->grau_instrucao}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Email: </label>
                                            <label class="badge bg-light-danger text-lowercase font-weight-bold">{{$aluno->maes->email}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Celular: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->maes->celular}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Local de Trabalho: </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->maes->local_trabalho}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Profissão: </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->maes->profissao}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Tel. Trabalho: </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->maes->telefone_trabalho}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Form ends -->
            </div>
        </section>

        
        <!-- Parentes para Contato -->
        @if($aluno->parente_1 != null || $aluno->parente_2 != null)
            <section class="horizontal-form-layout">
                <div class="row match-height">
                    <!-- Basic Form starts -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Parentes para Contato</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    @if($aluno->parente_1 != null)
                                        <div class="form-row">
                                            <div class="col-md-9 col-12">
                                                <div class="form-group mb-2">
                                                    <label class="font-weight-bold">Nome: </label>
                                                    <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->parente_1->nome}}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="form-group mb-2">
                                                    <label class="font-weight-bold">Celular: </label>
                                                    <label class="badge bg-light-danger font-weight-bold">{{$aluno->parente_1->celular}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($aluno->parente_2 != null)
                                        <div class="form-row">
                                            <div class="col-md-9 col-12">
                                                <div class="form-group mb-2">
                                                    <label class="font-weight-bold">Nome: </label>
                                                    <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->parente_2->nome}}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="form-group mb-2">
                                                    <label class="font-weight-bold">Celular: </label>
                                                    <label class="badge bg-light-danger font-weight-bold">{{$aluno->parente_2->celular}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Basic Form ends -->
                </div>
            </section>
        @endif
        
         
        <!-- Situacoes Especiais -->
        <section class="horizontal-form-layout">
            <div class="row match-height">
                <!-- Basic Form starts -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Situações Especiais</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                @if($aluno->situacoes->esclarecimento != null)
                                    <div class="form-row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-2">
                                                <label class="font-weight-bold">Esclarecer se os pais são adotivos, falecidos, separados, se a criança é educada por outra pessoa, etc.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-2">
                                                <label class="badge bg-light-danger font-weight-bold">{{$aluno->situacoes->esclarecimento}}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Quem mais cuida da criança? </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->situacoes->quem_cuida}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Religião da família: </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->situacoes->religiao}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Quantos irmãos tem? </label>
                                            <label class="badge bg-light-danger font-weight-bold">{{$aluno->situacoes->n_irmaos}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="font-weight-bold">Posição da criança na família: </label>
                                            <label class="badge bg-light-danger text-capitalize font-weight-bold">{{$aluno->situacoes->posicao_faimilia}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Form ends -->
            </div>
        </section>

        
        <!-- Informações Relevantes -->
        @if($aluno->situacoes->outras_informacoes != null)
            <section class="horizontal-form-layout">
                <div class="row match-height">
                    <!-- Basic Form starts -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Outras Informações Julgadas Importantes</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-2">
                                                <label class="badge bg-light-danger font-weight-bold">{{$aluno->situacoes->outras_informacoes}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Basic Form ends -->
                </div>
            </section>
        @endif


        <div class="horizontal-form-layout text-right">
            <button type="submit" class="btn btn-info mr-2" @if($matricula->status == 'Concluído') disabled @endif><i class="icon-lock mr-1"></i>Concluir</button>
            <a href="{{ route('imprimir', [$aluno->id]) }}" target="_blank" class="btn btn-primary mr-2 imprimir"><i class="icon-printer mr-1"></i>Imprimir</button>
            <a href="{{ url('/dashboard') }}" class="btn text-white bg-danger bg-darken-2 mr-2"><i class="icon-arrow-left mr-1"></i> Voltar</a>
        </div>
    </form>

@stop
    
@section('footer')

    <script>
        
        

    </script>
@stop