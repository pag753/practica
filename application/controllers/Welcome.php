<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Headers: *');
        header("Access-Control-Allow-Origin: *");
    }

	public function index()
	{
	    $this->load->view('welcome_message');
	}

	public function carros($id)
    {
        $this->load->model("Modelo");
        $carros = $this->Modelo->getCarros($id);
        print_r(json_encode($carros));
    }

    public function usuario()
    {
        $id = $_GET['id'];
        $pass = $_GET['passwd'];
        $this->load->model("Modelo");
        $carros = $this->Modelo->getUsuario($id, $pass);
        print_r(json_encode($carros));
    }

    public function nuevoCarro()
    {
        $placas = $_GET['placas'];
        $lat = $_GET['lat'];
        $lon = $_GET['lon'];
        $usuario = $_GET['usuario'];
        $this->load->model("Modelo");
        $carros = $this->Modelo->nuevoCarro($placas, $lat, $lon, $usuario);
        print_r(json_encode($carros));
    }

    public function updateCarro()
    {
        $id = $_GET['id'];
        $placas = $_GET['placas'];
        $lat = $_GET['lat'];
        $lon = $_GET['lon'];
        $this->load->model("Modelo");
        $carros = $this->Modelo->updateCarro($id, $placas, $lat, $lon, $usuario);
        print_r(json_encode($carros));
    }

    public function deleteCarro()
    {
        $id = $_GET['id'];
        $this->load->model("Modelo");
        $carros = $this->Modelo->deleteCarro($id);
        print_r(json_encode($carros));
    }
}
