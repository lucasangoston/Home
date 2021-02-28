<?php

class Basket extends Database
{
 
    private $idBasket;
    private $idUser;
    private $idArticle;

    public function __construct()
    {
        $this->idUser = $_SESSION['idUser'];
    }

    //Find All
    public function findAllByUser()
    {
        if(empty($this->connection()))
        {
            return $this;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM basket WHERE idUser = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($this->idUser)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if(!empty($req->execute()) && $req->rowCount() != 0)
            {
                $data = array();

                while($row = $req->fetch())
                {
                    $item = new basket();
                    $item->findOneById($row['idUser']);

                    foreach($item as $value)
                    {
                        $value = $row['idArticle'];
                    }

                    $data[]=$value;

                }
                return $data;
            }
            else
            {
                return false;
            }
        }
    }

    //findOneById

    public function findOneById($idBasket)
    {   
        if(empty($this->connection() || empty($idBasket)))
        {
            return null;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM basket WHERE idBasket = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($idBasket)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if (!empty($req->execute()) && $req->rowCount() != 0) 
            {
                $data = $req->fetch();
               
                $this->idUser = $data['idUser'];
                $this->idArticle = $data['idArticle'];
                $this->idBasket = $data['idBasket'];

                return $this;
            }
            else
            {
                return null;
            }
        }
    }

    public function insertBasket()
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {
            $queryString  = 'INSERT INTO basket (
                idArticle, 
                idUser
                
            ) VALUES(
                :idArticle, 
                :idUser
                )';
    
            $query = $this->connection()->prepare($queryString);

            $query->bindParam(':idArticle', $this->idArticle);
            $query->bindParam(':idUser', $this->idUser);
            $query-> execute();

            if (empty($query))
            {
                return false;
            } 
            else 
            {
                return $query;
            }
        }
    }

    public function updateBasket()
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {
            // Prepare and execute query
            $query = "UPDATE Basket SET
                idArticle, 
                idUser
				
                WHERE idBasket = ?";

            $req = $this->connection()->prepare($query);

            $req->execute(array(
                $this->idArticle,
                $this->idUser
                
            )) or die('Erreur : '.$e->getMessage());

            if (empty($req))
            {
                return false;
            } 
            else 
            {
                return $req;
            }
        }
    }

    public function deleteArticleById($idArticle, $idUser)
    {
        if (empty($this->connection()))
        {
            return false;
        }
        else
        {
            // Prepare and execute query
            $query = "DELETE FROM basket WHERE idArticle = ? and idUser = ?";

            $req = $this->connection()->prepare($query);

            $req->execute(array($idArticle,$idUser)) or die('Erreur : '.$e->getMessage());

            if (empty($req))
            {
                return false;
            }
            else
            {
                return $req;
            }
        }
    }

    public function deleteAllArticleById($idUser)
    {
        if (empty($this->connection()))
        {
            return false;
        }
        else
        {
            // Prepare and execute query
            $query = "DELETE FROM basket WHERE idUser = ?";

            $req = $this->connection()->prepare($query);

            $req->execute(array($idUser)) or die('Erreur : '.$e->getMessage());

            if (empty($req))
            {
                return false;
            }
            else
            {
                return $req;
            }
        }
    }

   // Getters

    public function getIdArticle()
    {
        return $this->idArticle;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getIdBasket()
    {
        return $this->idBasket;
    }


    // Setters

    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function setIdBasket($idBasket)
    {
        $this->idBasket = $idBasket;

        return $this;
    }
}