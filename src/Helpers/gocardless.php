<?php

if (! function_exists('gocardless_env')) {
    /**
     * Get the environment specific config value
     *
     * @param string $key
     * @return mixed
     */
    function gocardless_env($key = '')
    {
        $config = config('gocardless');
        $env = config('gocardless.environment');
        if (empty($env) && empty($config['environments'][$env])) {
            return null;
        }
        if (empty($key) && ! empty($config['environments'][$env])) {
            return $config['environments'][$env];
        }
        if (array_key_exists($env, $config['environments'])) {
            return $config['environments'][$env][$key];
        }
        return null;
    }
}

if ( ! function_exists('gocardless')) {

    /**
     * Return an instance of gocardless
     */
    function gocardless()
    {
       return app('gocardless');
    }

}
