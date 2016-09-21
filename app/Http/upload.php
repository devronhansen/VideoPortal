<?php

function uploadVideo($file, $id)
{
    $accepted_extensions = Array('video/mp4');
    if ($file != "") {
        //Pruefen, ob richtiges Format!!! (.jpg, .png)
        if (in_array($file->getClientMimeType(), $accepted_extensions)) {
            $file->move("./files", $id . '.mp4');
        } else {
            Session::flash('error', 'Beim Bildupload gab es einen Fehler!');
        }
    }
}

function deleteVideo($id)
{
    File::delete("./files/" . $id . ".mp4");
}


function uploadPicture($file, $id)
{
    $accepted_extensions = Array('image/bmp', 'image/gif', 'image/jpeg', 'image/jpg', 'image/png');

    if ($file != "") {
        //Pruefen, ob richtiges Format!!! (.jpg, .png)
        if (in_array($file->getClientMimeType(), $accepted_extensions)) {
            $file->move("./files/temp", $file->getClientOriginalName());
            $image = Image::make('./files/temp/' . $file->getClientOriginalName());
            $image = resizePicture($image);
            $image = $image->save('./thumbnails/' . $id . '.jpg', 80);
            File::delete("./temp/" . $file->getClientOriginalName());
        } else {
            Session::flash('error', 'Beim Bildupload gab es einen Fehler!');
        }
    }
}

function deletePicture($id)
{
    File::delete("./thumbnails/". $id . ".jpg");
}

function resizePicture($image)
{
    $image->resize(480, 320);
    return $image;
}
