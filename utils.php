<?php
    function findId($message)
    {
        $array = explode(" ", $message);
        return $array[1];
    }

    function getInfoNewContact($data)
    {
        $array = explode(",", $data);
        $res = array();

        for ($i = 0; $i<3; $i++)
        {
            $temp = explode(" ", $array[$i], 2)[1];
            array_push($res, $temp);
        }
        return $res;
    }
?>