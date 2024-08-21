<?php namespace App\Controllers;

use App\Models\KelasModel;

class Datakelas extends BaseController
{
    public function index()
    {
        $model = new KelasModel();
        $data['kelas'] = $model->findAll();
        return view('datakelas', $data);
    }

    public function create()
    {
        $model = new KelasModel();
        $data = [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'jurusan'    => $this->request->getPost('jurusan'),
        ];
        $model->save($data);
        return redirect()->to('/datakelas');
    }

    public function update()
    {
        $model = new KelasModel();
        $id = $this->request->getPost('id_kelas');
        $data = [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'jurusan'    => $this->request->getPost('jurusan'),
        ];
        $model->update($id, $data);
        return redirect()->to('/datakelas');
    }

    public function delete()
    {
        $model = new KelasModel();
        $id = $this->request->getPost('id_kelas');
        $model->delete($id);
        return redirect()->to('/datakelas');
    }

    public function get_by_id()
    {
        $model = new KelasModel();
        $id = $this->request->getGet('id_kelas');
        $data = $model->find($id);
        return $this->response->setJSON($data);
    }
}
