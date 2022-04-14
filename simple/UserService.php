<?php


namespace App\Service;


use App\Entity\Answer;
use App\Entity\File;

use App\Entity\Message;
use App\Entity\Notification;

use App\Entity\Session;
use App\Entity\SessionStep;
use App\Entity\SessionStepBackground;
use App\Entity\Status;
use App\Entity\Step;
use App\Entity\StepBackground;
use App\Entity\Tool;
use App\Entity\ToolSessionAnswer;
use App\Entity\ToolSessionAnswerPosition;
use App\Entity\Upload;
use App\Entity\User;
use App\Service\MySerializer;
use chillerlan\QRCode\QROptions;
use DateTime;
use Doctrine\ORM\Query\Expr\Base;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bridge\Twig\Mime\NotificationEmail;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Intervention\Image\ImageManager;
use chillerlan\QRCode\QRCode;
use TypeError;


class UserService
{
    private $em;
    private $container;
    private $encoder;
    private $jwt;
    private $translator;
    private $locale;
    private $currentUser;

    public function __construct(EntityManagerInterface $em, JWTTokenManagerInterface $jwt,ContainerInterface $c,
                                UserPasswordEncoderInterface $encoder)
    {
        $this->em = $em;
        $this->container = $c;
        $this->encoder = $encoder;
        $this->jwt = $jwt;
        $this->translator = $this->container->get('translator');
        $this->locale= 'fr';

        $lang = $this->container->get('request_stack')->getCurrentRequest()->headers->get('lang');
        if($lang ===null){
            $this->locale = 'fr';
        }
        else{
            if(in_array($lang,['en','fr'])){
                $this->locale= $lang;
            }
            else{
                $this->locale= 'fr';
            }
        }

        $this->translator->setLocale($this->locale);


    }

    public function getUserByEmail(string $email) : Object
    {
        return $this->em->getRepository(User::class)->findOneBy(array('email' =>$email));
    }

    public function uploadImage(array $data) : array{

        if(count($data)>0){

            foreach ($data as $file){
                $uploadedFile=$file;
            }


            $upload = new Upload();
            $upload->save($uploadedFile,'uploads/');
            if($upload->getResult())
            {
                if($upload->getType() === "image")
                {
                    $manager = new ImageManager(array('driver' => 'gd'));
                    $name = $upload->getBaseFolder().'uploads/'.$upload->getName();
                    $image = $manager->make($name)->resize(500, 400);

                    $image2 = $manager->make($name)->resize(200, 150);

                    //finally we save the image as a new file
                    $savedname=$upload->getBaseFolder().'uploads/mini/'.$upload->getName();
                    $savednamep=$upload->getBaseFolder().'uploads/profile/'.$upload->getName();
                    $image->save($savedname);
                    $image2->save($savednamep);


                }

                $tab = $upload->toArray();
                $tab['error']=false;

                return $tab;


            }
            return ['error'=>true,'message'=>$upload->getError()];
        }

        return ['error'=>true,'message'=>'no file'];

    }

    private function getCurrentUser(): ?UserInterface
    {
        $token = $this->container->get('security.token_storage')->getToken();



        if (null === $token) {
            $this->currentUser =null;
        }
        else{
            $user = $token->getUser();
            if (!\is_object($user)) {
                // e.g. anonymous authentication
                $this->currentUser =null;
            }
            else{
                $this->currentUser = $user;
            }
        }

        return $this->currentUser;

    }

    private function passwordStrength (string $password): ?bool {
        $returnVal = true;
        if ( strlen($password) < 6 ) {
            $returnVal = false;
        }

        return $returnVal;
    }

    private function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getAllUser() : array
    {

        //$users = $this->em->getRepository(User::class)->findClientAndOwner($limit,$offset);
        return ['error'=>false,'data'=>[]];
    }

    public function getAllTopManager(array $data) : array
    {

        $user = $this->getCurrentUser();
        if(!in_array($user->getType(),[User::USER_ADMIN])) return ['error'=>true,'data'=>[],'message'=>$this->translator->trans('operation denied')];

        $offset = 0;
        $limit = 10;
        if(array_key_exists('offset',$data)){ $offset = $data['offset'];}
        if(array_key_exists('limit',$data)){ $limit = $data['limit'];}

        $users = $this->em->getRepository(User::class)->findTopManager($limit,$offset);
        return ['error'=>false,'data'=>$this->container->get(MySerializer::class)->multipleObjectToArray($users,'user_all')];
    }

