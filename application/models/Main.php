<?php

namespace application\models;

use application\core\Model;

class Main extends Model 
{
	public function getNews() 
	{
		$result = $this->db->column('SELECT password FROM users WHERE id = :id', ['id' => 1]);
		return $result;
	}
}