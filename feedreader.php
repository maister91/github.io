<?php

class FeedReader
{
	public function getFeed()
	{
		//Feed URLs
		$feeds = array(
			"http://feeds.nieuwsblad.be/nieuws/snelnieuws"
		);

		//Read each feed's items
		$entries = array();
		foreach($feeds as $feed) {
			$xml = simplexml_load_file($feed);
			$entries = array_merge($entries, $xml->xpath("//item"));
		}

		//Sort feed entries by pubDate
		usort($entries, function ($feed1, $feed2) {
			return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
		});
		return json_decode(json_encode($entries), true);
	}
}
?>