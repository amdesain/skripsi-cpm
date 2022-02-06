<?php
class AppController extends CI_Controller 
{

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
        require_once(APPPATH.'controllers/CalculateController.php');
        $calculate_controller = new CalculateController();

        $calculate = $calculate_controller->calculate($this->input);

        $main_arr = $calculate['main_arr'];
        $critcal_path = $calculate['critical_path'];
        $float_path = $calculate['float_path'];

        return [
            'kode' => $this->input->get('kode'),
            'deskripsi' => $this->input->get('deskripsi'),
            'bergantung' => $this->input->get('bergantung'),
        ];
    }

}
