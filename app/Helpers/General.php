<?php

use Illuminate\Support\Facades\Config;
function upload($folder,$image)
{
    $extension=strtolower($image->extension());
    $filename=time().rand(100,999).'.'.$extension;
    $image->getClientOrignalName=$filename;
    $image->move($folder,$filename);
    return $filename;
}
?>

