<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Load the DB, files and views model in construct
	 */
	public function __construct() {

		parent::__construct();
		$this->load->model('files_model');
		$this->load->model('views_model');
		$this->load->database();

	}

	/**
     * Upload the image and store the details in DB
     */
	public function index() {

		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		if ($_POST) {
			$config = array(
				'upload_path' => "./uploadimage/",
				'allowed_types' => "gif|jpg|png|jpeg", // Only accept files with these extensions
				'overwrite' => FALSE, //if same name image uploaded, generate with new name.
				'max_size' => "2048000", // here it is 2 MB(2048 Kb)
				'max_height' => "1920",
				'max_width' => "1080"
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload()) {
				$data = $this->upload->data();
				$fileId = $this->files_model->insert_file($data['file_name'], $_POST['title']);
				if ($fileId) {
					$this->session->set_flashdata('item', 'Your post is successfully uploaded!');
				}
			} else {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('item', $error['error']);
			}
			redirect('');
		} else {
			// Visitors views stored in DB
			$this->views_model->insert_view();
		}
		$files = $this->files_model->get_files(); //Get the list if files from DB
		$views = $this->views_model->get_views(); //Get the visitors views.

		// set the values to html view
		$this->load->view('home',
			array(
				'files' => $files,
				'uploadCount' => count($files),
				'viewCount' => $views[0]->visit
			)
		);

	}

	/**
	 * Export from DB to CSV
	 */
	public function export() {

		$this->load->helper('download');
		$this->load->helper('file');

		$row  = $this->files_model->export();
		$name = 'image-list.csv';

		force_download($name,$row);
	}
}
