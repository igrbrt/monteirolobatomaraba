<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Pai;
use App\Models\Mae;
use App\Models\Aluno;
use App\Models\Parente;
use App\Models\Situacoes;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;

require __DIR__ . '/../../../vendor/autoload.php';

use PHPJasper\PHPJasper;

class MatriculaController extends Controller
{
    
    public function store(Request $request){
        
        $pai = null;
        if($request->dados_pai == 'sim'){
            $pai = Pai::where('cpf',$request->pai_cpf)->first();

            if($pai == null){
                $pai = Pai::create(['nome' => ucwords($request->pai_nome),
                                'data_nascimento' => $request->pai_nascimento,
                                'cpf' => $request->pai_cpf,
                                'rg' => $request->pai_rg,
                                'orgao_expedidor' => strtoupper($request->pai_expedidor),
                                'data_expedicao' => $request->pai_expedicao,
                                'grau_instrucao' => $request->pai_instrucao,
                                'email' => strtolower($request->pai_email),
                                'celular' => $request->pai_celular,
                                'local_trabalho' => ucwords($request->pai_trabalho),
                                'profissao' => ucwords($request->pai_profissao),
                                'telefone_trabalho' => $request->pai_telefone_trabalho,
                                ]);
            }   
        }
        
        $mae = Mae::where('cpf',$request->mae_cpf)->first();
        if($mae == null){
            $mae = Mae::create(['nome' => ucwords($request->mae_nome),
                                'data_nascimento' => $request->mae_nascimento,
                                'cpf' => $request->mae_cpf,
                                'rg' => $request->mae_rg,
                                'orgao_expedidor' => strtoupper($request->mae_expedidor),
                                'data_expedicao' => $request->mae_expedicao,
                                'grau_instrucao' => $request->mae_instrucao,
                                'email' => strtolower($request->mae_email),
                                'celular' => $request->mae_celular,
                                'local_trabalho' => ucwords($request->mae_trabalho),
                                'profissao' => ucwords($request->mae_profissao),
                                'telefone_trabalho' => $request->mae_telefone_trabalho,
                                ]);
        }

        $parente_1 = null;
        if($request->parente_nome_1 != ''){
            $parente_1 = Parente::create(['nome' => ucwords($request->parente_nome_1),
                                'celular' => $request->parente_celular_1,
                                ]);
        }
        
        $parente_2 = null;
        if($request->parente_nome_2 != ''){
            $parente_2 = Parente::create(['nome' => ucwords($request->parente_nome_2),
                                'celular' => $request->parente_celular_2,
                                ]);
        }

        $situacoes = Situacoes::create(['esclarecimento' => ucfirst($request->situacao_especial),
                            'quem_cuida' => ucfirst($request->quem_cuida),
                            'religiao' => ucfirst($request->religiao),
                            'n_irmaos' => $request->n_irmaos,
                            'posicao_familia' => ucfirst($request->posicao_familia),
                            'outras_informacoes' => ucfirst($request->outras_informacoes),
                            ]);
        
        $aluno = Aluno::create(['nome' => ucwords($request->aluno_nome),
                            'data_nascimento' => $request->aluno_nascimento,
                            'naturalidade' => ucwords($request->aluno_naturalidade),
                            'sexo' => $request->aluno_sexo,
                            'cor' => $request->aluno_cor,
                            'celular' => $request->aluno_celular,
                            'endereco' => ucwords($request->aluno_endereco),
                            'bairro' => ucwords($request->aluno_bairro),
                            'cep' => $request->aluno_cep,
                            'pai_id' => $pai != null ? $pai->id : null,
                            'mae_id' => $mae->id,
                            'parente_1_id' => $parente_1 != null ? $parente_1->id : null,
                            'parente_2_id' => $parente_2 !=null ? $parente_2->id : null,
                            'situacoes_id' => $situacoes->id,
                            ]);

        $matricula = Matricula::create(['serie_periodo' => $request->ficha_serie,
                            'curso' => $request->ficha_curso,
                            'turno' => $request->ficha_turno,
                            'tipo_matricula' => $request->tipo_matricula,
                            'aluno_id' => $aluno->id,
                            'status' => 'Em Análise',
                            'ano' => '2021',
                            ]);

        return redirect('/')->with('message', 'Aluno matriculado com sucesso!');
    }

    /** Detalhar Aluno */
    public function getAluno(Request $request){
        $aluno = Aluno::with('pais')->with('maes')->with('parente_1')->with('parente_2')->with('situacoes')->find($request->id);
        $matricula = Matricula::where('aluno_id', $request->id)->where('ano', '2021')->first();
        return view('ver_aluno', compact('aluno', 'matricula')); 
    }

    /** Alterar status do aluno para concluido, quando ele eh cadastrado no sistema do colegio (matricula) */
    public function concluir(Request $request){
        $matricula = Matricula::where('aluno_id', $request->id)->where('ano', '2021')->update(['status' => 'Concluído']);
        return Redirect::route('dashboard')->with('message', 'Aluno concluído com sucesso!');
    }

    /** Buscar dados dos pais de acordo com o cpf */
    public function buscarDadosAjax(Request $request){
        $pai_ou_mae = null;

        if($request->pai_mae == 'pai'){
            $pai_ou_mae = Pai::where('cpf', $request->cpf)->first();
        }else{
            $pai_ou_mae = Mae::where('cpf', $request->cpf)->first();
        }
        
        return json_encode(['data' => $pai_ou_mae]);
    }

