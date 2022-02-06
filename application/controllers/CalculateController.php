<?php
class CalculateController extends CI_Controller 
{

    public function calculate(CI_Input $input)
    {
        $bergantung = $this->make_array_bergantung($input->get('bergantung'));

        $main_arr = $this->rearrage_array($input, $bergantung);
        $main_arr = $this->calculate_forward($main_arr);
        $main_arr = $this->calculate_backward($main_arr);

        print_r($main_arr);
        die();
    }

    private function make_array_bergantung(array $bergantung): array
    {
        foreach ($bergantung as &$bergantung_row) {
            if ($bergantung_row) {
                $bergantung_row = explode(',', trim($bergantung_row));
            } else {
                $bergantung_row = [];
            }
        }

        return $bergantung;
    }

    private function rearrage_array(CI_Input $input, array $bergantung): array
    {
        $kode = $input->get('kode');
        $deskripsi = $input->get('deskripsi');
        $durasi = $input->get('durasi');

        $new_arr = [];
        foreach ($kode as $index_kode => $row_kode) {
            $new_arr[] = [
                'kode' => $row_kode,
                'deskripsi' => $deskripsi[$index_kode],
                'durasi' => $durasi[$index_kode],
                'bergantung' => $bergantung[$index_kode]
            ];
        }

        return $new_arr;
    }

    private function calculate_forward(array $arr): array
    {
        foreach ($arr as $index => &$row) {

            if ($index == 0) {
                // early start
                $row['es'] = 1;
                // duration
                $row['d'] = $row['durasi'];
                // early finish
                $row['ef'] = $row['es'] + $row['d'] - 1;
                continue;
            }

            if (count($row['bergantung']) > 0) {
                $temp_ef = [];
                foreach ($row['bergantung'] as $index_bergantung => $row_bergantung) {
                    $temp_ef[] = $this->search_array_by_code($row_bergantung, $arr)['ef'] ?? 0;
                }

                // early start
                $row['es'] = max($temp_ef) + 1;
                // duration
                $row['d'] = $row['durasi'];
                // early finish
                $row['ef'] = $row['es'] + $row['d'] - 1;
            }
        }

        return $arr;
    }

    private function calculate_backward(array $arr): array
    {
        $reverse_array = array_reverse($arr);

        foreach ($reverse_array as $index => &$row) {
            if ($index == 0) {
                // late finish
                $row['lf'] = $row['ef'];
                // late start
                $row['ls'] = $row['lf'] - $row['d'] + 1;
                // total float
                $row['tf'] = $row['ls'] - $row['es'];
                continue;
            }
        }

        return array_reverse($reverse_array);
    }

    private function search_array_by_code($kode, $array): array|null 
    {
        foreach ($array as  $row) {
            if ($row['kode'] === $kode) {
                return $row;
            }
        }
        return null;
    }

    private function search_array_by_depends($kode, $array): array 
    {
        $result = [];
        foreach ($array as  $row) {
            if ($row['kode'] === $kode) {
                return $row;
            }
        }

        return $result;
    }

}

