<?php
if (isset($_SERVER['HTTP_REFERER']) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $_SERVER['SERVER_NAME'] && !empty($_GET['id'])) {
	$ch = curl_init('https://api-piped.mha.fi/streams/'.$_GET['id']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 9.0; Windows NT 6.1)');
	$result = curl_exec($ch);
	curl_close($ch);
	$json = json_decode($result, true);
	if (empty($json['relatedStreams'])) echo "\n";
	else {
		foreach ($json['relatedStreams'] as $item) {
			if (strpos($item['url'], $_GET['id']) === false) {
				$h = floor($item['duration'] / 3600);
				$m = floor(($item['duration'] - $h * 3600) / 60);
				$s = $item['duration'] - ($h * 3600 + $m * 60);
				$m = ($m < 10 ? '0'.$m : ''.$m);
				$s = ($s < 10 ? '0'.$s : ''.$s);
?>
					<article>
						<a href="?v=<?= $id = str_replace('/watch?v=', '', $item['url']); ?>">
							<small><?= $item['uploaderName']; ?></small>
							<span><?= $item['title']; ?></span>
							<img src="https://i.ytimg.com/vi/<?= $id; ?>/mqdefault.jpg" alt="<?= htmlspecialchars($item['title'], ENT_QUOTES); ?>"/>
						</a>
						<b id="<?= $id; ?>"><?= ($h > 0 ? $h.':' : '').$m.':'.$s; ?> <i class="fas fa-plus-circle"></i></b>
					</article>
<?php } } } } ?>