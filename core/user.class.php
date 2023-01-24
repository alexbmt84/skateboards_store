<?php
    class User {
        private int $id;
        private string $email;
        private string $hash;
        private string $nom;
        private ?string $prenom;
        private ?string $adresse;
        private ?string $code_postal;
        private ?string $ville;
        private Datetime $dateInscription;

        public function __construct() {
            $this->id = 0;
            $this->email = "";
            $this->hash = "";
            $this->nom = "";
            $this->prenom = "";
            $this->adresse = "";
            $this->code_postal = "";
            $this->ville = "";
            $this->dateInscription = new Datetime();
        }

            /************************************************  INITIALISATION ET PARAMETRAGE DE LA DATE DE CREATION  *****************************************************/
        
        public function __set($property, $value) {
            if ($property == "date_inscription") {
                $this->dateInscription = new Datetime($value);
            } else {
               $this->$property = $value; 
            }           
        }

        

        public function __get($property) {
            if ($property == "date_inscription") {
                return $this->dateInscription;
            } else {
              return $this->$property; 
            }   
        }

            /*************************************************  CONNEXION  ******************************************************/
            /**
            * @param string Email de l'utilisateur souhaitant se connecter
            * @param string Mot de passe en clair de l'utilisateur souhaitant se connecter
            * 
            * @return User l'utilisateur enregistré qui correspond aux critères
            */

        public function getPassword() {
            return $this->hash;
        }

        public static function login(string $email, string $hash) : User {

            try {
                $connexion = new PDO('mysql:host=localhost;dbname=wmskate;charset=utf8', 'root', '');
                $connexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // On regarde si l'utilisateur est inscrit dans la table utilisateurs
                //$check = $connexion->prepare('SELECT * FROM utilisateurs WHERE email = :email AND actif = 1;');
                $check = $connexion->prepare('SELECT * FROM utilisateurs WHERE email = :email;');
                $check->bindParam(':email', $email, PDO::PARAM_STR);
                $check->execute();

                $data = $check->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");

                if ($check->rowCount()) {
                    $user = $data[0];
                    if(password_verify($hash, $user->getPassword()))
                    {
                        return $user;

                    } else {
                        return new User();
                    }
                   
                } else {
                    return new User();
                }
            
            } catch(Exception $e) {
                return new User();
            }
        }

            /*************************************************  REGISTER  ****************************************************/ 

            /**
            * @param void Rien à passer en paramètre !
            * @return bool TRUE in case of success or FALSE in case of failure
            */

        public function creerCompte() : bool {
            $email = $this->email;
            $hash = $this-> hash;
            $nom = $this-> nom;
    
            // Requête 
            $sql = "INSERT INTO utilisateurs (email, hash, nom) VALUES (:email, :hash, :nom);";
                
            // Connexion à la base de données
            try {  
                $connexion = new PDO("mysql: host=localhost; port=3306; dbname=wmsake; charset=utf8", "root", "");
    
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                $requete = $connexion->prepare($sql);
                $requete-> bindParam(":email", $email, PDO::PARAM_STR);
                $requete-> bindParam(":password", $hash, PDO::PARAM_STR);
                $requete-> bindParam(":pseudo", $nom, PDO::PARAM_STR);
    
                return $requete-> execute();

            } catch (Exception $exc) {
                // echo $exc-> getMessage();
                return false;
            }
        }

        /***************************************************  RECHERCHE  SI LE MAIL EST DEJA EXISTANT ****************************************************/  

        /**
         * @param string $email Email de l'utilisateur souhaitant se connecter
         * 
         * @return bool TRUE si un compte portant cet email existe déjà, FALSE sinon
         */
        public static function exists(string $email): bool {
            // Requête SQL à executer
            $sql = "SELECT * FROM utilisateurs WHERE email LIKE :email;";

            try {
                // connexion à la base de données
                $connexion = new PDO("mysql: host=localhost; port=3306; dbname=wmskate; charset=utf8", "root", "");
    
                $requete = $connexion-> prepare($sql);
                $requete-> bindParam(":email", $email, PDO::PARAM_STR);
    
                $requete-> execute();

                $resultats = $requete-> fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");

                //var_dump($resultats);

                if (count($resultats) > 0) {
                    return true;
                } else {
                   return false;
                }

            } catch (Exception $exc) {
                //   echo $exc-> getMessage();

                // par sécurité et empêcher toute création de compte en cas de problème
                return true;
            }
        }

         /******************************************************  FIND BY ID   ****************************************************************************/

        /**
         * @param int $id Identifiant de l'utilisateur à retrouver
         * 
         * @return User L'utilisateur qui possède l'identifiant fourni en argument
         */
        public static function findByiD(int $id): User {
            // Requête SQL à executer
            $sql = "SELECT * FROM utilisateurs WHERE id = :id;";

            try {
                // connexion à la base de données
                $connexion = new PDO("mysql: host=localhost; port=3306; dbname=wmskate; charset=utf8", "root", "");
    
                $requete = $connexion-> prepare($sql);
                $requete-> bindParam(":id", $id, PDO::PARAM_INT);
    
                $requete-> execute();

                $resultats = $requete-> fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");

                //var_dump($resultats);

                if (count($resultats) > 0) {
                    return $resultats[0];
                } else {
                   return new User();
                }

            } catch (Exception $exc) {
                //   echo $exc-> getMessage();

                return new User();
            }
        }

}

    
    