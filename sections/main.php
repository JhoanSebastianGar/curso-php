<main>
	<pre style="font-size: 8px; overflow: scroll; height: 250px;">
		<?php var_dump($data); ?>
	</pre>
	<section>
		<img src="<?=$poster_url; ?>" width="200" alt="POSTER DE <?=$title; ?>">
	</section>
	<hgroup>
		<h2><?=$title; ?> <?=$untilMessage ?> dias</h2>
		<p>fecha de estreno <?=$release_date; ?></p>
		<p>la siguiente es <?=$following_production["title"]; ?></p>
	</hgroup>
</main>
</html>