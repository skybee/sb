<?php


class serp_parse_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getArticles($cnt = 10)
    {
        $sql = "SELECT `id`, `title`, `donor` "
            . "FROM `article` "
            . "WHERE "
            . "`cat_id` NOT IN (4,5,6,7,8,9,10,11) "
            . "AND "
            . "`serp_update` <= 0 "
            . "ORDER BY `id` DESC "
            . "LIMIT {$cnt} ";

        $query = $this->db->query($sql);

        if( $query->num_rows() < 1 ) {
            return false;
        }

        $result = array();
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }

        return $result;
    }

    function updateSerpData($id, $jsonStr)
    {
        $jsonStr = mysql_real_escape_string($jsonStr);

        $sql = "UPDATE `article` SET `serp_object` = '{$jsonStr}', `serp_update` = NOW() WHERE `id` = '{$id}' LIMIT 1 ";

        if( $this->db->query($sql) ){
            return true;
        }
        else{
            return false;
        }
    }
}
