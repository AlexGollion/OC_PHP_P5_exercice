<?php

    require_once(__DIR__ . '/utils.php');
    require_once(__DIR__ . '/Command.php');

    $command = new Command();

    while (true) {

        $line = readline("Entrez votre commande : help, list, detail, create, delete, quit : ");
        echo "Vous avez saisi : $line\n";

        // on va chercher quelle commande l'utilisateur à saisit
        switch ($line)
        {
            case 'list':
                $command->list();
                break;
            case (preg_match("#detail#", $line) ? true : false):
                try {
                    $command->detail(findId($line));
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                break;
            case (preg_match("#create#", $line) ? true : false):
                try {
                    $data = getInfoNewContact($line);
                    $command->create($data[0], $data[1], $data[2]);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                break;
            case (preg_match("#delete#", $line) ? true : false):
                try {
                    $command->delete(findId($line));
                } catch (Exception $e) {
                    echo $e->getMessage(); 
                }
                break;
            case 'help':
                $command->help();
                break;
            case 'quit':
                exit();
            default:
                echo "Commande inconnue\n";
                break;
        }
    };
?>