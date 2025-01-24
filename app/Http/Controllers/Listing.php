<?php

namespace App\Http\Controllers;

class Listing extends Controller
{
    const DIRECTORY = './html';

    public function index()
    {
        if (!is_dir(self::DIRECTORY)) {
            abort(404, 'Directory not available');
        }

        $lists = [];
        if ($handle = opendir(self::DIRECTORY)) {
            while (false !== ($entry = readdir($handle))) {
                if (strpos($entry, '.html') !== false && strpos($entry, 'listing.html') === false) {
                    $lists[] = $entry;
                }
            }
            closedir($handle);
            sort($lists);
        }
        return response()->json($lists);
    }
}
