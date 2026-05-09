<?php

namespace App\Libraries;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Mysql
{
    public $link_id = null;

    public $settings = [];

    public $queryCount = 0;

    public $queryTime = '';

    public $queryLog = [];

    public $max_cache_time = 300; // 最大的缓存时间，以秒为单位

    public $cache_data_dir = 'temp/query_caches/';

    public $root_path = '';

    public $error_message = [];

    public $platform = '';

    public $version = '';

    public $dbhash = '';

    public $starttime = 0;

    public $timeline = 0;

    public $timezone = 0;

    public $mysql_config_cache_file_time = 0;

    public $mysql_disable_cache_tables = []; // 不允许被缓存的表，遇到将不会进行缓存

    private string $lastError = '';

    private int $lastErrno = 0;

    private int $lastAffectedRows = 0;

    public function __construct($dbhost, $dbuser, $dbpw, $dbname = '', $charset = 'utf8', $pconnect = 0, $quiet = 0)
    {
        if (defined('EC_CHARSET')) {
            $charset = strtolower(str_replace('-', '', EC_CHARSET));
        }

        if (defined('ROOT_PATH') && ! $this->root_path) {
            $this->root_path = ROOT_PATH;
        }

        $this->settings = [
            'dbhost' => $dbhost,
            'dbuser' => $dbuser,
            'dbpw' => $dbpw,
            'dbname' => $dbname,
            'charset' => $charset,
            'pconnect' => $pconnect,
        ];
    }

    public function connect($dbhost, $dbuser, $dbpw, $dbname = '', $charset = 'utf8', $pconnect = 0, $quiet = 0)
    {
        $this->settings = [
            'dbhost' => $dbhost,
            'dbuser' => $dbuser,
            'dbpw' => $dbpw,
            'dbname' => $dbname,
            'charset' => $charset,
            'pconnect' => $pconnect,
        ];

        return true;
    }

    public function select_database($dbname)
    {
        return true;
    }

    public function set_mysql_charset($charset)
    {
        return true;
    }

    public function fetch_array($query, $result_type = MYSQLI_ASSOC)
    {
        if ($query instanceof LegacyResult) {
            return $query->fetchArray($result_type);
        }

        return false;
    }

    public function query($sql, $type = '')
    {
        if ($this->queryCount++ <= 99) {
            $this->queryLog[] = $sql;
        }
        if ($this->queryTime == '') {
            $this->queryTime = microtime(true);
        }

        try {
            $sqlUpper = strtoupper(ltrim($sql));

            if (
                str_starts_with($sqlUpper, 'SELECT')
                || str_starts_with($sqlUpper, 'SHOW')
                || str_starts_with($sqlUpper, 'DESCRIBE')
                || str_starts_with($sqlUpper, 'EXPLAIN')
            ) {
                $rows = DB::select($sql);
                $this->lastAffectedRows = 0;

                return new LegacyResult($rows);
            }

            $pdo = DB::connection()->getPdo();
            $affected = $pdo->exec($sql);

            if ($affected === false) {
                $errorInfo = $pdo->errorInfo();
                throw new \PDOException($errorInfo[2] ?? 'Exec failed', (int) ($errorInfo[1] ?? 0));
            }

            $this->lastAffectedRows = (int) $affected;

            return new LegacyResult([], $this->lastAffectedRows);
        } catch (\Exception $e) {
            $this->lastError = $e->getMessage();
            $this->lastErrno = (int) $e->getCode();

            if ($type != 'SILENT') {
                $this->error_message[]['message'] = 'MySQL Query Error';
                $this->error_message[]['sql'] = $sql;
                $this->error_message[]['error'] = $this->lastError;
                $this->error_message[]['errno'] = $this->lastErrno;

                $this->ErrorMsg();

                return false;
            }

            return false;
        }
    }

    public function affected_rows()
    {
        return $this->lastAffectedRows;
    }

    public function error()
    {
        return $this->lastError;
    }

    public function errno()
    {
        return $this->lastErrno;
    }

    public function result($query, $row)
    {
        if ($query instanceof LegacyResult) {
            return $query->getRowValue($row);
        }

        return false;
    }

    public function num_rows($query)
    {
        if ($query instanceof LegacyResult) {
            return $query->numRows();
        }

        return 0;
    }

