<?php

class ReviewController extends SessionController
{
  function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $this->view->render('404/index');
  }

  public function create()
  {
    if ($this->existsPOST(['prod_code', 'user_id', 'rating', 'review'])) {
      $prod_code = $this->getPost('prod_code');
      $user_id = $this->getPost('user_id');
      $rating = $this->getPost('rating');
      $review = $this->getPost('review');

      if ($prod_code == '' || empty($prod_code) || $user_id == '' || empty($user_id) || $rating == '' || empty($rating) || $review == '' || empty($review)) {
        $this->redirect('product?id=' . $prod_code, ['error' => 's']);
      }

      if ($this->checkReviewExists($user_id, $prod_code)) {
        $this->redirect('product?id=' . $prod_code, ['error' => 'la reseña ya existe']);
      } else {
        $this->model->setIdUser($user_id);
        $this->model->setProdCode($prod_code);
        $this->model->setStars($rating);
        $this->model->setComment($review);

        $this->model->save();

        $this->redirect('product?id=' . $prod_code, ['success' => 's']);
      }
    }
  }

  private function checkReviewExists($user_id, $prod_code)
  {
    return $this->model->checkReview($user_id, $prod_code);
  }
}
