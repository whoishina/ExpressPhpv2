<?php

class Episode extends Miku {
    function getPlayer() {
        ?>
            <script src="<?= TEMPLATE_URI ?>/assets/jwplayer.js" ></script>
            <div id="mediaplayer"></div>
            <style>
                body {
                    margin:0px ;
                }
            </style>
            <script>
                var playerInstance = jwplayer('mediaplayer');
                playerInstance.setup({
                    aspectratio: '16:9',
                    autostart: true,
                    controls: true,
                    skin: {
                        "active": "#00ADDE",
                        "inactive": "#ffffff",
                        'name': 'glow',
                        'url': 'http://m.ani4u.org/7.3.4/skins/glow.css'
                    },
                    stagevideo: false,
                    stretching: 'uniform',
                    volume: '100',
                    width: '100%',
                    height: '100%',
                    allowfullscreen: true,
                    allowscriptaccess: 'always',
                    sources: [{
                        "file": "https://todayanime.com/get.php?id=<?= $this->getFileID() ?>" ,
                        "label": "HDP",
                        "type": "video\/mp4"
                    }],
                    image: 'http://ani4u.org/playerpreview-mobi.jpg',
                    events: {
                        onComplete: function () {
                            ;
                        },
                        onError: function (event) {
                            playerInstance.load({
                                sources: [{
                                    "file": "https://video.xx.fbcdn.net/v/t42.9040-2/10000000_459827904565088_7360252474101334016_n.mp4?_nc_cat=111&efg=eyJybHIiOjgxMywicmxhIjoxOTY5LCJ2ZW5jb2RlX3RhZyI6InByZW11dGVfc3ZlX3NkIn0%3D&_nc_ohc=8bDfpTtbDoAAQmeulJelGlGomfWBhxgEqmWH7aKB7FKhpKx3LMwYqYTow&rl=813&vabr=452&_nc_ht=video.xx&oh=ab656b51c5454fc9b84862a287606232&oe=5DEC9761",
                                    "label": "HDP",
                                    "type": "video\/mp4"
                                }]
                            });
                            playerInstance.play();
                        }
                    },
                });
            </script>
            <?php
    }

    function getFileID() {
        return App::$db->select( "data", "file_id", ['episode_id[=]'=>  Route::$request->params->id ] )[0];
    }
}