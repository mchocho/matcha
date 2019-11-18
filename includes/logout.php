<?php
require('../ft_util.php');
session_start();
session_destroy();
ft_redirectuser('../index.php');
