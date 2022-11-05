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
    return $this->userUserId;
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
    error_log("SESSIONCONTROLLER::VALIDATESESSION");
    if ($this->existsSession()) {
      $role = $this->getUserSessionData()->getRole();

      error_log("SESSIONCONTROLLER::VALIDATESESSION: username: " . $this->user->getUsername() . " - role: " . $this->user->getRole());

      if ($this->isPublic()) {
        $this->redirectDefaultSiteByRole($role);
        error_log("Entra a sitio publico");
      } else {
        if ($this->isAuthorized($role)) {
          error_log("Autorizado, pasa a la pagina");
        } else {
          error_log("No autorizado, redirige a la pagina por default");
          $this->redirectDefaultSiteByRole($role);
        }
      }
    } else {
      if ($this->isPublic()) {
        error_log("Entra a sitio publico");
      } else {
        error_log("No autorizado, redirige a la pagina login");
        header('Location: ' . constant('URL') . '/login');
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
    $id = $this->session->getCurentUser();
    $this->user = new UserModel();
    $this->user->get($id);
    error_log("SESSIONCONTROLLER::GETUSERSESSIONDATA: " . $this->user->getUsername());
    return $this->user;
  }

  function isPublic()
  {
    $currentURL = $this->getCurrentPage();
    error_log("SESSIONCONTROLLER::ISPUBLIC: currentURL -> " . $currentURL);
    $currentURL = preg_replace("/\?.*/", "", $currentURL);
    for ($i = 0; $i < sizeof($this->sites); $i++) {
      if ($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['access'] === 'public') {
        return true;
      }
    }

    return false;
  }

  private function redirectDefaultSiteByRole($role)
  {
    $url = '';
    for ($i = 0; $i < sizeof($this->sites); $i++) {
      if ($this->sites[$i]['role'] === $role) {
        $url = '/ecommerce/' . $this->sites[$i]['site'];
        break;
      }
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
    error_log("SESSIONCONTROLLER::GETCURRENTPAGE: link -> " . $link . " url -> " . $url[2]);
    return $url[2];
  }


  public function initialize($user)
  {

    error_log("SESSIONCONTROLLER::INITIALIZE: USER: " . $user->getUsername());
    $this->session->setCurrentUser($user->getId());
    $this->authorizeAccess($user->getRole());
  }

  function authorizeAccess($role)
  {
    error_log("SESSIONCONTROLLER::AUTHORIZEACCESS: role:" . $role);
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
