<?php
/**
 * 2020 Zettle Prestashop Connector
 *  @author    : Zettle
 *  @copyright : 2020 Zettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : zettle.com
 *
 */

namespace IzettleApi\Utils;

use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

class IzettleLogger extends AbstractLogger
{

    /**
     * @var array Indexed list of all log levels.
     */
    private $loggingLevels = array(
        LogLevel::EMERGENCY,
        LogLevel::ALERT,
        LogLevel::CRITICAL,
        LogLevel::ERROR,
        LogLevel::WARNING,
        LogLevel::NOTICE,
        LogLevel::INFO,
        LogLevel::DEBUG
    );

    /**
     * Configured Logging Level
     *
     * @var LogLevel $loggingLevel
     */
    private $loggingLevel = LogLevel::INFO;



    /**
     * Configured Logging File
     *
     * @var string
     */
    private $loggerFile;



    /**
     * Log Enabled
     *
     * @var bool
     */
    private $isLoggingEnabled = true;



    /**
     * Logger Name. Generally corresponds to class name
     *
     * @var string
     */
    private $loggerName;

    public function __construct($className, $loggerFile = null)
    {
        $this->loggerName = $className;
        $this->loggerFile = $loggerFile;
        $this->initialize();
    }

    public function initialize()
    {
        if ($this->isLoggingEnabled) {
            if (!$this->loggerFile || !file_exists($this->loggerFile)) {
                $log_file = __DIR__.DIRECTORY_SEPARATOR.'izettle.log';
                $this->loggerFile = file_exists($log_file) ? $log_file : ini_get('error_log');
            }
        }
    }

    public function log($level, $message, array $context = array())
    {
        if ($this->isLoggingEnabled) {
            // Checks if the message is at level below configured logging level
            if (array_search($level, $this->loggingLevels) <= array_search($this->loggingLevel, $this->loggingLevels)) {
                error_log("[" . date('d-m-Y H:i:s') . "] " . $this->loggerName . " : " . strtoupper($level) . ": $message\n", 3, $this->loggerFile);
            }
        }
    }

    /**
     * @return bool
     */
    public function isLoggingEnabled()
    {
        return $this->isLoggingEnabled;
    }

    /**
     * @param bool $isLoggingEnabled
     */
    public function setIsLoggingEnabled($isLoggingEnabled)
    {
        $this->isLoggingEnabled = $isLoggingEnabled;
    }

    /**
     * @return string
     */
    public function getLoggerFile()
    {
        return $this->loggerFile;
    }

    /**
     * @param string $loggerFile
     */
    public function setLoggerFile($loggerFile)
    {
        $this->loggerFile = $loggerFile;
    }

    /**
     * @return LogLevel
     */
    public function getLoggingLevel()
    {
        return $this->loggingLevel;
    }

    /**
     * @param mixed $loggingLevel
     */
    public function setLoggingLevel($loggingLevel)
    {
        if ($loggingLevel instanceof LogLevel) {
            $this->loggingLevel = $loggingLevel;
        } else {
            $this->loggingLevel =
                (isset($loggingLevel) && defined("\\Psr\\Log\\LogLevel::$loggingLevel"))
                ? constant("\\Psr\\Log\\LogLevel::$loggingLevel")
                : LogLevel::INFO;
        }

    }
}
