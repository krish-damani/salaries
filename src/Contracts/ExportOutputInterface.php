<?php

/**
 * Contract for export output
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */

declare (strict_types = 1);

namespace Salaries\Contracts;

interface ExportOutputInterface
{

    /**
     * setData
     *
     * @param  array $data
     * @return self
     */
    public function setData(array $data): self;

    /**
     * getData
     *
     * @return array
     */
    public function getData(): array;

    /**
     * save file
     *
     * @return string
     */
    public function save(string $filePath): string;
}
