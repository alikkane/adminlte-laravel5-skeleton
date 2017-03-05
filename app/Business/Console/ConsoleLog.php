<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 16/12/16
 * Time: 11:14
 */

namespace App\Business\Console;


use Illuminate\Console\Command;
use Psr\Log\LoggerInterface as PsrLoggerInterface;
use Illuminate\Contracts\Logging\Log as LogContract;

class ConsoleLog implements LogContract, PsrLoggerInterface
{
    /**
     * @var Command
     */
    private $console;
    /**
     * @var LogContract
     */
    private $log;


    /**
     * ConsoleAndLogWriter constructor.
     * @param Command $console
     * @param LogContract $log
     */
    public function __construct(Command $console, LogContract $log)
    {
        $this->console = $console;
        $this->log = $log;
    }

    /**
     * Log an alert message to the logs.
     *
     * @param  string $message
     * @param  array $context
     * @return void
     */
    public function alert($message, array $context = [])
    {
        $this->console->comment($message);
        $this->log->alert($message, $context);
    }

    /**
     * Log a critical message to the logs.
     *
     * @param  string $message
     * @param  array $context
     * @return void
     */
    public function critical($message, array $context = [])
    {
        $this->console->error($message);
        $this->log->critical($message, $context);
    }

    /**
     * Log an error message to the logs.
     *
     * @param  string $message
     * @param  array $context
     * @return void
     */
    public function error($message, array $context = [])
    {
        $this->console->error($message);
        $this->log->error($message, $context);
    }

    /**
     * Log a warning message to the logs.
     *
     * @param  string $message
     * @param  array $context
     * @return void
     */
    public function warning($message, array $context = [])
    {
        $this->console->warn($message);
        $this->log->warning($message, $context);
    }

    /**
     * Log a notice to the logs.
     *
     * @param  string $message
     * @param  array $context
     * @return void
     */
    public function notice($message, array $context = [])
    {
        $this->console->info($message);
        $this->log->notice($message, $context);
    }

    /**
     * Log an informational message to the logs.
     *
     * @param  string $message
     * @param  array $context
     * @return void
     */
    public function info($message, array $context = [])
    {
        $this->console->info($message);
        $this->log->info($message, $context);
    }

    /**
     * Log a debug message to the logs.
     *
     * @param  string $message
     * @param  array $context
     * @return void
     */
    public function debug($message, array $context = [])
    {
        $this->console->info($message);
        $this->log->debug($message, $context);
    }

    /**
     * Log a message to the logs.
     *
     * @param  string $level
     * @param  string $message
     * @param  array $context
     * @return void
     */
    public function log($level, $message, array $context = [])
    {
        $this->console->info($message);
        $this->log->log($message, $context);
    }

    /**
     * Register a file log handler.
     *
     * @param  string $path
     * @param  string $level
     * @return void
     */
    public function useFiles($path, $level = 'debug')
    {
        $this->log->useFiles($path, $level);
    }

    /**
     * Register a daily file log handler.
     *
     * @param  string $path
     * @param  int $days
     * @param  string $level
     * @return void
     */
    public function useDailyFiles($path, $days = 0, $level = 'debug')
    {
        $this->log->useDailyFiles($path, $days, $level);
    }

    /**
     * System is unusable.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function emergency($message, array $context = array())
    {
        $this->console->error($message);
        $this->log->error($message, $context);
    }
}