<?php 
/**
* 
*/
class Comment
{
	$_connexion;

	function __construct()
	{
		$this->_connexion = new Connexion();
	}

	private function getAll()
	{
		return $this->_connexion->query(ALL_COMMENTS, array());
	}

	private function getComments($idUser)
	{
		return $this->_connexion->query(ALL_COMMENTS_USER, array(":idUser"=>$idUser));
	}

	public function showComments($idUser)
	{
		$comments = $this->getComments($idUser);
		foreach ($comments as $key => $comment) {
			$user = new User();
			$user = $this->getUser_forId($comment['idUser_creator']);
			?>
			<div>
				<h2><? echo $user;?></h2>
				<p><?php echo $comment['comment'];?></p>
			</div>
			<?php
		}
	}
}