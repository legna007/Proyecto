@extends('layoutsNEW.app_layout')

@section('title') {{ $nombre }} @endsection

@section('content_title')  {{ $nombre }} @endsection

@section('content2')
    <style>
        form #formAddUpdateNomenclature {
            /*max-width: 600px!important;*/
            margin: 0 auto!important;
            background: #fff!important;
            padding: 20px!important;
            border-radius: 8px!important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1)!important;
        }

        fieldset {
            border: 1px solid #ddd!important;
            border-radius: 4px!important;
            margin-bottom: 20px!important;
            padding: 15px!important;
        }

        legend {
            font-size: 1.2em !important;
            color: #333 !important;
            font-weight: bold !important;
            position: sticky;
            margin-top: -30px;
            background: white;
            width: auto;
        }

        #img-preview {
            display: none;
            width: 100%;
            border: 2px dashed #333;
            margin-bottom: 20px;
        }
        #img-preview img {
            width: 100%;
            height: auto;
            display: block;
        }
        [type="file"] {
            height: 0;
            width: 0;
            overflow: hidden;
        }
        [type="file"] + label {
            font-family: sans-serif;
            background: #f44336;
            padding: 5px 20px;
            border: 2px solid #f44336;
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
            transition: all 0.2s;
            width: 100%;
        }
        [type="file"] + label:hover {
            background-color: #fff;
            color: #f44336;
        }

        [type="file"] + label:hover svg{
            fill: red!important;
            stroke: red!important;
        }


    </style>

    <div class="card-box pb-10">
        <div class="h5 pd-20 mb-0">
            {{ __('Gestionar nomenclador') }} <b>"{{$nombre}}"</b>
        </div>
        <div class="divBody pl-3 pr-3 pb-6">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card-body">

                @if(isset($modelToUpdate) && $modelToUpdate!=null)
                <form method="POST" id="formAddUpdateNomenclature" action="{{ route('nomenclador.update', [ 'tipo' => $tipo, 'nombre' => $nombre, 'id' => $modelToUpdate->id ]) }}" @if(isset($models[0]->img_path)) enctype="multipart/form-data" @endif>
                    @else
                <form method="POST" id="formAddUpdateNomenclature" action="{{ route('nomenclador.store', [ 'tipo' => $tipo, 'nombre' => $nombre ]) }}" @if(isset($models[0]->img_path)) enctype="multipart/form-data" @endif>
                @endif
                    @csrf

                    @if(isset($modelToUpdate) && $modelToUpdate!=null)
                        {{ method_field('PUT') }}
                    @endif
                    <fieldset>
                        <legend id="newElement12">{{(isset($modelToUpdate) && $modelToUpdate!=null)? 'Modificar' : 'Nuevo/a' }} {{ $nombre }}</legend>

                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <input required class="form-control" placeholder="Escriba el nombre..." name="descripcion" type="text" id="descripcion" value="@if($modelToUpdate!=null) {{$modelToUpdate->descripcion}} @endif">
                                </div>
                            </div>

                            <div class="col-2">
                                @if( isset($modelToUpdate) && $modelToUpdate!=null)
                                        <input type="submit" value="Actualizar" class="btn btn-primary btn-sm btn-lg btn-block" />
                                        <input type="button" onclick="location.href='{{route('nomenclador.index', [ 'tipo' => $tipo, 'nombre' => $nombre])}}'" value="Cancelar" class="btn btn-outline-danger btn-sm btn-lg btn-block" />
                                    @else
                                        <input type="submit" value="Agregar" class="btn btn-primary btn-sm btn-lg btn-block" />
                                @endif
                            </div>
                        </div>

                    </fieldset>
                </form><br/>



                <div class="table-responsive">
                    <table class="table hover multiple-select-row data-table-export nowrap dataTable no-footer dtr-inline" style="font-size:14px;" id="nomenclature_table" width="100%" cellspacing="0">
                        <thead class="thead">
                        <tr>
                            <th>No</th>
                            <th>Nombre</th>
                            <th>Activo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        @foreach ($models as $model)
                            <tr>
                                <td style="width: 3%!important;">{{ $i }}</td>
                                <td>
                                    {{ $model->descripcion }}
                                </td>
                                <td style="width: 5%!important;">
                                    {{ ($model->activo)? 'SI' : 'NO' }}
                                </td>
                                <td style="width: 12%!important;">
                                    <a href="{{ route('nomenclador.index', [ 'tipo' => $tipo, 'nombre' => $nombre, 'id' => $model->id ]) }}" class="btn btn-sm btn-success btnEditRegistry" data-modelid="{{ $model->id }}" title="Editar"><svg class="svg-inline--fa fa-pen-to-square fa-fw" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-to-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"></path></svg></a>
                                    <form id="formDelete-{{ $model->id }}" method="POST" action="{{ route('nomenclador.delete', [ 'tipo' => $tipo, 'nombre' => $nombre, 'id' => $model->id ]) }}" style="display: contents!important;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm btnDeleteRegistry" data-modelid="{{ $model->id }}" title="Eliminar Registro"><svg class="svg-inline--fa fa-trash fa-fw" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg><!-- <i class="fa fa-fw fa-trash"></i> Font Awesome fontawesome.com --> </button>
                                    </form>
                                </td>
                            </tr>

                            <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    </div>
    
    @section('js_adicional')
    <script>

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.data-table-export').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search",
                    paginate: {
                        next: '<i class="ion-chevron-right"></i>',
                        previous: '<i class="ion-chevron-left"></i>'  
                    }
                },
                dom: 'Bfrtp',
                buttons: [
                'copy', 'csv', 'pdf', 'print'
                ]
            });

        });

        /*const chooseFile = document.getElementById("choose-file");
        const imgPreview = document.getElementById("img-preview");

        chooseFile.addEventListener("change", function () {
            getImgData();
        });

        function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function () {
                    imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<img src="' + this.result + '" />';
                });
            }
        }*/


    </script>
    @endsection
@endsection