    /** Preencher datatable com dados de atuais alunos para rematricula */
    public function dadosRematricula(){
        // $alunos = Aluno::select('alunos.id as id', 'nome', 'matriculas.status as status', 'matriculas.created_at as created_at')
        //          ->join('matriculas', 'matriculas.aluno_id', '=', 'alunos.id')
        //          ->where('matriculas.tipo_matricula', 'Rematrícula');

         $alunos = Aluno::select('alunos.id as id', 'nome', 'matriculas.created_at as created_at')
                 ->join('matriculas', 'matriculas.aluno_id', '=', 'alunos.id')
                 ->where('matriculas.tipo_matricula', 'Rematrícula')
                 ->where('matriculas.ano', '2021');

        return DataTables::of($alunos)
        ->editColumn(
            'created_at',
            function (Aluno $aluno) {
                return $aluno->created_at->diffForHumans();
            }
        )
        ->addColumn(
            'status',
            function (Aluno $aluno) {
                $matricula = Matricula::where('aluno_id', $aluno->id)->where('ano', '2021')->first(['status']);
                return $matricula->status == 'Concluído' ? $matricula->status . ' <i class="fa fa-check text-success" title="Concluído"></i>' : 
                                                            $matricula->status . ' <i class="fa fa-clock-o text-warning" title="Em Análise"></i>';
            }
        )
        ->addColumn(
            'actions',
            function ($aluno) {
                $actions = '<a href='. route('ver_aluno', $aluno->id) .'><i class="icon-eye icons" data-size="18" title="Visualizar"></i></a>
                            <a href='. route('imprimir', $aluno->id) .'><i class="icon-printer icons ml-1" data-size="18" title="Impirmir"></i></a>';
                return $actions;
            }
        )
        ->rawColumns(['actions', 'status'])
        ->make(true);
    }

    /** Preencher datatable com dados de novos alunos para matricula */
    public function dadosMatricula(){

        $alunos = Aluno::select('alunos.id', 'nome', 'matriculas.created_at')
                ->join('matriculas', 'matriculas.aluno_id', '=', 'alunos.id')
                ->where('matriculas.tipo_matricula', 'Aluno Novo')
                ->where('matriculas.ano', '2021');

        return DataTables::of($alunos)
        ->editColumn(
            'created_at',
            function (Aluno $aluno) {
                return $aluno->created_at->diffForHumans();
            }
        )
        ->addColumn(
            'status',
            function (Aluno $aluno) {
                $matricula = Matricula::where('aluno_id', $aluno->id)->where('ano', '2021')->first(['status']);
                return $matricula->status == 'Concluído' ? $matricula->status . ' <i class="fa fa-check text-success" title="Concluído"></i>' : 
                                                            $matricula->status . ' <i class="fa fa-clock-o text-warning" title="Em Análise"></i>';
            }
        )
        ->addColumn(
            'actions',
            function ($aluno) {
                $actions = '<a href='. route('ver_aluno', $aluno->id) .'><i class="icon-eye icons" data-size="18" title="Visualizar"></i></a>
                            <a href='. route('imprimir', $aluno->id) .'><i class="icon-printer icons ml-1" data-size="18" title="Impirmir"></i></a>';
                return $actions;
            }
        )
        ->rawColumns(['actions', 'status'])
        ->make(true);
    }

    /** Preencher datatable com dados de ex alunos para rematricula */
    public function dadosAntigoMatricula(){

        $alunos = Aluno::select('alunos.id', 'nome', 'matriculas.created_at')
                ->join('matriculas', 'matriculas.aluno_id', '=', 'alunos.id')
                ->where('matriculas.tipo_matricula', 'Antigo Aluno Retornando')
                ->where('matriculas.ano', '2021');

        return DataTables::of($alunos)
        ->editColumn(
            'created_at',
            function (Aluno $aluno) {
                return $aluno->created_at->diffForHumans();
            }
        )
        ->addColumn(
            'status',
            function (Aluno $aluno) {
                $matricula = Matricula::where('aluno_id', $aluno->id)->where('ano', '2021')->first(['status']);
                return $matricula->status == 'Concluído' ? $matricula->status . ' <i class="fa fa-check text-success" title="Concluído"></i>' : 
                                                            $matricula->status . ' <i class="fa fa-clock-o text-warning" title="Em Análise"></i>';
            }
        )
        ->addColumn(
            'actions',
            function ($aluno) {
                $actions = '<a href='. route('ver_aluno', $aluno->id) .'><i class="icon-eye icons" data-size="18" title="Visualizar"></i></a>
                            <a href='. route('imprimir', $aluno->id) .'><i class="icon-printer icons ml-1" data-size="18" title="Impirmir"></i></a>';
                return $actions;
            }
        )
        ->rawColumns(['actions', 'status'])
        ->make(true);
    }

    public function imprimir(Request $request)
    {
        $output = public_path() . '/reports/' . 'matricula';
        $file = $output . '.pdf';

        if (file_exists($file)) {
            unlink($file);
        }

        $jdbc_dir = '"'. base_path() . '/vendor/geekcom/phpjasper/bin/jasperstarter/jdbc' . '"';
        $options = [
            'format' => ['pdf'],
            'params' => ['DQ_UserInput' => $request->id],
            'db_connection' => [
                'driver' => env('DB_CONNECTION'), //mysql, ....
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'host' => env('DB_HOST'),
                'database' => env('DB_DATABASE'),
                'port' => env('DB_PORT'),
                // 'jdbc_driver' => 'com.mysql.jdbc.Driver',
                // 'jdbc_url' => 'jdbc:mysql://localhost/monteiro',
                'jdbc_dir' => $jdbc_dir
            ]
        ];
                    
        $report = new PHPJasper;
                
        $report->process(
            public_path() . '/reports/ficha_matricula.jrxml',
            $output,
            $options
        )->execute();
        
        
        $headers = array(
            'Content-Type'=> 'application/pdf',
          );
        
        return Response::download($file, 'matricula.pdf', $headers);
            
    }

}
