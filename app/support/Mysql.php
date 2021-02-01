<?php

namespace app\support;

use think\facade\Cache;

class Mysql
{
    public $link_id = null;

    public $settings = array();

    public $queryCount = 0;
    public $queryTime = '';
    public $queryLog = array();

    public $root_path = '';

    public $error_message = array();
    public $platform = '';
    public $version = '';
    public $dbhash = '';
    public $timezone = 0;

    public function __construct($dbhost, $dbuser, $dbpw, $dbname = '', $charset = 'utf8', $pconnect = 0, $quiet = 0)
    {
        if (defined('EC_CHARSET')) {
            $charset = strtolower(str_replace('-', '', EC_CHARSET));
        }

        if (defined('ROOT_PATH') && !$this->root_path) {
            $this->root_path = ROOT_PATH;
        }

        if ($quiet) {
            $this->connect($dbhost, $dbuser, $dbpw, $dbname, $charset, $pconnect, $quiet);
        } else {
            $this->settings = array(
                'dbhost' => $dbhost,
                'dbuser' => $dbuser,
                'dbpw' => $dbpw,
                'dbname' => $dbname,
                'charset' => $charset,
                'pconnect' => $pconnect
            );
        }
    }

    public function connect($dbhost, $dbuser, $dbpw, $dbname = '', $charset = 'utf8', $pconnect = 0, $quiet = 0)
    {
        if ($pconnect) {
            if (!($this->link_id = mysqli_pconnect($dbhost, $dbuser, $dbpw))) {
                if (!$quiet) {
                    $this->ErrorMsg("Can't pConnect MySQL Server($dbhost)!");
                }

                return false;
            }
        } else {
            list($dbhost, $dbport) = array_pad(explode(":", $dbhost), 2, '3306');
            $this->link_id = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname, $dbport);
            if (!$this->link_id) {
                if (!$quiet) {
                    $this->ErrorMsg("Can't Connect MySQL Server($dbhost)!");
                }

                return false;
            }
        }

        $this->dbhash = md5($this->root_path . $dbhost . $dbuser . $dbpw . $dbname);
        $this->version = mysqli_get_server_info($this->link_id);

        mysqli_query($this->link_id, "SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary");
        mysqli_query($this->link_id, "SET sql_mode=''");

