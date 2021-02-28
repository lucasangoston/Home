<?php

class ParcelDetail extends Database
{
 
    private $idParcelDetail;
    private $idParcel;
    private $idArticle;
    private $amount;
    private $total;

    public function __construct()
    {

        $this->amount = 1;
    }

    //find all

    public function findAll()
    {
        if(empty($this->connection()))
        {
            return $this;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM parceldetail';
                                           
            $req = $this->connection()->prepare($query);

            $req->execute(array($this->idParcelDetail)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if(!empty($req->execute()) && $req->rowCount() != 0)
            {
                while($row = $req->fetch())
                {
                    $item = new Article();
                    $item->findOneByIdAndStatus($row['idUser'],$row['status']);

                    $data = array(
                        'id' => $row['idArticle'],
                        'url' => $row['picture_url'],
                        'name' => $row['name'],
                        'price' => $row['price']);

                        ?>
                            <li>
                                <p>
                                    <div class="zoom">
                                        <a href="index.php?page=detailArticle&amp;id=<?=$data['id']?>"><img src = "<?=  $data['url'] ?>" width="420" height="auto" class="entoureimage"/></a>
                                    </div>
                                    
                                    <span><?= $data['name'] ?></span>
                                </p>
                                <span><?=  $data['price'] ?> €</span>
                            </li>
                        <?php
                }
                return $data;
                
            }
            else
            {
                return false;
            }
        }
    }

    public function insertParcelDetail()
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {
            $queryString  = 'INSERT INTO parceldetail (
                idParcelDetail,
                idParcel,
                idArticle,
                amount,
                total
                
            ) VALUES(
                :idParcelDetail,
                :idParcel,
                :idArticle,
                :amount,
                :total
                )';
    
            $query = $this->connection()->prepare($queryString);

            $query->bindParam(':idParcelDetail', $this->idParcelDetail);
            $query->bindParam(':idParcel', $this->idParcel);
            $query->bindParam(':idArticle', $this->idArticle);
            $query->bindParam(':amount', $this->amount);
            $query->bindParam(':total', $this->total);
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

   // Getters

    public function getIdParcelDetail()
    {
        return $this->idParcelDetail;
    }

    public function getIdParcel()
    {
        return $this->idParcel;
    }

    public function getIdArticle()
    {
        return $this->idArticle;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getTotal()
    {
        return $this->total;
    }


    // Setters

    public function setIdParcelDetail($idParcelDetail)
    {
        $this->idParcelDetail = $idParcelDetail;

        return $this;
    }

    public function setIdParcel($idParcel)
    {
        $this->idParcel = $idParcel;

        return $this;
    }

    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}