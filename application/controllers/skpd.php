<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skpd extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom and Aditya Nursyahbani
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman WP
     **/

    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $d['judul']             ="list_skpd";
            $d['judul_halaman']     = "Daftar SKPD (Satuan Kerja Perangkat Daerah)";
            $d['judul_breadcumb']   = "skpd";

            $d['all_skpd']	    = $this->app_model->get_all_skpd();

            $d['content']= $this->load->view('skpd/view',$d,true);
            $this->load->view('home',$d);
        }else{
            header('location:'.base_url().'index.php/login');
        }
    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $d['judul']='add_skpd';
            $d['judul_halaman']='Tambah SKPD';
            $d['judul_breadcumb']   = "skpd/tambah";

            $d['code']      = '';
            $d['name']      = '';
            $d['desc']      = '';
            $d['lead']        = '';

			$text_lead = "SELECT * FROM tbl_admin";
			$d['l_lead'] = $this->app_model->manualQuery($text_lead);

            $d['content']= $this->load->view('skpd/form',$d,true);
            $this->load->view('home',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan (){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $up['skpd_lead']	= $this->input->post('lead');
            $up['skpd_code']    = $this->input->post('code');
            $up['skpd_name']	= $this->input->post('name');
            $up['skpd_desc']	= $this->input->post('desc');
            $up['skpd_lead']    = $this->input->post('lead');

            $id['skpd_code']	= $this->input->post('code');

            $data = $this->app_model->getSelectedData("tbl_skpd",$id);

            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_skpd",$up,$id);

            }else{
                $this->app_model->insertData("tbl_skpd",$up);
            }
        }else{
            header('location:'.base_url());
        }
    }

    public function edit(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $d['judul']='edit_skpd';
            $d['judul_halaman']='Edit SKPD (Satuan Kerja Perangkat Daerah)';
            $d['judul_breadcumb'] = '#';

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_skpd WHERE skpd_code='$id'";
            $data = $this->app_model->manualQuery($text);

            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['code']	   = $id;
                    $d['name']	   = $db->skpd_name;
                    $d['desc']     = $db->skpd_desc;
                    $d['lead']       = $db->skpd_lead;
                    //$d['pm']       = $db->nm_pm;
                    //$d['ce']       = $db->nm_ce;
                }
            }else{

                $d['code']		    = $id;
                $d['name']		    = '';
                $d['desc']          = '';
                $d['lead']            = '';
                //$d['pm']            = '';
                //$d['ce']            = '';
            }

			$text_lead = "SELECT * FROM tbl_admin";
			$d['l_lead'] = $this->app_model->manualQuery($text_lead);

            $d['content']= $this->load->view('skpd/form',$d,true);
            $this->load->view('home',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_skpd WHERE skpd_code='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/skpd'>";
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file skpd.php */
/* Location: ./application/controllers/skpd.php */