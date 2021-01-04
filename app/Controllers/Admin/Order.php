<?php

namespace App\Controllers\Admin;

use App\Models\OrderModels;
use App\Controllers\BaseController;

class Order extends BaseController
{
    protected $orderModel;
    public function __construct()
    {
        $this->orderModel = new OrderModels();
    }
    public function index()
    {
        $data['order'] = $this->orderModel->where('id_user', session('id_user'))->findAll();
        return view('admin/order/index', $data);
    }
    
    public function detail($id)
    {
        $data['order'] = $this->orderModel->where('id_order', $id)->first();
        return view('admin/order/detail', $data);
    }
    public function updatestatus($id)
    {
        $this->orderModel->save([
            'id_order' => $id,
            'status_order' => $this->request->getVar('status_order'),
        ]);
        session()->setFlashdata('pesan', 'Data order berhasil diupdate');
        return redirect()->to('/admin/order');
    }
    //--------------------------------------------------------------------

}
