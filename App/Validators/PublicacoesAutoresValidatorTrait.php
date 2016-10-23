<?php
/**
 * @validator PublicacoesAutoresValidatorTrait
 * @created at 23-10-2016 12:03:57
 * - Criado Automaticamente pelo HTR Assist
 */

namespace App\Validators;

use HTR\Helpers\Mensagem\Mensagem as msg;
use Respect\Validation\Validator as v;

trait PublicacoesAutoresValidatorTrait
{
    use \HTR\System\CommonTrait;

    protected function validateId()
    {
        $value = v::intVal()->notEmpty()->length(1, 11)->validate($this->getId());
        if (!$value) {
            msg::showMsg('O campo id deve ser preenchido corretamente.'
                . '<script>focusOn("id");</script>', 'danger');
            return $this;
        }
    }

    protected function validateAutoresId()
    {
        $value = v::intVal()->notEmpty()->length(1, 11)->validate($this->getAutoresId());
        if (!$value) {
            msg::showMsg('O campo autores_id deve ser preenchido corretamente.'
                . '<script>focusOn("autores_id");</script>', 'danger');
            return $this;
        }
    }

    protected function validatePublicacoesId()
    {
        $value = v::intVal()->notEmpty()->length(1, 11)->validate($this->getPublicacoesId());
        if (!$value) {
            msg::showMsg('O campo publicacoes_id deve ser preenchido corretamente.'
                . '<script>focusOn("publicacoes_id");</script>', 'danger');
            return $this;
        }
    }

}
