<?php

namespace App\Services;
use App\Repository\NewsRepositoryPDO;

require_once __DIR__."/../Repository/NewsRepositoryPDO.php";
class NewsService
{
    private NewsRepositoryPDO $newsRepository;

    public function __construct(){
        $this->newsRepository = new NewsRepositoryPDO();
    }
    public function createNews($news): bool|string
    {

        return $this->newsRepository->create($news);

    }

    public function listAll(): bool|\PDOStatement
    {
        return $this->newsRepository->listAll();
    }

    public function listMy($id): bool|\PDOStatement
    {
        return $this->newsRepository->listMy($id);
    }


}