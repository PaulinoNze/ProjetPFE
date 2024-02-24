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
			<video class="fm-video video-js vjs-16-9 vjs-big-play-centered" data-setup="{}" controls id="fm-video">
				<source src="video/pexels-yunus-tuğ-20062451 (2160p).mp4" type="video/mp4">
			</video>
	
			<article>
				<h2>Lorem Ipsum Video</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nibh nisi, tincidunt in consequat a, pellentesque eu quam. Curabitur tempor orci non elit faucibus blandit. Nam id quam sit amet ex ultricies porta vitae a elit. Curabitur a vehicula nunc. Etiam imperdiet metus non dui rutrum, eu convallis felis cursus. Pellentesque dapibus diam nec ex tincidunt pellentesque. Maecenas nec ipsum rhoncus, gravida purus at, iaculis mauris. Donec arcu mi, convallis congue suscipit eget, congue ut quam.</p><br />
			</article>
		</div>
	</main>

	<script>
		var reproductor = videojs('fm-video', {
			fluid: true
		});
	</script>
</body>
</html>


