<?php
/**
 * User for twitch.tv
 *
 * This User class is an example of data collected and stored about a typical user for twitch.tv
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
	 * constructor for this user
	 *
	 * @param int $newUserId id of this user
	 * @param string $newUserName user name of this user
	 * @param string $newUserEmail email of this user
	 * @param string $newUserImage image for this user
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */
	public function __construct(int $newUserId, string $newUserName, string $newUserEmail, string $newUserImage) {
		try {
			$this->setUserId($newUserId);
			$this->setUserName($newUserName);
			$this->setUserEmail($newUserEmail);
			$this->setUserImage($newUserImage);
		} catch (\InvalidArgumentException $invalidArgument){
			// rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch (\RangeException $range) {
			// rethrow the exception to the caller
			throw(new \RangeException($range->getMessage(), 0, $range));
		} catch (\TypeError $typeError) {
			// rethrow the exception to the caller
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
		} catch (\Exception $exception) {
			// rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

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
	 * @throws \RangeException if $newUserId is not positive
	 * @throws \TypeError if $newUserId is not an integer
	 */
	public function setUserId(int $newUserId) {
		// verify the user id is positive
		if($newUserId <= 0) {
			throw(new \RangeException("user id is not positive"));
		}
		// convert and store the user id
		$this->userId = intval($newUserId);
	}

	/**
	 * accessor method for user name
	 *
	 * @return string value of user name
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * mutator method for user name
	 *
	 * @param string $newUserName new value of user name
	 * @throws \InvalidArgumentException if $newUserName is not a string or insecure
	 * @throws \TypeError if $newUserId is not a string
	 */
	public function setUserName(string $newUserName) {
		// verify the user name is secure
		$newUserName = trim($newUserName);
		$newUserName = filter_var($newUserName, FILTER_SANITIZE_STRING);
		if(empty($newUserName) === true) {
			throw(new \InvalidArgumentException("user name is empty or insecure"));
		}
		//verify the user name content will fit in the database
		if(strlen($newUserName) > 32) {
			throw(new \RangeException("user name content is too large"));
		}

		// store the user name
		$this->userName = $newUserName;
	}

	/**
	 * accessor method for user email
	 *
	 * @return string value of email
	 */

	public function getUserEmail() {
		return $this->userEmail;
	}
	/**
	 * mutator method for user email
	 *
	 * @param string $newUserEmail new value of user email
	 * @throws \InvalidArgumentException if $newUserEmail is not a string or insecure
	 * @throws \RangeException if $newUserEmail is > 128 characters
	 * @throws \TypeError if $newUserEmail is not a string
	 */
	public function setUserEmail(string $newUserEmail) {
		// verify the user email is secure
		$newUserEmail = trim($newUserEmail);
		$newUserEmail = filter_var($newUserEmail, FILTER_SANITIZE_EMAIL);
		if(empty($newUserEmail) === true) {
			throw(new \InvalidArgumentException("email is empty or insecure"));
		}
		// verify the user email will fit in the database
		if(strlen($newUserEmail) > 128) {
			throw(new \RangeException("email content is too large"));
		}
		// store the user email
		$this->userEmail = $newUserEmail;
	}

	/**
	 * accessor method for user image
	 *
	 * @return string value of user image
	 */
	public function getUserImage() {
		return($this->userImage);
	}

	/**
	 * mutator method for user image
	 *
	 * @param string $newUserImage new value of user image
	 * @throws \InvalidArgumentException if $newUserImage is not a string or insecure
	 * @throws \RangeException if $newUserImage is > 128 characters
	 * @throws \TypeError if $newUserImage is not a string
	 */
	public function setUserImage($newUserImage) {
		// verify the image is secure
		$newUserImage = trim($newUserImage);
		$newUserImage = filter_var($newUserImage, FILTER_SANITIZE_STRING);
		if(empty($newUserImage) === true) {
			throw(new \InvalidArgumentException("image is empty or insecure"));
		}
		// verify the image will fit in the database
		if(strlen($newUserImage) > 128) {
			throw(new \RangeException("image content is too large"));
		}
		// store the user image
		$this->userImage = $newUserImage;
	}
}