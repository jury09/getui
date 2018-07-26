<?php
function classLoader($class)
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $path = str_replace('getui' . DIRECTORY_SEPARATOR, '', $path);

    $file = __DIR__ . '/src/' . $path . '.php';

    if (file_exists($file)) {

        require $file;
    }
}
spl_autoload_register('classLoader');
