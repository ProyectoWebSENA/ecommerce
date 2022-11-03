<?php

class SessionController extends Controller
{

    private $userSession;
    private $username;
    private $userId;

    private $session;
    private $sites;

    private $user;
    
    function __construct()
    {
        parent::__construct();

        $this->init();
    }

    private function init(){
        $this->session = new Session();

        $json = $this->getJSONFileConfig();

        $this->sites = $json['sites'];

        $this->defaultSites = $json['default-sites'];

        $this->validateSession();
    }
}