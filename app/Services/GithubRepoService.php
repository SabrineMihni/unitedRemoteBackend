<?php


namespace App\Services;


use App\Entities\Language;
use GuzzleHttp\Client;

class GithubRepoService
{

    protected $client   = null;
    protected $endpoint = null;
    protected $repos = null;

    public function __construct()
    {
        $this->init();
    }

    /**
     *
     */
    public function init() {

        $this->endpoint  = config('services.github.endpoint');
        $this->client = new Client();
        $request = $this->client->get($this->endpoint);
        $this->repos = json_decode($request->getBody(), true);
    }

    /**
     * @param $repos
     * @return array
     */
    public function getLanguages() {

        $languages = [];

        foreach ($this->repos as $repo) {

            if(array_key_exists("language", $repo)) {

                $lang_name = $repo["language"];
                $repo_name = $repo["name"];
                $lang = $this->doesExist($languages, $lang_name);

                if( $lang) {
                    $lang->incrementRepoNum();
                    $lang->addRepo($repo_name);
                }else {

                    $lang = new Language($lang_name,  $repo_name, count($this->repos));
                    array_push($languages, $lang);
                }
            }
        }

        return $languages;
    }

    /**
     * @param $array
     * @param $lang_name
     * @return Language|null
     */
    public function doesExist($array, $lang_name) {

        foreach ($array as $lang) {
            if($lang->getName() === $lang_name) {
                return $lang;
            }
        }

        return null;
    }
}
