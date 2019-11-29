<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/var/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/system/lib/anime.php';
if( isset($_GET['search']))
{
    if(isset($_GET['q']) && $_GET['q'] != NULL )
    {
        global $_sqli;
        
        $q = mysqli_real_escape_string($_sqli,$_GET['q']); 
        
        foreach( mysqli_fetch_all(mysqli_query($_sqli,"SELECT id,post_title,post_content,permalink,thumb FROM aniz_post WHERE `post_title` LIKE '%$q%' ")) as $s ){
        
        ?>
        <div class="mt-1 bg-white rounded pr-3 row col-lg-14">
            <img src="<?php echo $s[4] ?>" class="img_ip rounded">
            <div class="col">
                <a href="<?php echo DOMAIN."/thong-tin/".$s[3]."-".$s[0].".html" ?>"><span class="title_search"><?php echo $s[1] ?></span></a>
                <p class="a"><?php echo $s[2] ?></p>
            </div>
        </div>
        <?php
    }
        
    }
    if( isset($_GET['s']) && $_GET['s'] != NULL )
    {
        $anime = new the_anime();
         $s = mysqli_real_escape_string($_sqli,$_GET['s']); 
        global $_sqli;
         foreach( mysqli_fetch_all(mysqli_query($_sqli,"SELECT id,post_title FROM aniz_post WHERE `post_title` LIKE '%$s%' LIMIT 15 "))  as $ani){
            echo "<a class='btn btn-sm btn-block btn-primary text-white click-add-series mb-1' anime_id='$ani[0]' >ID:$ani[0] - $ani[1]</a>" ;
             ?>
                <script>
                    $(document).ready(function(){
                         $(".post_list>a").click(function(){
                            $(".sr_val").Val(12);
                        });   
                    });

                   
                </script>
                

                <?php
         }
    }
}
