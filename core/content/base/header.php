<header>
	<nav>
		<ul>
			<?php 
			$navArr = $header->generateNavigationArray();
			foreach ($navArr as $key => $value)
			{
				echo "<li>".$key."</li>";
			}
			?>
		</ul>
	</nav>
</header>