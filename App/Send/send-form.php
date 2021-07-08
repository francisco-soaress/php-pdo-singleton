<?php

sleep(1);
$jSON = array();
$getPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);

/* Composer: chamando o autoload */
require_once "../../vendor/autoload.php";

if (empty($getPost["key-form"])) {
    $jSON["error"] = true;
} else {

    $post = array_map("strip_tags", $getPost);
    $action = $post["key-form"];
    unset($post["key-form"]);

    // table
    $table = "user";

    switch ($action) {
        case "form-general":

            if (!empty($post["name"]) && !empty($post["email"])) {

                $Create = new \App\Conn\Create;
                $Create->goCreate($table, $post);

                if ($Create->getResult()) {
                    $jSON["success"] = true;
                }
            }
            break;

        case "form-delete":
            if(!empty($post["id"])){
                $Delete = new \App\Conn\Delete;

                $where = "WHERE id = :id";
                $rule = "id={$post['id']}";
                $Delete->goDelete($table, $where, $rule);

                if($Delete->getResult()){
                    $jSON["success"] = true;
                }
            }
            break;

            case "form-update":
                if(!empty($post["id"])){
                    $readEdit = new \App\Conn\Read;

                    $where = "WHERE id = {$post['id']}";
                    $readEdit->allRead($table, $where);

                    if($readEdit->getResult()){
                        foreach($readEdit->getResult() as $returnResult){
                            extract($returnResult);
                            $jSON = array(true, $name, $email, $sexo);
                            
                        }
                    }
                }
            break;

        default:
            echo "Erro";
            $jSON["error"] = true;
            break;
    }
}

echo json_encode($jSON);
