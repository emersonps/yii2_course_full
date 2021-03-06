<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Client;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use app\models\Funcionario;
use app\models\Cargo;
use app\models\Pessoa;
use app\models\PessoaFisica;
use app\models\Programador;
use app\models\Linguagem;
use app\models\ProgramadorLinguagem;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    /*ACTIONS STAND ALONE*/
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $this->renderPartial('index');//renderiza sem layout
        // $this->renderAjax('index');//renderiza incluíndo todos os JS, Ajax,SS, arquivos registrados. Usado em requisições AJAX
        // $this->renderFile('@app/..');//renderiza através de uma alias.
        // $this->renderStatic('index');//Incorpora um conteúdo estático nesse layout.
        // Yii::$app->view->renderFile('');//Chamar view em qualquer lugar do arquivo.

        // $auth = Yii::$app->authManager;

        //Criando Auth Pai
        // $admin = $auth->createRole('administrador');
        // $supervisor = $auth->createRole('supervisor');
        // $operador = $auth->createRole('operador');

        //Gerando Auth Pai - Verificar arquivo rbac\items
        // $auth->add($admin);
        // $auth->add($supervisor);
        // $auth->add($operador);

        //Criando Auth Pai
        // $viewPost = $auth->createPermission('post-index');
        // $addPost = $auth->createPermission('post-create');
        // $editPost = $auth->createPermission('post-edit');
        // $deletePost = $auth->createPermission('post-delete');

        //Gerando Auth 
        // $auth->add($viewPost);
        // $auth->add($addPost);
        // $auth->add($editPost);
        // $auth->add($deletePost);

        //Tornando Auth anteriores em filhas  
        // $auth->addChild($admin, $viewPost);
        // $auth->addChild($admin, $addPost);
        // $auth->addChild($admin, $editPost);
        // $auth->addChild($admin, $deletePost);

        // $auth->addChild($supervisor, $addPost);
        // $auth->addChild($supervisor, $editPost);
        // $auth->addChild($supervisor, $viewPost);

        // $auth->addChild($operador, $viewPost);

        //Atribuíndo regras a usuários. 
        // $auth->assign($admin, 1); //Usuario 1 Fulano A
        // $auth->assign($supervisor, 2); //Usuario 1 Fulano B
        // $auth->assign($operador, 3); //Usuario 1 Fulano C

        //==> Helper Strings

        //terceiro parâmetro serve para ignorar ou não o case-sensitive
        // var_dump(StringHelper::startsWith('Yii Academy', 'Yii',false));
        // var_dump(StringHelper::endsWith('Academy', 'Academy'));
        // var_dump(StringHelper::countWords('Emerson Pinheiro de Souza'));
        // var_dump(StringHelper::truncate('Emerson Pinheiro de Souza', 4,' (...)'));
        // var_dump(StringHelper::truncateWords('Emerson Pinheiro de Souza', 2));
        // var_dump(StringHelper::truncateWords('Emerson Pinheiro de Souza', 2));

        // $client = new Client;

        // $client->name = "Emerson Pinheiro";
        // if(!$client->save()){
        //     echo '<prev>';
        //     print_r($client->getErrors());die;
        // }

        // echo 'OK';
        // die;
        
        //==> Aliases

        // echo '<h1>'.(Yii::getAlias('@yii')).'</h1>';
        // echo '<h1>'.(Yii::getAlias('@webroot')).'</h1>';
        // echo '<h1>'.(Yii::getAlias('@vendor')).'</h1>';
        // echo '<h1>'.(Yii::getAlias('@web')).'</h1>';
        // echo '<h1>'.(Yii::getAlias('@galeriaPath')).'</h1>';
        // echo '<h1>'.(Yii::getAlias('@galeriaUrl')).'</h1>';

        // echo Url::to('@web/a/b/c/d'); // fazer essa mudança em web=>Componentes: 'baseUrl' => Yii::getAlias('@web'), //Para o Helper poder fazer essa mudança
        //     die;


        //==> 1:N, N:1

        // /** @var Funcionario[] $funcionarios */
        
        // $model = new Funcionario();

        // $model->nome = "Leticia Souza";
        // $model->cargo_id = 4;
        // $model->save();
        // die('OK');

        // $funcionarios = Funcionario::find()->all();
            
        // foreach($funcionarios as $funcionario){
        //     echo "<h2>
        //         Nome: {$funcionario->nome} | 
        //         Cargo: {$funcionario->cargo->nome}
        //         </h2>"; 
        // }

        // $cargos = Cargo::find()->all();

        // foreach($cargos as $cargo){
        //     echo "<h2>";
        //     echo $cargo->nome;

        //     echo "<ul>";

        //         foreach($cargo->funcionarios as $func){
        //             echo "<li>$func->nome</li>";
        //         }

        //     echo "</h2>";

        // }

        // die;

        //==> 1:1
        // $pessoa = new Pessoa();

        // $pessoa->nome = "Sandriane";
        // $pessoa->email = "san@bol.com.br";
        // $pessoa->save();
        
        // $pf = new PessoaFisica();
        // $pf->pessoa_id = '3';
        // $pf->cpf = '23312223322';
        // $pf->sexo = 'M';
        // $pf->save();
        
        // die('OK');

        // $pessoas = Pessoa::find()->all();

        // foreach($pessoas as $pessoa){
        //     echo 
        //     "<h2>
        //         Nome: {$pessoa->nome} |
        //         CPF: {$pessoa->pessoaFisica->cpf} |
        //         SEXO: {$pessoa->pessoaFisica->sexo} |
        //     </h2>";
        // }
        // die();

        //==> N:N
        // $prog = new Programador();
        // $prog->nome = 'Alessandro';
        // $prog->save();

        // $ling = new Linguagem();
        // $ling->nome = 'PHP';
        // $ling->save();

        // $prog_ling = new ProgramadorLinguagem();
        // $prog_ling->programador_id = 1;
        // $prog_ling->linguagem_id = 2;
        // $prog_ling->save();
     
        // $programadores = Programador::find()->all();

        // foreach($programadores as $programador){
        //     echo "<h2>";
        //         echo $programador->nome. ' - '. $programador->github;

        //         echo "<ul>";
        //         foreach($programador->linguagens as $linguagem){
        //             echo "<li>{$linguagem->nome}</li>";
        //         }
        //         echo "</ul>";
                
        //     echo "</h2>";
        // }

        // $linguagens = Linguagem::find()->all();

        // foreach($linguagens as $linguagem){
        //     echo "<h2>";
        //         echo $linguagem->nome;

        //         echo "<ul>";
        //         foreach($linguagem->programadores as $programadores){
        //             echo "<li>{$programadores->nome} - $programadores->github</li>";
        //         }
        //         echo "</ul>";
                
        //     echo "</h2>";
        // }
            
        // die;

        $programador = new Programador;
        $programador->nome = 'Fulano';
        $programador->github = '@fulano';
        $programador->save();

        $linguagem = new Linguagem;
        $linguagem->nome = 'Swift';
        $linguagem->save();

        $programador->link('linguagens',$linguagem);

        die;
        return $this->render('index');
    }

    public function actionShop()
    {
        $this->layout = 'shop';
        
        return $this->render('shop');
    }

    public function actionServices()
    {
        $this->layout = 'shop';
        
        return $this->render('services');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */


    public function actionTestPermission($userId)
    {
        $auth = Yii::$app->authManager;

        //Yii::$app->user->can('post-index'); - método já valida o id do usuário, sem precisar passar por parâmetro.

        echo "<p>View Post: {$auth->checkAccess($userId, 'post-index')}</p>";
        echo "<p>Create Post: {$auth->checkAccess($userId, 'post-create')}</p>";
        echo "<p>Edit Post: {$auth->checkAccess($userId, 'post-edit')}</p>";
        echo "<p>Delete Post: {$auth->checkAccess($userId, 'post-delete')}</p>";
        
        //Teste: ?r=site/test-permission&userId=2
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}

//rota: composta por 2 ou 3 partes
//IDDoController/IDdoAction
//IDDOModule/IDFOController/IDdoAction

//Ex.: http:www.projeto.com.br?r=site/inde
//Ex.: http:www.projeto.com.br?r=CONTROLLER/ACTION

