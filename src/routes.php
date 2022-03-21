<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

   // $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
   //     $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
   //     return $container->get('renderer')->render($response, 'index.phtml', $args);
   // });
   $app->get("/api/kelas", function (Request $request, Response $response){
        $sql = "SELECT * FROM kelas"; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $response->withJson(["status" => "success", "data" => $result], 200);
        //return $response->withJson($result, 200); //lgsg data
});
   $app->get("/api/kelas/{idkelas}", function (Request $request, Response $response, $args){
        $idkelas = $args["idkelas"];
        $sql = "SELECT * FROM kelas WHERE id_kelas=:id_kelas"; //menambahkan parameter =:
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":id_kelas" => $idkelas]);
        $result = $stmt->fetchAll();
        return $response->withJson(["status" => "success", "data" => $result], 200);
        //return $response->withJson($result, 200); //lgsg data
    });
};
