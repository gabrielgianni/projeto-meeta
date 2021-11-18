<?php
    require_once('Request.class.php');
    require_once('Connection.class.php');
    
    class Routes extends Request {
        public function get() {
            if($this->method == "GET") {
                return "GET";
            }
            return $this->json($this->error("Rotas do tipo {$this->method} não estão acessíveis."));
        }

        public function post() {
            if($this->method == "POST") {
                return "POST";
            }
            return $this->json($this->error("Rotas do tipo {$this->method} não estão acessíveis."));
        }

        public function put() {
            if($this->method == "PUT") {
                return "PUT";
            }
            return $this->json($this->error("Rotas do tipo {$this->method} não estão acessíveis."));
        }

        public function delete() {
            if($this->method == "DELETE") {
                return "DELETE";
            }
            return $this->json($this->error("Rotas do tipo {$this->method} não estão acessíveis."));
        }
    }