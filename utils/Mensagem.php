<?php 

class Mensagem {
    public static function mostrar(){
        
        if ( isset($_SESSION["return"]) ) {
        $msg = $_SESSION["return"];
        unset($_SESSION["return"]);

        return "
                <script>
                    M.toast({ text: '$msg' });
                </script>
                ";
            }
        }
    }