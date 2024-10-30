<?php

    require_once(__DIR__ . '/utils.php');
    require_once(__DIR__ . '/Command.php');

    $command = new Command();

    while (true) {

        $line = readline("Entrez votre commande : ");
        echo "Vous avez saisi : $line\n";

        switch ($line)
        {
            case 'list':
                $command->list();
                break;
            case (preg_match("#detail#", $line) ? true : false):
                $command->detail(findId($line));
                break;
            case (preg_match("#create#", $line) ? true : false):
                $data = getInfoNewContact($line);
                $command->create($data[0], $data[1], $data[2]);
                break;
            case (preg_match("#delete#", $line) ? true : false):
                $command->delete(findId($line));
                break;
            default:
                echo "Commande inconnue\n";
                break;
        }
    };
?>