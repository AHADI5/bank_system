<?php

namespace models;

class Fiche
{
    private $matricule;
    private $td;
    private $departement ;
    private  $promotion;
    private $codeCours;

    private $tp;
    private $interro ;
    private $examen ;
    private $moyenneCours ;
    private $moyenneCc;


    /**
     * @param $matricule
     * @param $departement
     * @param $promotion
     * @param $codeCours
     * @param $td
     * @param $tp
     * @param $interro
     * @param $examen
     */
    public function __construct($matricule, $departement, $promotion,$codeCours,
                                $td,$tp, $interro, $examen, $moyenneCc,$moyenneCours)
    {
        $this->matricule = $matricule;
        $this->td = $td;
        $this->departement = $departement;
        $this->promotion = $promotion;
        $this->tp = $tp;
        $this->interro = $interro;
        $this->examen = $examen;
        $this ->codeCours =$codeCours;
        $this -> moyenneCc =$moyenneCc;
        $this -> moyenneCours =$moyenneCours;
    }

    public  function enregistrer() {
        global $connection ;
        $result = false ;
        $matricule =$this->matricule;
        $td = $this->td ;
        $departement = $this->departement ;
        $promotion  = $this->promotion ;
        $codeCours = $this -> codeCours;
        $tp = $this->tp ;
        $interro = $this->interro ;
        $examen = $this->examen ;

        $moyenneCc = $this -> moyenneCc;
        $moyenneCours = $this -> moyenneCours;

        $requette = 'INSERT INTO NOTES (NOTE_TP,NOTE_TD,NOTE_INTERRO,NOTE_EXAMEN,MOYENNE_CC,
                   MOYENNE_COURS,CODE,STUDENT_ID) VALUES (:NOTE_TP,:NOTE_TD,:NOTE_INTERRO,:NOTE_EXAMEN,:MOYENNE_CC,
                  :MOYENNE_COURS,:CODE,:STUDENT_ID)';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            ":NOTE_TP" =>  $tp,
            ":NOTE_TD" => $td,
            ":NOTE_INTERRO" => $interro,
            ":NOTE_EXAMEN" => $examen,
            ":MOYENNE_CC" => $moyenneCc,
            ":MOYENNE_COURS" =>  $moyenneCours,
            ":CODE" => $codeCours,
            ":STUDENT_ID" => $matricule

        ]);

        if ($execution) {
            $result = true ;
        }
        return $result;

    }

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param mixed $matricule
     */
    public function setMatricule($matricule): void
    {
        $this->matricule = $matricule;
    }

    /**
     * @return mixed
     */
    public function getTd()
    {
        return $this->td;
    }

    /**
     * @param mixed $td
     */
    public function setTd($td): void
    {
        $this->td = $td;
    }

    /**
     * @return mixed
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @param mixed $departement
     */
    public function setDepartement($departement): void
    {
        $this->departement = $departement;
    }

    /**
     * @return mixed
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param mixed $promotion
     */
    public function setPromotion($promotion): void
    {
        $this->promotion = $promotion;
    }

    /**
     * @return mixed
     */
    public function getTp()
    {
        return $this->tp;
    }

    /**
     * @param mixed $tp
     */
    public function setTp($tp): void
    {
        $this->tp = $tp;
    }

    /**
     * @return mixed
     */
    public function getInterro()
    {
        return $this->interro;
    }

    /**
     * @param mixed $interro
     */
    public function setInterro($interro): void
    {
        $this->interro = $interro;
    }

    /**
     * @return mixed
     */
    public function getExamen()
    {
        return $this->examen;
    }

    /**
     * @param mixed $examen
     */
    public function setExamen($examen): void
    {
        $this->examen = $examen;
    }
    /**
     * @return mixed
     */
    public function getMoyenneCours()
    {
        return $this->moyenneCours;
    }

    /**
     * @param mixed $moyenneCours
     */
    public function setMoyenneCours($moyenneCours): void
    {
        $this->moyenneCours = $moyenneCours;
    }

    /**
     * @return mixed
     */
    public function getMoyenneCc()
    {
        return $this->moyenneCc;
    }

    /**
     * @param mixed $moyenneCc
     */
    public function setMoyenneCc($moyenneCc): void
    {
        $this->moyenneCc = $moyenneCc;
    }



    /**
     * @return mixed
     */
    public function getCodeCours()
    {
        return $this->codeCours;
    }

    /**
     * @param mixed $codeCours
     */
    public function setCodeCours($codeCours): void
    {
        $this->codeCours = $codeCours;
    }



}