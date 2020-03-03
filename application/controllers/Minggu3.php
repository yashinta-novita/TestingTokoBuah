<?php

class Minggu3 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
    }

    public function index(){
        $judul = 'Pengujian If Else namachief null, namaarn null Minggu 3';
        $expected = "Something wrong. Please contact US";
        $this->unit->run($this->ifelse(null,null),$expected,$judul);

        $judul = 'Pengujian If Else namachief yashinta, namaarn null Minggu 3';
        $expected = 'yashinta';
        $this->unit->run($this->ifelse('yashinta',null),$expected,$judul);

        $judul = 'Pengujian If Else namachief yashinta, namaarn novita Minggu 3';
        $expected = 'yashinta';
        $this->unit->run($this->ifelse('yashinta','novita'),$expected,$judul);

        $judul = 'Pengujian If Else namachief null, namaarn novita Minggu 3';
        $expected = 'novita';
        $this->unit->run($this->ifelse(null,'novita'),$expected,$judul);

        echo $this->unit->report();
    }

    public function ifelse($namachief = null,$namarn = null){
        $tmp= " ";
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarn != NULL){
            $tmp = $namarn;
        }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }
}
