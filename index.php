<?php

//Pegando Videos de YouTube
$API_key    = '';//Chave de acesso a API
$channelID  = 'UCXVbsFoA16ZhaRn5fkXTO_w';//Identificador do Canal
$maxResults = 10;//Quantidade de videos retornados.

$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));

foreach($videoList->items as $item){
    //Percorrendo os videos
    if(isset($item->id->videoId)){
        echo '<div class="youtube-video">
                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                <h2>'. $item->snippet->title .'</h2>
            </div>';
    }
}