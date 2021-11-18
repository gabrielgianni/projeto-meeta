<?php
    require_once("Connection.class.php");
    require_once("Auth.class.php");
    require_once("Request.class.php");
    class CRUD extends Request {
        public $conn;

        public function __construct() {
            $this->conn = new PDO("mysql:host=localhost;dbname=projeto_meeta;", "root", "");
        }

        public function getAll() {
            $sql = $this->conn->prepare("SELECT * FROM users");
            $sql->execute();
            $row = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($row as $value) {
                echo "<tr>
                        <td>{$value['name']}</td>
                        <td>{$value['email']}</td>
                        <td>" . date('d/m/Y', strtotime($value['birthDT'])). "</td>

                        <td><a href='../update?id={$value['id']}' class='btn btn-primary edit' title='Editar {$value['name']}'><i class='bi bi-pencil-square'></i> Editar</a>
                        
                        <a href='../delete?id={$value['id']}' class='btn btn-danger trash' title='Excluir {$value['name']}'><i class='bi bi-trash-fill'></i> Excluir</a>
                        </td>
                    </tr>";
            }
        }

        public function get($id) {
            $sql = $this->conn->prepare("SELECT * FROM users WHERE id = $id");
            $sql->execute();
            $row = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($row as $value) {
                $name = $value['name'];
                $email = $value['email'];
                $password = $value['password'];
                $birthDT = date('Y-m-d', strtotime($value['birthDT']));
                return array('name' => $name, 'email' => $email, 'password' => $password, 'birthDT' => $birthDT);
            }
        }

        public function create($user = array()) {
            $user[2] = sha1($user[2]);
            $sql = $this->conn->prepare("INSERT INTO users VALUES (null,?,?,?,?)");
            $exec = $sql->execute($user);
            if($exec) {
                return $this->json($this->success("Cadastro realizado com sucesso!"));
            } else {
                return $this->json($this->error("Não foi possível realizar o cadastro. Dados inválidos e/ou o e-mail já foi cadastrado!"));
            }
        }

        public function update($id, $data) {
            if(empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3])) {
                return $this->json($this->error("Não foi possível atualizar o usuário!"));
            }
            $data[2] = sha1($data[2]);
            $sql = $this->conn->prepare("UPDATE users SET name='$data[0]', email='$data[1]', password='$data[2]', birthDT='$data[3]' WHERE id=$id");
            $exec = $sql->execute();
            if($exec) {
                return $this->json($this->success("Usuário atualizado com sucesso!"));
            } else {
                return $this->json($this->error("Não foi possível atualizar o usuário!"));
            }
        }

        public function delete($id) {
            $req = new Request;
            $exec = $this->conn->exec("DELETE FROM users WHERE id=$id");
            if($exec) {
                $req->redirect("../dashboard/");
            } else {
                echo "Erro ao remover usuário. O usuário não existe.";
            }
        }
    }
?>