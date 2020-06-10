<?php declare (strict_types = 1);

namespace Salaries;

trait Parse
{
    public $data = [];

    public function toArray(): array
    {
        return $this->data;
    }

    public function toJson(): string
    {
        return json_encode($this->data);
    }
    public function saveCSV(string $file_path): string
    {
        $fp = fopen($file_path, 'w');
        //headers
        fputcsv($fp, array_keys($this->toArray()[0]->toArray()));
        //rows
        foreach ($this->data as $fields) {
            fputcsv($fp, $fields->toArray());
        }
        fclose($fp);
        return $file_path;
    }
}