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

