<?php
namespace lecturer;
defined('IN_LION') or exit('No permission resources.');

// echo "load ding_member";
// echo  microtime();
// echo "\n";

\app::load_sys_class('model',false);

class lecturer extends \system\model {
	public function __construct() {
		// return 1;die;
// new model;

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'lecturer';
		parent::__construct();
	}
	public function of_list(){
		$sql = "
			SELECT
				*
			FROM
				pmo_lecturer as tr
				left join pmo_lecturer_coop as nm on tr.coop_id = nm.teacher_cooperation_model_id
			WHERE
				tr.state=0
				
		";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
	public function list_page_json($page_num='',$page_size='',$query=null){
		$offset = $page_size*($page_num-1);
		$query==null ? $where=1:$where = app::load_sys_class('request')->where_sql($query);
		$sql = "
			SELECT	
			*
			FROM
				pmo_lecturer
			WHERE 
				$where
		";
		if($page_size!=null){$sql.="    LIMIT $offset,$page_size";}
		$this->query($sql);
		$data = $this->fetch_array();
		return $data;
	}
	public function list_page_json_count($query=null){
		$query==null?$where=1:$where = app::load_sys_class('request')->where_sql($query);
		$sql  ="
				SELECT
				count(*)
				FROM
					pmo_lecturer
				WHERE
				$where
		";
		$this->query($sql);
		return $this->fetch_array()[0]['count(*)'];
	}
}
?>