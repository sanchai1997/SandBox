<?php 

class SubjectKPI_model  extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

     ###################### subject_group ################################
    public function insert_subject_group($CLS_SUBJECT_GROUP) {    
       
        $result = $this->db->insert('CLS_SUBJECT_GROUP', $CLS_SUBJECT_GROUP);
        return $result;

    }

    public function get_subject_group_All() {
        $this->db->select('*')
        ->from('CLS_SUBJECT_GROUP ')
        ->where('DeleteStatus', 0)
        ;
       
        $query = $this->db->get();

       // $query = $this->db->get('curriculum');
        return $query->result();
    }

    public function get_subject_group( $SUBJECT_GROUP_CODE) {
        $this->db->select('*')
        ->from('CLS_SUBJECT_GROUP ')
        ->where('SUBJECT_GROUP_CODE', $SUBJECT_GROUP_CODE )
        ->where('DeleteStatus', 0)
        ;
        $query = $this->db->get();
    
        return $query->result();
    }

    public function update_subject_group($SUBJECT_GROUP_CODE, $CLS_SUBJECT_GROUP ) {
        $this->db->where('SUBJECT_GROUP_CODE', $SUBJECT_GROUP_CODE);
        $result = $this->db->update('CLS_SUBJECT_GROUP', $CLS_SUBJECT_GROUP);
        return $result;
    
    }

    public function delete_subject_group($SUBJECT_GROUP_CODE){        
        $data = [
            'SUBJECT_GROUP_CODE' => rand(1,999).Date('Ym') ,
            'DeleteStatus' => 1
        ];
        $this->db->where('SUBJECT_GROUP_CODE', $SUBJECT_GROUP_CODE);
            
        $result = $this->db->update('CLS_SUBJECT_GROUP', $data);
        return $result;
    }    

    
     ###################### lc ################################
     public function insert_lc($SUBJECT_STD) {    
       
        $result = $this->db->insert('SUBJECT_STD', $SUBJECT_STD);
        return $result;

    }

    public function get_lc_All($SUBJECT_GROUP_CODE) {
        $this->db->select('*')
        ->from('SUBJECT_STD ')
        ->where('SUBJECT_GROUP_CODE', $SUBJECT_GROUP_CODE)
        ->where('DeleteStatus', 0)
        ->group_by('LC_ID' )
        ;
       
        $query = $this->db->get();
        return $query->result();
    }

    public function get_STD($SUBJECT_STD_ID){
		$this->db->select('*')
		->from('SUBJECT_STD')
		->where('DeleteStatus ', 0  )
        ->where('SUBJECT_STD_ID ', $SUBJECT_STD_ID )
        ;
		$query = $this->db->get();
		return $query->result();
	}


    public function get_STD_by_lc($LC_ID, $SUBJECT_GROUP_CODE){
		$this->db->select('*')
		->from('SUBJECT_STD')
		->where('DeleteStatus ', 0  )
        ->where('SUBJECT_GROUP_CODE', $SUBJECT_GROUP_CODE)
        ->where('LC_ID ', $LC_ID  )
        ;
		$query = $this->db->get();
		return $query->result();
	}

    public function update_lc($SUBJECT_GROUP_CODE, $LC_ID, $lc ) {
        $this->db->where('LC_ID', $LC_ID)
                ->where('SUBJECT_GROUP_CODE', $SUBJECT_GROUP_CODE)
        ;
        $result = $this->db->update('SUBJECT_STD', $lc);
        return $result;
    
    }

    public function update_std($SUBJECT_STD_ID, $std ) {
        $this->db->where('SUBJECT_STD_ID', $SUBJECT_STD_ID)
        ;
        $result = $this->db->update('SUBJECT_STD', $std);
        return $result;
    
    }


    public function delete_lc($SUBJECT_STD_ID){    
        $data = [
            'SUBJECT_STD_ID' => rand(1,999).Date('YmdHis') ,
            'DeleteStatus' => 1
        ];
        $this->db->where('SUBJECT_STD_ID', $SUBJECT_STD_ID)   ;

        $result = $this->db->update('SUBJECT_STD', $data);
        
        return $result;
    }   
    
 ###################### kpi ################################
     public function insert_kpi($SUBJECT_KPI) {    
       
        $result = $this->db->insert('SUBJECT_KPI', $SUBJECT_KPI);
        //show_error($this->db->last_query());
        return $result;

    }

    public function get_kpi( $SUBJECT_KPI_ID) {
        $this->db->select('*')
        ->from('SUBJECT_KPI')
        ->where('SUBJECT_KPI_ID', $SUBJECT_KPI_ID )
        ->where('DeleteStatus', 0)
        ;
        $query = $this->db->get();
    
        return $query->result();
    }

    public function get_kpi_All($SUBJECT_GROUP_CODE , $SUBJECT_KPI_YEAR) {
        $this->db->select('*')
        ->from('SUBJECT_KPI k')
        ->join('SUBJECT_STD s', 's.SUBJECT_STD_ID    = k.SUBJECT_STD_ID   ', 'LEFT') 
        ->join('CLS_GRADE_LEVEL g', 'g.GRADE_LEVEL_CODE    = k.SUBJECT_KPI_YEAR   ', 'LEFT') 
        ->join('CLS_SUBJECT_GROUP group', 'group.SUBJECT_GROUP_CODE    = s.SUBJECT_GROUP_CODE   ', 'LEFT') 
        ->where('s.SUBJECT_GROUP_CODE', $SUBJECT_GROUP_CODE)
        ->where('k.SUBJECT_KPI_YEAR', $SUBJECT_KPI_YEAR)
        ->where('s.DeleteStatus', 0)
        ->where('k.DeleteStatus', 0)
        //->group_by('s.	LC_ID' )

        ;
        
        $query = $this->db->get();

        //show_error($this->db->last_query());

        return $query->result();

    }

    public function get_kpi_All_By_LC($SUBJECT_GROUP_CODE , $SUBJECT_KPI_YEAR, $LC_ID) {
        $this->db->select('*')
        ->from('SUBJECT_KPI k')
        ->join('SUBJECT_STD s', 's.SUBJECT_STD_ID    = k.SUBJECT_STD_ID   ', 'LEFT') 
        ->join('CLS_GRADE_LEVEL g', 'g.GRADE_LEVEL_CODE    = k.SUBJECT_KPI_YEAR   ', 'LEFT') 
        ->join('CLS_SUBJECT_GROUP group', 'group.SUBJECT_GROUP_CODE    = s.SUBJECT_GROUP_CODE   ', 'LEFT') 
        ->where('s.SUBJECT_GROUP_CODE', $SUBJECT_GROUP_CODE)
        ->where('k.SUBJECT_KPI_YEAR', $SUBJECT_KPI_YEAR)
        ->where('s.LC_ID', $LC_ID)
        ->where('s.DeleteStatus', 0)
        ->where('k.DeleteStatus', 0)
        ;
        
        $query = $this->db->get();

        //show_error($this->db->last_query());

        return $query->result();

    }

    public function delete_kpi($SUBJECT_KPI_ID){    
        $data = [
            'SUBJECT_KPI_ID' => rand(1,999).Date('YmdHis') ,
            'DeleteStatus' => 1
        ];
        $this->db->where('SUBJECT_KPI_ID', $SUBJECT_KPI_ID)   ;

        $result = $this->db->update('SUBJECT_KPI', $data);
        return $result;
    }   

    public function update_kpi($SUBJECT_KPI_ID, $SUBJECT_KPI ) {
        $this->db->where('SUBJECT_KPI_ID', $SUBJECT_KPI_ID);
        $result = $this->db->update('SUBJECT_KPI', $SUBJECT_KPI);
        return $result;
    
    }
       

}

?>