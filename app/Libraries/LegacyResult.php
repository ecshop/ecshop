<?php

declare(strict_types=1);

namespace App\Libraries;

/**
 * 兼容旧版 mysqli_result 的结果包装类。
 *
 * 将 Laravel DB::select() 返回的 stdClass[] 包装成旧代码可遍历的结果集，
 * 使 $db->query() / $db->fetchRow() / $db->num_rows() 等调用无需改动。
 */
class LegacyResult
{
    private array $rows;

    private int $position = 0;

    private int $numRows;

    private int $affectedRows;

    public function __construct(array $rows = [], int $affectedRows = 0)
    {
        $this->rows = $rows;
        $this->numRows = count($rows);
        $this->affectedRows = $affectedRows;
    }

    /**
     * 模拟 mysqli_fetch_array
     */
    public function fetchArray(int $resultType = MYSQLI_ASSOC): array|false
    {
        if (! isset($this->rows[$this->position])) {
            return false;
        }

        $row = (array) $this->rows[$this->position];
        $this->position++;

        return match ($resultType) {
            MYSQLI_NUM => array_values($row),
            MYSQLI_BOTH => array_merge($row, array_values($row)),
            default => $row,
        };
    }

    /**
     * 模拟 mysqli_fetch_assoc
     */
    public function fetchAssoc(): array|false
    {
        return $this->fetchArray(MYSQLI_ASSOC);
    }

    public function numRows(): int
    {
        return $this->numRows;
    }

    public function numFields(): int
    {
        if (! isset($this->rows[0])) {
            return 0;
        }

        return count((array) $this->rows[0]);
    }

    public function freeResult(): void
    {
        $this->rows = [];
        $this->position = 0;
        $this->numRows = 0;
    }

    public function affectedRows(): int
    {
        return $this->affectedRows;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function getRowValue(int $rowIndex): mixed
    {
        if (! isset($this->rows[$rowIndex])) {
            return null;
        }

        $values = array_values((array) $this->rows[$rowIndex]);

        return $values[0] ?? null;
    }

    /**
     * 返回字段名列表，用于模拟 mysqli_fetch_field 的简化场景
     */
    public function fetchFields(): array
    {
        if (! isset($this->rows[0])) {
            return [];
        }

        return array_keys((array) $this->rows[0]);
    }
}
