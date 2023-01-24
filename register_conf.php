<?php 

require 'core/init.php'; // Securiser plus ????

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {
        // Patch XSS
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $hash = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        // On vérifie si l'utilisateur existe
        $connexion = new PDO("mysql: host=localhost; port=3306; dbname=wmskate; charset=utf8", "root", "");
        $check = $connexion->prepare('SELECT nom, email, hash FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($nom) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($hash === $password_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $hash = password_hash($hash, PASSWORD_BCRYPT, $cost);
                            // On insère dans la base de données
                            $insert = $connexion->prepare('INSERT INTO utilisateurs(nom, email, hash) VALUES(:nom, :email, :hash)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'email' => $email,
                                'hash' => $hash,
                            ));

                        
                        // $sql = "SELECT * FROM utilisateurs WHERE pseudo=':pseudo' AND email=':email'";
                        //     $result = mysqli_query($conn, $sql);

                        //     if (mysqli_num_rows($result) > 0) {
                        //         while ($row = mysqli_fetch_assoc($result)) {
                        //             $userid = $row['id'];
                        //             $sql = "INSERT INTO profileimg (userid, status)
                        //             VALUES ('$userid', 1)";
                        //         }
                        //     }

                            // On redirige avec le message de succès
                            header('Location:index.php?reg_err=success');
                            die();
                        }else{ header('Location: index.php?reg_err=password'); die();}
                    }else{ header('Location: index.php?reg_err=email'); die();}
                }else{ header('Location: index.php?reg_err=email_length'); die();}
            }else{ header('Location: index.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: index.php?reg_err=already'); die();}
    }

    ?>