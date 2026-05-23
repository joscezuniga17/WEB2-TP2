<?php

class PlaylistView {

    public function showPlaylists($playlists) {

            require './templates/home.phtml';
    }
    
    public function showPlaylist($playlist) {

    require './templates/playlist.phtml';
}
    
}