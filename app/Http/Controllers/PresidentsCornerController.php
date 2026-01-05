<?php

namespace App\Http\Controllers;

use App\Models\cocogen_admin_pages_blogs;
use App\Models\cocogen_admin_pages_ceo;
use Illuminate\Http\Request;

class PresidentsCornerController extends Controller
{
    public function getPresidentsCorner(Request $request)
    {

        $perPage = $request->input('per_page', 12);
        $page = $request->input('page', 1);
        $search = $request->input('search');

        $presidentsQuery = cocogen_admin_pages_ceo::query();

        if($search != null && strlen($search) >= 2) {
            $presidentsQuery->where('blogName', 'like', '%'.$search.'%')
            ->orWhere('metaTitle', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->orWhere('summary', 'like', '%'.$search.'%')
            ->orWhere('created_at', 'like', "%$search%");
        }

        $presidentsCorner = $presidentsQuery->where('status', 'published')->orderBy('id', 'desc')->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'data' => $presidentsCorner->items(),
            'current_page' => $presidentsCorner->currentPage(),
            'last_page' => $presidentsCorner->lastPage(),
            'total' => $presidentsCorner->total(),
            'per_page' => $presidentsCorner->perPage(),
        ]);
    }

    public function getBlog($id)
    {

        $blog = cocogen_admin_pages_ceo::where('blogLink', $id)->first();

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }

        return response()->json($blog);
    }

    public function getArticles($id)
    {
        $articles = cocogen_admin_pages_ceo::where('blogLink', '!=', $id)->where('status', 'published')
            ->orderBy('views', 'desc')
            ->take(3)
            ->get();

        if ($articles->isEmpty()) {
            return response()->json(['message' => 'No articles found'], 404);
        }

        return response()->json($articles);
    }

    public function addView($id)
    {
        $blog = cocogen_admin_pages_ceo::where('blogLink', $id)->first();

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }

        $blog->increment('views');

        return response()->json(['message' => 'View count updated successfully']);
    }
}
