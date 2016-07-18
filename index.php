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
			<p><strong>Profession: </strong>Web development student.</p>
			<p><strong>Technology: </strong>MacBook Air</p>
			<p><strong>Goal: </strong>Zac's goal is to find an entertaining streamer playing one of his favorite games.</p>
		<h2>Use Case</h2>
			<p>Zac has just made it home after a long day of learning about web development. He would like to relax and
			watch an entertaining stream while he enjoys his dinner.</p>
		<h2>Interaction Flow</h2>
			<ol>
				<li>Go to twitch.tv homepage</li>
				<li>Click browse</li>
				<li>Find desired game and click the link</li>
				<li>Click on one of the current streamers to watch</li>
			</ol>
		<h2>Conceptual Model</h2>
			<ul>
				<li>Each <strong>user</strong> can create many <strong>streams</strong>.</li>
				<li>Many <strong>users</strong> can follow many <strong>users</strong>.</li>
				<li>Many <strong>users</strong> can subscribe to many <strong>users</strong>.</li>
				<li>Each <strong>game</strong> can have many <strong>streams</strong>.</li>
				<li>Each <strong>stream</strong> can have only one <strong>game</strong>.</li>
			</ul>
		<h4>Entities and Attributes</h4>
			<ol>
				<li>User</li>
					<ul>
						<li>userId</li>
						<li>userName</li>
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
						<li>userName</li>
						<li>gameName</li>
					</ul>
				<li>Follow</li>
					<ul>
						<li>followId</li>
						<li>user1</li>
						<li>user2</li>
					</ul>
				<li>Subscribe</li>
					<ul>
						<li>subscribeId</li>
						<li>user1</li>
						<li>user2</li>
					</ul>
			</ol>
	</body>
</html>