<?php declare (strict_types = 1);

namespace Salaries\Service;

trait Parse
{
    public $data = [];

    /**
     * toArray
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * saveCSV
     *
     * @param  string $filePath
     * @return string
     */
    public function saveCSV(string $filePath): string
    {
        $fp = fopen($filePath, 'w');
        //headers
        fputcsv($fp, array_keys($this->toArray()[0]->toArray()));
        //rows
        foreach ($this->data as $fields) {
            fputcsv($fp, $fields->toArray());
        }
        fclose($fp);
        return $filePath;
    }
}
