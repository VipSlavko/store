<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Producer;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allProducers = Producer::all();

        return view('admin.producer.index', compact('allProducers'));
    }

    /**
     * Display a listing of the soft-deleted resource.
     */
    public function deleted()
    {
        $allProducers = Producer::onlyTrashed()->get();

        return view('admin.producer.deleted', compact('allProducers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.producer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if($request->has())

        $data = [
            'name' => $request->post('name'),
            'description' => $request->post('description'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        Producer::create($data);

        return redirect()->route('producers');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $idProducer)
    {
        $producer = Producer::find($idProducer);

        return view('admin.producer.show', compact('producer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $idProducer)
    {
        $producer = Producer::find($idProducer);

        return view('admin.producer.edit', compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $idProducer = $request->post('id');
        $data = [
            'name' => $request->post('name'),
            'description' => $request->post('description'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $producer = Producer::find($idProducer);
        $producer->fill($data);
        if ($producer->isDirty()) {
            $producer->save($data);
        }
       
        return redirect()->route('producers');
    }

    /**
     * Soft_Delete the specified resource in storage.
     */
    public function delete(Request $request)
    {
        Producer::find($request->post('id'))->delete();

        return redirect()->route('producers');
    }

    /**
     * Restore the specified resource in storage.
     */
    public function restore(Request $request)
    {
        Producer::onlyTrashed()->find($request->post('id'))->restore();

        return back();
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Producer::onlyTrashed()->find($request->post('id'))->forceDelete();

        return redirect()->route('producerShowDeleted');
    }

}
