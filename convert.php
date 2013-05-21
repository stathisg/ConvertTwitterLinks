<?php
function convert_twitter_links($tweet)
{
	//converts URLs to active links
	$tweet = preg_replace('/((http)+(s)?:\/\/[^<>\s]+)/i', '<a href="$0" target="_blank">$0</a>', $tweet );

	//converts mentions (e.g. @stathisg) to active links, pointing to the user's twitter profile
	$tweet = preg_replace('/[@]+([A-Za-z0-9-_]+)/', '<a href="http://twitter.com/$1" target="_blank">$1</a>', $tweet );

	//converts hashtags (e.g. #test) to active links, pointing to a twitter's search URL
	$tweet = preg_replace('/[#]+([A-Za-z0-9-_]+)/', '<a href="http://twitter.com/search?q=%23$1" target="_blank">$0</a>', $tweet );

	return $tweet;
}

//just a test
$tweet = 'This is a sample tweet mentioning me (@stathisg), using a #hashtag and a link: http://burnmind.com';
echo convert_twitter_links($tweet);
?>