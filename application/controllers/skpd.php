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
            $d['prg']= $this->config->item('prg');
            $d['web_prg']= $this->config->item('web_prg');

            $d['nama_program']= $this->config->item('nama_program');
            $d['instansi']= $this->config->item('instansi');
            $d['usaha']= $this->config->item('usaha');
            $d['alamat_instansi']= $this->config->item('alamat_instansi');


            $d['judul']         ="list_stkk";
            $d['judul_halaman'] = "Daftar SKPD (Satuan Kerja Perangkat Daerah)";

            $d['all_stkk']	    = $this->app_model->get_all_stkk();

            $d['content']= $this->load->view('skpd/view',$d,true);
            $this->load->view('home',$d);
        }else{
            header('location:'.base_url().'index.php/login');
        }
    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $d['prg']           = $this->config->item('prg');
            $d['web_prg']       = $this->config->item('web_prg');

            $d['nama_program']  = $this->config->item('nama_program');
            $d['instansi']      = $this->config->item('instansi');
            $d['usaha']         = $this->config->item('usaha');
            $d['alamat_instansi']= $this->config->item('alamat_instansi');

            $d['judul']='add_stkk';
            $d['judul_halaman']='Tambah SKPD';

            $d['code']      = '';
            $d['name']      = '';
            $d['desc']      = '';
            $d['kp']        = '';
            $d['pm']        = '';
            $d['ce']        = '';

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
            $nama = $this->app_model->CariUserPengguna();
            $up['username']	    = $nama;
            $up['stkk_code']    = $this->input->post('code');
            $up['stkk_name']	= $this->input->post('name');
            $up['stkk_desc']	= $this->input->post('desc');
            $up['username']= $this->input->post('lead');
            //$up['nm_pm']	    = $this->input->post('pm');
            //$up['nm_ce']	    = $this->input->post('ce');

            $id['stkk_code']	= $this->input->post('code');

            $data = $this->app_model->getSelectedData("tbl_stkk",$id);

            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_stkk",$up,$id);

            }else{
                $this->app_model->insertData("tbl_stkk",$up);
            }
        }else{
            header('location:'.base_url());
        }
    }

    public function edit(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $d['prg']= $this->config->item('prg');
            $d['web_prg']= $this->config->item('web_prg');

            $d['nama_program']= $this->config->item('nama_program');
            $d['instansi']= $this->config->item('instansi');
            $d['usaha']= $this->config->item('usaha');
            $d['alamat_instansi']= $this->config->item('alamat_instansi');

            $d['judul']='edit_stkk';
            $d['judul_halaman']='Edit STKK';

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_stkk WHERE stkk_code='$id'";
            $data = $this->app_model->manualQuery($text);

            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['code']	   = $id;
                    $d['name']	   = $db->stkk_name;
                    $d['desc']     = $db->stkk_desc;
                    $d['lead']       = $db->username;
                    //$d['pm']       = $db->nm_pm;
                    //$d['ce']       = $db->nm_ce;
                }
            }else{

                $d['code']		    = $id;
                $d['name']		    = '';
                $d['desc']          = '';
                $d['username']            = '';
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
            $this->app_model->manualQuery("DELETE FROM tbl_stkk WHERE stkk_code='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/skpd'>";
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file stkk.php */
/* Location: ./application/controllers/stkk.php */