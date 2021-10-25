<?php

namespace App\Http\Controllers;

use App\Models\SampleData;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SampleController extends Controller
{
    use ApiResponser;

    /**
     * Return the list of books
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $samples = SampleData::all();

        return $this->successResponse($samples);
    }

    /**
     * Create one new book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $sample = SampleData::create($request->all());

        return $this->successResponse($sample, Response::HTTP_CREATED);
    }

    /**
     * Obtains and show one book
     * @return Illuminate\Http\Response
     */
    public function show($sample)
    {
        $sample = SampleData::findOrFail($sample);

        return $this->successResponse($sample);
    }

    /**
     * Update an existing book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $sample)
    {
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $sample = SampleData::findOrFail($sample);

        $sample->fill($request->all());

        if ($sample->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $sample->save();

        return $this->successResponse($sample);
    }

    /**
     * Remove an existing book
     * @return Illuminate\Http\Response
     */
    public function destroy($sample)
    {
        $sample = SampleData::findOrFail($sample);

        $sample->delete();

        return $this->successResponse($sample);
    }
}