    public function getAllManager(array $data) : array
    {

        $user = $this->getCurrentUser();
        if(!in_array($user->getType(),[User::USER_ADMIN])) return ['error'=>true,'data'=>[],'message'=>$this->translator->trans('operation denied')];

        $offset = 0;
        $limit = 10;
        if(array_key_exists('offset',$data)){ $offset = $data['offset'];}
        if(array_key_exists('limit',$data)){ $limit = $data['limit'];}

        $users = $this->em->getRepository(User::class)->findManager($limit,$offset);
        return ['error'=>false,'data'=>$this->container->get(MySerializer::class)->multipleObjectToArray($users,'user_all')];
    }

    private function getRandom(int $n) :?string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers='0123456789';
        $maj='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {

            if($i ==$n-1)
            {
                $index = random_int(0, strlen($numbers) - 1);
                $randomString .= $numbers[$index];
            }
            else if($i==$n)
            {
                $index = random_int(0, strlen($maj) - 1);
                $randomString .= $maj[$index];
            }
            else
            {
                $index = random_int(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

        }

        return $randomString;
    }

    public function login(array $data1): ?array
    {

        $required = ['login','password'];

        foreach ($required as $el)
        {
            if(!array_key_exists($el,$data1))
            {
                return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('required_field'). ' : ' .$el];
            }

            if(trim($data1[$el])===''){
                return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('required_field'). ' : ' .$el];
            }

        }

        $sendData=$data1;
        $user = $this->em->getRepository(User::class)->findOneBy(array('email' =>$sendData['login']));

        if($user === null)  return ['error'=>true,'data'=>[],'message'=>$this->translator->trans('login or password incorrect')];

        if(!$this->encoder->isPasswordValid($user,$sendData['password'])) {
            if($user->getRpassword() !== null)
            {
                $user1 = $user;
                $user1->setPassword($user->getRpassword());

                if (!$this->encoder->isPasswordValid($user1,$user->getRpassword()))
                {
                    return ['error'=>true,'data'=>[],'message'=>$this->translator->trans('login or password incorrect')];
                }
                $user->setPassword($user->getRpassword());
                $user->setRpassword(null);
                $this->em->persist($user);
                $this->em->flush();


            }

            return ['error'=>true,'data'=>[],'message'=>$this->translator->trans('login or password incorrect')];

        }

        if(array_key_exists('admin',$data1)){
            if($user->getType() != User::USER_ADMIN){
                return ['error'=>true,'data'=>[],'message'=>$this->translator->trans('unauthorized access')];
            }
        }

        $token = $this->jwt->create($user);

        $runningSession = $this->em->getRepository(Session::class)->findOneBy(['user'=>$user,'status'=>true]);
        if($runningSession !== null){

            if($runningSession->getCurrentTime()===Session::TIME){
                $runningSession->setStatus(false);
                $user->setHasRunningSession(false);
                $user->setRunningSession(null);

                $this->em->persist($runningSession);
                $this->em->persist($user);
                $this->em->flush();

                return ['error'=>false,'token'=>$token,
                    'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),
                    'running_session'=>null];
            }
            else{
                if($runningSession->getQuestionDone() === Session::QUESTION){
                    $runningSession->setStatus(false);
                    $user->setHasRunningSession(false);
                    $user->setRunningSession(null);

                    $this->em->persist($runningSession);
                    $this->em->persist($user);
                    $this->em->flush();

                    return ['error'=>false,'token'=>$token,
                        'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),
                        'running_session'=>null];
                }
                else{
                    $date = new \DateTime();

                    if($runningSession->getShouldEndDate()> $date){


                        $runningSession->setBackDate($date);
                        $left = $date->getTimestamp() - $runningSession->getLastDate()->getTimestamp();
                        $runningSession->setShouldEndDate($runningSession->getShouldEndDate()->add(new \DateInterval('PT'.$left.'S')));
                        if(!$user->getHasRunningSession()){
                            $user->setHasRunningSession(true);
                            $user->setRunningSession($runningSession);
                        }
                        $this->em->persist($runningSession);
                        $this->em->persist($user);
                        $this->em->flush();

                        return ['error'=>false,'token'=>$token,
                            'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),
                            'running_session'=>$this->container->get(MySerializer::class)->singleObjectToArray($runningSession,'session_all')];

                    }
                    else{
                        $runningSession->setStatus(false);
                        $user->setHasRunningSession(false);
                        $user->setRunningSession(null);

                        $this->em->persist($runningSession);
                        $this->em->persist($user);
                        $this->em->flush();

                        return ['error'=>false,'token'=>$token,
                            'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),
                            'running_session'=>null];

                    }
                    //$remaining = Session::TIME - $runningSession->getCurrentTime();
                    //$endDate->add(new \DateInterval('PT'.$remaining.'S'));






                }

            }
        }
        else{
            $user->setHasRunningSession(false);
            $this->em->persist($user);
            $this->em->flush();
            return ['error'=>false,'token'=>$token,
                'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),
                'running_session'=>null];
        }




    }

    public function updateToken(array $data): ?array{

        $user = $this->getCurrentUser();


        if($user === null) return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('please login')];


        $u = $this->em->getRepository(User::class)->findOneBy(['id'=>$user->getId()]);

        if($u === null ) return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('user_not_found')];

        $token = $this->jwt->create($u);


        return ['error'=>false,'token'=>$token,'usertype'=>$user->getType(),'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'all')];

    }

    public function getUserById(int $id):?Object
    {
        return $this->em->getRepository(User::class)->findOneBy(['id' =>$id]);
    }

    public function updateProfile(string $type,array $data) :?array
    {
        $user = $this->getCurrentUser();

        switch ($type)
        {
            case 'picture':

                if(!array_key_exists('file',$data)) return ['message' => 'file field is required', 'error' =>true, 'data' => []];
                $required =['name', 'size', 'extension', 'type', 'path'];

                foreach ($required as $key=>$el)
                {
                    if(!array_key_exists($el,$data['file']))
                    {
                        return ['message' =>$el. ' field is required', 'error' =>true, 'data' => []];
                    }
                }

                $user->setPicture($data['file']['path']);

                $this->em->persist($user);
                $this->em->flush();

                return ['message' => 'picture updated', 'error' =>false, 'data' => $this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')];

                break;
            case 'phone_birthday':
                if(!array_key_exists('phone',$data)) return ['message' =>'phone field is required', 'error' =>true, 'data' => []];
                if(strlen($data['phone'])< 9) return ['message' => $this->translator->trans('phone length error'), 'error' =>true, 'data' => []];
                if(!array_key_exists('birthday',$data)) return ['message' =>'birthday field is required', 'error' =>true, 'data' => []];
                if(strlen($data['birthday'])> 1){
                    try {
                        $user->setBirthday(\DateTime::createFromFormat('Y-m-d',$data['birthday']));
                    }
                    catch (TypeError $e){
                        return ['message' => 'birthday format error / required format is d/m/Y', 'error' =>true, 'data' => []];
                    }
                }


                if($user->getPhone() !== $data['phone']){
                    $oldUser = $this->em->getRepository(User::class)->findOneBy(['phone'=>$data['phone']]);
                    if ($oldUser !== null) return ['message' => $this->translator->trans('phone already used'), 'error' =>true, 'data' => []];
                    $user->setPhone($data['phone']);
                }
                $this->em->persist($user);
                $this->em->flush();

                return ['message' => 'profile updated', 'error' =>false, 'data' => $this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')];


                break;
            case 'birthday':
                if(!array_key_exists('birthday',$data)) return ['message' =>'birthday field is required', 'error' =>true, 'data' => []];

                if(strlen($data['birthday'])< 0) return ['message' => 'empty birthday', 'error' =>true, 'data' => []];

                try {
                    $user->setBirthday(\DateTime::createFromFormat('d/m/Y',$data['birthday']));
                }
                catch (TypeError $e){
                    return ['message' => 'birthday format error / required format is d/m/Y', 'error' =>true, 'data' => []];
                }


                $this->em->persist($user);
                $this->em->flush();
                return ['message' => 'birthday updated', 'error' =>false, 'data' => $this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')];


                break;
            case 'password':
                if(!array_key_exists('c-password',$data)) return ['message' => 'c-password field is required','error' =>true, 'data' =>[]];
                if(!array_key_exists('n-password',$data)) return ['message' => 'n-password field is required','error' =>true, 'data' =>[]];

                $res=$this->encoder->isPasswordValid($user,$data['c-password']);

                if($res === false) return ['message' => $this->translator->trans('current_password_invalid'), 'error' =>true, 'data' =>[]];

                $res = $this->passwordStrength($data['n-password']);

                if($res === false) return ['message' => $this->translator->trans('new_password_invalid'), 'error' =>true, 'data' =>[]];

                $user->setPassword($this->container->get('security.password_encoder')->encodePassword($user,$data['n-password'] ));

                $this->em->persist($user);

                $this->em->flush();

                return ['message' => 'birthday updated', 'error' =>false, 'data' => $this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')];

                break;
            case 'location':
                if(!array_key_exists($type,$data)) return ['message' =>$type. ' field is required', 'error' =>true, 'data' => []];
                $required = ['country_id','city', 'street', 'street_detail'];
                foreach ($required as $key=>$el)
                {
                    if(!array_key_exists($el,$data['location']))
                    {
                        return ['message' =>'location '.$el. ' field is required', 'error' =>true, 'data' => []];
                    }

                }

                $country = $this->em->getRepository(Country::class)->findOneBy(['id'=>$data['location']['country_id']]);
                if( $country === null) return ['message' =>'country not found', 'error' =>true, 'data' => []];

                $loc = $user->getLocation();
                if( $loc === null){
                    $loc = new Location();
                    $loc->setCountry($country);
                }

                $loc->setCity($data['location']['city']);
                $loc->setStreet($data['location']['street']);
                $loc->setStreetDetail($data['location']['street_detail']);

                $user->setLocation($loc);
                $this->em->persist($user);

                $this->em->flush();

                return ['message' => 'birthday updated', 'error' =>false, 'data' => $this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')];



                break;

            default:
                return ['message' => 'no type added', 'error' =>true, 'data' => []];
                break;
        }
    }

    public function resetPassword(string $email):?array
    {
        $user = $this->em->getRepository(User::class)->findOneBy(array('email' =>$email));

        if($user === null) return ['message' => $this->translator->trans('user not found'), 'error' =>true, 'data' => []];

        $pass = $this->getRandom(6);

        $user2 =new User();

        $user2->setPassword($this->container->get('security.password_encoder')->encodePassword($user2,$pass ));

        $user->setRpassword($user2->getPassword());

        $this->em->persist($user);
        $this->em->flush();

        $this->container->get('mail_manager')->resetPassword($user->getName(),$user->getEmail(),$pass);

        return ['message' => $this->translator->trans('new password send'), 'error' =>false,  'data' =>[]];

    }

    public function validateAccount(string $token):?array {
        if($token == '')   return ['error'=>true,'data'=>[],'message'=>$this->translator->trans('account not found')];

        $user = $this->em->getRepository(User::class)->findOneBy(['token'=>$token]);
        if($user === null) {
            return ['error'=>true,'data'=>[],'message'=>$this->translator->trans('account not found')];
        }
        if($user->getActivationDate() !== null) {
            return ['error'=>true,'data'=>[],'message'=>$this->translator->trans('account already activated')];
        }
        $user->setActivationDate(new \DateTime());
        $user->setIsActive(true);

        $this->em->persist($user);
        $this->em->flush();

        return ['message' => $this->translator->trans('account activated'), 'error' =>false, 'data' => []];



    }

    public function registerAccount(array $data):?array{

        $required = ['email','password'];

        foreach ($required as $el)
        {
            if(!array_key_exists($el,$data))
            {
                return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('required_field'). ' : ' .$el];
            }

        }


        $oldUser = $this->em->getRepository(User::class)->findOneBy(['email'=>$data['email']]);
        if($oldUser !== null) return ['message' => $this->translator->trans('email already used'), 'error' =>true, 'data' => []];

        if(strlen($data['password'])< 1) return ['message' => $this->translator->trans('password should contains at least 6 characters'), 'error' =>true, 'data' => []];


        $user = new User();
        $user->setIsActive(false);
        $user->setIsClose(false);
        $pass = $data['password'];
        $user->setType(User::USER_PLAYER);

        $user->setName($data['email']);
        $user->setEmail($data['email']);
        $user->setPassword($this->container->get('security.password_encoder')->encodePassword($user,$pass));
        $user->setToken(uniqid('',true));
        $user->setIsActive(true);
        $user->setIsClose(false);

        $this->em->persist($user);
        $this->em->flush();

        $token = $this->jwt->create($user);

        //$this->container->get("mail_manager")->welcome($user->getId(),$user->getName(),$user->getEmail(),$user->getToken());

        /*return ['error' => false, 'data' => ['token'=>$token,
            'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),
            'message'=>$this->translator->trans('account_created')], 'message' =>$this->translator->trans('account_created')];*/

        return ['error'=>false,'token'=>$token,
            'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),
            'running_session'=>null,
            'message'=>$this->translator->trans('account_created')];


    }

    public function updatePassword(array $data) :?array
    {
        $user = $this->getCurrentUser();

        if(!array_key_exists('c-password',$data)) return ['message' => 'c-password field is required','error' =>true, 'data' =>[]];
        if(!array_key_exists('n-password',$data)) return ['message' => 'n-password field is required','error' =>true, 'data' =>[]];

        $res=$this->encoder->isPasswordValid($user,$data['c-password']);

        if($res === false) return ['message' => $this->translator->trans('current_password_invalid'), 'error' =>true, 'data' =>[]];

        $res = $this->passwordStrength($data['n-password']);

        if($res === false) return ['message' => $this->translator->trans('new_password_invalid'), 'error' =>true, 'data' =>[]];

        $user->setPassword($this->container->get('security.password_encoder')->encodePassword($user,$data['n-password'] ));

        $this->em->persist($user);

        $this->em->flush();

        return ['message' => '', 'error' =>false, 'data' => $this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')];
    }

    // start edit here for all entities

    public function getCurrentUserInfo(array $data) :?array
    {

        $user = $this->getCurrentUser();

        $session = null;

        $runningSession = $this->em->getRepository(Session::class)->findOneBy(['user'=>$user,'status'=>true]);

        if($runningSession !== null){
            if($runningSession->getCurrentTime()===Session::TIME){

                if($runningSession->getQuestionDone() !== Session::QUESTION){
                    $runningSession->setStatus(false);
                    $user->setHasRunningSession(false);
                    $user->setRunningSession(null);

                }
                else{
                    $session = $runningSession;
                }
            }
            else{

                if($runningSession->getQuestionDone() === Session::QUESTION){
                    $session = $runningSession;

                }
                else{
                    $date = new \DateTime();


                    if($date > $runningSession->getShouldEndDate()){
                        $runningSession->setStatus(false);
                        $user->setHasRunningSession(false);
                        $user->setRunningSession(null);
                    }
                   else{

                        /*$left = $date->getTimestamp() - $runningSession->getLastDate()->getTimestamp();
                        $runningSession->setShouldEndDate($date->add(new \DateInterval('PT'.$left.'S')));
                       $runningSession->setBackDate($date);*/
                        $session = $runningSession;
                    }
                }


            }

            $sessionSend = null;

            if($session!== null){
                $sessionSend = $this->container->get(MySerializer::class)->singleObjectToArray($session,'session_all');
            }
            return ['message' => '',
                'error' =>false,
                'data' => ['user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),
                    'running_session'=>$sessionSend]];

        }
        else{
            return ['message' => '',
                'error' =>false,
                'data' => ['user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),
                    'running_session'=>null]];
        }

    }

    public function listUserSession(array $data) :?array{

        if(!array_key_exists('id',$data)) return ['message' => $this->translator->trans('required_field'). ' id','error' =>true, 'data' =>[]];

        $user = $this->em->getRepository(User::class)->findOneBy(['id'=>$data['id']]);

        if($user === null) {
            return ['message' => $this->translator->trans('user_not_found'),'error' =>true, 'data' =>[]];
        }

        $sessions = $this->em->getRepository(Session::class)->findBy(['user'=>$user],['id'=>'DESC']);

        return ['message' => '', 'error' =>false, 'data' => $this->container->get(MySerializer::class)->multipleObjectToArray($sessions,'session_all')];


    }

    public function anwserToolQuestion(array $data) :?array{

        $user = $this->getCurrentUser();

        $runningSession = $this->em->getRepository(Session::class)->findOneBy(['user'=>$user,'status'=>true]);

        if($runningSession === null){
            return ['error' => true, 'data' => ['code'=>'no_running_session'], 'message' =>$this->translator->trans('no running session')];
        }

        if($runningSession->getCurrentTime() >= Session::TIME){
            $runningSession->setStatus(false);
            $this->em->persist($runningSession);
            $this->em->flush();
            return ['error' => true, 'data' => ['code'=>'session_ended',
                'running_session'=>$this->container->get(MySerializer::class)->singleObjectToArray($runningSession,'session_all'),
                'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),], 'message' =>$this->translator->trans('session ended')];
        }
        else{
            $date = new \DateTime();
            $endDate = new \DateTime();
            //$runningSession->setBackDate($date);
            //$runningSession->setLastDate($date);
            if($date > $runningSession->getShouldEndDate()){
                $runningSession->setStatus(false);
                $this->em->persist($runningSession);
                $this->em->flush();
                return ['error' => true, 'data' => [
                    'running_session'=>$this->container->get(MySerializer::class)->singleObjectToArray($runningSession,'session_all'),
                    'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all'),
                    'code'=>'session_ended'
                ], 'message' =>$this->translator->trans('session ended')];
            }
            else{
                $leftTime = $date->getTimestamp() -  $runningSession->getLastDate()->getTimestamp();
                $runningSession->setCurrentTime($runningSession->getCurrentTime() +  (int)$leftTime);
                $runningSession->setLastdate($date);

                $remaining = Session::TIME - $runningSession->getCurrentTime();
                $endDate->add(new \DateInterval('PT'.$remaining.'S'));
                $runningSession->setShouldEndDate($endDate);


            }


        }



        if(!array_key_exists('id',$data)){
            return ['error' => true, 'data' => ['code'=>'required_field'], 'message' =>$this->translator->trans('required_field'). ' : id'];
        }


        $toolSessionAnswer = $this->em->getRepository(ToolSessionAnswer::class)->findOneBy(['id'=>$data['id'],'session'=>$runningSession]);

        if($toolSessionAnswer === null)  return ['error' => true, 'data' => ['code'=>'not_founded_question'], 'message' =>$this->translator->trans('not_found')];

        if($toolSessionAnswer->getIsTrue()){
            return ['error' => true, 'data' => ['code'=>'question_already_done'], 'message' =>$this->translator->trans('question already done')];
        }

        if($toolSessionAnswer->getNextTime()!== null){
            $now = new \DateTime();
            if($now < $toolSessionAnswer->getNextTime()){
                $seconde = $now->diff($toolSessionAnswer->getNextTime())->s;
                return ['error' => true, 'data' => ['code'=>'remaining_time','code_time'=>$seconde], 'message' =>$this->translator->trans('remaining time for this question').' : '.$seconde.' '.$this->translator->trans('second')];
            }
        }


        switch($toolSessionAnswer->getType()){
            case Tool::QUESTION_MULTIPLE_ANSWER:
                $required[]='answers';
                break;
            default:
                $required[]='answer';
                break;
        }

        foreach ($required as $el)
        {
            if(!array_key_exists($el,$data))
            {
                return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('required_field'). ' : ' .$el];
            }

        }

        $sessionStep = $toolSessionAnswer->getSessionStep();

        $toolSessionAnswer->setIsTrue(false);



        switch($toolSessionAnswer->getType()){
            case Tool::QUESTION_MULTIPLE_ANSWER:
                foreach ($data['answers'] as $d){
                    if(!array_key_exists('id',$d)){
                        return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('required_field'). 'id in answer item : ' ];
                    }
                    if(!array_key_exists('position',$d)){
                        return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('required_field'). 'position in answer item : ' ];
                    }
                }

                $availableAnswers = $this->em->getRepository(Answer::class)->findBy(['tool'=>$toolSessionAnswer->getTool()]);

                $totalAnswer = count($availableAnswers) ;

                if($totalAnswer!== count($data['answers'])){
                    return ['error' => true, 'data' => ['code'=>'number_of_answer_incorrect'], 'message' =>$this->translator->trans('number of answer incorrect') ];
                }

                $test = 0;
                $testTrue = 0;
                foreach ($availableAnswers as $ans){
                    $testAllAnswer = false;
                    foreach ($data['answers'] as $d){
                        if((int)$d['id'] === $ans->getId()){
                            $tap = new ToolSessionAnswerPosition();
                            $tap->setTool($toolSessionAnswer->getTool());
                            $tap->setToolSessionAnswer($toolSessionAnswer);
                            $tap->setPosition($d['position']);
                            $tap->setAnswer($ans);
                            $toolSessionAnswer->addMultipleAnswer($tap);

                            $test = $test + 1;
                            if($ans->getPosition() === (int)$d['position']){
                                $testTrue = $testTrue + 1;
                            }
                        }

                    }
                }

                if($test !== $totalAnswer){
                    return ['error' => true, 'data' => ['code'=>'invalid_answer'], 'message' =>$this->translator->trans('invalid answer') ];
                }

                if($testTrue === $totalAnswer){
                    $toolSessionAnswer->setIsTrue(true);
                    $sessionStep->incQuestionTrue();
                    $runningSession->incQuestionDone();
                    if($runningSession->getQuestionDone()>25 && $runningSession->getQuestionDone()<= 40){
                        $runningSession->setMessage($this->translator->trans('session_message2'));
                    }

                    if($runningSession->getQuestionDone()>40 && $runningSession->getQuestionDone()<= 49){
                        $runningSession->setMessage($this->translator->trans('session_message3'));
                    }

                    if($runningSession->getQuestionDone() === 50){
                        $runningSession->setMessage($this->translator->trans('session_message4'));
                    }
                }

                break;
            default:
                $answerOk = $this->em->getRepository(Answer::class)->findOneBy(['tool'=>$toolSessionAnswer->getTool(),'isTrue'=>true]);
                $answerUser = $this->em->getRepository(Answer::class)->findOneBy(['tool'=>$toolSessionAnswer->getTool(),'text'=>$data['answer']]);

                if($answerUser === null){
                    return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('answer not exist')];
                }

                $toolSessionAnswer->setSingleAnswer($answerUser);

                if($answerUser === $answerOk){
                    $toolSessionAnswer->setIsTrue(true);
                    $sessionStep->incQuestionTrue();
                    $runningSession->incQuestionDone();

                    if($runningSession->getQuestionDone()>25 && $runningSession->getQuestionDone()<= 40){
                        $runningSession->setMessage($this->translator->trans('session_message2'));
                    }

                    if($runningSession->getQuestionDone()>40 && $runningSession->getQuestionDone()<= 49){
                        $runningSession->setMessage($this->translator->trans('session_message3'));
                    }

                    if($runningSession->getQuestionDone() === 50){
                        $runningSession->setMessage($this->translator->trans('session_message4'));
                    }


                }
                break;
        }


        if($toolSessionAnswer->getIsTrue()){
            $toolSessionAnswer->setIsDone(true);
            $sessionStep->incQuestionDone();
            $toolSessionAnswer->setNextTime(null);


        }
        else{
            $time = new \DateTime();
            $time->add(new \DateInterval('PT60S'));
            if($toolSessionAnswer->getType() !== Tool::QUESTION_MOVABLE_OBJECT){
                $toolSessionAnswer->setNextTime($time);
            }
            else{
                $toolSessionAnswer->setNextTime(null);
            }

        }

        // update left time




        $toolSessionAnswer->setSessionStep($sessionStep);

        $this->em->persist($runningSession);
        $this->em->persist($toolSessionAnswer);
        $this->em->flush();

        $runningSession = $this->em->getRepository(Session::class)->findOneBy(['user'=>$user,'status'=>true]);

        if($toolSessionAnswer->getIsTrue()){
            $ans = $this->container->get(MySerializer::class)->singleObjectToArray($toolSessionAnswer,'answer_ok');
        }
        else{
            $ans = $this->container->get(MySerializer::class)->singleObjectToArray($toolSessionAnswer,'session_all');
        }

        return ['message' => '', 'error' =>false,
            'data' =>['answer'=> $ans,
                'running_session'=>$this->container->get(MySerializer::class)->singleObjectToArray($runningSession,'session_all')]];


    }

    public function startGame(array $data) :?array{
        $user = $this->getCurrentUser();

        $old = $this->em->getRepository(Session::class)->findOneBy(['user'=>$user,'status'=>true]);

        if($old !== null){
            $old->setStatus(false);
            $this->em->persist($old);
        }

        $runningSession = new Session();
        $runningSession->setMessage($this->translator->trans('session_message1'));
        $runningSession->setUser($user);

        $steps = $this->em->getRepository(Step::class)->findBy(['isActive'=>true]);

        $nbQuest = 0;

        if(count($steps) === 0){
            return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('no available questions')];
        }

        foreach ($steps as $step){
            $st = new SessionStep();
            $st->setStep($step);
            $st->setSession($runningSession);
            $st->setNbQuestion($step->getNbQuestion());
            $st->setNbBackground($step->getNbBackground());

            $back = $step->getStepBackgrounds();

            foreach ($back as $b){
                $stb = new SessionStepBackground();
                $stb->setStepBackground($b);
                $stb->setSessionStep($st);
                $stb->setNbQuestion($b->getNbQuestion());
                $stb->setPosition($b->getPosition());

                $tools = $b->getTools();

                foreach ($tools as $t){
                    $nbQuest = $nbQuest + 1;
                    $ts = new ToolSessionAnswer();
                    $ts->setTool($t);
                    $ts->setSessionStep($st);
                    $ts->setType($t->getType());
                    $ts->setSession($runningSession);
                    $ts->setSessionStepBackground($stb);

                    $stb->addToolSessionAnswer($ts);
                }

                $st->addSessionStepBackground($stb);
            }

            $runningSession->addSessionStep($st);

        }

        $runningSession->setQuestionTotal($nbQuest);

        $user->setHasRunningSession(true);
        $user->setRunningSession($runningSession);
        $this->em->persist($user);
        $this->em->flush();



        return ['message' => '', 'error' =>false, 'data' => [
            'running_session'=>$this->container->get(MySerializer::class)->singleObjectToArray($runningSession,'session_all'),
            'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')
        ]];



    }

    public function leaveGame(array $data) :?array{
        $user = $this->getCurrentUser();

        $runningSession = $this->em->getRepository(Session::class)->findOneBy(['user'=>$user,'status'=>true]);

        if($runningSession !== null){
           $date = new \DateTime();

           if($date > $runningSession->getShouldEndDate()){
               $runningSession->setStatus(false);
               $runningSession->setCurrentTime(Session::TIME);
               $user->setHasRunningSession(false);
               $user->setRunningSession(null);
           }
           else{
               $interval = $date->getTimestamp() -  $runningSession->getBackDate()->getTimestamp();
               $runningSession->setCurrentTime($runningSession->getCurrentTime() +  (int)$interval);
               $runningSession->setLastdate($date);
               if(!$user->getHasRunningSession()){
                   $user->setHasRunningSession(true);
                   $user->setRunningSession($runningSession);
               }

           }

           $this->em->persist($runningSession);
           $this->em->persist($user);
           $this->em->flush();

            return ['message' => '', 'error' =>false, 'data' => [
                'running-session'=>$this->container->get(MySerializer::class)->singleObjectToArray($runningSession,'session_all'),
                'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')
            ]];


        }

        return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('no running session')];
    }

    public function backGame(array $data) :?array{
        $user = $this->getCurrentUser();

        $runningSession = $this->em->getRepository(Session::class)->findOneBy(['user'=>$user,'status'=>true]);

        if($runningSession !== null){
            if($runningSession->getCurrentTime()===Session::TIME){
                $runningSession->setStatus(false);
                $user->setHasRunningSession(false);
                $user->setRunningSession(null);
                return ['message' => '', 'error' =>false, 'data' => [
                    'running-session'=>null,
                    'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')
                ]];
            }
            else{
                $date = new \DateTime();
                $runningSession->setBackDate($date);

                $left = $runningSession->getShouldEndDate()->getTimestamp() - $runningSession->getLastDate()->getTimestamp();
                if($left<=0)
                {
                    $runningSession->setStatus(false);
                    $user->setHasRunningSession(false);
                    $user->setRunningSession(null);
                    $runningSession->setCurrentTime(Session::TIME);
                    $this->em->persist($runningSession);
                    $this->em->persist($user);
                    $this->em->flush();

                    return ['message' => '', 'error' =>false, 'data' => [
                        'running-session'=>null,
                        'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')
                    ]];

                }
                $runningSession->setShouldEndDate($date->add(new \DateInterval('PT'.$left.'S')));
                if(!$user->getHasRunningSession()){
                    $user->setHasRunningSession(true);
                    $user->setRunningSession($runningSession);
                }

                $this->em->persist($runningSession);
                $this->em->persist($user);
                $this->em->flush();

                return ['message' => '', 'error' =>false, 'data' => [
                    'running-session'=>$this->container->get(MySerializer::class)->singleObjectToArray($runningSession,'session_all'),
                    'user'=>$this->container->get(MySerializer::class)->singleObjectToArray($user,'user_all')
                ]];
            }
        }

        return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('no running session')];
    }

    public function uploadQuestion(array $data) :?array{

        $steps = $this->em->getRepository(Step::class)->findBy([]);

        if(count($steps)>0)
        {
            return ['message' => 'already imported', 'error' =>true,
                'data' =>[]];
        }

        $file = json_decode(file_get_contents(__DIR__.'/../../public/questions.json'),true);

        foreach ($file as $value){
            $step = new Step();
            $step->setName($value['name']);
            $step->setType($value['type']);
            $step->setNbQuestion($value['nb_question']);
            $step->setNbBackground($value['nb_background']);

            foreach ($value['backgrounds'] as $b){
                $back = new StepBackground();
                $back->setStep($step);
                $back->setName($b['name']);
                $back->setPosition($b['position']);
                $back->setNbQuestion($b['nb_question']);

                foreach ($b['questions'] as $q){
                    $ques = new Tool();
                    $ques->setName($q['image']);
                    $ques->setType($step->getType());
                    $ques->setQuestionImage($q['image']);
                    $ques->setQuestionNumber($q['number']);
                    $ques->setQuestion($q['question']);
                    $ques->setStepBackground($back);
                    $ques->setStep($step);

                    foreach ($q['answers'] as $a){
                        $ans = new Answer();
                        $ans->setPosition($a['position']);
                        $ans->setDescription($a['description']);
                        $ans->setText($a['text']);
                        $ans->setIsTrue($a['is_true']);
                        $ans->setTool($ques);

                        $ques->addPossibleAnswer($ans);
                    }

                    $back->addTool($ques);
                }


                $step->addStepBackground($back);

                $this->em->persist($step);

            }
        }

        $this->em->flush();

        return ['message' => 'ok', 'error' =>false,
            'data' =>[]];

    }

    public function updateQuestionName(array $data){
        $tools = $this->em->getRepository(Tool::class)->findBy(['type'=>2]);

        foreach ($tools as $t){

        }
    }

    public function registerEmail(array $data):?array{

        $required = ['name','surname','email'];

        foreach ($required as $el)
        {
            if(!array_key_exists($el,$data))
            {
                return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('required_field'). ' : ' .$el];
            }

        }

        if(strlen($data['name']) === 0){
            return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('required_field'). ' : name'];
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return ['error' => true, 'data' => [], 'message' =>$this->translator->trans('email_not_valid')];
        }


        $oldUser = $this->em->getRepository(Message::class)->findOneBy(['email'=>$data['email']]);
        if($oldUser !== null) return ['message' => $this->translator->trans('email address already used'), 'error' =>true, 'data' => []];

       $message = new Message();
       $message->setName($data['name']);
       $message->setSurname($data['surname']);
       $message->setEmail($data['email']);

        $this->em->persist($message);
        $this->em->flush();

        return ['error'=>false,
            'info'=>$this->container->get(MySerializer::class)->singleObjectToArray($message,'mess_all'),'message'=>''];


    }












}
