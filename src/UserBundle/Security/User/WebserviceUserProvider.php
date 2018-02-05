<?php
/**
 * Created by IntelliJ IDEA.
 * User: anianougbo
 * Date: 12/12/2017
 * Time: 17:18
 */

namespace UserBundle\Security\User;

use UserBundle\Security\User\UserUser;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Requests as adolpherequest;


class WebserviceUserProvider implements UserProviderInterface
{

    private $em;
    private $oauthUrl;
    /*private $serializer;*/
    private $clientId;
    private $clientSecret;
    private $options;
    private $userinfoUrl;
    private $appCode;

    public function __construct($em,$kernel) {
        $this->em = $em;
        //$this->serializer = $serializer;
        $this->oauthUrl = $kernel->getContainer()->getParameter("oauth_url");
        $this->userinfoUrl = $kernel->getContainer()->getParameter("user_info_url");
        $this->appCode = $kernel->getContainer()->getParameter("app_code");
        $this->clientId = $kernel->getContainer()->getParameter("api_publik_key");
        $this->clientSecret = $kernel->getContainer()->getParameter("api_private_key");
        $this->options = array('timeout' => 100,'connect_timeout' => 100);
    }

    public function getuserCredentials($username,$password){
        $data = array('client_id'=> $this->clientId,'client_secret'=>$this->clientSecret,'grant_type'=>'password','username'=>$username,'password'=>$password);
        $response  =  adolpheRequest::post($this->oauthUrl,$this->options,$data);
        $credentialStatutCode = $response->status_code;
        //die(dump($response));
        $reponseBody = json_decode($response->body);

        if($credentialStatutCode == 400 ){

            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist.', $username)
            );
        }

        $userInfoUrl = $this->userinfoUrl.'?access_token='.$reponseBody->access_token.'&app_code='.$this->appCode;
        $userData  =  adolpheRequest::get($userInfoUrl,array(),$this->options);
        $userDataBody  = json_decode($userData->body);
        $userdataStatutCode = $userData->status_code;

        if($userdataStatutCode == 401 ){
            throw new UsernameNotFoundException(
                sprintf('User account is disabled', $username)
            );
        }
        //die(dump($userData));
         if ($userData) {
            return new UserUser($userDataBody->username, $password, $userDataBody->salt, $userDataBody->roles);
        }

            /*if($reponseBody->error == "invalid_client"){
                $errorMessage = "votre application n' a pas la permission de vous authentifier . " ;

            }*/
            /*$session = new session();
            $session->getFlashBag()->add('error',$errorMessage );
            $url = $this->router->generate('login');
            return new RedirectResponse($url);*/
       // die(dump($response));
    }

    public function loadUserByUsername($username)
    {
        $userData = "";

        //die(dump('ok'));




       /* if ($userData) {
            $password = '...';

            return new WebserviceUser($username, $password, $salt, $roles);
        }*/

        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
        );
    }


    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof UserUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        //return $this->loadUserByUsername($user->getUsername());
        return $this->getuserCredentials($user->getUsername(),$user->getPassword());
    }


    public function supportsClass($class)
    {
        return UserUser::class === $class;
        /*return true;*/
    }
}