<?php

$db = new PDO("mysql:host=localhost;dbname=delivery", "delivery", "admin");

$st = $db->prepare("SELECT * FROM fact ORDER BY RAND() LIMIT 1");
$st->execute();

$result = $st->fetch();

?>

<html>
<head>
<meta charset="utf-8">
<title>Random Linux Fact</title>
<style>
body{
margin: 0;
padding: 0;
display: flex;
justify-content: center;
align-items: center;
background: #eef;
font-family: 'Arial', sans-serif;
font-size: 20px;
color: #444;
}
.container{
width: 400px;
border: 1px solid #999;
padding: 30px;
background: #fafafa;
box-shadow: 0 0 5px 0 #333;
}
</style>

</head>
<body>
<div class="container">
<?php echo $result['text']; ?>
</div>
</body>

</html>
