<?php

class SessionController extends Controller
{

  private $userSession;
  private $username;
  private $userId;

  private $session;
  private $sites;
  private $defaultSites;

  private $user;

  function __construct()
  {
    parent::__construct();

    $this->init();
  }

  public function getUserSession()
  {
    return $this->userSession;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function getUserId()
  {
    return $this->userId;
  }

  private function init()
  {
    $this->session = new Session();

    $json = $this->getJSONFileConfig();

    $this->sites = $json['sites'];

    $this->defaultSites = $json['default-sites'];

    $this->validateSession();
  }

  private function getJSONFileConfig()
  {
    $string = file_get_contents('config/access.json');
    $json = json_decode($string, true);
    return $json;
  }

  function validateSession()
  {
    if ($this->existsSession()) {
      $role = $this->getUserSessionData()->getRole();

      if ($this->isPublic()) {
        // $this->redirectDefaultSiteByRole($role);
        if (!$this->isAccesibleLoggedIn()) {
          $this->redirectDefaultSiteByRole($role);
        }
      } else {
        if ($this->isAuthorized($role)) {
        } else {
          $this->redirectDefaultSiteByRole($role);
        }
      }
    } else {
      if ($this->isPublic()) {
      } else {
        header('Location: ' . constant('URL') . 'login');
      }
    }
  }

  function existsSession()
  {
    if (!$this->session->exists()) return false;

    if ($this->session->getCurrentUser() == NULL) return false;

    $userId = $this->session->getCurrentUser();

    if ($userId) return true;

    return false;
  }

  function getUserSessionData()
  {
    $id = $this->session->getCurrentUser();
    $this->user = new UserModel();
    $this->user->get($id);
    return $this->user;
  }

  function isPublic()
  {
    $currentURL = $this->getCurrentPage();
    $currentURL = preg_replace("/\?.*/", "", $currentURL);
    for ($i = 0; $i < sizeof($this->sites); $i++) {
      if ($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['access'] === 'public') {
        return true;
      }
    }

    return false;
  }

  private function isAccesibleLoggedIn()
  {
    $currentURL = $this->getCurrentPage();
    $currentURL = preg_replace("/\?.*/", "", $currentURL);
    for ($i = 0; $i < sizeof($this->sites); $i++) {
      if ($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['log-status'] === 'no') {
        return false;
      }
    }

    return true;
  }

  private function redirectDefaultSiteByRole($role)
  {
    $url = '';
    if ($role === 'user') {
      $url = '/ecommerce/' . $this->defaultSites['user'];
    } else  if ($role === 'admin') {
      $url = '/ecommerce/' . $this->defaultSites['admin'];
    }
    header('Location: ' . $url);
  }

  private function isAuthorized($role)
  {
    $currentURL = $this->getCurrentPage();
    $currentURL = preg_replace("/\?.*/", "", $currentURL);
    for ($i = 0; $i < sizeof($this->sites); $i++) {
      if ($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['role'] === $role) {
        return true;
      }
    }

    return false;
  }

  private function getCurrentPage()
  {
    $link = trim("$_SERVER[REQUEST_URI]");
    $url = explode('/', $link);
    return $url[2];
  }


  public function initialize($user)
  {
    $this->session->setCurrentUser($user->getId());
    $this->session->setUsername($user->getName());
    $this->session->setRole($user->getRole());
    $this->authorizeAccess($user->getRole());
  }

  function authorizeAccess($role)
  {
    switch ($role) {
      case 'user':
        $this->redirect($this->defaultSites['user']);
        break;
      case 'admin':
        $this->redirect($this->defaultSites['admin']);
        break;
      default:
        break;
    }
  }

  function logout()
  {
    $this->session->closeSession();
  }
}