    public function num_fields($query)
    {
        if ($query instanceof LegacyResult) {
            return $query->numFields();
        }

        return 0;
    }

    public function free_result($query)
    {
        if ($query instanceof LegacyResult) {
            $query->freeResult();

            return true;
        }

        return false;
    }

    public function insert_id()
    {
        return (int) DB::getPdo()->lastInsertId();
    }

    public function fetchRow($query)
    {
        if ($query instanceof LegacyResult) {
            return $query->fetchAssoc();
        }

        return false;
    }

    public function fetch_fields($query)
    {
        if ($query instanceof LegacyResult) {
            return $query->fetchFields();
        }

        return false;
    }

    public function version()
    {
        if (! $this->version) {
            $this->version = DB::connection()->getPdo()->getAttribute(\PDO::ATTR_SERVER_VERSION);
        }

        return $this->version;
    }

    public function ping()
    {
        return true;
    }

    public static function escape_string($unescaped_string, $db)
    {
        $quoted = DB::connection()->getPdo()->quote((string) $unescaped_string);

        return substr($quoted, 1, -1);
    }

    public function close()
    {
        return true;
    }

    public function ErrorMsg($message = '', $sql = '')
    {
        if ($message) {
            echo "<b>ECSHOP info</b>: $message\n\n<br /><br />";
        } else {
            echo '<b>MySQL server error report:';
            print_r($this->error_message);
        }

        exit;
    }

    public function selectLimit($sql, $num, $start = 0)
    {
        if ($start == 0) {
            $sql .= ' LIMIT '.$num;
        } else {
            $sql .= ' LIMIT '.$start.', '.$num;
        }

        return $this->query($sql);
    }

    public function getOne($sql, $limited = false)
    {
        if ($limited == true) {
            $sql = trim($sql.' LIMIT 1');
        }

        try {
            $value = DB::scalar($sql);

            return $value ?? '';
        } catch (\Exception $e) {
            $this->lastError = $e->getMessage();
            $this->lastErrno = (int) $e->getCode();

            return false;
        }
    }

    public function getOneCached($sql, $cached = 'FILEFIRST')
    {
        $sql = trim($sql.' LIMIT 1');

        $cachefirst = ($cached == 'FILEFIRST' || ($cached == 'MYSQLFIRST' && $this->platform != 'WINDOWS')) && $this->max_cache_time;
        if (! $cachefirst) {
            return $this->getOne($sql, true);
        } else {
            $result = $this->getSqlCacheData($sql, $cached);
            if (empty($result['storecache']) == true) {
                return $result['data'];
            }
        }

        $arr = $this->getOne($sql, true);

        if ($arr !== false && $cachefirst) {
            $this->setSqlCacheData($result, $arr);
        }

        return $arr;
    }

    public function getAll($sql)
    {
        try {
            $rows = DB::select($sql);

            return array_map(fn ($row) => (array) $row, $rows);
        } catch (\Exception $e) {
            $this->lastError = $e->getMessage();
            $this->lastErrno = (int) $e->getCode();

            return false;
        }
    }

    public function getAllCached($sql, $cached = 'FILEFIRST')
    {
        $cachefirst = ($cached == 'FILEFIRST' || ($cached == 'MYSQLFIRST' && $this->platform != 'WINDOWS')) && $this->max_cache_time;
        if (! $cachefirst) {
            return $this->getAll($sql);
        } else {
            $result = $this->getSqlCacheData($sql, $cached);
            if (empty($result['storecache']) == true) {
                return $result['data'];
            }
        }

        $arr = $this->getAll($sql);

        if ($arr !== false && $cachefirst) {
            $this->setSqlCacheData($result, $arr);
        }

        return $arr;
    }

    public function getRow($sql, $limited = false)
    {
        if ($limited == true) {
            $sql = trim($sql.' LIMIT 1');
        }

        try {
            $row = DB::selectOne($sql);

            return $row ? (array) $row : false;
        } catch (\Exception $e) {
            $this->lastError = $e->getMessage();
            $this->lastErrno = (int) $e->getCode();

            return false;
        }
    }

