<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class functions {

    protected $CI;

    public function __construct($handler = NULL) {
        if ($handler === NULL)
            $this->CI = & get_instance();
        else
            $this->CI = $handler;
    }

    public function config($name, $index = NULL, $type = NULL) {
    	
        if ($type === NULL OR $type == 't' OR $type == 'l' OR $type == 'local' OR $type == 'config' OR $type == 'conf') {
            $this->CI->config->load('app_config');

            $data = $this->CI->config->item($name);

            if ($data !== NULL) {
                if (is_array($data) AND $index !== NULL)
                    return $data[$index];

                return $data;
            }
        }
        if ($type === NULL OR $type == 'p' OR $type == 'd' OR $type == 'db') {
            $this->CI->load->database();

            $query = $this->CI->db->get_where('config', array('config_name' => $name), 1);

            if ($query && $query->num_rows() > 0)
                $data = $query->result()[0]->config_value;
            if ($index === NULL)
                return $data;

            $data = json_decode($data, TRUE);

            if (is_array($data) && count($data) > 0 && isset($data[$index]))
                return $data[$index];
        }

        return NULL;
    }

    public function set_config($name, $value, $index = NULL, $type = 'db') {
        $config_data = $this->config($name, $index, $type);

        if ($type == 't' OR $type == 'l' OR $type == 'local' OR $type == 'config' OR $type == 'conf') {
            if ($index !== NULL) {
                $data = $config_data;
                $data[$index] = $value;
            } else {
                $data = $value;
            }

            $this->CI->config->load('app_config');
            $this->CI->config->set_item($name, $data);

            return TRUE;
        }
        if ($index === NULL) {
            $data = $value;
        } else {
            $data = array();
            if ($config_data !== NULL) {
                $data = json_decode($config_data, 1);
            }

            $data[$index] = $value;
            $data = json_encode($data);
        }

        $this->CI->load->database();

        $query = $this->CI->db->get_where('config', array('config_name' => $name), 1);
        $data = array('config_name' => $name, 'config_value' => $data);

        if ($query->num_rows() > 0) {
            $config = $query->result_array()[0];
            $update_data = array('config_name' => $name, 'config_value' => $value);

            if ($this->CI->db->update('config', $data, array('config_id' => $config['config_id']), 1))
                return TRUE;
        }
        else {
            if ($this->CI->db->insert('config', $data))
                return TRUE;
        }

        return FALSE;
    }

    public function encrypt($data, $index = 0) {
        $keys = $this->config('app_enc');

        if (!isset($keys[$index]))
            return FALSE;

        $mode = $keys[$index]['cipher'] . '-' . $keys[$index]['mode'];

        return base64_encode(openssl_encrypt($data, $mode, $keys[$index]['key'], 0, substr(md5($keys[$index]['key']), 0, openssl_cipher_iv_length($mode))));
    }

    public function decrypt($data, $index = 0) {
        $keys = $this->config('app_enc');

        if (!isset($keys[$index]))
            return FALSE;

        $mode = $keys[$index]['cipher'] . '-' . $keys[$index]['mode'];

        return openssl_decrypt(base64_decode($data), $mode, $keys[$index]['key'], 0, substr(md5($keys[$index]['key']), 0, openssl_cipher_iv_length($mode)));
    }

    public function flag($symbol) {
        $flag = json_decode($this->flag_data, TRUE);

        if ($symbol == 'ALL')
            return $flag;

        if (!isset($flag[$symbol]))
            return FALSE;


        return $flag[$symbol];
    }

    public function random_serial() {
        $charset = 'abcdefghijklmnopqrstuvwxyz123456789';
        $charset_length = strlen($charset) - 1;
        $string = '';

        for ($i = 0; $i < 4; $i++) {
            for ($ii = 0; $ii < 8; $ii++) {
                $string .= $charset[mt_rand(0, $charset_length)];
            }

            if ($i < 3)
                $string .= '-';
        }

        return $string;
    }

    public function get_time_ago($time) {
        $time_difference = time() - $time;
        if ($time_difference < 1) {
            return 'less than 1 second ago';
        }
        $condition = array(12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;
            if ($d >= 1) {
                $t = round($d);
                return 'before ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }

    protected $flag_data = '{"af":{"name":"afghanistan","symbol":"af"},"al":{"name":"albania","symbol":"al"},"dz":{"name":"algeria","symbol":"dz"},"ad":{"name":"andorra","symbol":"ad"},"ao":{"name":"angola","symbol":"ao"},"ag":{"name":"antigua-and-barbuda","symbol":"ag"},"ar":{"name":"argentina","symbol":"ar"},"am":{"name":"armenia","symbol":"am"},"au":{"name":"australia","symbol":"au"},"at":{"name":"austria","symbol":"at"},"az":{"name":"azerbaijan","symbol":"az"},"bs":{"name":"the-bahamas","symbol":"bs"},"bh":{"name":"bahrain","symbol":"bh"},"bd":{"name":"bangladesh","symbol":"bd"},"bb":{"name":"barbados","symbol":"bb"},"by":{"name":"belarus","symbol":"by"},"be":{"name":"belgium","symbol":"be"},"bz":{"name":"belize","symbol":"bz"},"bj":{"name":"benin","symbol":"bj"},"bt":{"name":"bhutan","symbol":"bt"},"bo":{"name":"bolivia","symbol":"bo"},"ba":{"name":"bosnia-and-herzegovina","symbol":"ba"},"bw":{"name":"botswana","symbol":"bw"},"br":{"name":"brazil","symbol":"br"},"bn":{"name":"brunei","symbol":"bn"},"bg":{"name":"bulgaria","symbol":"bg"},"bf":{"name":"burkina-faso","symbol":"bf"},"bi":{"name":"burundi","symbol":"bi"},"kh":{"name":"cambodia","symbol":"kh"},"cm":{"name":"cameroon","symbol":"cm"},"ca":{"name":"canada","symbol":"ca"},"cv":{"name":"cape-verde","symbol":"cv"},"cf":{"name":"the-central-african-republic","symbol":"cf"},"td":{"name":"chad","symbol":"td"},"cl":{"name":"chile","symbol":"cl"},"co":{"name":"colombia","symbol":"co"},"km":{"name":"the-comoros","symbol":"km"},"ck":{"name":"cook-islands","symbol":"ck"},"cr":{"name":"costa-rica","symbol":"cr"},"ci":{"name":"cote-d-ivoire","symbol":"ci"},"hr":{"name":"croatia","symbol":"hr"},"cu":{"name":"cuba","symbol":"cu"},"cy":{"name":"cyprus","symbol":"cy"},"cz":{"name":"the-czech-republic","symbol":"cz"},"cd":{"name":"the-democratic-republic-of-the-congo","symbol":"cd"},"dk":{"name":"denmark","symbol":"dk"},"dj":{"name":"djibouti","symbol":"dj"},"dm":{"name":"dominica","symbol":"dm"},"do":{"name":"the-dominican-republic","symbol":"do"},"tl":{"name":"east-timor","symbol":"tl"},"ec":{"name":"ecuador","symbol":"ec"},"eg":{"name":"egypt","symbol":"eg"},"sv":{"name":"el-salvador","symbol":"sv"},"gq":{"name":"equatorial-guinea","symbol":"gq"},"er":{"name":"eritrea","symbol":"er"},"ee":{"name":"estonia","symbol":"ee"},"et":{"name":"ethiopia","symbol":"et"},"fj":{"name":"fiji","symbol":"fj"},"fi":{"name":"finland","symbol":"fi"},"fr":{"name":"france","symbol":"fr"},"ga":{"name":"gabon","symbol":"ga"},"gm":{"name":"the-gambia","symbol":"gm"},"ge":{"name":"georgia","symbol":"ge"},"de":{"name":"germany","symbol":"de"},"gh":{"name":"ghana","symbol":"gh"},"gr":{"name":"greece","symbol":"gr"},"gd":{"name":"grenada","symbol":"gd"},"gt":{"name":"guatemala","symbol":"gt"},"gn":{"name":"guinea","symbol":"gn"},"gw":{"name":"guinea-bissau","symbol":"gw"},"gy":{"name":"guyana","symbol":"gy"},"ht":{"name":"haiti","symbol":"ht"},"hn":{"name":"honduras","symbol":"hn"},"hu":{"name":"hungary","symbol":"hu"},"is":{"name":"iceland","symbol":"is"},"in":{"name":"india","symbol":"in"},"id":{"name":"indonesia","symbol":"id"},"ir":{"name":"iran","symbol":"ir"},"iq":{"name":"iraq","symbol":"iq"},"ie":{"name":"ireland","symbol":"ie"},"il":{"name":"israel","symbol":"il"},"it":{"name":"italy","symbol":"it"},"jm":{"name":"jamaica","symbol":"jm"},"jp":{"name":"japan","symbol":"jp"},"jo":{"name":"jordan","symbol":"jo"},"kz":{"name":"kazakhstan","symbol":"kz"},"ke":{"name":"kenya","symbol":"ke"},"ki":{"name":"kiribati","symbol":"ki"},"ks":{"name":"kosovo","symbol":"ks"},"kw":{"name":"kuwait","symbol":"kw"},"kg":{"name":"kyrgyzstan","symbol":"kg"},"la":{"name":"laos","symbol":"la"},"lv":{"name":"latvia","symbol":"lv"},"lb":{"name":"lebanon","symbol":"lb"},"ls":{"name":"lesotho","symbol":"ls"},"lr":{"name":"liberia","symbol":"lr"},"ly":{"name":"libya","symbol":"ly"},"li":{"name":"liechtenstein","symbol":"li"},"lt":{"name":"lithuania","symbol":"lt"},"lu":{"name":"luxembourg","symbol":"lu"},"mk":{"name":"macedonia","symbol":"mk"},"mg":{"name":"madagascar","symbol":"mg"},"mw":{"name":"malawi","symbol":"mw"},"my":{"name":"malaysia","symbol":"my"},"mv":{"name":"maldives","symbol":"mv"},"ml":{"name":"mali","symbol":"ml"},"mt":{"name":"malta","symbol":"mt"},"mh":{"name":"the-marshall-islands","symbol":"mh"},"mr":{"name":"mauritania","symbol":"mr"},"mu":{"name":"mauritius","symbol":"mu"},"mx":{"name":"mexico","symbol":"mx"},"fm":{"name":"micronesia","symbol":"fm"},"md":{"name":"moldova","symbol":"md"},"mc":{"name":"monaco","symbol":"mc"},"mn":{"name":"mongolia","symbol":"mn"},"me":{"name":"montenegro","symbol":"me"},"ma":{"name":"morocco","symbol":"ma"},"mz":{"name":"mozambique","symbol":"mz"},"mm":{"name":"myanmar","symbol":"mm"},"na":{"name":"namibia","symbol":"na"},"nr":{"name":"nauru","symbol":"nr"},"np":{"name":"nepal","symbol":"np"},"nl":{"name":"the-netherlands","symbol":"nl"},"nz":{"name":"new-zealand","symbol":"nz"},"ni":{"name":"nicaragua","symbol":"ni"},"ne":{"name":"niger","symbol":"ne"},"ng":{"name":"nigeria","symbol":"ng"},"nu":{"name":"niue","symbol":"nu"},"kp":{"name":"north-korea","symbol":"kp"},"no":{"name":"norway","symbol":"no"},"om":{"name":"oman","symbol":"om"},"pk":{"name":"pakistan","symbol":"pk"},"pw":{"name":"palau","symbol":"pw"},"pa":{"name":"panama","symbol":"pa"},"pg":{"name":"papua-new-guinea","symbol":"pg"},"py":{"name":"paraguay","symbol":"py"},"cn":{"name":"the-people-s-republic-of-china","symbol":"cn"},"pe":{"name":"peru","symbol":"pe"},"ph":{"name":"the-philippines","symbol":"ph"},"pl":{"name":"poland","symbol":"pl"},"pt":{"name":"portugal","symbol":"pt"},"qa":{"name":"qatar","symbol":"qa"},"tw":{"name":"the-republic-of-china","symbol":"tw"},"cg":{"name":"the-republic-of-the-congo","symbol":"cg"},"ro":{"name":"romania","symbol":"ro"},"ru":{"name":"russia","symbol":"ru"},"rw":{"name":"rwanda","symbol":"rw"},"kn":{"name":"saint-kitts-and-nevis","symbol":"kn"},"lc":{"name":"saint-lucia","symbol":"lc"},"vc":{"name":"saint-vincent-and-the-grenadines","symbol":"vc"},"ws":{"name":"samoa","symbol":"ws"},"sm":{"name":"san-marino","symbol":"sm"},"st":{"name":"sao-tome-and-principe","symbol":"st"},"sa":{"name":"saudi-arabia","symbol":"sa"},"sn":{"name":"senegal","symbol":"sn"},"rs":{"name":"serbia","symbol":"rs"},"sc":{"name":"the-seychelles","symbol":"sc"},"sl":{"name":"sierra-leone","symbol":"sl"},"sg":{"name":"singapore","symbol":"sg"},"sk":{"name":"slovakia","symbol":"sk"},"si":{"name":"slovenia","symbol":"si"},"sb":{"name":"the-solomon-islands","symbol":"sb"},"so":{"name":"somalia","symbol":"so"},"za":{"name":"south-africa","symbol":"za"},"kr":{"name":"south-korea","symbol":"kr"},"ss":{"name":"south-sudan","symbol":"ss"},"es":{"name":"spain","symbol":"es"},"lk":{"name":"sri-lanka","symbol":"lk"},"sd":{"name":"sudan","symbol":"sd"},"sr":{"name":"suriname","symbol":"sr"},"sz":{"name":"swaziland","symbol":"sz"},"se":{"name":"sweden","symbol":"se"},"ch":{"name":"switzerland","symbol":"ch"},"sy":{"name":"syria","symbol":"sy"},"tj":{"name":"tajikistan","symbol":"tj"},"tz":{"name":"tanzania","symbol":"tz"},"th":{"name":"thailand","symbol":"th"},"tg":{"name":"togo","symbol":"tg"},"to":{"name":"tonga","symbol":"to"},"tt":{"name":"trinidad-and-tobago","symbol":"tt"},"tn":{"name":"tunisia","symbol":"tn"},"tr":{"name":"turkey","symbol":"tr"},"tm":{"name":"turkmenistan","symbol":"tm"},"tv":{"name":"tuvalu","symbol":"tv"},"ug":{"name":"uganda","symbol":"ug"},"ua":{"name":"ukraine","symbol":"ua"},"ae":{"name":"the-united-arab-emirates","symbol":"ae"},"us":{"name":"the-united-states","symbol":"us"},"uy":{"name":"uruguay","symbol":"uy"},"uz":{"name":"uzbekistan","symbol":"uz"},"vu":{"name":"vanuatu","symbol":"vu"},"va":{"name":"the-vatican-city","symbol":"va"},"ve":{"name":"venezuela","symbol":"ve"},"vn":{"name":"vietnam","symbol":"vn"},"eh":{"name":"western-sahara","symbol":"eh"},"ye":{"name":"yemen","symbol":"ye"},"zm":{"name":"zambia","symbol":"zm"},"zw":{"name":"zimbabwe","symbol":"zw"},"ot":{"name":"other","symbol":"ot"}}';

}
