<?php


namespace Source\App;


use League\Plates\Engine;
use Source\Models\User;
use Source\Support\Seo;

/**
 * Class Web
 * @package Source\App
 */
class Web
{

    /**  @var Engine */
    private $view;

    /* @var $seo Seo */
    private $seo;

    /**
     * Web constructor.
     */
    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../../theme", "php");
        $this->seo = new Seo();
    }

    /**
     *
     */
    public function home(): void
    {
        $user = (new User())->find()->fetch(true);
        $head = $this->seo->render(
            "Home | " . SITE,
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio excepturi fuga incidunt ipsa officiis quasi quibusdam quod. Recusandae, voluptatibus.",
            url(),
            "http://via.placeholder.com/1020x628.png?text=Home+Cover"
        );

        echo $this->view->render("home", [
            "head" => $head,
            "users" => $user,

        ]);
    }

    /**
     *
     */
    public function contact(): void
    {
        $head = $this->seo->render(
            "Contato | " . SITE,
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio excepturi fuga incidunt ipsa officiis quasi quibusdam quod. Recusandae, voluptatibus.",
            url("contato"),
            "http://via.placeholder.com/1020x628.png?text=Contato+Cover"
        );

        echo $this->view->render("contact", [
            "head" => $head,
        ]);
    }

    /**
     * @param array $data
     */
    public function error(array $data): void
    {
        $head = $this->seo->render(
            "Erro {$data['errcode']} | " . SITE,
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut distinctio excepturi fuga incidunt ipsa officiis quasi quibusdam quod. Recusandae, voluptatibus.",
            url("Ops/{$data['errcode']}"),
            "http://via.placeholder.com/1020x628.png?text=Erro+{$data['errcode']}"
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $data['errcode']
        ]);
    }
}
