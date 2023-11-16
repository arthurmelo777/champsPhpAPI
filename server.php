<?php
    ini_set('soap.wsdl_cache_enabled', 0);
    
    class ChampsService {
        private $_champs = NULL;

        public function __construct(){
            $this->_champs = [
                ['nome'=>'Aaatrox', 'rota'=>'Topo', 'região'=>'Shurima'],
                ['nome'=>'Ahri', 'rota'=>'Meio', 'região'=>'Ionia'],
                ['nome'=>'Yasuo', 'rota'=>'Meio', 'região'=>'Ionia'],
                ['nome'=>'Shen', 'rota'=>'Topo', 'região'=>'Ionia'],
                ['nome'=>'Sejuani', 'rota'=>'Selva', 'região'=>'Freljord'],
                ['nome'=>'Ashe', 'rota'=>'Inferior', 'região'=>'Freljord'],
                ['nome'=>'Xin Zhao', 'rota'=>'Selva', 'região'=>'Demacia'],
                ['nome'=>'Miss Fortune', 'rota'=>'Inferior', 'região'=>'Águas de Sentina'],
                ['nome'=>'Pyke', 'rota'=>'Suporte', 'região'=>'Águas de Sentina'],
                ['nome'=>'Taric', 'rota'=>'Suporte', 'região'=>'Targon']
            ];
        }

        public function champRota ($nome) {
            foreach ($this->_champs as $c) {
                if($c['nome'] == $nome) {
                    return $c['rota'];
                }
            }

            return "Campeão não encontrado!";
        }

        public function champRegiao ($nome) {
            foreach ($this->_champs as $c) {
                if ($c['nome'] == $nome) {
                    return $c['região'];
                }
            }

            return "Campeão não encontrado";
        }
    }

    $class = "ChampsService";

    $wsdl = NULL;

    // inicia o servidor soap

    $server = new SoapServer($wsdl, [
        'uri'=>"http://localhost:8091/server.php"
    ]);

    $server->setClass($class);

    $server->handle();
?>