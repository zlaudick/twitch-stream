-- create the user entity
CREATE TABLE user (
	userId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	userName VARCHAR(32) NOT NULL,
	userEmail VARCHAR(128) NOT NULL,
	userImage VARCHAR(128) NOT NULL,
	UNIQUE(userName),
	UNIQUE(userEmail),
	PRIMARY KEY (userId)
);

CREATE TABLE game (
	gameId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	gameName VARCHAR(32) NOT NULL,
	UNIQUE(gameId),
	UNIQUE (gameName),
	PRIMARY KEY (gameId)
);

CREATE TABLE stream (
	streamId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	streamUserName VARCHAR(32) NOT NULL,
	streamGameName VARCHAR(32) NOT NULL,
	streamTitle VARCHAR(140) NOT NULL,
	INDEX (streamUserName),
	INDEX (streamGameName),
	FOREIGN KEY (streamUserName) REFERENCES user(userName),
	FOREIGN KEY (streamGameName) REFERENCES game(gameName),
	PRIMARY KEY (streamId)
);

CREATE TABLE follow (
	followerUserId INT UNSIGNED NOT NULL,
	streamerUserId INT UNSIGNED NOT NULL,
	INDEX (followerUserId),
	INDEX (streamerUserId),
	FOREIGN KEY (followerUserId) REFERENCES user(userId),
	FOREIGN KEY (streamerUserId) REFERENCES user(userId),
	PRIMARY KEY (followerUserId, streamerUserId)
);

CREATE TABLE subscribe (
	subscriberUserId INT UNSIGNED NOT NULL,
	streamerUserId INT UNSIGNED NOT NULL,
	INDEX (subscriberUserId),
	INDEX (streamerUserId),
	FOREIGN KEY (subscriberUserId) REFERENCES user(userId),
	FOREIGN KEY (streamerUserId) REFERENCES user(userId),
	PRIMARY KEY (subscriberUserId, streamerUserId)
);