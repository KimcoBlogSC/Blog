<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="http://jquery.com/src/jquery-latest.pack.js"></script>
<script>
$(document).ready(function(){
	$('#result').load('localhost/kimco/wp-content/themes/wordpress-naked/get_posts.php?offset=3');
});
</script>
</head>

<body>
<div id="result"></div>
</body>
</html>