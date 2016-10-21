<?php
/**
 * @validator IdiomasValidatorTrait
 * @created at 20-10-2016 16:07:32
 * - Criado Automaticamente pelo HTR Assist
 */

namespace App\Validators;

use HTR\Helpers\Mensagem\Mensagem as msg;
use Respect\Validation\Validator as v;

trait IdiomasValidatorTrait
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

    protected function validateNome()
    {
        $value = v::stringType()->length(null, 45)->validate($this->getNome());
        if (!$value) {
            msg::showMsg('O campo nome deve ser preenchido corretamente.'
                . '<script>focusOn("nome");</script>', 'danger');
            return $this;
        }
    }

}
