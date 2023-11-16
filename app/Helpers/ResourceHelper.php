<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

function uploadFile($key = 'file', $folder = 'projects', $oldFile = false)
{
    $request = request(); // get the request
    if ($request->hasFile($key)) {      // if the file exist do the condition
        if ($oldFile) {   // if the file is an old file
            Storage::disk('public')->delete($oldFile);
        } // then delete the old file and store the new one
        // end  second if
        $uploadedFile = $request->file($key); // get the file from the request
        $moved = Storage::disk('public')->put($folder, $uploadedFile); // store the file put(name , file)

        if ($moved) {
            return $moved;
        } // url to file
    }

    return $oldFile;
}