    public function getRowCached($sql, $cached = 'FILEFIRST')
    {
        $sql = trim($sql.' LIMIT 1');

        $cachefirst = ($cached == 'FILEFIRST' || ($cached == 'MYSQLFIRST' && $this->platform != 'WINDOWS')) && $this->max_cache_time;
        if (! $cachefirst) {
            return $this->getRow($sql, true);
        } else {
            $result = $this->getSqlCacheData($sql, $cached);
            if (empty($result['storecache']) == true) {
                return $result['data'];
            }
        }

        $arr = $this->getRow($sql, true);

        if ($arr !== false && $cachefirst) {
            $this->setSqlCacheData($result, $arr);
        }

        return $arr;
    }

    public function getCol($sql)
    {
        try {
            $rows = DB::select($sql);
            $arr = [];
            foreach ($rows as $row) {
                $values = array_values((array) $row);
                $arr[] = $values[0] ?? null;
            }

            return $arr;
        } catch (\Exception $e) {
            $this->lastError = $e->getMessage();
            $this->lastErrno = (int) $e->getCode();

            return false;
        }
    }

    public function getColCached($sql, $cached = 'FILEFIRST')
    {
        $cachefirst = ($cached == 'FILEFIRST' || ($cached == 'MYSQLFIRST' && $this->platform != 'WINDOWS')) && $this->max_cache_time;
        if (! $cachefirst) {
            return $this->getCol($sql);
        } else {
            $result = $this->getSqlCacheData($sql, $cached);
            if (empty($result['storecache']) == true) {
                return $result['data'];
            }
        }

        $arr = $this->getCol($sql);

        if ($arr !== false && $cachefirst) {
            $this->setSqlCacheData($result, $arr);
        }

        return $arr;
    }

    public function autoExecute($table, $field_values, $mode = 'INSERT', $where = '', $querymode = '')
    {
        $field_names = $this->getCol('DESC '.$table);

        $sql = '';
        if ($mode == 'INSERT') {
            $fields = $values = [];
            foreach ($field_names as $value) {
                if (array_key_exists($value, $field_values) == true) {
                    $fields[] = $value;
                    $values[] = "'".$field_values[$value]."'";
                }
            }

            if (! empty($fields)) {
                $sql = 'INSERT INTO '.$table.' ('.implode(', ', $fields).') VALUES ('.implode(', ', $values).')';
            }
        } else {
            $sets = [];
            foreach ($field_names as $value) {
                if (array_key_exists($value, $field_values) == true) {
                    $sets[] = $value." = '".$field_values[$value]."'";
                }
            }

            if (! empty($sets)) {
                $sql = 'UPDATE '.$table.' SET '.implode(', ', $sets).' WHERE '.$where;
            }
        }

        if ($sql) {
            return $this->query($sql, $querymode);
        } else {
            return false;
        }
    }

    public function autoReplace($table, $field_values, $update_values, $where = '', $querymode = '')
    {
        $field_descs = $this->getAll('DESC '.$table);

        $primary_keys = [];
        foreach ($field_descs as $value) {
            $field_names[] = $value['Field'];
            if ($value['Key'] == 'PRI') {
                $primary_keys[] = $value['Field'];
            }
        }

        $fields = $values = [];
        foreach ($field_names as $value) {
            if (array_key_exists($value, $field_values) == true) {
                $fields[] = $value;
                $values[] = "'".$field_values[$value]."'";
            }
        }

        $sets = [];
        foreach ($update_values as $key => $value) {
            if (array_key_exists($key, $field_values) == true) {
                if (is_int($value) || is_float($value)) {
                    $sets[] = $key.' = '.$key.' + '.$value;
                } else {
                    $sets[] = $key." = '".$value."'";
                }
            }
        }

        $sql = '';
        if (empty($primary_keys)) {
            if (! empty($fields)) {
                $sql = 'INSERT INTO '.$table.' ('.implode(', ', $fields).') VALUES ('.implode(', ', $values).')';
            }
        } else {
            if (! empty($fields)) {
                $sql = 'INSERT INTO '.$table.' ('.implode(', ', $fields).') VALUES ('.implode(', ', $values).')';
                if (! empty($sets)) {
                    $sql .= 'ON DUPLICATE KEY UPDATE '.implode(', ', $sets);
                }
            }
        }

        if ($sql) {
            return $this->query($sql, $querymode);
        } else {
            return false;
        }
    }

    public function setMaxCacheTime($second)
    {
        $this->max_cache_time = $second;
    }

    public function getMaxCacheTime()
    {
        return $this->max_cache_time;
    }

