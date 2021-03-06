<?php

namespace Midnite81\GoCardless\Tests;

use Midnite81\GoCardless\GoCardlessServiceProvider;
use Orchestra\Testbench\Concerns\CreatesApplication;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class BaseTestCase extends OrchestraTestCase
{
    /**
     * Set up
     */
    protected function setUp()
    {
        parent::setUp();
        $this->loadFactories();
        $this->artisan('migrate');

    }


    /**
     * Get package providers
     *
     * @param $application
     * @return array
     */
    public function getPackageProviders($application)
    {
        return [
            GoCardlessServiceProvider::class,
        ];
    }

    /**
     * Load the model factories.
     */
    protected function loadFactories()
    {
        $this->withFactories(__DIR__ . '/factories');
    }


}