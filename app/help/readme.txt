##########################
#                        #
#     NEKOCODE CMS       #
#                        #
##########################

@Infomation
==============================================
= Version : 0.5 stabled
= Author : Ngo Dang Hai
= Release Date : Null
= Author URL : @coder.vi (Facebook)
= Description :
=============================================

DOCUMENTIONS
##### File Construct

|- App  - install ( Go to this folder at first run )
|       - modules ( Contain all main function of cms )
|       - nodejs  ( Cms Nodejs Version )
|       - plugins ( Contain all plugins , easy to install new one )
|       - update  ( Update cms  )
|- public   -

##### Routing

----------------------------------------------
>>> METHOD GET : static page

  app::get('/foo/bar',function($arg1,$arg2){
      # Do something
  });

----------------------------------------------
>>> METHOD GET : dynamic page

  app::get('/foo/{bar}',function($arg1,$arg2){
      # Get {bar} value
      echo $arg1->params->bar ;
  });
----------------------------------------------
