<?php
    class Champ {
        public $nome;
        public $rota;
        public $regiao;
    }

    class Client {
        public $instance = NULL;

        public function __construct () {
            $params = array(
                'location'=>'http://localhost:8091/server.php?wsdl',
                'uri'=>'urn://localhost:8091/server.php?wsdl',
                'trace'=>1,
                'cache_wsdl'=>WSDL_CACHE_NONE);
            
            $this->instance = new SoapClient(NULL, $params);
        }

        public function getRota($nome_champ) {
            return $this->instance->__soapCall('champRota', [$nome_champ]);
        }

        public function getRegiao($nome_champ) {
            return $this->instance->__soapCall('champRegiao', [$nome_champ]);
        }
    }

    $client = new Client;
    $champ = new Champ();
    $champ->nome = 'Aatrox';

    try {
        echo $champ->nome."<br>";
        echo "Rota: ".$client->getRota($champ->nome)."<br>";
        echo "Região: ".$client->getRegiao($champ->nome)."<br>";
    } catch (Exception $e) {
        echo 'Exceção: ', $e->getMessage();
    }
?>