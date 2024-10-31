<?php
    // revoie l'id présent dans la commande
    function findId($message)
    {
        $array = explode(" ", $message);
        if (!empty($array[1]))
        {
            return $array[1];
        }
        else 
        {
            throw new Exception("Erreur dans la commande, pas d'id saisit\n");
        }
    }

    // récupère toutes les informations passé dans la commande
    function getInfoNewContact($data)
    {
        $array = explode(",", $data);
        $res = array();
        if (count($res) != 3)
        {
            throw new Exception("Erreur dans la commande, toutes les informations non pas été saisit\n");
        }

        for ($i = 0; $i<3; $i++)
        {
            $temp = explode(" ", $array[$i], 2)[1];
            array_push($res, $temp);
        }

        return $res;
    }
?>