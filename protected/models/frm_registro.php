<?php

class frm_registro extends CFormModel
{

    public $nom;
    public $psw;
    public $eml;
    public $cps;
    public $equ;

    public function rules()
    {

        return array(
            array('nom', 'required'),
            array('nom', 'validaUsuario'),
            array('nom', 'encoding'),
            array('nom', 'length', 'max' => 10),
            ///
            array('psw', 'required'),
            array('psw', 'length', 'max' => 10),
            array('psw', 'length', 'min' => 6),
            array('cps', 'required'),
            array('cps', 'compare', 'compareAttribute' => 'psw'),
            ///
            array('eml', 'required'),
            array('eml', 'email'),
            array('eml', 'validaMail'),
            array('eml', 'length', 'max' => 40),
            ///
            array('equ', 'required'),
            array('equ', 'length', 'max' => 2),
            ///
        );
    }

    public function attributeLabels()
    {
        return array(
            'nom' => 'Nombre',
            'psw' => 'Contraseña',
            'cps' => 'Repetir Contraseña',
            'eml' => 'Email',
            'equ' => 'Equipo',
        );
    }

    public function validaUsuario($attribute)
    {
        if ($this->nom != ''):
            if (preg_match('/á|é|í|ó|ú|Á|É|Í|Ó|Ú|à|è|ì|ò|ù|À|È|Ì|Ò|Ù|ä|ë|ï|ö|ü|Ä|Ë|Ï|Ö|Ü|â|ê|î|ô|û|Â|Ê|Î|Ô|Û|ý|Ý|ÿ/', $this->nom) > 0):
                $this->addError($attribute, ' El usuario no puede tener caractéres no válidos.');
            else:
                if (preg_match('/\s/', $this->nom) > 0):
                    $this->addError($attribute, ' El usuario no puede tener espacios.');
                else:
                    $tot = Consultas::getUsuario($this->$attribute);
                    if ($tot):
                        $this->addError($attribute, ' El nombre ingresado ya se encuentra registrado.');
                    endif;
                endif;
            endif;
        endif;
    }

    public function validaMail($attribute)
    {
        if ($this->eml != ''):
            if (preg_match('/á|é|í|ó|ú|Á|É|Í|Ó|Ú|à|è|ì|ò|ù|À|È|Ì|Ò|Ù|ä|ë|ï|ö|ü|Ä|Ë|Ï|Ö|Ü|â|ê|î|ô|û|Â|Ê|Î|Ô|Û|ý|Ý|ÿ/', $this->nom) > 0):
                $this->addError($attribute, ' El mail no puede tener caractéres no válidos.');
            else:
                if (preg_match('/\s/', $this->eml) > 0):
                    $this->addError($attribute, ' El mail no puede tener espacios.');
                else:
                    $tot = Consultas::getUsuarioMail($this->$attribute);
                    if ($tot):
                        $this->addError($attribute, ' El mail ingresado ya se encuentra registrado.');
                    endif;
                endif;
            endif;
        endif;
    }

    public function encoding($attribute)
    {
        if (sistema::validar_encoding($this->$attribute) == false):
            $this->addError($attribute, $this->getAttributeLabel($attribute) . ' contiene caracteres no válidos.');
        endif;
    }

}
