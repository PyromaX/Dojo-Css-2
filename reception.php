<?php
    //recupération, validation et sécurisation des données
    $pageOrigin=$_SERVER['HTTP_REFERER'];
    $email=(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ?
        htmlentities($_POST['email']) :
        header('Location: ' .$pageOrigin);

    $name=(isset($_POST['name']) && (strlen($_POST['name']) > 1 && strlen($_POST['name']) < 16)) ?
        htmlentities($_POST['name']) :
        header('Location: ' .$pageOrigin);

    //Création du tableau contenue à ajouter
    $toAdd = [
        'name' => $name ,
        'email' => $email
    ];

    //ecriture des données dans list.txt

    $data= fopen('list.txt', 'r'); //ouverture du fichier txt en lecture/écriture
    $content = fgets($data);//attribution des valeurs du fichier txt dans une variable
    fclose($data);
    $content =($content) ? unserialize($content): [] ;//ouverture du tableau avec les valeurs de $content
    array_push($content , $toAdd); //ajout d'une ligne contenant un tableau
    $content = serialize($content);

    file_put_contents('list.txt', $content);

    header('Location: ' .$pageOrigin);

?>