<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Data Design Phase 1</title>
	</head>
	<body>
		<h2>Persona</h2>
			<p><strong>Name: </strong>Zac Laudick</p>
			<p><strong>Age: </strong>25</p>
			<p><strong>Description:</strong> Zac is a gaming enthusiast and web development student. He spends most of his day in class, learning about making great websites. After long days in class he likes to take some time to relax and eat dinner before playing video games with his friends. During this time he enjoys watching other gamers stream his favorite games. To watch these streams he uses either his Macbook Air or iPhone 5 to search twitch.tv and connect to a stream.</p>
			<p><strong>Goal: </strong>Zac's goal is to find a stream to watch with minimal effort.</p>
		<h2>Use Case</h2>
			<p>It's 6 pm and Zac is home from his long day of learning web development. He's tired and wants to quickly and easily find an entertaining stream to watch while he enjoys his dinner. He is in his living room using his Macbook Air to search twitch.tv for someone playing Overwatch. When he finds a stream he will connect it to his big screen tv through his chromecast.</p>
		<h2>Interaction Flow</h2>
			<ol>
				<li>Go to twitch.tv homepage</li>
				<li>Click browse</li>
				<li>Find desired game and click the link</li>
				<li>Click on one of the current streamers to watch</li>
			</ol>
		<h2>Conceptual Model</h2>
			<ul>
				<li>Each <strong>user</strong> can create many <strong>streams</strong>. (1-to-n)</li>
				<li>Many <strong>users</strong> can follow many <strong>users</strong>. (m-to-n)</li>
				<li>Many <strong>users</strong> can subscribe to many <strong>users</strong>. (m-to-n)</li>
				<li>Each <strong>game</strong> can have many <strong>streams</strong>. (1-to-n)</li>
				<li>Each <strong>stream</strong> can have only one <strong>game</strong>. (1-to-1)</li>
			</ul>
		<h4>Entities and Attributes</h4>
			<ol>
				<li>User</li>
					<ul>
						<li>userId</li>
						<li>userName</li>
						<li>userImage</li>
						<li>userEmail</li>
						<li>userPasswordHash</li>
						<li>userPasswordSalt</li>
					</ul>
				<li>Game</li>
					<ul>
						<li>gameId</li>
						<li>gameName</li>
					</ul>
				<li>Stream</li>
					<ul>
						<li>streamId</li>
						<li>streamUserId</li>
						<li>streamGameName</li>
						<li>streamTitle</li>
					</ul>
				<li>Follow</li>
					<ul>
						<li>followerUserId</li>
						<li>streamerUserId</li>
					</ul>
				<li>Subscribe</li>
					<ul>
						<li>subscriberUserId</li>
						<li>streamerUserId</li>
					</ul>
			</ol>
		<h2>ERD</h2>
		<img src="images/twitch-stream-erd.svg" alt="twitch stream erd"/>
	</body>
</html>