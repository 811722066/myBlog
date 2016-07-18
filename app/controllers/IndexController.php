<?php
namespace Tutorial\Controllers;
use Phalcon\Mvc\Controller;
use Tutorial\Models\Users;

class IndexController extends Controller
{

	public function indexAction()
	{
		$cacheKey  = 'users_data';

		$user = Users::findFirst(1);
		echo $user->name;
		//$this->view->cache();




		//$rand = mt_rand(0,100);
		/*$rand = 1;
		$key  = 'index'.$rand;
		$this->view->cache(['key'=>$key]);*/
		/*echo $user->name;
		exit();*/
	}

}
