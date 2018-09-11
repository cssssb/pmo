<?php
namespace budget;

defined('IN_LION') or exit('No permission resources.');

final class one_page_class
{
  public function __construct()
  {
    $this->model = \app::load_app_class('one_page', 'budget');

  }
  public function select($where = '1', $limit)
  {
    return $this->model->select($where, $limit);
  }
  public function get_one($where = 'id = 1', $limit)
  {
    return $this->model->get_one($where, $limit);
  }
  public function insert($data)
  {
    return $this->model->insert($data);
  }

}