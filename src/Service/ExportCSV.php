<?php

/**
 * Export csv for output
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */
declare (strict_types = 1);

namespace Salaries\Service;

use Salaries\Contracts\ExportOutputInterface;

class ExportCSV implements ExportOutputInterface
{
    private $data = [];

    /**
     * setData
     *
     * @param  array $data
     * @return self
     */
    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }
    /**
     * getData
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
    /**
     * save file
     *
     * @return string
     */
    public function save(string $filePath): string
    {
        $fp = fopen($filePath, 'w');
        //headers
        fputcsv($fp, array_keys((array) $this->data[0]));
        //rows
        foreach ($this->data as $fields) {
            fputcsv($fp, (array) $fields);
        }
        fclose($fp);
        return $filePath;
    }

}
