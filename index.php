<h1>RETRIEVE Images</h1>

<span>Image Here------</span>
<div>
<?php
$file_names = scandir('./images');
foreach($file_names as $file_name) {
  echo "<img src='./images/{$file_name}'>";
}
?>
</div>
<span>----Image Here</span>
