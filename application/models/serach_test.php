if(empty($matches[0])){
          echo('empty');  
        }
        var_dump($matches[0]);die;
        //Truthtable order C, R, P
        //1 1 0 = 1 0
        if((empty($matches[0])) && (isset($search_data['reference']) || $search_data['reference'] != "") && (isset($search_data['category']) || $search_data['category'] != "")){
            $condition = "reference_id =" . "'" . $search_data['reference'] . "' AND " . "category_id =" . "'" . $search_data['category'] . "'";
        }
        //1 0 1 = 0 1
        elseif((!isset($search_data['reference']) || $search_data['reference'] == "") && (isset($search_data['category']) || $search_data['category'] != NULL) && (!empty($matches[0]))){
            $condition ="category_id =" . "'" . $search_data['category'] . "' AND size BETWEEN " . $matches[0][0] . " AND " . $matches[0][1] . "";
        }
        //0 1 1 = 0 1
        elseif((!isset($search_data['category']) || $search_data['category'] == NULL) && (isset($search_data['reference']) || $search_data['reference'] != NULL) && (!empty($matches[0]))){
            $condition ="reference_id =" . "'" . $search_data['reference'] . "' AND size BETWEEN " . $matches[0][0] . " AND " . $matches[0][1] . "";
        }
        //0 0 1 = 0 1
        elseif((!isset($search_data['category']) || $search_data['category'] == "") && (!isset($search_data['reference']) || $search_data['reference'] == "") && (!empty($matches[0])))
        {
            $condition = "size BETWEEN " . $matches[0][0] . " AND " . $matches[0][1] . "";
        }
        //1 0 0 = 0 0
        elseif((isset($search_data['category']) || $search_data['category'] != "") && (!isset($search_data['reference']) || $search_data['reference'] == "") && (empty($matches[0]))){
            $condition = "category_id =" . "'" . $search_data['category'] . "'";
        }
        //0 1 0 = 0 0
        elseif((!isset($search_data['category']) || $search_data['category'] == "") && (isset($search_data['reference']) || $search_data['reference'] != "") && (empty($matches[0]))){
            $condition = "reference_id  =" . "'" . $search_data['reference'] . "'";
        }
        //1 1 1 = 1 1
        elseif((isset($search_data['category']) && $search_data['category'] != "") && (isset($search_data['reference']) || $search_data['reference'] != "") && (!empty($matches[0]))){
            $condition = "reference_id =" . "'" . $search_data['reference'] . "' AND " . "category_id =" . "'" . $search_data['category'] . "' AND size BETWEEN " . $matches[0][0] . " AND " . $matches[0][1] . "";
        }
        //0 0 0 = 0 0
        elseif((!isset($search_data['category']) && $search_data['category'] == "") && (!isset($search_data['reference']) || $search_data['reference'] == "") && (empty($matches[0]))){
            $condition = "";
        }else{
            die("invalid search input");
        }
        
        $this->db->select('project.*');    
        $this->db->from('project');
        if(!isset($condition)){
            $query = $this->db->get();
        }else{
            $this->db->where($condition);
            // print_r($condition);
            $query = $this->db->get();
        }
        print_r($condition); die;
        return $query->result();