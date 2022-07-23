<?php

namespace Pagination;

class Pagination
{
    var $data;
    public function paginate($values, $per_page)
    {
        if (!empty($values)) {
            $total_values = count($values);
            $current_page =  isset($_GET['page']) ? $_GET['page'] : 1;
            $counts = ceil($total_values / $per_page);
            $param1 = ($current_page - 1) * $per_page;
            $this->data = array_slice($values, $param1, $per_page);
            for ($x = 1; $x <= $counts; $x++) {
                $numbers[] = $x;
            }
            return $numbers;
        }else{
            return false;
        }
    }

    public function fetchResult()
    {
        $resultValues = $this->data;
        return $resultValues;
    }
}
