<?php

$cook = md5(time());
setcookie('my-fucking-cookie', $cook, time() + 3600 * 2)

?>