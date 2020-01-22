<?php


namespace App\Entities;


class Language implements \JsonSerializable
{

    private $name;
    private $number_of_repo;
    private $list_repo = [];
    private $framework_popularity;
    private $all_repo_count;

    public function __construct($name, $repo_name, $all_repo_count)
    {
        $this->name = $name;
        $this->number_of_repo = 1;
        array_push($this->list_repo, $repo_name);
        $this->all_repo_count = $all_repo_count;
        $this->framework_popularity = (1 / $all_repo_count * 100) . '%';

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNumberOfRepo()
    {
        return $this->number_of_repo;
    }

    /**
     * @param mixed $number_of_repo
     */
    public function setNumberOfRepo($number_of_repo): void
    {
        $this->number_of_repo = $number_of_repo;
    }

    /**
     * @return mixed
     */
    public function getListRepo()
    {
        return $this->list_repo;
    }

    /**
     * @param mixed $list_repo
     */
    public function setListRepo($list_repo): void
    {
        $this->list_repo = $list_repo;
    }

    /**
     * @return mixed
     */
    public function getFrameworkPopularity()
    {
        return $this->framework_popularity;
    }

    /**
     * @param mixed $framework_popularity
     */
    public function setFrameworkPopularity($framework_popularity): void
    {
        $this->framework_popularity = $framework_popularity . '%';
    }

    /**
     *
     */
    public function incrementRepoNum() {
        $this->number_of_repo++;
        $this->setFrameworkPopularity($this->getNumberOfRepo() / $this->getAllRepoCount() * 100 );
    }

    /**
     * @param $repoName
     */
    public function addRepo($repoName) {
        array_push($this->list_repo, $repoName);
    }

    /**
     * @return mixed
     */
    public function getAllRepoCount()
    {
        return $this->all_repo_count;
    }


    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'number_of_repositories' => $this->getNumberOfRepo(),
            'repositories_name' => $this->getListRepo(),
            'framework_popularity' => $this->getFrameworkPopularity()
        ];
    }
}
