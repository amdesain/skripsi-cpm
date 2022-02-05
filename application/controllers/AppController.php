<?php
class AppController extends CI_Controller {

	public function index()
	{
        $result = [];

        // jika ada inputan kode
        $kode = ($this->input->get('kode') ?? []);
        if (count($kode) > 0 and $kode[0]) {
            $result = $this->generate_data();
        }

        $data = $result;

		$this->load->view('app', $data);
	}

    private function generate_data(): array
    {
        $bergantung_array = $this->rearrange_bergantung($this->input->get('bergantung'));

        require_once(APPPATH.'controllers/CalculateController.php');
        $calculate_controller = new CalculateController();

        $calculate_controller->calculate_forward($this->input, $bergantung_array);

        return [
            'kode' => $this->input->get('kode'),
            'deskripsi' => $this->input->get('deskripsi'),
            'bergantung' => $this->input->get('bergantung'),
        ];
    }

    private function rearrange_bergantung(array $bergantung)
    {
        foreach ($bergantung as &$bergantung_row) {
            $bergantung_row = explode(',', trim($bergantung_row));
        }

        return $bergantung;
    }
}