    public function getSqlCacheData($sql, $cached = '')
    {
        $sql = trim($sql);

        $result = [];
        $result['filename'] = $this->root_path.$this->cache_data_dir.'sqlcache_'.abs(crc32($this->dbhash.$sql)).'_'.md5($this->dbhash.$sql).'.php';

        $data = file_get_contents($result['filename']);
        if (isset($data[23])) {
            $filetime = substr($data, 13, 10);
            $data = substr($data, 23);

            if (($cached == 'FILEFIRST' && time() > $filetime + $this->max_cache_time) || ($cached == 'MYSQLFIRST' && $this->table_lastupdate($this->get_table_name($sql)) > $filetime)) {
                $result['storecache'] = true;
            } else {
                $result['data'] = unserialize($data);
                if ($result['data'] === false) {
                    $result['storecache'] = true;
                } else {
                    $result['storecache'] = false;
                }
            }
        } else {
            $result['storecache'] = true;
        }

        return $result;
    }

    public function setSqlCacheData($result, $data)
    {
        if ($result['storecache'] === true && $result['filename']) {
            file_put_contents($result['filename'], '<?php exit;?>'.time().serialize($data));
            clearstatcache();
        }
    }

    /* 获取 SQL 语句中最后更新的表的时间，有多个表的情况下，返回最新的表的时间 */
    public function table_lastupdate($tables)
    {
        $lastupdatetime = '0000-00-00 00:00:00';

        $tables = str_replace('`', '', $tables);
        $this->mysql_disable_cache_tables = str_replace('`', '', $this->mysql_disable_cache_tables);

        foreach ($tables as $table) {
            if (in_array($table, $this->mysql_disable_cache_tables) == true) {
                $lastupdatetime = '2037-12-31 23:59:59';

                break;
            }

            if (strstr($table, '.') != null) {
                $tmp = explode('.', $table);
                $sql = 'SHOW TABLE STATUS FROM `'.trim($tmp[0])."` LIKE '".trim($tmp[1])."'";
            } else {
                $sql = "SHOW TABLE STATUS LIKE '".trim($table)."'";
            }

            try {
                $row = DB::selectOne($sql);
                if ($row && $row->Update_time > $lastupdatetime) {
                    $lastupdatetime = $row->Update_time;
                }
            } catch (\Exception $e) {
                // 忽略错误，保持旧逻辑行为
            }
        }
        $lastupdatetime = strtotime($lastupdatetime) - $this->timezone + $this->timeline;

        return $lastupdatetime;
    }

    public function get_table_name($query_item)
    {
        $query_item = trim($query_item);
        $table_names = [];

        /* 判断语句中是不是含有 JOIN */
        if (stristr($query_item, ' JOIN ') == '') {
            /* 解析一般的 SELECT FROM 语句 */
            if (preg_match('/^SELECT.*?FROM\s*((?:`?\w+`?\s*\.\s*)?`?\w+`?(?:(?:\s*AS)?\s*`?\w+`?)?(?:\s*,\s*(?:`?\w+`?\s*\.\s*)?`?\w+`?(?:(?:\s*AS)?\s*`?\w+`?)?)*)/is', $query_item, $table_names)) {
                $table_names = preg_replace('/((?:`?\w+`?\s*\.\s*)?`?\w+`?)[^,]*/', '\1', $table_names[1]);

                return preg_split('/\s*,\s*/', $table_names);
            }
        } else {
            /* 对含有 JOIN 的语句进行解析 */
            if (preg_match('/^SELECT.*?FROM\s*((?:`?\w+`?\s*\.\s*)?`?\w+`?)(?:(?:\s*AS)?\s*`?\w+`?)?.*?JOIN.*$/is', $query_item, $table_names)) {
                $other_table_names = [];
                preg_match_all('/JOIN\s*((?:`?\w+`?\s*\.\s*)?`?\w+`?)\s*/i', $query_item, $other_table_names);

                return array_merge([$table_names[1]], $other_table_names[1]);
            }
        }

        return $table_names;
    }

    /* 设置不允许进行缓存的表 */
    public function set_disable_cache_tables($tables)
    {
        if (! is_array($tables)) {
            $tables = explode(',', $tables);
        }

        foreach ($tables as $table) {
            $this->mysql_disable_cache_tables[] = $table;
        }

        array_unique($this->mysql_disable_cache_tables);
    }
}
