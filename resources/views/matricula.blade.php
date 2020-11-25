@extends('template')

@section('conteudo')

<div class="conteudo">
            
    {{-- @if (session()->has('message'))
        <div class="alertas">
            <div class="msg alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('message') }}
            </div>
        </div>
    @endif --}}

    <form class="conteudo" id="matricular_aluno" method="POST" action="{{ route('matricular') }}">
        @csrf

        
        <div class="row horizontal-form-layout">
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card card-inverse bg-warning">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h3 class="card-text">Rematrícula</h3>
                                    <span>26/11/2020 à 08/12/2020</span>
                                </div>
                                <div class="media-right align-self-center">
                                    <i class="ft-alert-triangle font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>

            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card card-inverse bg-danger">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h3 class="card-text">Novos Alunos:</h3>
                                    <span>A partir de 09/12/2020</span>
                                </div>
                                <div class="media-right align-self-center">
                                    <i class="ft-user font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>

            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card card-inverse bg-primary">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h3 class="card-text">Ver Contrato</h3>
                                    <a href="{{ URL::asset('files/contrato_de_prestacao_2021.pdf') }}"><span>Clique aqui</span></a>
                                </div>
                                <div class="media-right align-self-center fonticon-container">
                                    <i class="ft-file font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>

        </div>

        {{-- <div class="msg alert alert-warning alert-dismissible horizontal-form-layout mt-2">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Período de Rematrícula: 26/11/2020 à 08/12/2020
        </div>

        <div class="msg alert alert-success alert-dismissible horizontal-form-layout">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Início de Matrícula para Novos Alunos: 09/12/2020
        </div> --}}

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
                                    <div class="col-md-4 col-12">
                                        <div class="form-group mb-2">
                                            <label for="ficha_serie">Ano ou Período</label>
                                            <select id="ficha_serie" name="ficha_serie" class="form-control" required>
                                                <option value="">Selecione</option>
                                                <option value="Maternal II">Maternal II</option>
                                                <option value="Maternal III">Maternal III</option>
                                                <option value="1º Período">1º Período</option>
                                                <option value="2º Período">2º Período</option>
                                                <option value="1º Ano">1º Ano</option>
                                                <option value="2º Ano">2º Ano</option>
                                                <option value="3º Ano">3º Ano</option>
                                                <option value="4º Ano">4º Ano</option>
                                                <option value="5º Ano">5º Ano</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group mb-2">
                                            <label for="ficha_curso">Curso</label>
                                            <select id="ficha_curso" name="ficha_curso" class="form-control" required>
                                                <option value="">Selecione</option>
                                                {{-- <option value="Maternal">Maternal</option> --}}
                                                <option value="Educação Infantil">Educação Infantil</option>
                                                <option value="Ensino Fundamental">Ensino Fundamental</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group mb-2">
                                            <label for="ficha_turno">Turno</label>
                                            <select id="ficha_turno" name="ficha_turno" class="form-control" required>
                                                <option value="">Selecione</option>
                                                <option value="Manhã">Manhã</option>
                                                <option value="Tarde">Tarde</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group mb-2">
                                            <label for="tipo_matricula">Tipo de Matrícula</label>
                                            <select id="tipo_matricula" name="tipo_matricula" class="form-control" required>
                                                <option value="">Selecione</option>
                                                <option value="Rematrícula" selected>Rematrícula</option>
                                                <option value="Antigo Aluno Retornando" disabled>Antigo Aluno Retornando</option>
                                                <option value="Aluno Novo" disabled>Aluno Novo</option>
                                            </select>
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
                                            <label for="aluno_nome">Nome Completo</label>
                                            <input type="text" minlength="6" maxlength="190" id="aluno_nome" class="form-control text-capitalize" name="aluno_nome" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="aluno_nascimento">Data de Nascimento</label>
                                            <input type="date" maxlength="10" min="1979-12-31" id="aluno_nascimento" class="form-control" name="aluno_nascimento" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="aluno_sexo">Sexo</label>
                                            <select id="aluno_sexo" name="aluno_sexo" class="form-control" required>
                                                <option value="">Selecione</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Feminino">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="aluno_naturalidade">Naturalidade</label>
                                            <input type="text" minlength="3" maxlength="190" id="aluno_naturalidade" class="form-control text-capitalize" name="aluno_naturalidade" 
                                            placeholder="Marabá" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="aluno_cor">Cor/Raça</label>
                                            <select id="aluno_cor" name="aluno_cor" class="form-control" required>
                                                <option value="">Selecione</option>
                                                <option value="Parda">Parda</option>
                                                <option value="Branca">Branca</option>
                                                <option value="Amarela">Amarela</option>
                                                <option value="Negra">Negra</option>
                                                <option value="Indígena">Indígena</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="aluno_celular">Celular</label>
                                            <input minlength="15" maxlength="15" type="text" id="aluno_celular" class="form-control celular" name="aluno_celular" 
                                            placeholder="(94) 9xxxx-xxxx" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="aluno_endereco">Endereço</label>
                                            <input type="text" minlength="6" maxlength="512" id="aluno_endereco" class="form-control text-capitalize" name="aluno_endereco" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="aluno_bairro">Bairro</label>
                                            <input type="text" minlength="5" maxlength="190" id="aluno_bairro" class="form-control text-capitalize" name="aluno_bairro" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="aluno_cep">CEP</label>
                                            <input type="text" minlength="9" maxlength="9" id="aluno_cep" class="form-control" name="aluno_cep" placeholder="68500-000" required>
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
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block mr-2">
                                                <div class="radio">
                                                    <input type="radio" name="dados_pai" id="sim" value="sim" checked>
                                                    <label for="sim">Informar Dados do Pai</label>
                                                </div>
                                            </li>
                                            <li class="d-inline-block mr-2">
                                                <div class="radio">
                                                    <input type="radio" name="dados_pai" id="nao" value="nao">
                                                    <label for="nao">Não Informar Dados do Pai</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2 grupo_cpf">
                                            <label for="pai_cpf">CPF</label>
                                            <input type="text" class="form-control cpf field_pai" onpaste="return false" onkeypress="formatar('###.###.###-##', this, event);" 
                                            id="pai_cpf" name="pai_cpf" placeholder="xxx.xxx.xxx-xx" onfocusout="validarCPF('pai_cpf');"
                                            minlength="14" maxlength="14" >
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_nascimento">Data de Nascimento</label>
                                            <input type="date" maxlength="10" min="1979-12-31" id="pai_nascimento" class="form-control field_pai" name="pai_nascimento" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_nome">Nome do Pai</label>
                                            <input type="text" minlength="6" maxlength="190" id="pai_nome" class="form-control text-capitalize field_pai" name="pai_nome" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_rg">RG</label>
                                            <input type="number" maxlength="190" id="pai_rg" class="form-control field_pai" name="pai_rg" >
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_expedidor">Orgão Expedidor</label>
                                            <input type="text" maxlength="190" id="pai_expedidor" class="form-control field_pai text-uppercase" name="pai_expedidor" >
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_expedicao">Data de Expedição</label>
                                            <input type="date" maxlength="10" min="1900-12-31" id="pai_expedicao" class="form-control field_pai" name="pai_expedicao" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_instrucao">Grau de Instrução</label>
                                            <select id="pai_instrucao" name="pai_instrucao" class="form-control field_pai" >
                                                <option value="">Selecione</option>
                                                <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                                                <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                                                <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                                                <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                                                <option value="Superior Incompleto">Superior Incompleto</option>
                                                <option value="Superior Completo">Superior Completo</option>
                                                <option value="Pós-graduação">Pós-graduação</option>
                                                <option value="Mestrado">Mestrado</option>
                                                <option value="Doutorado">Doutorado</option>
                                                <option value="Pós-Doutorado">Pós-Doutorado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_email">Email</label>
                                            <input type="email" maxlength="190" id="pai_email" class="form-control field_pai" name="pai_email">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_celular">Celular</label>
                                            <input minlength="15" maxlength="15" type="text" id="pai_celular" class="form-control celular field_pai" name="pai_celular" 
                                            placeholder="(94) 9xxxx-xxxx" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_trabalho">Local de Trabalho</label>
                                            <input type="text" maxlength="190" id="pai_trabalho" class="form-control text-capitalize field_pai" name="pai_trabalho" >
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_profissao">Profissão</label>
                                            <input type="text" maxlength="190" id="pai_profissao" class="form-control text-capitalize field_pai" name="pai_profissao" >
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="pai_telefone_trabalho">Telefone do Trabalho</label>
                                            <input minlength="13" maxlength="14" type="text" id="pai_telefone_trabalho" class="form-control telefone_trabalho field_pai" name="pai_telefone_trabalho" 
                                            placeholder="Fixo ou Celular" >
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
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2 grupo_cpf">
                                            <label for="mae_cpf">CPF</label>
                                            <input type="text" class="form-control cpf" onpaste="return false" onkeypress="formatar('###.###.###-##', this, event);" 
                                            id="mae_cpf" name="mae_cpf" placeholder="xxx.xxx.xxx-xx" onfocusout="validarCPF('mae_cpf');"
                                            minlength="14" maxlength="14" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_nascimento">Data de Nascimento</label>
                                            <input type="date" maxlength="10" min="1979-12-31" id="mae_nascimento" class="form-control" name="mae_nascimento" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_nome">Nome da Mãe</label>
                                            <input type="text" minlength="6" maxlength="190" id="mae_nome" class="form-control text-capitalize" name="mae_nome" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_rg">RG</label>
                                            <input type="number" maxlength="190" id="mae_rg" class="form-control" name="mae_rg" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_expedidor">Orgão Expedidor</label>
                                            <input type="text" maxlength="190" id="mae_expedidor" class="form-control text-uppercase" name="mae_expedidor" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_expedicao">Data de Expedição</label>
                                            <input type="date" maxlength="10" min="1900-12-31" id="mae_expedicao" class="form-control" name="mae_expedicao" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_instrucao">Grau de Instrução</label>
                                            <select id="mae_instrucao" name="mae_instrucao" class="form-control" required>
                                                <option value="">Selecione</option>
                                                <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                                                <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                                                <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                                                <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                                                <option value="Superior Incompleto">Superior Incompleto</option>
                                                <option value="Superior Completo">Superior Completo</option>
                                                <option value="Pós-graduação">Pós-graduação</option>
                                                <option value="Mestrado">Mestrado</option>
                                                <option value="Doutorado">Doutorado</option>
                                                <option value="Pós-Doutorado">Pós-Doutorado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_email">Email</label>
                                            <input type="email" maxlength="190" id="mae_email" class="form-control" name="mae_email">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_celular">Celular</label>
                                            <input minlength="15" maxlength="15" type="text" id="mae_celular" class="form-control celular" name="mae_celular" 
                                            placeholder="(94) 9xxxx-xxxx" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_trabalho">Local de Trabalho</label>
                                            <input type="text" maxlength="190" id="mae_trabalho" class="form-control text-capitalize" name="mae_trabalho" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_profissao">Profissão</label>
                                            <input type="text" maxlength="190" id="mae_profissao" class="form-control text-capitalize" name="mae_profissao" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="mae_telefone_trabalho">Telefone do Trabalho</label>
                                            <input minlength="13" maxlength="14" type="text" id="mae_telefone_trabalho" class="form-control telefone_trabalho" name="mae_telefone_trabalho" 
                                            placeholder="Fixo ou Celular">
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
                                <div class="form-row">
                                    <div class="col-md-9 col-12">
                                        <div class="form-group mb-2">
                                            <label for="parente_nome_1">Nome</label>
                                            <input type="text" minlength="6" maxlength="190" id="parente_nome_1" class="form-control text-capitalize" name="parente_nome_1">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="parente_celular_1">Celular</label>
                                            <input minlength="15" maxlength="15" type="text" id="parente_celular_1" class="form-control celular" name="parente_celular_1" 
                                            placeholder="(94) 9xxxx-xxxx">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-9 col-12">
                                        <div class="form-group mb-2">
                                            <label for="parente_nome_2">Nome</label>
                                            <input type="text" minlength="6" maxlength="190" id="parente_nome_2" class="form-control text-capitalize" name="parente_nome_2">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-2">
                                            <label for="parente_celular_2">Celular</label>
                                            <input minlength="15" maxlength="15" type="text" id="parente_celular_2" class="form-control celular" name="parente_celular_2" 
                                            placeholder="(94) 9xxxx-xxxx">
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
                                <div class="form-row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mb-2">
                                            <label for="situacao_especial">Esclarecer se os pais são adotivos, falecidos, separados, se a criança é educada por outra pessoa, etc.</label>
                                            <textarea rows="2" maxlength="512" id="situacao_especial" class="form-control textarea" name="situacao_especial">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="quem_cuida">Quem mais cuida da criança?</label>
                                            <input type="text" maxlength="190" id="quem_cuida" class="form-control text-capitalize" name="quem_cuida" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="religiao">Religião da família</label>
                                            <input type="text" maxlength="190" id="religiao" class="form-control text-capitalize" name="religiao" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="n_irmaos">Quantos irmãos tem?</label>
                                            <input type="number" max="30" maxlength="2" id="n_irmaos" class="form-control text-capitalize" name="n_irmaos" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="posicao_familia">Posição da criança na família</label>
                                            <input type="text" maxlength="190" id="posicao_familia" class="form-control text-capitalize" name="posicao_familia">
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
                                            <textarea rows="4" maxlength="1024" id="outras_informacoes" class="form-control textarea" name="outras_informacoes">
                                            </textarea>
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


        <div class="horizontal-form-layout text-right">
            <button type="submit" class="btn text-white bg-danger bg-darken-2 mr-2"><i class="icon-paper-plane mr-1"></i>Enviar</button>
        </div>
    </form>


