<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=User::all();
        $tags=Tags::all();
        $post= Post::all()->map(function($e){
            $e->usuario;
            return $e;
        });
        $data=["post"=>$post,"recursos"=>["tags"=>$tags,"usuarios"=>$usuarios]];
        return view("post",$data);
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
    public function store(Request $r)
    {
        $r->validate([
            'usuario' => 'required',
            'titulo' => 'required',
            'contenido' => 'required',
        ]);

        $p=new Post();
        $p->user_id=$r->usuario;
        $p->titulo=$r->titulo;
        $p->sub_titulo=$r->subtitulo;
        $p->categoria=$r->categoria;
        $p->portada=$r->portada;
        $p->contenido=$r->contenido;
        $p->tags=$r->tags;
        $p->save();

        return response()->json([
            'message' => 'Post Creado con exito',
            'data' => $p,
            'status' => 200,
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $r->validate([
            'usuario' => 'required',
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        $p = Post::find($id);
        $p->user_id=$r->usuario;
        $p->titulo=$r->titulo;
        $p->sub_titulo=$r->subtitulo;
        $p->categoria=$r->categoria;
        $p->portada=$r->portada;
        $p->contenido=$r->contenido;
        $p->tags=$r->tags;
        $p->save();

        return response()->json([
            'message' => 'Post Actualizado con exito',
            'data' => $p,
            'status' => 200,
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
