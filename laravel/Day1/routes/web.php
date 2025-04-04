<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts;


Route::get('/', [Posts::class, 'index'])->name('posts.index');
Route::get('/create', [Posts::class, 'create'])->name('posts.create');
Route::post('/', [Posts::class, 'store'])->name('posts.store');
Route::patch('/edit/{post}/', [Posts::class, 'edit'])->name('posts.edit');
Route::get('/post/{post}/', [Posts::class, 'show'])->name('posts.show');
Route::get('/edit/{post}/', action: [Posts::class, 'editpage'])->name('posts.editpage');
Route::get('/delete/{post}/', [Posts::class, 'delete'])->name('posts.delete');