        /* 选择数据库 */
        if ($dbname) {
            if (mysqli_select_db($this->link_id, $dbname) === false) {
                if (!$quiet) {
                    $this->ErrorMsg("Can't select MySQL database($dbname)!");
                }

                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    public function select_database($dbname)
    {
        return mysqli_select_db($this->link_id, $dbname);
    }

    public function set_mysql_charset($charset)
    {
        if (in_array(strtolower($charset), array('gbk', 'big5', 'utf-8', 'utf8'))) {
            $charset = str_replace('-', '', $charset);
        }
        mysqli_query($this->link_id, "SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary");
    }

    public function fetch_array($query, $result_type = MYSQLI_ASSOC)
    {
        return mysqli_fetch_array($query, $result_type);
    }

    public function query($sql, $type = '')
    {
        if ($this->link_id === null) {
            $this->connect($this->settings['dbhost'], $this->settings['dbuser'], $this->settings['dbpw'], $this->settings['dbname'], $this->settings['charset'], $this->settings['pconnect']);
            $this->settings = array();
        }

        if ($this->queryCount++ <= 99) {
            $this->queryLog[] = $sql;
        }
        if ($this->queryTime == '') {
            $this->queryTime = microtime(true);
        }

        if (!($query = mysqli_query($this->link_id, $sql)) && $type != 'SILENT') {
            $this->error_message[]['message'] = 'MySQL Query Error';
            $this->error_message[]['sql'] = $sql;
            $this->error_message[]['error'] = mysqli_error($this->link_id);
            $this->error_message[]['errno'] = mysqli_errno($this->link_id);

            $this->ErrorMsg();

            return false;
        }

        return $query;
    }

    public function affected_rows()
    {
        return mysqli_affected_rows($this->link_id);
    }

    public function error()
    {
        return mysqli_error($this->link_id);
    }

    public function errno()
    {
        return mysqli_errno($this->link_id);
    }

    public function insert_id()
    {
        return mysqli_insert_id($this->link_id);
    }

    public function fetchRow($query)
    {
        return mysqli_fetch_assoc($query);
    }

    public function version()
    {
        return $this->version;
    }

    public function ping()
    {
        return mysqli_ping($this->link_id);
    }

    public static function escape_string($unescaped_string, $db)
    {
        return mysqli_real_escape_string($db->link_id, $unescaped_string);
    }

    public function ErrorMsg($message = '', $sql = '')
    {
        if ($message) {
            echo "<b>Error info</b>: $message\n\n<br /><br />";
        } else {
            echo "<b>MySQL server error report:";
            print_r($this->error_message);
        }

        exit;
    }

    public function selectLimit($sql, $num, $start = 0)
    {
        if ($start == 0) {
            $sql .= ' LIMIT ' . $num;
        } else {
            $sql .= ' LIMIT ' . $start . ', ' . $num;
        }

        return $this->query($sql);
    }

    public function getOne($sql, $limited = false)
    {
        if ($limited == true) {
            $sql = trim($sql . ' LIMIT 1');
        }

        $res = $this->query($sql);
        if ($res !== false) {
            $row = mysqli_fetch_row($res);

            if ($row !== false) {
                return $row[0];
            } else {
                return '';
            }
        } else {
            return false;
        }
    }

    public function getOneCached($sql)
    {
        $sql = trim($sql . ' LIMIT 1');

        return Cache::remember(md5($sql), function () use ($sql) {
            return $this->getOne($sql, true);
        });
    }

    public function getAll($sql)
    {
        $res = $this->query($sql);
        if ($res !== false) {
            $arr = array();
            while ($row = mysqli_fetch_assoc($res)) {
                $arr[] = $row;
            }

            return $arr;
        } else {
            return false;
        }
    }

    public function getAllCached($sql)
    {
        return Cache::remember(md5($sql), function () use ($sql) {
            return $this->getAll($sql);
        });
    }

    public function getRow($sql, $limited = false)
    {
        if ($limited == true) {
            $sql = trim($sql . ' LIMIT 1');
        }

        $res = $this->query($sql);
        if ($res !== false) {
            return mysqli_fetch_assoc($res);
        } else {
            return false;
        }
    }

    public function getRowCached($sql)
    {
        $sql = trim($sql . ' LIMIT 1');

        return Cache::remember(md5($sql), function () use ($sql) {
            return $this->getRow($sql, true);
            ;
        });
    }

    public function getCol($sql)
    {
        $res = $this->query($sql);
        if ($res !== false) {
            $arr = array();
            while ($row = mysqli_fetch_row($res)) {
                $arr[] = $row[0];
            }

            return $arr;
        } else {
            return false;
        }
    }

    public function getColCached($sql)
    {
        return Cache::remember(md5($sql), function () use ($sql) {
            return $this->getCol($sql);
        });
    }

    public function autoExecute($table, $field_values, $mode = 'INSERT', $where = '', $querymode = '')
    {
        $field_names = $this->getCol('DESC ' . $table);

        $sql = '';
        if ($mode == 'INSERT') {
            $fields = $values = array();
            foreach ($field_names as $value) {
                if (array_key_exists($value, $field_values) == true) {
                    $fields[] = $value;
                    $values[] = "'" . $field_values[$value] . "'";
                }
            }

            if (!empty($fields)) {
                $sql = 'INSERT INTO ' . $table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
            }
        } else {
            $sets = array();
            foreach ($field_names as $value) {
                if (array_key_exists($value, $field_values) == true) {
                    $sets[] = $value . " = '" . $field_values[$value] . "'";
                }
            }

            if (!empty($sets)) {
                $sql = 'UPDATE ' . $table . ' SET ' . implode(', ', $sets) . ' WHERE ' . $where;
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
        $field_descs = $this->getAll('DESC ' . $table);

        $primary_keys = array();
        foreach ($field_descs as $value) {
            $field_names[] = $value['Field'];
            if ($value['Key'] == 'PRI') {
                $primary_keys[] = $value['Field'];
            }
        }

        $fields = $values = array();
        foreach ($field_names as $value) {
            if (array_key_exists($value, $field_values) == true) {
                $fields[] = $value;
                $values[] = "'" . $field_values[$value] . "'";
            }
        }

        $sets = array();
        foreach ($update_values as $key => $value) {
            if (array_key_exists($key, $field_values) == true) {
                if (is_int($value) || is_float($value)) {
                    $sets[] = $key . ' = ' . $key . ' + ' . $value;
                } else {
                    $sets[] = $key . " = '" . $value . "'";
                }
            }
        }

        $sql = '';
        if (empty($primary_keys)) {
            if (!empty($fields)) {
                $sql = 'INSERT INTO ' . $table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
            }
        } else {
            if ($this->version() >= '4.1') {
                if (!empty($fields)) {
                    $sql = 'INSERT INTO ' . $table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
                    if (!empty($sets)) {
                        $sql .= 'ON DUPLICATE KEY UPDATE ' . implode(', ', $sets);
                    }
                }
            } else {
                if (empty($where)) {
                    $where = array();
                    foreach ($primary_keys as $value) {
                        if (is_numeric($value)) {
                            $where[] = $value . ' = ' . $field_values[$value];
                        } else {
                            $where[] = $value . " = '" . $field_values[$value] . "'";
                        }
                    }
                    $where = implode(' AND ', $where);
                }

                if ($where && (!empty($sets) || !empty($fields))) {
                    if (intval($this->getOne("SELECT COUNT(*) FROM $table WHERE $where")) > 0) {
                        if (!empty($sets)) {
                            $sql = 'UPDATE ' . $table . ' SET ' . implode(', ', $sets) . ' WHERE ' . $where;
                        }
                    } else {
                        if (!empty($fields)) {
                            $sql = 'REPLACE INTO ' . $table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
                        }
                    }
                }
            }
        }

        if ($sql) {
            return $this->query($sql, $querymode);
        } else {
            return false;
        }
    }

    public function get_table_name($query_item)
    {
        $query_item = trim($query_item);
        $table_names = array();

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
                $other_table_names = array();
                preg_match_all('/JOIN\s*((?:`?\w+`?\s*\.\s*)?`?\w+`?)\s*/i', $query_item, $other_table_names);

                return array_merge(array($table_names[1]), $other_table_names[1]);
            }
        }

        return $table_names;
    }
}
