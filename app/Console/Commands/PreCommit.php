<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class PreCommit extends Command
{
    /**
     * Files to be analysed.
     *
     * @var array
     */
    private $files = [];

    /**
     * The exit code returned by the process.
     *
     * @var int
     */
    private $exitCode;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'git:pre-commit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Git pre-commit hook, with PHPCS, PHPCBF and PHPUNIT.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (config('app.env') === 'production') {
            $this->output->error('Please dont commit in production, use proper steps');
            exit(1);
        }

        // extract PHP files...
        $this->extractFilesToBeAnalysed();

        if (count($this->files) === 0) {
            $this->output->success('No PHP files to commit');
            exit(0);
        }

        // Run code sniffer...
        $this->runCodeSniffer();

        // Run PHPUnit
        // $this->runPHPUnit();

        if ($this->exitCode) {
            $this->output->error('Something is wrong. Check Code Sniffer and PHPUnit log.');
        } else {
            $this->output->success('Yeah!! Everything is alright.');
        }

        exit($this->exitCode);
    }

    /**
     * Extract PHP files to be analysed from HEAD.
     */
    private function extractFilesToBeAnalysed()
    {
        exec('git diff --cached --name-only --diff-filter=ACMR HEAD | grep \\\\.php', $this->files);

        $process = $this->process('pwd');

        $this->files = array_map(function ($item) use ($process) {
            return $process->getWorkingDirectory().'/'.$item;
        }, $this->files);
    }

    /**
     * Run Code Sniffer to detect PSR2 code standard.
     */
    private function runCodeSniffer()
    {
        exec('./vendor/bin/pint '.implode(' ', $this->files));
        exec('git add '.implode(' ', $this->files));
    }

    /**
     * Run PHP Unit test.
     */
    private function runPHPUnit()
    {
        exec('./vendor/bin/sail test', $output, $code);
        $this->exitCode = $code;
    }

    /**
     * @param $command
     * @return Process
     */
    private function process($command)
    {
        $process = new Process([$command]);

        $process->run(function ($type, $line) {
            $this->output->write($line);
        });

        return $process;
    }
}
