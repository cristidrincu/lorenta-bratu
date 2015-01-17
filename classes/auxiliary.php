<?php
    function checkEmailAdress($email) { 
        if( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) || 
            (preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/',$email)) ) { 
            return true;
        }
        return false;
    }
    
    function checkContactForm($values){
        $error = "";
        if(isset($values)){
                if(trim($values['name'])=="")
                    $error .= "Campul Nume nu poate fi vid!<br/>";
                if(trim($values['email'])=="" && !checkEmailAdress($values['email']))
                    $error .= "Campul Email nu poate fi vid!<br/>";
                if(trim($values['message'])=="")
                    $error .= "Campul Mesaj nu poate fi vid!<br/>";
        }
    return $error;
    }

?>