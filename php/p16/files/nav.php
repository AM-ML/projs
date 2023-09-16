<ul>
	<?php 
		foreach($navitems as $item){
			echo "<li><a href='/p16/" . $item["slug"] . "'>" . $item["title"] . "</a></li>";
		}
	?>
</ul>