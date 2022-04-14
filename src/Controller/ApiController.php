<?php


namespace App\Controller;

use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Service\RequestService;
use App\Service\ResponseService;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use App\Schema\LoginResponse;
use App\Entity\User;
use App\Entity\Session;
use App\Entity\Answer;
use App\Entity\ToolSessionAnswer;
use App\Entity\Message;


class ApiController extends AbstractController
{
    protected $mycontainer;
    protected $response;
    protected $request;

    public function __construct(ContainerInterface $container)
    {
        $this->mycontainer = $container;
        $this->request = $this->mycontainer->get('request_stack')->getCurrentRequest();
        $this->response = new ResponseService();
    }

    private function renderResponse(array $res){

        if(!array_key_exists('error',$res)){
            return new JsonResponse("internal error",401);
        }
        if($res['error'] === true)
        {
            return new JsonResponse($res,401);
        }

        if(!array_key_exists('data',$res))
        {
            $this->response->setContent($res);
        }
        else
        {
            if(array_key_exists('message',$res)){
                if(count($res['data'])==0){
                    $this->response->setContent(json_encode(['message'=>$res['message'],'error'=>$res['error'],'data'=>$res['data']]));
                }else{
                    $this->response->setContent(json_encode(['message'=>$res['message'],'error'=>$res['error'],'data'=>$res['data']]));
                }
            }
            else{
                $this->response->setContent($res['data']);
            }

        }



        return $this->response->getResponse();

    }

    private function renderException(\Exception $e){

        return new JsonResponse(['error'=>true,'data'=>[],'message'=>$e->getMessage()." ".basename($e->getFile())." ". $e->getLine()],401);
    }

