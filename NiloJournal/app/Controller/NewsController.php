<?php

use App\Model\News;
use App\Services\NewsService;
use App\Services\SessionService;


require_once __DIR__ . "/../Services/NewsService.php";
require_once __DIR__ . "/../Services/SessionService.php";
require_once __DIR__ . "/../Model/News.php";

class NewsController
{

  private NewsService $newsService;
  private SessionService $session;

  public function __construct()
  {
    $this->newsService = new NewsService();
    $this->session = new SessionService();
  }

  public function createNews()
  {
    unset($_SESSION['msg']);
    $news = new News();

    $news->title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
    $news->subtitle = filter_input(INPUT_POST, "subtitle", FILTER_SANITIZE_SPECIAL_CHARS);
    $news->content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_SPECIAL_CHARS);
    $news->poster = filter_input(INPUT_POST, "poster", FILTER_SANITIZE_SPECIAL_CHARS);
    $news->userId = SessionService::getUserId();



    try {
      $this->newsService->createNews($news);
      $_SESSION['success'] = "Notícia cadastrada com sucesso";
      header('location: /');
    } catch (Exception $e) {
      session_start();
      $_SESSION['msg'] = $e->getMessage();
    }
  }

  public function listAll(): array
  {
    $newsObject = $this->newsService->listAll();
    $newsLista = [];

    while ($news = $newsObject->fetchObject()) {

      $newsLista[] = $news;
    }

    return $newsLista;
  }

  public function listMy(): array
  {
    $id = $this->session->getUserId();
    $newsObject = $this->newsService->listMy($id);
    $newsLista = [];

    while ($news = $newsObject->fetchObject()) {

      $newsLista[] = $news;
    }

    return $newsLista;
  }
}

