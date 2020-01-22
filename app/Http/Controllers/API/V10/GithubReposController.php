<?php


namespace App\Http\Controllers\API\V10;


use App\Entities\Language;
use App\Http\Controllers\BaseController;
use App\Services\GithubRepoService;
use GuzzleHttp\Client;

class GithubReposController extends BaseController
{

    protected $githubService;

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->githubService =  new GithubRepoService();
    }


    /**
     *
     */
    public function getLanguages() {

        return response()->json($this->githubService->getLanguages());
    }


}
