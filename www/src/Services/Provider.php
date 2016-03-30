<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Yams\Services;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Description of Provider
 *
 * @author Appo
 */
class Provider implements ServiceProviderInterface 
{
    public function register(Application $app)
    {

        $app['combinaisons.valides.retriever'] = $app->share(function ($app) {
            return new CombinaisonsValidsRetriever();
        });

    }

    public function boot(Application $app) {
        
    }

}
