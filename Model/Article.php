<?php

class Article extends Database
{
    private $idArticle;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $idCategory;
    private $picture_url;
    private $active;
    private $sex;

    public function __construct()
    {
        $this->active = false;
    }

    //Find All 
    public function findAll()
    {
        if(empty($this->connection()))
        {
            return $this;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM article';
            $req = $this->connection()->prepare($query);

            $req->execute() or die('Erreur : '.$e->getMessage());

            //Handle result
            if(!empty($req->execute()) && $req->rowCount() != 0)
            {
                $data = array();

                while($row = $req->fetch())
                {
                    $item = new Article();
                    $item->findOneById($row['idArticle']);

                    foreach($item as $value)
                    {
                        $value = array(
                            'id' => $row['idArticle'],
                            'url' => $row['picture_url'],
                            'name' => $row['name'],
                            'price' => $row['price']);   
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

    //Find All Articles by Parcel
    public function findAllbyUser($parcel)
    {
        if(empty($this->connection()))
        {
            return $this;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM article WHERE idArticle = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($parcel)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if(!empty($req->execute() && $req->rowCount() != 0))
            {
                $data = array();

                while($row = $req->fetch())
                {
                    $item = new Article();
                    $item->findOneById($row['idArticle']);

                    foreach($item as $value)
                    {
                        $value = array(
                            'id' => $row['idArticle'],
                            'url' => $row['picture_url'],
                            'name' => $row['name'],
                            'price' => $row['price']);   
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

    //find all Man

    public function findAllManArticle()
    {
        if(empty($this->connection()))
        {
            return $this;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM article WHERE sex = "homme" ';
            $req = $this->connection()->prepare($query);

            $req->execute() or die('Erreur : '.$e->getMessage());

            //Handle result
            if(!empty($req->execute()) && $req->rowCount() != 0)
            {
                $data = array();

                while($row = $req->fetch())
                {
                    $item = new Article();
                    $item->findOneById($row['idArticle']);

                    foreach($item as $value)
                    {
                        $value = array(
                            'id' => $row['idArticle'],
                            'url' => $row['picture_url'],
                            'name' => $row['name'],
                            'price' => $row['price']);   
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

    public function findAllWomanArticle()
    {
        if(empty($this->connection()))
        {
            return $this;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM article WHERE sex = "femme" ';
            $req = $this->connection()->prepare($query);

            $req->execute() or die('Erreur : '.$e->getMessage());

            //Handle result
            if(!empty($req->execute()) && $req->rowCount() != 0)
            {
                $data = array();

                while($row = $req->fetch())
                {
                    $item = new Article();
                    $item->findOneById($row['idArticle']);

                    foreach($item as $value)
                    {
                        $value = array(
                            'id' => $row['idArticle'],
                            'url' => $row['picture_url'],
                            'name' => $row['name'],
                            'price' => $row['price']);   
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

    public function findOneById($idArticle)
    {   
        if(empty($this->connection()) || empty($idArticle))
        {
            return null;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM article WHERE idArticle = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($idArticle)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if (!empty($req->execute()) && $req->rowCount() != 0) 
            {
                $data = $req->fetch();
               
                $this->idArticle = $data['idArticle'];
                $this->name = $data['name'];
                $this->description = $data['description'];
                $this->price = $data['price'];
                $this->stock = $data['stock'];
                $this->idCategory = $data['idCategory'];
                $this->picture_url = $data['picture_url'];
                $this->active = $data['active'];
                $this->sex = $data['sex'];
                
                return $this;
            }
            else
            {
                return null;
            }
        }
    }

    public function findOneByName($name)
    {   
        if(empty($this->connection()) || empty($name))
        {
            return null;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM article WHERE name = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($name)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if (!empty($req->execute()) && $req->rowCount() != 0) 
            {
                $data = $req->fetch();

                $this->idArticle = $data['idArticle'];
                $this->name = $data['name'];
                $this->description = $data['description'];
                $this->price = $data['price'];
                $this->picture_url = $data['picture_url'];

                return $this;
            }
            else
            {
                return null;
            }
        }
    }

    public function insertArticle()
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {

            $queryString  = 'INSERT INTO article (
                name, 
                description, 
                price, 
                stock,
                idCategory,
                picture_url,
                active,
                sex
                
            ) VALUES(
                :name, 
                :description, 
                :price, 
                :stock,
                :idCategory,
                :picture_url,
                :active,
                :sex
                )';
    
            $query = $this->connection()->prepare($queryString);

            $query->bindParam(':name', $this->name);
            $query->bindParam(':description', $this->description);
            $query->bindParam(':price', $this->price);
            $query->bindParam(':stock', $this->stock);
            $query->bindParam(':idCategory', $this->idCategory);
            $query->bindParam(':picture_url', $this->picture_url);
            $query->bindParam(':active', $this->active);
            $query->bindParam(':sex', $this->sex);
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

    public function updateArticle($idArticle) 
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {
            // Prepare and execute query
            $query = "UPDATE Article SET
                name = ?, 
                description = ?, 
                price = ?,
                stock = ?,
                idCategory = ?,
                picture_url = ?,
                active = ?,
                sex = ?
				
                WHERE idArticle = ?";

            $req = $this->connection()->prepare($query);

            $req->execute(array(
                $this->name,
                $this->description,
                $this->price,
                $this->stock,
                $this->idCategory,
                $this->picture_url,
                $this->active,
                $this->sex,
                $this->idArticle
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

    public function updateStock($stock,$idArticle)
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {
            // Prepare and execute query
            $query = "UPDATE Article SET stock = ? WHERE idArticle = ?";

            $req = $this->connection()->prepare($query);

            $req->execute(array($stock,$idArticle)) or die('Erreur : '.$e->getMessage());

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

    public function deleteArticle($idArticle) 
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {
            // Prepare and execute query
            $query = "DELETE FROM article WHERE idArticle = ?";

            $req = $this->connection()->prepare($query);

            $req->execute(array($idArticle)) or die('Erreur : '.$e->getMessage());

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

    //Getters
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public function getPictureUrl()
    {
        return $this->picture_url;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getSex()
    {
        return $this->sex;
    }

    //Setters
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    }

    public function setPictureUrl($picture_url)
    {
        $this->picture_url = $picture_url;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
    }
}