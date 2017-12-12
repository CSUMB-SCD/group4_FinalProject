<?php 

// $this is a special self-referencing variable. You use $this to access properties and to call other methods of the current class.

class person 
	{	protected $userID;
		var $username;
		var $password;	 
		var $name;	 
		var $email;	 
		var $loginCount;	 
		private $admin;
		protected $joinDate;
		
		
		function __construct($userID, $userName, $password, $name, $email, $loginCount) {
			$this->userID = $userID;
			$this->username = $username;
			$this->password = $password;
			$this->name = $name;
			$this->email = $email;
			$this->joinDate = date(date("Y-m-d",time() );
			$this->loginCount = 1;
		}
				 
		public function getUserID() {
			return $this->userID;
		}
		protected function setUserID($newUserID) {
		 	$this->name = $newUserID;
		}
		
		public function getUsername() {
			return $this->username;
		}
		protected function setName($newUserame) {
		 	$this->name = $newUsername;
		}
		
		protected function getPassword() {
			return $this->password;
		}
		protected function setPassword($newPassword) {
		 	$this->name = $newPassword;
		}
		
		public function getName() {
			return $this->name;
		}
		protected function setName($newName) {
		 	$this->name = $newName;
		}
		
		public function getEmail() {
			return $this->email;
		}
		protected function setName($newEmail) {
		 	$this->name = $newEmail;
		}
		
		private function getAdmin() {
			return $this->admin;
		}
		private function setAdmin($newAdmin) {
		 	$this->name = $newAdmin;
		}
		
		public function getLoginCount() {
			return $this->loginCount;
		}

		public function getDate() {
			return $this->joinDate;
		}
			
	} 
 
	// 'extends' is the keyword that enables inheritance
class user extends person 
	{
		function __construct($userID, $userName, $password, $name, $email, $loginCount) {
			parent::__construct($userID,$userName, $password, $name, $email, $loginCount)
			parent:: this->setAdmin(0); 
		}
	}
	
class admin extends person 
	{
		function __construct($userID, $userName, $password, $name, $email, $loginCount) {
			parent::__construct($userID, $userName, $password, $name, $email, $loginCount)
			parent:: this->setAdmin(1); 
		}
	}
 
class movieperson 
	{
		protected $personID;
		var $name;
		protected $roleID;	 
		var $dateSearch;	 
		var $status;	 
		var $searchCount;	 
		
		//actor director
		function __construct($personID, $name, $roleID, $status, $loginCount) {
			$this->personID = $personID;
			$this->name = $name;
			$this->roleID = $roleID;
			$this->dateSearch = date("Y-m-d",time() );
			$this->status = $status;
			$this->loginCount = $loginCount;
		}
				
		public function getPersonID() {
			return $this->personID;
		}
		protected function setName($newName) {
		 	$this->personID = $newName;
		}
		
		public function getName() {
			return $this->username;
		}
		protected function setName($newName) {
		 	$this->name = $newName;
		}
		
		public function getRoleID() {
			return $this->roleID;
		}
		protected function setRoleID($getRoleID) {
		 	$this->name = $getRoleID;
		}
		
		public function getDateSearch() {
			return $this->dateSearch;
		}
		protected function getDateSearch($newDateSearch) {
		 	$this->dateSearch = $newDateSearch;
		}
		
		public function getStatus() {
			return $this->status;
		}
		protected function setStatus($status) {
		 	$this->name = $status;
		}
		
		public function getSearchCount() {
			return $this->searchCount;
		}
		protected function setSearchCount($searchCount) {
		 	$this->name = $searchCount;
		}
	}
	
class moviesearch 
	{
		protected $movieID;
		var $movieTitle;	 
		var $dateSearch;	 	 
		var $searchCount;	 
		
		//movie search
		function __construct($movieID,$movieTitle, $roleID, $status, $loginCount) {
			$this->movieID = $movieID;
			$this->movieTitle = $movieTitle;
			$this->roleID = $roleID;
			$this->dateSearch = date("Y-m-d",time() );
			$this->status = $status;
			$this->loginCount = $loginCount;
		}
		
		public function getMovieID() {
			return $this->movieID;
		}
		protected function setMovieTitle($newMovieID) {
		 	$this->movieID = $newMovieID;
		}
		
		public function getMovieTitle() {
			return $this->movieTitle;
		}
		protected function setMovieTitle($newMovieTitle) {
		 	$this->movieTitle = $newMovieTitle;
		}
		
		public function getRoleID() {
			return $this->roleID;
		}
		protected function setRoleID($newRoleID) {
		 	$this->name = $newRoleID;
		}
		
		public function getDateSearch() {
			return $this->dateSearch;
		}
		protected function setDateSearch($newDateSearch) {
		 	$this->dateSearch = $newDateSearch;
		}
	}
	
class myPrediction //build a hybrid builder pattern with actorOneID, actorTwoID, directorID, movieID
	{
		protected $myPredID;
		protected $userID;	 
		var $rank;	 
		var $actorOneID;	 
		var $actorTwoID;	 
		var $directorID;
		var $movieID;
		var $numLikes;
		var $predResult;
		
		function __construct($myPredID, $userID, $rank, $actorOneID, $actorTwoID, $directorID, $movieID, $numLikes, $predResult) {
			$this->myPredID = $myPredID;
			$this->userID = $userID;
			$this->rank = $rank;
			$this->actorOneID = $actorOneID;
			$this->actorTwoID = $actorTwoID;
			$this->directorID = $directorID;
			$this->movieID = $movieID;
			$this->numLikes = $numLikes;
			$this->predResult = $predResult;
		}
		
		public function getMyPredID() {
			return $this->myPredID;
		}
		protected function setMyPredID($newMyPredID) {
		 	$this->myPredID = $newMyPredID;
		}
		
		public function getUserID() {
			return $this->userID;
		}
		protected function getUserID($newUserID) {
		 	$this->userID = $newUserID;
		}
		
		public function getRank() {
			return $this->rank;
		}
		protected function setRank($newRank) {
		 	$this->rank = $newRank;
		}
		
		public function getActorOneID() {
			return $this->actorOneID;
		}
		protected function setActorOneID()($newActorOneID) {
		 	$this->actorOneID = $newActorOneID;
		}
		
		public function getActorTwoID() {
			return $this->actorTwoID;
		}
		protected function setActorTwoID()($newActorTwoID) {
		 	$this->actorTwoID = $newActorTwoID;
		}
		
		public function getDirectorID() {
			return $this->directorID;
		}
		protected function setDirectorID($newDirectorID) {
		 	$this->directorID = $newDirectorID;
		}
		
		public function getMovieID() {
			return $this->movieID;
		}
		protected function setMovieID($newMovieID) {
		 	$this->movieID = $newMovieID;
		}
		
		public function getNumLikes() {
			return $this->numLikes;
		}
		protected function setNumLikes($newNumLikes) {
		 	$this->numLikes = $newNumLikes;
		}
		
		public function getPredResult() {
			return $this->predResult;
		}
		protected function getPredResult($newPredResult) {
		 	$this->predResult = $newPredResult;
		}	
	}
	
	class censor
	{	
		protected $userID;
		var $userCount;
		var $wordLength;	 
		var $wordList;	 
		var $replaceWord;	 
		
		function __construct($userID, $userCount, $wordLength, $wordList, $replaceWord ) {
			$this->userID = $userID;
			$this->userCount = $userCount;
			$this->wordLength = $wordLength;
			$this->wordList = $wordList;
			$this->replaceWord = $replaceWord;
		}
				 
		public function getUserID() {
			return $this->userID;
		}
		protected function setUserID($newUserID) {
		 	$this->name = $newUserID;
		}
		
		public function getUserCOunt() {
			return $this->userCount;
		}
		protected function setUserCOunt($newUserCOunt) {
		 	$this->userCount = $newUserCOunt;
		}
		
		protected function getWordLength() {
			return $this->wordLength;
		}
		protected function getWordLength($newWordLength) {
		 	$this->wordLength = $newWordLength;
		}
		
		public function getWordList() {
			return $this->wordList;
		}
		protected function setWordList($newWordList) {
		 	$this->wordList = $newWordList;
		}
		
		public function getReplaceWord() {
			return $this->replaceWord;
		}
		protected function setReplaceWord($newReplaceWord) {
		 	$this->replaceWord = $newReplaceWord;
		}
		
?>