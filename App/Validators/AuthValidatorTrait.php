<?php

namespace App\Validators;

use HTR\Helpers\Mensagem\Mensagem as msg;
use Respect\Validation\Validator as v;
use HTR\Helpers\Criptografia\Criptografia as Cripto;

trait AuthValidatorTrait
{
    use \HTR\System\CommonTrait;
    
    protected function validateId()
    {
        $value = v::intVal()->validate($this->getId());
        if (!$value) {
            msg::showMsg('O ID deve ser um número inteiro válido.', 'danger');
        }
        return $this;
    }

    protected function validateUsername()
    {
        $value = v::stringType()->notEmpty()->validate($this->getUsername());
        if (!$value) {
            msg::showMsg('O campo Login deve ser preenchido corretamente.'
                . '<script>focusOn("username");</script>', 'danger');
        }

        $this->criptoVar('username', $this->getUsername());

        return $this;
    }

    protected function validatePassword()
    {
        $value = v::stringType()->notEmpty()->length(8, null)->validate($this->getPassword());
        if (!$value) {
            msg::showMsg('O campo Senha deve ser preenchido corretamente'
                . ' com no <strong>mínimo 8 caracteres</strong>.'
                . '<script>focusOn("password");</script>', 'danger');
        }
        
        $this->criptoVar('password', $this->getPassword(), true);
        
        return $this;
    }

    protected function validateName()
    {
        $value = v::stringType()->notEmpty()->validate($this->getName());
        if (!$value) {
            msg::showMsg('O campo Nome deve ser preenchido corretamente.'
                . '<script>focusOn("name");</script>', 'danger');
        }
        return $this;
    }

    protected function validateEmail()
    {
        $value = v::email()->notEmpty()->validate($this->getEmail());
        if (!$value) {
            msg::showMsg('O campo E-mail deve ser preenchido corretamente.'
                . '<script>focusOn("email");</script>', 'danger');
        }
        $this->criptoVar('email', $this->getEmail());
        return $this;
    }

    protected function validateLevel()
    {
        $value = v::intVal()->notEmpty()->validate($this->getLevel());
        if (!$value) {
            msg::showMsg('O campo Nível de Acesso deve ser deve ser preenchido corretamente.'
                    . '<script>focusOn("level");</script>', 'danger');
        }
        return $this;
    }
    
    protected function criptoVar($attribute, $value, $password = false)
    {
        $cripto = new Cripto;
        if (!$password) {
            $this->$attribute = $cripto->encode($value);
        } else {
            $this->$attribute = $cripto->passHash($value);
        }
        return $this;
    }
}
