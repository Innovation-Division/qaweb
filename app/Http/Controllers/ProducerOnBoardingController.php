<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_producer_onboarding;
use App\Models\cocogen_producer_onboarding_file;

class ProducerOnBoardingController extends Controller
{
    public function index(Request $request)
    {
        $producers = cocogen_producer_onboarding::with('tags')->where('type', 'Presentation')
        ->where('line', $request->line)
        ->orderBy('id', 'DESC')
        ->paginate(10);

        $pagination = (string)$producers->links();

        $producersData = array(
            'pagination' => $pagination,
            'producers' => $producers
        );

        return response()->json($producersData);
    }

    public function circular()
    {
        $producersCircular = cocogen_producer_onboarding::join('cocogen_producer_onboarding_file', 'cocogen_producer_onboarding.id', 'cocogen_producer_onboarding_file.producer_id')
        ->select('cocogen_producer_onboarding_file.file', 'cocogen_producer_onboarding.*')
        ->where('type', 'Circular')
        ->orderBy('id', 'DESC')
        ->paginate(2);

        $paginationCircular = (string)$producersCircular->links();

        $producersCircularData = array(
            'paginationCircular' => $paginationCircular,
            'producersCircular' => $producersCircular
        );

        return response()->json($producersCircularData);
    }

    public function files($id)
    {

        $files = cocogen_producer_onboarding_file::join('cocogen_producer_onboarding', 'cocogen_producer_onboarding_file.producer_id', 'cocogen_producer_onboarding.id')
        ->select('cocogen_producer_onboarding.entry_name', 'cocogen_producer_onboarding.created_at', 'cocogen_producer_onboarding_file.*')
        ->where('producer_id', $id)
        ->orderBy('id', 'DESC')
        ->paginate(10);

        $paginationFiles = (string)$files->links();

        $filesData = array(
            'paginationFiles' => $paginationFiles,
            'files' => $files
        );

        return response()->json($filesData);
    }
}
