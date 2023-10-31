<?php


class HelperController
{
    public static function clearDataFormJs()
    {
        echo "
            <script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href); 
                }
            </script>       
            ";
    }

    public static function redirectPage($url, $time = 3000){

        echo "
            <script>
                setTimeout(() => {
                    window.location  = '$url'
                }, $time)
            </script>       
            ";
       
    }

    public static function reloadPage()
    {
        echo "
            <script>
                window.location.reload(); 
            </script>       
            
       ";
    }
}
