<?php
# Include config file. main file to run this framework
include_once  'config.php'  ;


app::set_path();

# End function of admin template
# Delete inner code

# Debug varieble; to disable debug please delete # symbol at next line

// app::$debug = false;

# Delete this if you use custom template directory
# Replace app::include('route') by  " include __APPDIR.'/your/template/path' "

// app::include('');

index();


# Multiple theme support
# Disable the line before and anable next code line

# include tempdir().'route.php';


# Debug function; to disable debug please delete # symbol at next line
# This function will be show you all php error or server error
# app::debug();

?>
