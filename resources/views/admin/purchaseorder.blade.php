@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title bg-transparent">Listado de Ordenes de Compra</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="purchasetabla" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Referencia</th>
                                    <th>Fecha Pedido</th>
                                    <th>Fecha Aprobacion</th>
                                    <th>Proveedor</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Referencia</th>
                                    <th>Fecha Pedido</th>
                                    <th>Fecha Aprobacion</th>
                                    <th>Proveedor</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#purchasetabla').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.purchase.list') }}",
                paginate: true,
                length: 5,
                order: [ 0, 'desc' ],
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'order_name',
                        name: 'order_name'
                    },
                    {
                        data: 'date_order',
                        name: 'date_order'
                    },
                    {
                        data: 'date_approve',
                        name: 'date_approve'
                    },
                    {
                        data: 'partname',
                        name: 'partname'
                    },
                    {
                        data: 'state',
                        name: 'state'
                    },
                    {
                        data: 'accion',
                        name: 'accion',
                        orderable: true,
                        searchable: true
                    },
                ],
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 filas','10 filas', '25 filas', '50 filas', 'Mostrar Todas']
                ],
                buttons: [
                    'copy', 'print', 'spacer', 'csv', 'excel', 'pdf', 'spacer', 'pageLength'
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
                }
            });

        });
    </script>

@stop

