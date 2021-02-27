<?php 
class Change {
    private $_array;
    private $_money;

    public function __construct (array $array, float $money)
    {
        $this->_money = $money;
        $this->_array = $array;
    }

    public function getChange(): array
    {
        echo "-----------------------Pour $this->_money-----------------------\n";
        $numberAvailable = [];
        $nbr;
        $nbrMax = 0;
        $renduEuros = [];

        $nbr = ($this->_money*100); //On converti en centime les euros reçus
        $nbrMax = $this->nbrMax(); //On récupère le nombre max du tableau reçu
        $numberAvailable = $this->getAvailableChange(); //On vide le tableau des éléments avec 0 disponibilité, puis en inversant l'ordre du tableau

        if($nbr <= $nbrMax)
        {
            foreach ($numberAvailable as $key => $value)//On parcourt le tableau en testant 3 possibilités puis on inscrit chaque passage dans un nouveau tableau
            {
                $divisible = $nbr/$key;
                $cut = explode(".",$divisible);
                if ($cut[0]>$value)
                {
                    $nbr = $nbr-($nbr-(($divisible-$value)*$key));
                    $nbr = round($nbr, 0);
                    $renduEuros[$key] = $value;
                }
                elseif($cut[0]<$value)
                {
                    $nbr = $nbr-($nbr-(($divisible-$cut[0])*$key));
                    $nbr = round($nbr, 0);
                    $renduEuros[$key] = $cut[0];
                }
                elseif($divisible == $value)
                {
                    $nbr = ($nbr-($divisible*$key));
                    $renduEuros[$key] = $divisible;
                }
            }
        }
        else
        {
            echo "il n'y a pas assez d'argent dans la caisse. (montant maximum : " . $nbrMax/100 . " )\n\n";
        }
        return $renduEuros;

    }
    
    public function getAvailableChange(): array
    {
        $numberAvailable = [];
        $arrayReverse = [];
        $arrayReverse = array_reverse($arrayReverse = $this->_array, true);
        foreach ($arrayReverse as $key => $value)
        {
           if($value !== 0)
           {
            $numberAvailable[$key] = $value;
           }
        }
        return $numberAvailable;
    }  
    public function nbrMax(): float
    {
        $nbrMax = 0;
        foreach ($this->_array as $key => $value)
        {
           if($value !== 0)
           {
            $nbrMax = $nbrMax + $key*$value;
           }
        }
        return $nbrMax;
    }  
}