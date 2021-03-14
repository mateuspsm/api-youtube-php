<?php
$apiKey     = '';
$channelID  = '';
$maxResults = 10;

$baseUrl = 'https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=';
$completeUrl = $baseUrl.$channelID.'&maxResults='.$maxResults.'&key='.$apiKey;

$videoList = json_decode(file_get_contents($completeUrl));

if(empty($videoList->items)) return;

foreach($videoList->items as $item){
    if(isset($item->id->videoId)){
        echo '<div class="youtube-video">
                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                <h2>'. $item->snippet->title .'</h2>
            </div>';
    }
}
