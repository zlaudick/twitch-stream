<?php
namespace Edu\Cnm\Zlaudick\TwitchStream;

require_once("autoload.php");

/**
 * User for twitch.tv
 *
 * This User class is an example of data collected and stored about a typical user for twitch.tv
 *
 * @author Zac Laudick <zlaudick@cnm.edu>
 **/
class User {
	/**
	 * id for this user; this is the primary key
	 * @var int $userId
	 **/
	private $userId;
	/**
	 * user name for this user
	 * @var string $userName
	 **/
	private $userName;
	/**
	 * email for this user
	 * @var string $userEmail
	 **/
	private $userEmail;
	/**
	 * image for this user
	 * @var string $userImage
	 **/
	private $userImage;
	/**
	 * password hash for this user
	 * @var string $userPasswordHash
	 **/
	private $userPasswordHash;
	/**
	 * password salt for this user
	 * @var string $userPasswordSalt
	 **/
	private $userPasswordSalt;

	/**
	 * constructor for this user
	 *
	 * @param int $newUserId id of this user
	 * @param string $newUserName user name of this user
	 * @param string $newUserEmail email of this user
	 * @param string $newUserImage image for this user
	 * @param string $newUserPasswordHash password hash for this user
	 * @param string $newUserPasswordSalt password salt for this user
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 **/
	public function __construct(int $newUserId, string $newUserName, string $newUserEmail, string $newUserImage, string $newUserPasswordHash, string $newUserPasswordSalt) {
		try {
			$this->setUserId($newUserId);
			$this->setUserName($newUserName);
			$this->setUserEmail($newUserEmail);
			$this->setUserImage($newUserImage);
			$this->setUserPasswordHash($newUserPasswordHash);
			$this->setUserPasswordSalt($newUserPasswordSalt);
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
	 **/
	public function getUserId() {
		return($this->userId);
	}

	/**
	 * mutator method for user id
	 *
	 * @param int $newUserId new value of user id
	 * @throws \RangeException if $newUserId is not positive
	 * @throws \TypeError if $newUserId is not an integer
	 **/
	public function setUserId(int $newUserId = null) {
		// if the user id is null, this is a new id without a mySQL assigned id
		if($newUserId === null) {
			$this->userId = null;
			return;
		}
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
	 **/
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * mutator method for user name
	 *
	 * @param string $newUserName new value of user name
	 * @throws \InvalidArgumentException if $newUserName is not a string or insecure
	 * @throws \TypeError if $newUserId is not a string
	 **/
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
	 **/

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
	 **/
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
	 **/
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
	 **/
	public function setUserImage(string $newUserImage) {
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

	/**
	 * accessor method for user password hash
	 *
	 * @return string value of password hash
	 **/
	public function getUserPasswordHash() {
		return($this->userPasswordHash);
	}
	/**
	 * mutator method for user password hash
	 *
	 * @param string $newUserPasswordHash with ctype xdigit with a string of 128
	 * @throws \InvalidArgumentException if the hash is empty or insecure
	 * @throws \RangeException if $newUserPasswordHash is not 128 characters
	 **/
	public function setUserPasswordHash($newUserPasswordHash) {
		// verify the hash is exactly a string of 128 characters
		if((ctype_xdigit($newUserPasswordHash)) === false) {
			throw(new \InvalidArgumentException("hash is emtpy or insecure"));
		}
		if(strlen($newUserPasswordHash) !== 128) {
			throw(new \RangeException("hash is not a valid length"));
		}
		// store user hash
		$this->userPasswordHash = $newUserPasswordHash;
	}

	/**
	 * accessor method for user password salt
	 *
	 * @return string value of password salt
	 **/
	public function getUserPasswordSalt() {
		return($this->userPasswordSalt);
	}
	/**
	 * mutator method for user password salt
	 *
	 * @param string $newUserPasswordSalt with ctype xdigit with a string of 64
	 * @throws \InvalidArgumentException if salt is empty or insecure
	 * @throws \RangeException if salt is not exactly 64 characters
	 **/
	public function setUserPasswordSalt($newUserPasswordSalt) {
		// verify the salt is a string of exactly 64 characters
		if((ctype_xdigit($newUserPasswordSalt)) === false) {
			throw(new \InvalidArgumentException("salt is empty or insecure"));
		}
		// verify the salt is exactly 64 characters
		if(strlen($newUserPasswordSalt) !== 64) {
			throw(new \RangeException("salt is not 64 characters"));
		}
		// store user salt
		$this->userPasswordSalt = $newUserPasswordSalt;
	}

	/**
	 * inserts this User into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) {
		// enforce the user id is null
		if($this->userId !== null) {
			throw(new \PDOException("not a new id"));
		}

		//create query template
		$query = "INSERT INTO `user`(userName, userEmail, userImage, userPasswordHash, userPasswordSalt) VALUES(:userName, :userEmail, :userImage, :userPasswordHash, :userPasswordSalt)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["userName" => $this->userName, "userEmail" => $this->userEmail, "userImage" => $this->userImage, "userPasswordHash" => $this->userPasswordHash, "userPasswordSalt" => $this->userPasswordSalt];
		$statement->execute($parameters);

		// update the null userId with what mySQL just gave us
		$this->userId = intval($pdo->lastInsertId());
	}

	/**
	 * deletes this User from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo) {
		// enforce the user id is not null
		if($this->userId === null) {
			throw(new \PDOException("unable to delete a user that doen't exist"));
		}

		// create query template
		$query = "DELETE FROM user WHERE userId = :userId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["userId" => $this->userId];
		$statement->execute($parameters);
	}

	/**
	 * updates this User in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) {
		// enforce the user id is not null
		if($this->userId === null) {
			throw(new \PDOException("unable to update a user that doesn't exist"));
		}

		// create query template
		$query = "UPDATE user SET userName = :userName, userEmail = :userEmail, userImage = :userImage, userPasswordHash = :userPasswordHash, userPasswordSalt = :userPasswordSalt WHERE userId = :userId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["userName" => $this->userName, "userEmail" => $this->userEmail, "userImage" => $this->userImage, "userPasswordHash" => $this->userPasswordHash, "userPasswordSalt" => $this->userPasswordSalt, "userId" => $this->userId];
		$statement->execute($parameters);
	}

	//
}