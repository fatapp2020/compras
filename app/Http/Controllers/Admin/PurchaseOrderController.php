<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;  
use Illuminate\Support\Facades\DB;
use DataTables;


class PurchaseOrderController extends Controller
{
    //
    public function index(){ 
        
        // dd(PurchaseOrder::all());
        //  $SQL = 'Select * from purchase_order';
        //  $purchaseorder=DB::connection('pgsql')->select($SQL);
        //  return view('admin.purchaseorder',['purchaseorder'=>$purchaseorder]);
         return view('admin.purchaseorder');
        // dd($purchaseorder);
}

public function getPurchase(Request $request)
{
    $search = $request->get('search');
    // dd($search);
    // $keyword = $search['value'] ? '#' : '#';

    if (!isset($search['value'])) {
        $purchaseorder = DB::connection('pgsql')
            ->table('purchase_order')
            ->select('purchase_order.id as id','purchase_order.name as order_name','purchase_order.date_approve as date_approve',
            'purchase_order.date_order as date_order','purchase_order.state as state','res_partner.name as partname')
            ->join('res_partner', 'res_partner.id', '=', 'purchase_order.partner_id')
            ->take(100)
            ->orderBy('purchase_order.id', 'Desc')
            ->get();
    } else {
        $keyword = $search['value'];
        $purchaseorder = DB::connection('pgsql')
        ->table('purchase_order')
        ->select('purchase_order.id as id','purchase_order.name as order_name','purchase_order.date_approve as date_approve',
        'purchase_order.date_order as date_order','purchase_order.state as state','res_partner.name as partname')
        ->join('res_partner', 'res_partner.id', '=', 'purchase_order.partner_id')
        ->take(100)
        ->orderBy('purchase_order.id', 'Desc')
            ->where('purchase_order.name', 'like', '%' . $keyword . '%')
            ->orWhere('res_partner.name', 'like', '%' . $keyword . '%')
            // ->orWhere('Autos', 'like', '%' . $keyword . '%')
            ->take(100)
            ->get();
    }
   
    return DataTables::of($purchaseorder)
        ->addIndexColumn()
        ->addColumn('accion', function ($purchaseorder) {
            return $this->getActionColumn($purchaseorder);
        })
        ->addColumn('date_order', function ($row) {
            $date = date("d-m-Y", strtotime($row->{"date_order"}));
            return $date;
        })
        ->addColumn('date_approve', function ($row) {
            $date = date("d-m-Y", strtotime($row->{"date_approve"}));
            return $date;
        })
        ->rawColumns(['accion'])
        ->make(true);
}
protected function getActionColumn($purchaseorder): string
{
    $route = route('admin.purchase.getPedido', $purchaseorder->id);
        return '<a class="btn btn-outline-primary" href="' . $route . '" > Ver Pedido </a>';
    }

    // Funciones para llenar los SELECT e INPUTS de la 2 vista

    public function getPedido($idPedido){    
        $Productos = DB::connection('pgsql')
            ->table('purchase_order')
            ->select(
                // 'purchase_order.name as referencia', 
                'product_template.name as producto', 
                'purchase_order_line.name as descripcion', 
                'purchase_order_line.product_uom_qty as cantidad', 
                'purchase_order_line.price_unit as precioUni', 
                'purchase_order_line.price_subtotal as subTotal', 
                'purchase_order_line.price_total as total', 
                'purchase_order_line.price_tax as impuestos')
            ->join('purchase_order_line', 'purchase_order_line.order_id', '=', 'purchase_order.id')
            ->join('product_template', 'product_template.id', '=', 'purchase_order_line.product_id')
            ->where('purchase_order.id', $idPedido)        
            ->get();
            $purchaseorder = DB::connection('pgsql')
        ->table('purchase_order')
        ->select('purchase_order.id as id','purchase_order.name as order_name','purchase_order.date_approve as date_approve',
                 'purchase_order.date_order as date_order','purchase_order.state as state','res_partner.name as partname')
        ->join('res_partner', 'res_partner.id', '=', 'purchase_order.partner_id')
        ->where('purchase_order.id', '=', $idPedido)
        ->get();
          

        return view('admin.pedido',['Purchaseorder'=>$purchaseorder] ,['Productos'=>$Productos]); }

  
//fin de clase
}
