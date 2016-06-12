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

	public function getComments($idUser)
	{
		return $this->_connexion->query(
			"SELECT * FROM comments where idUser_target = :idUser", 
			array(":idUser"=>$idUser));
	}

	public function showComments($idUser)
	{
		$comments = $this->getComments($idUser);
		foreach ($comments as $key => $comment) {
			$user = new User();
			$user = $user->getAllUser_forId($comment['idUser_creator']);
			
			echo "<paper-listbox multi class='comment'>
                <paper-item><i>".$user[0]['name']."</i></paper-item>
                
                <paper-item>".$comment['content']."</paper-item>
            </paper-listbox>";
			
			
		}
	}

	public function showStars($idUser)
	{
		$comments = $this->getComments($idUser);
		$count = 0;
		$sum = 0;
		foreach ($comments as $key => $value) {
			$sum = $sum + $value['value'];
			$count = $count + 1;
		}
		if($count == 0){
			$media = 0;
		}else{
			$media = $sum / $count;
		}

		if($media>4){
			return '<iron-icon class="star" icon="star"></iron-icon>
                  <iron-icon class="star" icon="star"></iron-icon>
                 	<iron-icon class="star" icon="star"></iron-icon>
                 	<iron-icon class="star" icon="star"></iron-icon>
                 	<iron-icon class="star" icon="star"></iron-icon>';
            
		}
		if($media>3){
			return '<iron-icon class="star" icon="star"></iron-icon>
                  <iron-icon class="star" icon="star"></iron-icon>
                 	<iron-icon class="star" icon="star"></iron-icon>
                 	<iron-icon class="star" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>';
           
		}

		if($media>2){
			return '<iron-icon class="star" icon="star"></iron-icon>
                  <iron-icon class="star" icon="star"></iron-icon>
                 	<iron-icon class="star" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>
                 	<iron-icon class="star grey " icon="star"></iron-icon>';
            
		}

		if($media>1){
			return '<iron-icon class="star" icon="star"></iron-icon>
                  <iron-icon class="star" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>';
           
		}

		if($media == 0){
			return '<iron-icon class="star grey" icon="star"></iron-icon>
                  <iron-icon class="star grey" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>';
            
		}

		return '<iron-icon class="star" icon="star"></iron-icon>
                  <iron-icon class="star grey" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>
                 	<iron-icon class="star grey" icon="star"></iron-icon>';
            
	}
}