<?php

namespace Yams;

use Silex\Provider\SessionServiceProvider;
use Spear\Silex\Application\AbstractApplication;
use Spear\Silex\Provider;
use Yams\Controllers\Home\Provider as ProviderController;
use Yams\Services\Provider as ProviderServices;

class Application extends AbstractApplication
{
    protected function registerProviders()
    {
        $this->register(new SessionServiceProvider());

        $this->register(new ProviderServices());
        $this->register(new Provider\DBAL());
        $this->register(new Provider\Twig());
        $this->register(new Provider\AsseticServiceProvider());
        $this->register(new ProviderServices());
    }

    protected function initializeServices()
    {
        $this->configureTwig();
    }

    private function configureTwig()
    {
        $this['twig.path.manager']->addPath(array(
            $this['root.path'] . 'views/',
        ));
    }

    protected function mountControllerProviders()
    {
        $this->mount('/', new ProviderController());
    }
}
