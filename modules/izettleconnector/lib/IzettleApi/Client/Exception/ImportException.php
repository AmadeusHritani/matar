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

namespace IzettleApi\Client\Exception;


class ImportException extends ClientException
{

    private $importedCount;
    private $allCount;
    private $actualImports;

    /**
     * @return mixed
     */
    public function getActualImports()
    {
        return $this->actualImports;
    }

    /**
     * @return mixed
     */
    public function getImportedCount()
    {
        return $this->importedCount;
    }

    /**
     * @return mixed
     */
    public function getAllCount()
    {
        return $this->allCount;
    }

    /**
     * ImportException constructor.
     * @param $message
     * @param $importedCount
     * @param $allCount
     * @param $actualImports
     * @param int $code
     */
    public function __construct($message, $importedCount, $allCount, $actualImports, $code = 0)
    {
        parent::__construct($message, $code);
        $this->importedCount = $importedCount;
        $this->allCount = $allCount;
        $this->actualImports = $actualImports;
    }


}