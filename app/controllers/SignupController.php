<?php
namespace Tutorial\Controllers;
use Phalcon\Mvc\Controller;
use Tutorial\Models\Users;

class SignupController extends Controller
{

	public function indexAction()
	{

	}

	public function registerAction()
	{

		$name = $this->request->getPost('name', 'string');
		$email = $this->request->getPost('email', 'email');
		//echo $name.'--'.$email;
		$user = new Users();
		$user->name = $name;
		$user->email = $email;
		$success = $user->save();
		// Store and check for errors
		/*$success = $user->save(
			$this->request->getPost(),
			array('name', 'email')
		);*/

		if ($success) {
			echo "Thanks for registering!";
		} else {
			echo "Sorry, the following problems were generated: ";
			foreach ($user->getMessages() as $message) {
				echo $message->getMessage(), "<br/>";
			}
		}

		$this->view->disable();
	}

}