    public function hello(Request $request):Response
    {
        //return new JsonResponse(['message'=>'Welcome to Restaurant api'],200);

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->getAllUser();
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }
    }

    public function updateToken()
    {
        $reqService = new RequestService($this->request);
        //$data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->updateToken([]);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * connexion to app
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(
     *     type="object",
     *     @SWG\Property(property="error", type="boolean", example="false"),
     *     @SWG\Property(property="token", type="string", example="eyJ0eXAiOiJ....."),
     *     @SWG\Property(property="user", ref=@Model(type=User::class,groups={"user_all"})),
     *      @SWG\Property(property="running_session", ref=@Model(type=Session::class,groups={"session_all"})),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="message", type="string", example="login incorrect"),
     *     )
     * )
     *
     * @SWG\Parameter(
     *   name="body",
     *   in="body",
     *   description="JSON Payload",
     *   required=true,
     *   format="application/json",
     *      @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="login", type="string", example="andre"),
     *              @SWG\Property(property="password", type="string", example="azerty"),
     *          )
     *      )
     * @SWG\Tag(name="Connexion")
     * @Security(name="")
     *
     */
    public function login(Request $request)
    {
        $reqService = new RequestService($this->request);
        $data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);


        try {
            $res = $userService->login($data);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * Create account
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(
     *     type="object",
     *     @SWG\Property(property="error", type="boolean", example="false"),
     *     @SWG\Property(property="token", type="string", example="eyJ0eXAiOiJ....."),
     *     @SWG\Property(property="user", ref=@Model(type=User::class,groups={"user_all"})),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="email déjà utilisé"),
     *     )
     * )
     *
     * @SWG\Parameter(
     *   name="body",
     *   in="body",
     *   description="JSON Payload",
     *   required=true,
     *   format="application/json",
     *      @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="email", type="string", example="andre"),
     *              @SWG\Property(property="password", type="string", example="123456"),
     *          )
     *      )
     * @SWG\Tag(name="Connexion")
     * @Security(name="")
     *
     */
    public function registerAccount(Request $request)
    {
        $reqService = new RequestService($this->request);
        $data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);


        try {
            $res = $userService->registerAccount($data);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }

    /**
     * update password
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(
     *     type="object",
     *     @SWG\Property(property="error", type="boolean", example="false"),
     *     @SWG\Property(property="data", ref=@Model(type=User::class,groups={"user_all"})),
     *     @SWG\Property(property="message", type="string", example=""),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="mot de passe inccorect"),
     *     )
     * )
     *
     * @SWG\Parameter(
     *   name="body",
     *   in="body",
     *   description="JSON Payload",
     *   required=true,
     *   format="application/json",
     *      @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="c-password", type="string", example="********"),
     *              @SWG\Property(property="n-password", type="string", example="********"),
     *          )
     *      )
     *
     * @SWG\Tag(name="Connexion")
     * @Security(name="Bearer")
     *
     */
    public function updatePassword(Request $request)
    {
        $reqService = new RequestService($this->request);
        $data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->updatePassword($data);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * Validate account
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(
     *     type="object",
     *     @SWG\Property(property="error", type="boolean", example="false"),
     *     @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *     @SWG\Property(property="message", type="string", example="compte validé"),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="utilisateur non trouvé"),
     *     )
     * )
     *

     * @SWG\Tag(name="Connexion")
     * @Security(name="")
     *
     */
    public function validateAccount(Request $request,$token)
    {
        //$reqService = new RequestService($this->request);
        //$token = $reqService->getGetStringData('token');

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->validateAccount( $token);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * Reset password
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(
     *     type="object",
     *     @SWG\Property(property="error", type="boolean", example="false"),
     *     @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *     @SWG\Property(property="message", type="string", example="mot de passe réinitialisé"),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="email non existant"),
     *     )
     * )
     *
     * @SWG\Parameter(
     *   name="body",
     *   in="body",
     *   description="JSON Payload",
     *   required=true,
     *   format="application/json",
     *      @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="email", type="string", example="andre@example.com"),
     *          )
     *      )
     * @SWG\Tag(name="Connexion")
     * @Security(name="")
     *
     */
    public function resetPassword(Request $request)
    {
        $reqService = new RequestService($this->request);
        $data = $reqService->getPostData();
        if(!array_key_exists('email',$data)){
            $data['email'] = '';
        }

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->resetPassword( $data['email']);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * get current user info and running QCM
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="false"),
     *      @SWG\Property(property="data", type="object",
     *          @SWG\Property(property="user", ref=@Model(type=User::class,groups={"user_all"})),
     *          @SWG\Property(property="running_session", ref=@Model(type=Session::class,groups={"session_all"})),
     *      ),
     *      @SWG\Property(property="message", type="string", example=""),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="operation denied"),
     *     )
     * )
     *
     * @SWG\Tag(name="User")
     * @Security(name="Bearer")
     *
     */
    public function getCurrentUserInfo(Request $request)
    {
        //$reqService = new RequestService($this->request);
        //$data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->getCurrentUserInfo([]);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * get user list of QCM session done
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="false"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(ref=@Model(type=User::class,groups={"user_all"}))
     *      ),
     *      @SWG\Property(property="message", type="string", example=""),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="operation denied"),
     *     )
     * )
     *
     * @SWG\Parameter(
     *   name="body",
     *   in="body",
     *   description="JSON Payload",
     *   required=true,
     *   format="application/json",
     *      @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="id", type="integer", example="10"),
     *          )
     *      )
     *
     * @SWG\Tag(name="User")
     * @Security(name="Bearer")
     *
     */
    public function listUserSession(Request $request)
    {
        $reqService = new RequestService($this->request);
        $data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->listUserSession($data);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * start a game
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="false"),
     *      @SWG\Property(property="data", type="object",
     *          @SWG\Property(property="user", ref=@Model(type=User::class,groups={"user_all"})),
     *          @SWG\Property(property="running_session", ref=@Model(type=Session::class,groups={"session_all"})),
     *      ),
     *      @SWG\Property(property="message", type="string", example=""),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="no running session / no available questions"),
     *     )
     * )
     *
     * @SWG\Tag(name="User")
     * @Security(name="Bearer")
     *
     */
    public function startGame(Request $request)
    {
        //$reqService = new RequestService($this->request);
        //$data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->startGame([]);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * leave a game
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="false"),
     *      @SWG\Property(property="data", type="object",
     *          @SWG\Property(property="user", ref=@Model(type=User::class,groups={"user_all"})),
     *          @SWG\Property(property="running_session", ref=@Model(type=Session::class,groups={"session_all"})),
     *      ),
     *      @SWG\Property(property="message", type="string", example=""),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="no running session"),
     *     )
     * )
     *
     * @SWG\Tag(name="User")
     * @Security(name="Bearer")
     *
     */
    public function leaveGame(Request $request)
    {
        //$reqService = new RequestService($this->request);
        //$data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->leaveGame([]);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * back to game
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="false"),
     *      @SWG\Property(property="data", type="object",
     *          @SWG\Property(property="user", ref=@Model(type=User::class,groups={"user_all"})),
     *          @SWG\Property(property="running_session", ref=@Model(type=Session::class,groups={"session_all"})),
     *      ),
     *      @SWG\Property(property="message", type="string", example=""),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="no running session"),
     *     )
     * )
     *
     * @SWG\Tag(name="User")
     * @Security(name="Bearer")
     *
     */
    public function backGame(Request $request)
    {
        //$reqService = new RequestService($this->request);
        //$data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->backGame([]);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * answer to object question
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="false"),
     *      @SWG\Property(property="data", type="object",
     *          @SWG\Property(property="answer", ref=@Model(type=ToolSessionAnswer::class,groups={"session_all"})),
     *          @SWG\Property(property="running_session", ref=@Model(type=Session::class,groups={"session_all"})),
     *      ),
     *      @SWG\Property(property="message", type="string", example=""),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="no running session / session ended /question already done"),
     *     )
     * )
     *
     * @SWG\Parameter(
     *   name="body",
     *   in="body",
     *   description="JSON Payload",
     *   required=true,
     *   format="application/json",
     *      @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="id", type="integer", example="10", description="object id"),
     *              @SWG\Property(property="answer", type="text", example="Vrai", description="answer text value if the question is True / False or is for move object to a place"),
     *              @SWG\Property(property="answers", type="array",@SWG\Items(type="object"), example="[]", description="array of answer with id and position of answer; it is for question with multiple ordered answer"),
     *          )
     *      )
     *
     * @SWG\Tag(name="User")
     * @Security(name="Bearer")
     *
     */
    public function anwserToolQuestion(Request $request)
    {
        $reqService = new RequestService($this->request);
        $data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->anwserToolQuestion($data);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    public function uploadQuestion(Request $request)
    {
        //$reqService = new RequestService($this->request);
        //$data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);

        try {
            $res = $userService->uploadQuestion([]);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }

    /**
     * Register email
     * @SWG\Response(
     *     response=200,
     *     description="ok",
     *     @SWG\Schema(
     *     type="object",
     *     @SWG\Property(property="error", type="boolean", example="false"),
     *     @SWG\Property(property="info", ref=@Model(type=Message::class,groups={"mess_all"})),
     *     )
     * )
     *
     * @SWG\Response(
     *     response=401,
     *     description="error",
     *     @SWG\Schema(type="object",
     *      @SWG\Property(property="error", type="boolean", example="true"),
     *      @SWG\Property(property="data", type="array", @SWG\Items(type="object")),
     *      @SWG\Property(property="message", type="string", example="email déjà utilisé"),
     *     )
     * )
     *
     * @SWG\Parameter(
     *   name="body",
     *   in="body",
     *   description="JSON Payload",
     *   required=true,
     *   format="application/json",
     *      @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="email", type="string", example="andre@dipongo.com"),
     *              @SWG\Property(property="name", type="string", example="andre"),
     *              @SWG\Property(property="surname", type="string", example=""),
     *          )
     *      )
     * @SWG\Tag(name="User")
     * @Security(name="Bearer")
     *
     */
    public function registerEmail(Request $request)
    {
        $reqService = new RequestService($this->request);
        $data = $reqService->getPostData();

        $userService = $this->mycontainer->get(UserService::class);


        try {
            $res = $userService->registerEmail($data);
            return $this->renderResponse($res);
        }catch (\Exception $e){

            return $this->renderException($e);
        }

    }



}
