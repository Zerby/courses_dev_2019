<?php
	if (isset($_POST['getData'])) {
		//pdo
		$pdo = new PDO('mysql:host=localhost;dbname=test_scroll', 'root', '', 
			[
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			]);
		
		//les inits php
		$start = $_POST['start'];
		$limit = $_POST['limit'];
		
		//requête
		$sql = $pdo->query("SELECT * FROM scroll LIMIT $start, $limit");
		
		//le rowcount en DB suivit du foreach des familles
		if ($sql->rowCount() > 0) {

			foreach ($sql as $key) {
				echo '
					<div>
						<h2>'.$key['id'].'</h2>
						<h2>'.$key['name'].'</h2>
						<p>'.$key['email'].'</p>
					</div>
				';
			}
		}
	}