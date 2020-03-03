<?php 

class Minggu4 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        //$this->load->library('form_validation');
        $this->load->library('unit_test');
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        //template
        $str = '
            <table border="0" cellpadding="4" cellspacing="1">
            {rows}
                    <tr>
                            <td>{item}</td>
                            <td>{result}</td>
                    </tr>
            {/rows}
            </table>';
        //$this->unit->set_template($str);
        $true = true;
        $expected = true;
        $test_name = 'uji coba assert';

        //test url
        //$output = $this->request('GET',['Login','test']);
        $expect = '{"foo":"bar"}';

        //$this->unit->run($output,$expect,$test_name);
        $this->unit->run($true,$expected,$test_name);

        $test_name = 'tes if else';
        $this->unit->run($this->ifelse('tes','halo'),'tes',$test_name);

        $test_name = 'tes loop 2';
        $arr = array(0,1,2,3,4);
        $this->unit->run($this->loop2($arr),4,$test_name);

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

        //ifelse 2
        $judul = 'Pengujian Ifelse2 namachief null, namaarn null Minggu 4';
        $expected = "dia bukan teman saya";
        $this->unit->run($this->ifelse2(null,null),$expected,$judul);

        $judul = 'Pengujian Ifelse2 namachief andi, namaarn null Minggu 4';
        $result = $this->ifelse2("andi", null);
        $expected = "dia bukan teman saya";
        $this->unit->run($result-"dia adalah teman saya",$judul);

        $judul = 'Pengujian Ifelse2 namachief null, namaarn andi Minggu 4';
        $result = $this->ifelse2(null, "andi");
        $expected = "dia bukan teman saya";
        $this->unit->run($result-"dia adalah teman saya",$judul);

        //ifelse3
        $judul = 'Pengujian Ifelse3 namachief null, namaarn null, Namamhs null Minggu 4';
        $result = $this->ifelse3(null, null, null);
        $expected = "Something wrong. Please contact US";
        $this->unit->run($this->ifelse3(null,null,null),$expected,$judul);

        $judul = 'Pengujian Ifelse3 namachief yashinta, namaarn null, Namamhs null Minggu 4';
        $result = $this->ifelse3("yashinta", null, null);
        $expected = "yashinta";
        $this->unit->run($this->ifelse3("yashinta",null,null),$expected,$judul);

        $judul = 'Pengujian Ifelse3 namachief null, namaarn yashinta, Namamhs null Minggu 4';
        $result = $this->ifelse3(null, "yashinta", null);
        $expected = "yashinta";
        $this->unit->run($this->ifelse3(null,"yashinta",null),$expected,$judul);

        $judul = 'Pengujian Ifelse3 namachief null, namaarn null, Namamhs yashinta Minggu 4';
        $result = $this->ifelse3(null, null, "yashinta");
        $expected = "yashinta";
        $this->unit->run($this->ifelse3(null,null,"yashinta"),$expected,$judul);

        $judul = 'Pengujian Ifelse3 namachief yashinta, namaarn yashinta, Namamhs null Minggu 4';
        $result = $this->ifelse3("yashinta", "yashinta", null);
        $expected = "yashinta";
        $this->unit->run($this->ifelse3("yashinta", "yashinta", null),$expected,$judul);

        $judul = 'Pengujian Ifelse3 namachief null, namaarn yashinta, Namamhs yashinta Minggu 4';
        $result = $this->ifelse3(null, "yashinta", "yashinta");
        $expected = "yashinta";
        $this->unit->run($this->ifelse3(null, "yashinta", "yashinta"),$expected,$judul);

        $judul = 'Pengujian Ifelse3 namachief yashinta, namaarn null, Namamhs yashinta Minggu 4';
        $result = $this->ifelse3("yashinta", null, "yashinta");
        $expected = "yashinta";
        $this->unit->run($this->ifelse3("yashinta", null, "yashinta"),$expected,$judul);

        $judul = 'Pengujian Ifelse3 namachief yashinta, namaarn yashinta, Namamhs yashinta Minggu 4';
        $result = $this->ifelse3("yashinta", "yashinta", "yashinta");
        $expected = "yashinta";
        $this->unit->run($this->ifelse3("yashinta", "yashinta", "yashinta"),$expected,$judul);

        //ifelse4
        $judul = 'Pengujian Ifelse4 d=mon';
        $result = $this->ifelse3("yashinta", "yashinta", "yashinta");
        $expected = "yashinta";
        $this->unit->run($this->ifelse3("yashinta", "yashinta", "yashinta"),$expected,$judul);

        echo $this->unit->report();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }

    public function test()
    {
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('foo' => 'bar')));
    }

    //minggu 3
    public function ifelse($namachief = null,$namarm = null){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
           $tmp = $namarm;
        }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse2($teman){
        $tmp = '';
        if($teman == "andi"){
            $tmp = "dia adalah teman saya";
        }else{
            $tmp = "dia bukan teman saya";
        }
        return $tmp;
    }

    public function ifelse3($namachief = null, $namarm = null, $namamhs){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
            $tmp = $namarm;
        }
        else if ($namamhs != NULL){
            $tmp = $namamhs;
         }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse4($inputtgl = 'D'){
        $tmp = '';
        $d = date($inputtgl);
        if($d == "Fri"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Sun"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Mon"){
            $tmp = "Have a nice Monday!";
        }elseif($d == "Tue"){
            $tmp = "Have a nice Tuesday!";
        }elseif($d == "Wed"){
            $tmp = "Have a nice Wednesday!";
        }elseif($d == "Thu"){
            $tmp = "Have a nice Thursday!";
        }elseif($d == "Sat"){
            $tmp = "Have a nice Weekend!";
        }
        return $tmp;
    }

    public function loop1($var){
        for ($i=0; $i <= 10; $i++) { 
            $var+=$var;
        }
        return $var;
    }

    public function loop2($arr){
        $result = '';
        foreach ($arr as $key => $value) {
            if($key % 2 == 1){
                $value+=$value;
            }
            $result = $value;
        }
        return $result;
    }

    public function loop3($var){
        $a=0;
        while ($a <= 10) {
            $var += $var;
            $a++;
        }
        return $var;
    }
}
