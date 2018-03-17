<?php

namespace App\Http\Controllers;

use App\Lessons;
use Illuminate\Http\Request;

/**
 * Class LessonController
 * @package App\Http\Controllers
 */
class LessonController extends Controller
{
    /**
     * GET request all resource
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->get('search')) {
            $query = Lessons::where('title', 'like', '%'.$request->get('search').'%')->get();

            return response()->json($query);
        }

        return response()->json(Lessons::all());
    }

    /**
     * GET request single resource
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(Lessons::find($id));
    }

    /**
     * POST request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $author = Lessons::create($request->all());

        return response()->json($author, 201);
    }

    /**
     * PUT request
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $author = Lessons::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    /**
     * DELETE request
     *
     * @param $id
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function delete($id)
    {
        Lessons::findOrFail($id)->delete();

        return response('Resource deleted', 200);
    }
}
