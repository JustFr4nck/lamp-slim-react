<?php 
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class CertController{
        
        public function index(Request $request, Response $response, $args){
        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');

        $idAlunni = args["idAlunni"];

        $result = $mysqli_connection->query("SELECT * FROM alunni a");
        $results = $result->fetch_all(MYSQLI_ASSOC);

        $response->getBody()->write(json_encode($results));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }


































    }

?>