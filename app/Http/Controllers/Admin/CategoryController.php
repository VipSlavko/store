<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryModel = new Category();
        $allCategories = $categoryModel->readCategories();
        return view('admin.category.index', compact('allCategories'));
    }

    /**
     * Display a listing of the soft-deleted resource.
     */
    public function deleted()
    {
        $categoryModel = new Category();
        $allCategories = $categoryModel->readDeletedCategories();
        return view('admin.category.deleted', compact('allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if($request->has())
        $categoryModel = new Category();

        $data = [
            'name' => $request->post('name'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $categoryModel->createCategory($data);

        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $idCategory)
    {
        $categoryModel = new Category();
        $category = $categoryModel->showCategory($idCategory);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $idCategory)
    {
        $categoryModel = new Category();
        $category = $categoryModel->showCategory($idCategory);

        return view('admin.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $categoryModel = new Category();
        $id_category = $request->post('id');
        $data = [
            'name' => $request->post('name'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $categoryModel->updateCategory($id_category, $data);

        return redirect()->route('categories');
    }

    /**
     * Soft_Delete the specified resource in storage.
     */
    public function delete(Request $request)
    {
        $categoryModel = new Category();
        $id_category = $request->post('id');
        $categoryModel->deleteCategory($id_category);

        return redirect()->route('categories');

    }

    /**
     * Restore the specified resource in storage.
     */
    public function restore(Request $request)
    {
        $categoryModel = new Category();
        $id_category = $request->post('id');
        $categoryModel->restoreCategory($id_category);

        return back();

    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $categoryModel = new Category();
        $id_category = $request->post('id');
        $categoryModel->destroyCategory($id_category);

        return redirect()->route('categoryShowDeleted');

    }
}
