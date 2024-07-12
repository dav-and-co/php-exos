<?php

    // fonction qui vérifie si un 'post' a été effectué' 

    function isRequestPost() {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }
    
    function isFormDataValid() {
    
        if (mb_strlen($_POST['title']) > 2 && 
            mb_strlen($_POST['content']) > 10 && 
            mb_strlen($_POST['image']) > 5 )
        {
            return true;
        } else {
            return false;
        }
    }
        
    function getFormErrors() {
        $errors = [];
            if (mb_strlen($_POST['title']) < 2) {
            $errors[] = "Le titre doit faire plus de 2 caractères";
        }
            if (mb_strlen($_POST['title']) > 20) {
            $errors[] = "Le titre doit faire moins de 20 caractères";
        }
            if (mb_strlen($_POST['image']) < 3) {
            $errors[] = "L'image doit faire plus de 3 caractères";
        }
            if (mb_strlen($_POST['content']) < 5) {
            $errors[] = "Le contenu doit faire plus de 5 caractères";
        }
            if (mb_strlen($_POST['content']) > 200) {
            $errors[] = "Le contenu doit faire moins de 200 caractères";
        }

        return $errors;
    }
   

if (isRequestPost() && empty(getFormErrors())) {
      
    // récupération des données postées
    $entryDate=new DateTime();
    $article=$_POST['title'].";".$_POST['content']. ";".$_POST['image'].";".$entryDate->format("d-m-Y")."\n";

    // ouverture et écriture dans un fichier externe

    $handle= fopen("../fichier.csv","a");
    if ($handle) {
        fwrite($handle, $article);
        fclose($handle);
    }
}

?>