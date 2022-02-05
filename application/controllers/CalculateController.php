<?php
class CalculateController extends CI_Controller {

    public function calculate_forward(CI_Input $input, array $bergatung)
    {
        $kode = $input->get('kode');
        $deskripsi = $input->get('deskripsi');
        $durasi = $input->get('durasi');

        $new_arr = [];
        foreach ($kode as $index_kode => $row_kode) {
            $new_arr[$index_kode] = [
                'deskripsi' => $deskripsi[$index_kode],
                'durasi' => $durasi[$index_kode],
            ];
        }
    }

}

