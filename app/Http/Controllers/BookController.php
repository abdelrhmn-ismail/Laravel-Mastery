<?php

namespace App\Http\Controllers;

use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookRepository;

    public function __construct(RepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        $books = $this->bookRepository->getAll();
        return response()->json(['data' => $books]);
    }

    public function create()
    {
        // You can return a JSON response for create if needed.
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'published_year' => 'required|integer',
        ]);

        $createdBook = $this->bookRepository->create($data);

        return response()->json(['data' => $createdBook], 201); // 201 Created status code
    }

    public function show($id)
    {
        $book = $this->bookRepository->find($id);
        return response()->json(['data' => $book]);
    }

    public function edit($id)
    {
        // You can return a JSON response for edit if needed.
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'published_year' => 'required|integer',
        ]);

        $updatedBook = $this->bookRepository->update($id, $data);

        return response()->json(['data' => $updatedBook]);
    }

    public function destroy($id)
    {
        $this->bookRepository->delete($id);

        return response()->json(['message' => 'Book deleted successfully']);
    }
}
