<?php
/**
 * Twitter API SEARCH
 * Selim Hallaç
 * selimhallac@gmail.com
 */

include "twitteroauth/twitteroauth.php";

$consumer_key = "Z33aUqMzyoZhxdNdfNXO4oelk";
$consumer_secret = "PZ5oNGwQWwk589KmXPO1Y7tFZGfMcmXLCiyOwPvlXxbmgpHcUN";
$access_token = "965160998-GGw9CySSnwedo9IL1A5dYYlStK4dQ4BIYfuCyyV0";
$access_token_secret = "b41m3JWV3RNEjVfrWNkOtHngbWeN5plTZGzXXJNjmmM0G";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

if (isset($_POST["query"])) {
	# code...
	$query = $_POST["query"];
	$query1 = $_POST["query"]." jng ";
	$tweets = $twitter->get("search/tweets",["q"=> $query,"lang" => "id","result_type" => "recent"]);
	$tweets1 = $twitter->get("search/tweets",["q"=> $query1,"lang" => "id","result_type" => "recent"]);

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"><meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="UTF-8">
  <title>Tanggapan Masyarakat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<nav class="navbar navbar-light bg-faded">
		<form class="form-inline" method="post" action="index.php">
			<input class="form-control mr-sm-2" type="text" placeholder="Cari Topik" name="query"/>
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> Cari</button>
		</form>
	</nav>
<div class="container-fluid">
<br>
	<div class="row">
		<div class="col">
			<div class="card text-center card-outline-primary">
				<div class="card-header">
					Tanggapan Positif
				</div>
			</div>
			<br>
			<?php if (isset($_POST["query"])):
				foreach ($tweets->statuses as $key => $tweet) { ?>
					<div class="card card-outline-primary">
						<div class="card-block">
							Tweet : <img src="<?=$tweet->user->profile_image_url;?>" /><?=$tweet->text; ?><br>
						</div>
					</div>
					<br>
				<?php }
			endif ?>
		</div>
		<div class="col">
			<div class="card text-center">
				<div class="card-header card-outline-danger">
					Tanggapan Negatif <span class="badge badge-default"> keyword : jng </span>
				</div>
			</div>
			<br>
			<?php if (isset($_POST["query"])):
				foreach ($tweets1->statuses as $key => $tweet) { ?>
					<div class="card card-inverse card-danger">
						<div class="card-block">
							Tweet : <img src="<?=$tweet->user->profile_image_url;?>" /><?=$tweet->text; ?><br>
						</div>
					</div>
					<br>
				<?php }
			endif ?>
		</div>
	</div>
</div>
<footer class="text-muted text-center">
		created with <i class="fa fa-heart" aria-hidden="true"></i> Sash @ 2017
		<br>
</footer>
<br>
</body>
</html>
