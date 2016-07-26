DROP TABLE IF EXISTS `subscribe`;
DROP TABLE IF EXISTS `follow`;
DROP TABLE IF EXISTS stream;
DROP TABLE IF EXISTS game;
DROP TABLE IF EXISTS user;
-- create the user entity
CREATE TABLE user (
	userId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	userEmail VARCHAR(128) NOT NULL,
	userImage VARCHAR(128) NOT NULL,
	userName VARCHAR(32) NOT NULL,
	userPasswordHash CHAR(128) NOT NULL,
	userPasswordSalt CHAR(64) NOT NULL,
	UNIQUE(userEmail),
	UNIQUE(userName),
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
	streamGameName VARCHAR(32) NOT NULL,
	streamTitle VARCHAR(140) NOT NULL,
	streamUserId INT UNSIGNED NOT NULL,
	INDEX (streamGameName),
	INDEX (streamUserId),
	FOREIGN KEY (streamGameName) REFERENCES game(gameName),
	FOREIGN KEY (streamUserId) REFERENCES user(userId),
	PRIMARY KEY (streamId)
);

CREATE TABLE `follow` (
	followerUserId INT UNSIGNED NOT NULL,
	streamerUserId INT UNSIGNED NOT NULL,
	INDEX (followerUserId),
	INDEX (streamerUserId),
	FOREIGN KEY (followerUserId) REFERENCES user(userId),
	FOREIGN KEY (streamerUserId) REFERENCES user(userId),
	PRIMARY KEY (followerUserId, streamerUserId)
);

CREATE TABLE `subscribe` (
	subscriberUserId INT UNSIGNED NOT NULL,
	streamerUserId INT UNSIGNED NOT NULL,
	INDEX (subscriberUserId),
	INDEX (streamerUserId),
	FOREIGN KEY (subscriberUserId) REFERENCES user(userId),
	FOREIGN KEY (streamerUserId) REFERENCES user(userId),
	PRIMARY KEY (subscriberUserId, streamerUserId)
);