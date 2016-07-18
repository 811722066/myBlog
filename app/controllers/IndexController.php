<?php
namespace Tutorial\Controllers;
use Phalcon\Mvc\Controller;
use Tutorial\Models\Users;

class IndexController extends Controller
{
	private static function printJSON($json){
		if(!isset($json) || empty($json)){
			$json = array();
		}
		if($_REQUEST['callback']){
			$callback = $_REQUEST['callback'];
			exit($callback.'('.json_encode($json).')');
		}
		exit(json_encode($json));
	}

	public function indexAction()
	{
		/*$cacheKey  = 'users_data';

		$user = Users::findFirst(1);
		echo $user->name;*/
		$json = 'hello world!';
		self::printJSON($json);
		//$this->view->cache();




		//$rand = mt_rand(0,100);
		/*$rand = 1;
		$key  = 'index'.$rand;
		$this->view->cache(['key'=>$key]);*/
		/*echo $user->name;
		exit();*/
	}

}
