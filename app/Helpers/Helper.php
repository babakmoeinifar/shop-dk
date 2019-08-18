<?php

use Intervention\Image\ImageManagerStatic as Image;


function activeClass($url, $active = 'activeLink')
{
    return \Request::is($url) ? $active : '';
}

function saveImageFile($image_tmp, array $input, $with, $height, $path): array
{
    $filename = rand(111, 99999) . '.' . 'webp';
    $image_path = $path . $filename;
    Image::make($image_tmp)->resize($with, $height)->encode('webp')->save($image_path);
    $input['image'] = $image_path;
    return $input;
}
