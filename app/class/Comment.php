<?php 
/**
* 
*/
class Comment
{
	private $_connexion;

	public function __construct()
	{
		$this->_connexion = new Conexion();
	}

	public function add($creator, $target, $comment, $value)
	{
		$this->_connexion->query(
			"INSERT INTO comments(idUser_creator, idUser_target, content, value) values (:creator, :target, :comment, :value)",
			array(
				":creator"=>$creator,
				":target"=>$target,
				":comment"=>$comment,
				":value"=>$value
				)
			);
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