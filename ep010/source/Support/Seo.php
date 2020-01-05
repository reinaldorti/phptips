<?php


namespace Source\Support;


use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    protected $optimier;

    public function __construct(string $schema = "article")
    {
        $this->optimier = new Optimizer();
        $this->optimier->openGraph(
            SITE,
            "pt_BR",
            $schema
        )->publisher(
            "reinaldorti",
            "reinaldorti"
        )->twitterCard(
            "@reinaldorti",
            "@reinaldorti",
            "upinside.com.br",
            )->facebook(
            "reinaldorti"
        );
    }

    public function render(string $title, string $description, string $url, string $image, bool $follow = true): string
    {
        return $this->optimier->optimize($title, $description, $url, $image, $follow)->render();
    }
}