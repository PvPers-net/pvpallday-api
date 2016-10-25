<?php

namespace App\Http\Controllers\Videos;

use App\Http\Controllers\APIController;
use App\Models\Videos\Video;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VideosController extends APIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $handle
     * @return \Illuminate\Http\Response
     */
    public function show(string $handle) {
        try {
            /** @var Video $video */
            $video = Video::with(
                [
                    'tags' => function ($query) {
                        $query->select('tag');
                    },
                    'submitter',
                    'owner',
                    'host'
                ]
            )->where('handle', '=', $handle)->firstOrFail();

            // Allow Description to be \n or <br /> depending on 'html'
            if (!Input::has('html') || Input::get('html', TRUE) == 1) {
                $video->nl2br();
            }

            return $this->response->array($video->toArray());
        } catch (ModelNotFoundException $e) {
            // 404 Error
            throw new NotFoundHttpException("Video '{$handle}' not found.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
