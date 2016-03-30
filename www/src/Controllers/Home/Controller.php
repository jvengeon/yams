<?php

namespace Yams\Controllers\Home;

use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;
use Spear\Silex\Application\Traits;
use Yams\Services\Combinaisons\Brelan;
use Yams\Services\Combinaisons\Carre;
use Yams\Services\Combinaisons\Chance;
use Yams\Services\Combinaisons\Full;
use Yams\Services\Combinaisons\PetiteSuite;
use Yams\Services\Combinaisons\Suite;
use Yams\Services\Combinaisons\Yams;
use Yams\Services\CombinaisonsValidsRetriever;

class Controller
{
    use
        Traits\RequestAware,
        LoggerAwareTrait;

    private
        $combinaisonsValidsRetriever,
        $twig;

    public function __construct(\Twig_Environment $twig, CombinaisonsValidsRetriever $combinaisonsValidsRetriever)
    {
        $this->combinaisonsValidsRetriever = $combinaisonsValidsRetriever;
        $this->twig = $twig;

        $this->logger = new NullLogger();
    }

    public function homeAction()
    {
        $this->combinaisonsValidsRetriever
            ->add(new Brelan())
            ->add(new Carre())
            ->add(new Yams())
            ->add(new Full())
            ->add(new Chance())
            ->add(new PetiteSuite())
            ->add(new Suite());
        
        $jeu = [mt_rand(1, 6), mt_rand(1, 6),mt_rand(1, 6),mt_rand(1, 6),mt_rand(1, 6)];
        
        $this->combinaisonsValidsRetriever->setGame($jeu);
        
        $validsCombinaisons = $this->combinaisonsValidsRetriever->getValidCombinaisons();
        
        return $this->twig->render('home.html.twig', [
            'jeu' => $jeu,
            'validsCombinaisons' => $validsCombinaisons,
        ]);
    }
}