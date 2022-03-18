<?php

class Message
{
    public static function show()
    {
        session_start();
        if (isset($_SESSION["filmeSave"])) {
            $msg = $_SESSION["filmeSave"];
            unset($_SESSION["filmeSave"]);


            $text ='';
            if ($msg === "fail") {
                $text = 'Falha ao cadastrar o filme';
            }
            if($msg === "success") {
                $text = 'Filme cadastrado com successo';
            }
        }
        return "<script>
                 M.toast({
                    html: ".$text."
                </script>";
    }
}