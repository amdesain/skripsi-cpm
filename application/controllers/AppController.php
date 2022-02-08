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
        $data['input'] = $this->input;

		$this->load->view('app', $data);
	}

    private function generate_data(): array
    {
        require_once(APPPATH.'controllers/CalculateController.php');
        $calculate_controller = new CalculateController();

        $calculate = $calculate_controller->calculate($this->input);

        $main_arr = $calculate['main_arr'];
        $critical_path = $calculate['critical_path'];
        $float_path = $calculate['float_path'];

        $format_critical_path = $this->format_critical_path($critical_path);
        $critical_path_formated = $format_critical_path['result'];
        $total_days = $format_critical_path['total_days'];
        $float_path_formated = $this->format_float_path($float_path);

        return [
            'main_arr' => $main_arr, 
            'critical_path_formated' => $critical_path_formated, 
            'total_days' => $total_days, 
            'float_path_formated' => $float_path_formated, 
        ];
    }

    public function format_critical_path(array $critical_path)
    {
        $result = [];
        $total_days = 0;
        foreach ($critical_path as $index => $row) {
            $result[] = $row['kode'];

            if (count($critical_path)-1 == $index) {
                $total_days = $row['lf'];
            }
        }

        return [
            'result' => implode('->', $result),
            'total_days' => $total_days
        ];
    }

    public function format_float_path(array $float_path)
    {
        $result = [];
        foreach ($float_path as $row) {
            $result[] = $row['kode']." (".$row['tf']." hari)";
        }

        return implode(', ', $result);
    }

}
