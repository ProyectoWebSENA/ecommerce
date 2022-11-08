<?php

class View
{
  function __construct()
  {
  }

  function render($viewName, $data = [])
  {
    $this->data = $data;

    $this->handleMessages();

    require_once 'views/' . $viewName . '.php';
  }

  private function handleMessages()
  {
    if (!isset($_GET['success']) && isset($_GET['error'])) {
      if (isset($_GET['error'])) {
        $this->handleError();
      }
    }
  }

  private function handleError()
  {
    if (isset($_GET['error'])) {
      $hash = $_GET['error'];
      $errors = new Errors();

      if ($errors->existsKey($hash)) {
        $this->data['error'] = $errors->get($hash);
      } else {
        $this->data['error'] = NULL;
      }
    }
  }

  public function showMessages()
  {
    $this->showError();
  }

  public function showError()
  {
    if (array_key_exists('error', $this->data)) {
      echo '
        <div class="modal-container">
          <div class="modal">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="50" height="50" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <line x1="18" y1="6" x2="6" y2="18" />
              <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
            <p>' . $this->data['error'] . '</p>
          </div>
        </div>
      ';
    }
  }
}
