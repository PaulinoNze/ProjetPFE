<?php
include "../../database.php";
if ( isset($_GET['chapitreId'])) {
	$chapitreId = $_GET['chapitreId'];
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>video cours</title>
		<!-- <link href="https://vjs.zencdn.net/7.2/video-js.min.css" rel="stylesheet"> -->
		<!-- <script src="https://vjs.zencdn.net/7.2/video.min.js"></script> -->
		<link rel="stylesheet" href="css/video-js.css">
		<script src="js1/video.js"></script>
		<link href="//vjs.zencdn.net/8.3.0/video-js.min.css" rel="stylesheet">
		<script src="//vjs.zencdn.net/8.3.0/video.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
		<link rel="stylesheet" href="css/estilos.css">
		<title>Video.js</title>
	</head>
	<body>
		<main>
			<div class="contenedor">
				<?php
				$query = "SELECT video FROM chapitre WHERE  chapitreId = $chapitreId";
				$result = mysqli_query($conn, $query);
				if ($result && mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					$videoPath = $row['video'];
					echo '<video class="fm-video video-js vjs-16-9 vjs-big-play-centered" data-setup="{}" controls id="fm-video">';
					echo '<source src="../../professeurDashboard/' . $videoPath . '" type="video/mp4">';
					echo 'Your browser does not support the video tag.';
					echo '</video>';
				} else {
					echo "Video not found.";
				}
				?>
			</div>
		</main>
		<script>
			var reproductor = videojs('fm-video', {
				fluid: true
			});
		</script>
	</body>
	</html>
<?php
} else {
	echo "<p>Aucun cours</p>";
}
?>