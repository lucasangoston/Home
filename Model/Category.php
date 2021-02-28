<?php

class Category extends Database
{
    private $idCategory;
    private $name;

    public function __construct()
    {

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
            $query = 'SELECT * FROM category';
            $req = $this->connection()->prepare($query);

            $req->execute() or die('Erreur : '.$e->getMessage());

            //Handle result
            if(!empty($req->execute()) && $req->rowCount() != 0)
            {
                $data = array();

                while($row = $req->fetch())
                {
                    $item = new Category();
                    $item->findOneById($row['idCategory']);

                    foreach($item as $value)
                    {
                        $value = array(
                            'id' => $row['idCategory'],
                            'name' => $row['name']);
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

    public function findOneById($idCategory)
    {
        if(empty($this->connection()) || empty($idCategory))
        {
            return null;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM category WHERE idCategory = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($idCategory)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if (!empty($req->execute()) && $req->rowCount() != 0)
            {
                $data = $req->fetch();

                $this->idCategory = $data['idCategory'];
                $this->name = $data['name'];

                return $this;
            }
            else
            {
                return null;
            }
        }
    }
}