@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex mb-2 justify-content-between">
                <h1>Post Manager</h1>
                <button class="btn btn-success" id="addBtn" data-bs-toggle="modal" data-bs-target="#modalAdd">Añadir</button>
            </div>
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Tíulo</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Portada</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Time</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->usuario->name}}</td>
                                <td>{{$p->titulo}}</td>
                                <td>{{$p->categoria}}</td>
                                <td>{{$p->portada}}</td>
                                <td>
                                    @php
                                        $tags=explode(",",$p->tags);
                                        foreach ($tags as $t ) {
                                            foreach ($recursos["tags"] as $t1) {
                                               if($t1->id==$t){
                                                echo $t1->nombre."<br>";
                                                break;
                                               }
                                            }
                                        }
                                    @endphp
                                <td>Creado:{{$p->created_at}} <br>
                                    Actualizado: {{$p->created_at}}</td>
                                <td>
                                    <div class="d-flex">

                                          <button type="button" name="" id="" class="btn btn-success">Ver</button>
                                          <button type="button" class="btn btn-primary" onclick="editPost({{$p->id}})">Editar</button>
                                          <button type="button" name="" id="" class="btn btn-danger">Eliminar</button>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Añadir Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                   <form action="#" id="formAdd">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <select class="form-select" name="usuario" id="usuario">
                            <option selected>Seleciona el Usario</option>
                            @foreach ($recursos["usuarios"] as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="mb-3">
                        <label for="Titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Aqui escribe el titulo ">
                      </div>
                      <div class="mb-3">
                        <label for="subtitulo" class="form-label">Subtitulo</label>
                        <input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="Aqui escribe el subtitulo">
                      </div>

                      <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Aqui escribe el titulo ">
                      </div>
                      <div class="mb-3">
                        <label for="portada " class="form-label">Portada</label>
                        <input type="text" class="form-control" name="portada" id="portada" placeholder="Aqui escribe el titulo ">
                      </div>
                      <div class="mb-3">
                        <label for="contenido " class="form-label">Contenido</label>
                        <input type="text" class="form-control" name="contenido" id="contenido" placeholder="Aqui escribe el titulo ">
                      </div>
                      <div class="mb-3">
                        <label for="portada " class="form-label">Tags</label>
                        <select class="form-select" name="tags" id="tags" >
                            <option selected>Seleciona el Usario</option>
                            @foreach ($recursos["tags"] as $u)
                            <option value="{{$u->id}}">{{$u->nombre}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div id="tagsContainer">

                      </div>
                   </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addSave">Save</button>
            </div>
        </div>
    </div>
</div>






@endsection

@section("scripts")
    <script >
        const mainData = {{ Js::from($post)}}
        const mainRecursos = {{ Js::from($recursos)}}


        const findTag = (id) =>{
            let el;
            mainRecursos.tags.every((e)=>{
                if(e.id==id){
                    el=e;
                    return false
                }
                return true;
            })
            return el;
        }
        const deleteTag=(el) =>{
            $(el).remove()
        }
        const findPost = (id) =>{
            let el;
            mainData.every((e)=>{
                if(e.id==id){
                    el=e;
                    return false
                }
                return true;
            })
            return el;
        }
        const editPost = (id) =>{
            const post = findPost(id);
            if(post==undefined){return}
            console.log(post);
            $("#usuario").val(post.user_id);
            $("#titulo").val(post.titulo);
            $("#subtitulo").val(post.sub_titulo);
            $("#categoria").val(post.categoria);
            $("#portada").val(post.portada);
            $("#contenido").val(post.contenido);
            $("#tagsContainer").empty();
            let tagsId= post.tags.split(",");
            tagsId.forEach((tagId)=>{
                let tag= findTag(tagId);
                $("#tagsContainer").append(`
                <span class="badge bg-secondary tagBadge" style="cursor:pointer" onclick="deleteTag(this)" data-id="${tag.id}" >${tag.nombre} X </span>
                `)
            })
            $("#formAdd").data("update",1)
            $("#formAdd").data("id",post.id);
            $("#modalTitleId").html("Actualizar Post "+post.id)
        }

    </script>
    <script type="module">
        $("#tags").change(function (e) {
           let tagId=$("#tags").val()
           if(tagId==null||tagId==""){return};
           let tag= findTag(tagId);
           $("#tagsContainer").append(`
           <span class="badge bg-secondary tagBadge" style="cursor:pointer" onclick="deleteTag(this)" data-id="${tag.id}" >${tag.nombre} X </span>
           `)
        });
        $("#addSave").click(function (e) {
            let inputs = $("#formAdd").serializeArray();
            let data={}
            inputs.forEach((e)=>{
                data[e.name]=e.value;
            })
            data.tags=[];
            $("#tagsContainer .tagBadge").each((i,e)=>{
                data.tags.push($(e).data("id"));
            })
            data.tags=data.tags.toString();

            if($("#formAdd").data("update")==1){
                let id=$("#formAdd").data("id");

                axios.put("post/"+id,data).then((e)=>{
                mainData.push(e.data.data)
            })
            }else{
                axios.post("",data).then((e)=>{
                mainData.push(e.data.data)
            })
            }






        });
    </script>
@endsection
