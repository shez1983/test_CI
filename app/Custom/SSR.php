<?php

namespace App\Custom;

use Hammerstone\Sidecar\Inertia\SSR as BaseSSR;
use Hammerstone\Sidecar\Sidecar;
use Symfony\Component\Process\Process;

class SSR extends BaseSSR
{
    protected function compileJavascript()
    {
        Sidecar::log('Compiling Inertia SSR bundle.');

        $command = ['npx', 'mix', '--mix-config=webpack.ssr.mix.js'];

        if (Sidecar::getEnvironment() === 'production') {
            $command[] = '--production';
        }

        Sidecar::log('Running '.implode(' ', $command));

        $process = new Process($command, $cwd = base_path(), $env = []);

        // mustRun will throw an exception if it fails, which is what we want.
        $process->setTimeout(60)->disableOutput()->mustRun();

        Sidecar::log('JavaScript SSR bundle compiled!');
    }
}
