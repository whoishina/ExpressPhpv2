## NEKOCODE CMS

###### How to install this ?

###### Routing

> METHOD GET : static page
```php
  app::get('/foo/bar',function($arg1,$arg2){
      # Do something
  });
```


> METHOD GET : dynamic page
```php
  app::get('/foo/{bar}',function($arg1,$arg2){
      # Get {bar} value
      echo $arg1->params->bar ;
  });
```
