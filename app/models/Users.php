<?php
namespace Tutorial\Models;
use Phalcon\Mvc\Model;

class Users extends Model
{
	public function initialize(){
		$this->setConnectionService('tutorial');
	}

	public $id;

	public $name;

	public $email;


}