</div>

<button class="btn text-white bg-danger bg-darken-2 scroll-top" type="button"><i class="ft-arrow-up"></i></button>

@stop

@section('footer')

    <script>

        $(".celular").mask("(00) 00000-0000");
        $(".telefone_trabalho").mask("(00) 000000009");
        $("#aluno_cep").mask("99999-999");
        $('.textarea').text('');

        $( document ).ready(function() {
            $('.field_pai').attr('required', true);
        });

        $('input[type=radio][name=dados_pai]').change(function() {
            if (this.value == 'sim') {
                $('.field_pai').removeAttr('readonly');
                $('.field_pai').attr('required', true);
                $('.field_pai').removeClass('desabilitado');

                //TESTAR
            }
            else{
                $('.field_pai').removeClass('invalido');
                $('.issue').removeClass('issue');
                $('.field_pai').val('');
                $('.field_pai').attr('readonly', true);
                $('.field_pai').removeAttr('required');
                $('.field_pai').addClass('desabilitado');
            }
        });
        
        $('.cpf').on('keyup', function () {
            $('.grupo_cpf').removeClass('validate');
            $(this).removeClass('valido');
            $(this).addClass('invalido');
            validarCPF($(this));
        });

        function formatar(mascara, documento, event){
            var tecla=(window.event)?event.keyCode:e.which;
            if((tecla>47 && tecla<58)){ //somente numeros
                var i = documento.value.length;
                var saida = mascara.substring(0,1);
                var texto = mascara.substring(i);
                if (texto.substring(0,1) != saida){
                    documento.value += texto.substring(0,1);
                }
            }else{
                if (tecla==8 || tecla==0) return true;
            else  event.preventDefault();
            }
        }

        function vercpf(cpf) {
            if (cpf.length != 11 ||
                cpf == "00000000000" ||
                cpf == "11111111111" ||
                cpf == "22222222222" ||
                cpf == "33333333333" ||
                cpf == "44444444444" ||
                cpf == "55555555555" ||
                cpf == "66666666666" ||
                cpf == "77777777777" ||
                cpf == "88888888888" ||
                cpf == "99999999999")
                return false;

            add = 0;

            for (i = 0; i < 9; i++)
                add += parseInt(cpf.charAt(i)) * (10 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
                rev = 0;
            if (rev != parseInt(cpf.charAt(9)))
                return false;
            add = 0;
            for (i = 0; i < 10; i++)
                add += parseInt(cpf.charAt(i)) * (11 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
                rev = 0;
            if (rev != parseInt(cpf.charAt(10)))
                return false;
            return true;
        }

        function validarCPF(element){

            var inputCpf = document.getElementById($(element).attr('id'));
            var pai_mae = $(element).attr('id') == 'pai_cpf' ? 'pai' : 'mae';
            $('.grupo_cpf').removeClass('validate');
            if(inputCpf != null){
                var cpf = inputCpf.value;
                cpf = cpf.replace(/\./g,''); //remove todos os pontos
                cpf = cpf.replace('-', '');
                if (!vercpf(cpf)){
                    $(element).removeClass('valido');
                    $(element).addClass('invalido');
                    inputCpf.setCustomValidity('CPF inválido!');
                }else{
                    $(element).removeClass('invalido');
                    $(element).addClass('valido');
                    inputCpf.setCustomValidity('');

                    buscarDadosAjax(inputCpf.value, pai_mae);
                }
            }
        }

        function buscarDadosAjax(cpf, pai_mae){
            
            EasyLoading.show({
                text: $("<span>Aguarde...</span>"),
                type: EasyLoading.TYPE['BALL_TRIANGLE_PATH']
            });

            $.ajax({
                url: "<?php echo route('selectDadosAjax') ?>",
                method: 'GET',
                data: {cpf: cpf,
                    pai_mae: pai_mae},
                dataType: 'json',
                success: function(data) {
                    if(data['data'] != null){
                        if(pai_mae == 'pai'){
                            $('#pai_nascimento').val(data['data'].data_nascimento);
                            $('#pai_nome').val(data['data'].nome);
                            $('#pai_rg').val(data['data'].rg);
                            $('#pai_expedidor').val(data['data'].orgao_expedidor);
                            $('#pai_expedicao').val(data['data'].data_expedicao);
                            $('#pai_instrucao').val(data['data'].grau_instrucao);
                            $('#pai_email').val(data['data'].email);
                            $('#pai_celular').val(data['data'].celular);
                            $('#pai_trabalho').val(data['data'].local_trabalho);
                            $('#pai_profissao').val(data['data'].profissao);
                            $('#pai_telefone_trabalho').val(data['data'].telefone_trabalho);
                            
                        }else{
                            $('#mae_nascimento').val(data['data'].data_nascimento);
                            $('#mae_nome').val(data['data'].nome);
                            $('#mae_rg').val(data['data'].rg);
                            $('#mae_expedidor').val(data['data'].orgao_expedidor);
                            $('#mae_expedicao').val(data['data'].data_expedicao);
                            $('#mae_instrucao').val(data['data'].grau_instrucao);
                            $('#mae_email').val(data['data'].email);
                            $('#mae_celular').val(data['data'].celular);
                            $('#mae_trabalho').val(data['data'].local_trabalho);
                            $('#mae_profissao').val(data['data'].profissao);
                            $('#mae_telefone_trabalho').val(data['data'].telefone_trabalho);
                        }
                    }
                    EasyLoading.hide();
                },
                error:function(jqXHR, textStatus, errorThrown){
                    EasyLoading.hide();
                    console.log('Error: ' + errorThrown + ' ' + textStatus + ' ' + jqXHR);
                }
            });

        }

        @if (session()->has('message'))
            Swal.fire({
                title: "Pré-Matrícula Confirmada!",
                html: "Aguarde o prazo de 1 dia útil para dirigir-se ao Monteiro Lobato e assine o contrato de Matrícula.<br> Se preferir, " +
                "agende através do What's App: 99115-5070, <br> ou " + 
                "<a href='https://api.whatsapp.com/send?phone=5594991155070' target='_blank'>clique aqui</a>",
                type: "success",
                confirmButtonClass: 'btn btn-success',
                buttonsStyling: false,
            });
        @endif

    </script>

@stop

    

