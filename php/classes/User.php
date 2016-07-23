<?php
/**
 * User for twitch.tv
 *
 * @author Zac Laudick <zlaudick@cnm.edu>
 */
class User {
	/**
	 * id for this user; this is the primary key
	 */
	private $userId;
	/**
	 * user name for this user
	 */
	private $userName;
	/**
	 * email for this user
	 */
	private $userEmail;
	/**
	 * image for this user
	 */
	private $userImage;

	/**
	 * accessor method for user id
	 *
	 * @return int value of user id
	 */
	public function getUserId() {
		return($this->userId);
	}

	/**
	 * mutator method for user id
	 *
	 * @param int $newUserId new value of user id
	 * @throws UnexpectedValueException if $newUserId is not an integer
	 */
	public function setUserId($newUserId) {
		// verify the user id is valid
		$newUserId = filter_var($newUserId, FILTER_VALIDATE_INT);
		if($newUserId === false) {
			throw(new UnexpectedValueException("user id is not a valid integer"));
		}
		// convert and store the user id
		$this->userId = intval($newUserId);
	}

	/**
	 * accessor method for user name
	 *
	 * @return string value of user name
	 */
	/**
	 * @return mixed
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * mutator method for user name
	 *
	 * @param string $newUserName new value of user name
	 * @throws UnexpectedValueException if $newUserName is not valid
	 */
	/**
	 * @param mixed $userName
	 */
	public function setUserName($newUserName) {
		// verify the user name is valid
		$newUserName = filter_var($newUserName, FILTER_SANITIZE_STRING);
		if($newUserName === false) {
			throw(new UnexpectedValueException("user name is not a valid string"));
		}
		// store the user name
		$this->userName = $newUserName;
	}
}