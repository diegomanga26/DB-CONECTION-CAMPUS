<?php
    require "../vendor/autoload.php"; //se trae el autoload desde el vendor creado por composer
    $router = new \Bramus\Router\Router();
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();

    /**
     * !TABLAS areas EN campusland:
     */
    $router->get("/campusland", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM areas");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/campusland", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE areas SET name_area = :NAME_AREA WHERE id =:ID");
        $res-> bindValue("NAME_AREA", $_DATA['name_area']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/campusland", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM areas WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/campusland", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO areas (name_area) VALUES (:NAME_AREA)");
        $res-> bindValue("NAME_AREA", $_DATA['name_area']); 
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    /**
     * !TABLAS tb_camper EN db_M3_prueba_miguel:
     */
    $router->get("/camper", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM tb_camper");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/camper", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE tb_camper SET nombre=:NOMBRE, edad=:EDAD WHERE id =:ID");
        $res-> bindValue("NOMBRE", $_DATA['nombre']); 
        $res-> bindValue("EDAD", $_DATA['edad']);
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/camper", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM tb_camper WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/camper", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO tb_camper (nombre, edad) VALUES (:NOMBRE, :EDAD)");
        $res-> bindValue("NOMBRE", $_DATA['nombre']);
        $res-> bindValue("EDAD", $_DATA['edad']); 
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    /**
     * !TABLAS DE chapters EN campusland:
     */
    $router->get("/caps", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM chapters");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/caps", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE chapters SET id_thematic_units=:ID_THEMATIC_UNITS, name_chapter=:NAME_CHAPTER, start_date=:START_DATE, 
        end_date=:END_DATE, description=:DESCRIPTION, duration_days=:DURATION_DAYS WHERE id =:ID");
        $res-> bindValue("ID_THEMATIC_UNITS", $_DATA['id_thematic_units']); 
        $res-> bindValue("NAME_CHAPTER", $_DATA['name_chapter']);
        $res-> bindValue("START_DATE", $_DATA['start_date']);
        $res-> bindValue("END_DATE", $_DATA['end_date']);
        $res-> bindValue("DESCRIPTION", $_DATA['description']);
        $res-> bindValue("DURATION_DAYS", $_DATA['duration_days']);
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/caps", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM chapters WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/caps", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO chapters (id_thematic_units, name_chapter, start_date, end_date, description, duration_days) 
        VALUES (:ID_THEMATIC_UNITS, :NAME_CHAPTER, :START_DATE, :END_DATE, :DESCRIPTION, :DURATION_DAYS)");
        $res-> bindValue("ID_THEMATIC_UNITS", $_DATA['id_thematic_units']); 
        $res-> bindValue("NAME_CHAPTER", $_DATA['name_chapter']);
        $res-> bindValue("START_DATE", $_DATA['start_date']);
        $res-> bindValue("END_DATE", $_DATA['end_date']);
        $res-> bindValue("DESCRIPTION", $_DATA['description']);
        $res-> bindValue("DURATION_DAYS", $_DATA['duration_days']); 
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    /**
     * !TABLAS DE cities EN campusland:
     */
    $router->get("/city", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM cities");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/city", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE cities SET name_city=:NAME_CITY, id_region=:ID_REGION WHERE id =:ID");
        $res-> bindValue("NAME_CITY", $_DATA['name_city']); 
        $res-> bindValue("ID_REGION", $_DATA['id_region']);
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/city", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM cities WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/city", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO cities (name_city, id_region) VALUES (:NAME_CITY, :ID_REGION)");
        $res-> bindValue("NAME_CITY", $_DATA['name_city']);
        $res-> bindValue("ID_REGION", $_DATA['id_region']); 
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    /**
     * !TABLAS DE personal_ref EN campusland:
     */
    $router->get("/ref", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM personal_ref");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/ref", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE personal_ref SET full_name=:FULL_NAME, cel_number=:CEL_NUMBER, relationship=:RELATIONSHIP, occupation=:OCCUPATION WHERE id =:ID");
        $res-> bindValue("FULL_NAME", $_DATA['full_name']); 
        $res-> bindValue("CEL_NUMBER", $_DATA['cel_number']);
        $res-> bindValue("RELATIONSHIP", $_DATA['relationship']);
        $res-> bindValue("OCCUPATION", $_DATA['occupation']);
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/ref", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM personal_ref WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/ref", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO personal_ref (full_name, cel_number, relationship, occupation) VALUES (:FULL_NAME, :CEL_NUMBER, :RELATIONSHIP, :OCCUPATION)");
        $res-> bindValue("FULL_NAME", $_DATA['full_name']); 
        $res-> bindValue("CEL_NUMBER", $_DATA['cel_number']);
        $res-> bindValue("RELATIONSHIP", $_DATA['relationship']);
        $res-> bindValue("OCCUPATION", $_DATA['occupation']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    /**
     * !TABLAS DE levels EN campusland:
     */
    $router->get("/lev", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM levels");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/lev", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE levels SET name_level=:NAME_LEVEL, group_level=:GROUP_LEVEL WHERE id =:ID");
        $res-> bindValue("NAME_LEVEL", $_DATA['name_level']); 
        $res-> bindValue("GROUP_LEVEL", $_DATA['group_level']);
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/lev", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM levels WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/lev", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO levels (name_level, group_level) VALUES (:NAME_LEVEL, :GROUP_LEVEL)");
        $res-> bindValue("NAME_LEVEL", $_DATA['name_level']);
        $res-> bindValue("GROUP_LEVEL", $_DATA['group_level']); 
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    /**
     * !TABLAS DE locations EN campusland:
     */
    $router->get("/loc", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM locations");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/loc", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE locations SET name_location=:NAME_LOCATION WHERE id =:ID");
        $res-> bindValue("NAME_LOCATION", $_DATA['name_location']); 
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/loc", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM locations WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/loc", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO locations (name_location) VALUES (:NAME_LOCATION)");
        $res-> bindValue("NAME_LOCATION", $_DATA['name_location']); 
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    /**
     * !TABLAS EN countries DE campusland:
     */
    $router->get("/countr", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM countries");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/countr", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE countries SET name_country=:NAME_COUNTRY WHERE id =:ID");
        $res-> bindValue("NAME_COUNTRY", $_DATA['name_country']); 
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/countr", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM countries WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/countr", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO countries (name_country) VALUES (:NAME_COUNTRY)");
        $res-> bindValue("NAME_COUNTRY", $_DATA['name_country']); 
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    /**
     * !TABLAS DE regions EN campusland:
     */
    $router->get("/reg", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM regions");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/reg", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE regions SET name_region=:NAME_REGION, id_country=:ID_COUNTRY WHERE id =:ID");
        $res-> bindValue("NAME_REGION", $_DATA['name_region']); 
        $res-> bindValue("ID_COUNTRY", $_DATA['id_country']);
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/reg", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM regions WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/reg", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO regions (name_region, id_country) VALUES (:NAME_REGION, :ID_COUNTRY)");
        $res-> bindValue("NAME_REGION", $_DATA['name_region']); 
        $res-> bindValue("ID_COUNTRY", $_DATA['id_country']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    /**
     * !TABLAS DE work_reference EN campusland:
     */
    $router->get("/workref", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM work_reference");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/workref", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE work_reference SET full_name=:FULL_NAME, cel_number=:CEL_NUMBER, position=:POSITION, company=:COMPANY WHERE id =:ID");
        $res-> bindValue("FULL_NAME", $_DATA['full_name']); 
        $res-> bindValue("CEL_NUMBER", $_DATA['cel_number']);
        $res-> bindValue("POSITION", $_DATA['position']);
        $res-> bindValue("COMPANY", $_DATA['company']);
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/workref", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM work_reference WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/workref", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO work_reference (full_name, cel_number, position, company) VALUES (:FULL_NAME, :CEL_NUMBER, :POSITION, :COMPANY)");
        $res-> bindValue("FULL_NAME", $_DATA['full_name']); 
        $res-> bindValue("CEL_NUMBER", $_DATA['cel_number']);
        $res-> bindValue("POSITION", $_DATA['position']);
        $res-> bindValue("COMPANY", $_DATA['company']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    /**
     * !TABLAS DE journey EN campusland:
     */

     $router->get("/journ", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM journey");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/journ", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE journey SET name_journey=:NAME_JOURNEY, check_in=:CHECK_IN, check_out=:CHECK_OUT WHERE id =:ID");
        $res-> bindValue("NAME_JOURNEY", $_DATA['name_journey']); 
        $res-> bindValue("CHECK_IN", $_DATA['check_in']);
        $res-> bindValue("CHECK_OUT", $_DATA['check_out']);
        $res-> bindValue("ID", $_DATA['id']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/journ", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM journey WHERE id =:ID");
        $res->bindValue("ID", $_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/journ", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO journey (name_journey, check_in, check_out) VALUES (:NAME_JOURNEY, :CHECK_IN, :CHECK_OUT)");
        $res-> bindValue("NAME_JOURNEY", $_DATA['name_journey']); 
        $res-> bindValue("CHECK_IN", $_DATA['check_in']);
        $res-> bindValue("CHECK_OUT", $_DATA['check_out']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->run();
    /*
        Preparar -> 
            - Se llama a la conexion    
        Enviar  ->
        Ejecutar ->
        Esperar ->
    */
?>