@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
@foreach ($Purchaseorder as $Po)
    <i class="fa fa-user-edit"></i> {{ $Po->order_name }}
@endforeach    
@stop

@section('content')
@csrf
@foreach ($Productos as $Producto)
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h3 class="card-title bg-transparent"><strong>Orden de compra: </strong> {{ $Po->order_name }} </h3>
                <br>
                <h3 class="card-title bg-transparent"><strong>Provedor: </strong> {{ $Po->partname }} </h3>
                <div class="card-header">
                   <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="demanda">Fecha de REcepcio</label>
                            <input id="demanda" type="date" name="demanda"
                                class="form-control" placeholder="Dato"
                                required="required"
                                {{-- value="{{ date('Y-m-d', strtotime($Siniestro->{"Fecha de Dem"})) }}" --}}
                                data-error="demanda es requerido.">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="demanda">Fecha de pedido</label>
                            <input id="demanda" type="date" name="demanda"
                                class="form-control" placeholder="Dato"
                                required="required"
                                {{-- value="{{ date('Y-m-d', strtotime($Siniestro->{"Fecha de Dem"})) }}" --}}
                                data-error="demanda es requerido.">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="demanda">usuario</label>
                            <input id="demanda" type="date" name="demanda"
                                class="form-control" placeholder="Dato"
                                required="required"
                                {{-- value="{{ date('Y-m-d', strtotime($Siniestro->{"Fecha de Dem"})) }}" --}}
                                data-error="demanda es requerido.">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="demanda">Empresa</label>
                            <input id="demanda" type="date" name="demanda"
                                class="form-control" placeholder="Dato"
                                required="required"
                                {{-- value="{{ date('Y-m-d', strtotime($Siniestro->{"Fecha de Dem"})) }}" --}}
                                data-error="demanda es requerido.">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="demanda">Aprobado Por</label>
                            <input id="demanda" type="date" name="demanda"
                                class="form-control" placeholder="Dato"
                                required="required"
                                {{-- value="{{ date('Y-m-d', strtotime($Siniestro->{"Fecha de Dem"})) }}" --}}
                                data-error="demanda es requerido.">
                        </div>
                    </div>
                </div>
                </div>
            </div>
             
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h3 for="Referencia">Referencia</h3>
                                                    <input id="Referencia" type="text" name="Referencia"
                                                        class="form-control font-weight-bolder texto-grande text-dark"
                                                        placeholder="Dato" required="required"
                                                        value="{{ $Producto->producto }}"
                                                        data-error=" Referencia es requerido.">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h3 for="raj">R.A.J.</h3>
                                                    <input id="raj" type="text" name="raj"
                                                        class="form-control font-weight-bolder texto-grande text-dark"
                                                        {{-- value="{{ $Siniestro->nRajSM }}" placeholder="Dato" --}}
                                                        required="required" data-error="raj es requerido.">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="siniestro">Siniestro</label>
                                                    <input id="fechasiniestro" type="date" name="fechasiniestro"
                                                        class="form-control" placeholder="Dato"
                                                        required="required"
                                                        {{-- value="{{ date('Y-m-d', strtotime($Siniestro->{"Fecha de Stro"})) }}" --}}
                                                        data-error="siniestro es requerido.">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="demanda">Demanda</label>
                                                    <input id="demanda" type="date" name="demanda"
                                                        class="form-control" placeholder="Dato"
                                                        required="required"
                                                        {{-- value="{{ date('Y-m-d', strtotime($Siniestro->{"Fecha de Dem"})) }}" --}}
                                                        data-error="demanda es requerido.">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="denuncia">Denuncia</label>
                                                    <input id="denuncia" type="date" name="denuncia"
                                                        class="form-control" placeholder="Dato"
                                                        required="required"
                                                        {{-- value="{{ date('Y-m-d', strtotime($Siniestro->{"Fecha de Den"})) }}" --}}
                                                        data-error="denuncia es requerido.">
                                                </div>
                                            </div>
                                        </div>



                                    </div>                                
                                   

                                </div>

                                <div class="row">
                                    <hr style="width:100%; color:#007bf;" , size="3" , color=#007bff>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 d-flex justify-content-center">
                                        <input type="submit"
                                            class="btn btn-primary btn-send my-2 mx-auto px-4 py-2 text-white text-uppercase"
                                            value="Guardar">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endforeach


@stop
