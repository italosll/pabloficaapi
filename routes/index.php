<?php
use function src\slimConfiguration;
use App\Controllers\{
    PacienteController, 
    ImcController, 
    ExameController, 
    ExercicioController,
    ConsultaController,
    AutenticacaoController
};
use Tuupola\Middleware\JwtAuthentication;
use function src\JwtAuth;
use App\Middlewares\JwtDateTimeMiddleware;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

$app->post('/login', AutenticacaoController::class.':login');
$app->post('/refresh_token', AutenticacaoController::class.':refreshToken');


$app->get('/teste', function(){return $response = (["teste"=>"teste"]);})
        ->add(JwtDateTimeMiddleware::class.':teste')
        ->add(JwtAuth());


//===========================================

//===========================================

$app->get('/paciente', PacienteController::class.':getAllPaciente')
->add(JwtDateTimeMiddleware::class.':teste')
->add(JwtAuth());


$app->post('/paciente', PacienteController::class.':insertPaciente');
$app->put('/paciente', PacienteController::class.':updatePaciente');
$app->delete('/paciente', PacienteController::class.':deletePaciente');

$app->get('/imc', ImcController::class.':getAllImc');
$app->post('/imc', ImcController::class.':insertImc');
$app->put('/imc', ImcController::class.':updateImc');
$app->delete('/imc', ImcController::class.':deleteImc');

$app->get('/exercicio', ExercicioController::class.':getAllExercicio');
$app->post('/exercicio', ExercicioController::class.':insertExercicio');
$app->put('/exercicio', ExercicioController::class.':updateExercicio');
$app->delete('/exercicio', ExercicioController::class.':deleteExercicio');

$app->get('/exame', ExameController::class.':getAllExame');
$app->post('/exame', ExameController::class.':insertExame');
$app->put('/exame', ExameController::class.':updateExame');
$app->delete('/exame', ExameController::class.':deleteExame');

$app->get('/consulta', ConsultaController::class.':getAllConsulta');
$app->post('/consulta', ConsultaController::class.':insertConsulta');
$app->put('/consulta', ConsultaController::class.':updateConsulta');
$app->delete('/consulta', ConsultaController::class.':deleteConsulta');



//===========================================


$app->run();