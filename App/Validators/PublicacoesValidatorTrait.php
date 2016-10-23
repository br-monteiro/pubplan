<?php
/**
 * @validator PublicacoesValidatorTrait
 * @created at 20-10-2016 16:12:40
 * - Criado Automaticamente pelo HTR Assist
 */

namespace App\Validators;

use HTR\Helpers\Mensagem\Mensagem as msg;
use Respect\Validation\Validator as v;

trait PublicacoesValidatorTrait
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

    protected function validateTitulo()
    {
        $value = v::stringType()->notEmpty()->length(1, 100)->validate($this->getTitulo());
        if (!$value) {
            msg::showMsg('O campo Título da Obra deve ser preenchido corretamente.'
                . '<script>focusOn("titulo");</script>', 'danger');
            return $this;
        }
    }

    protected function validateAno()
    {
        $value = v::intVal()->notEmpty()->length(1, 4)->validate($this->getAno());
        if (!$value) {
            msg::showMsg('O campo Ano deve ser preenchido corretamente.'
                . '<script>focusOn("ano");</script>', 'danger');
            return $this;
        }
    }

    protected function validateEditora()
    {
        $value = v::stringType()->length(null, 45)->validate($this->getEditora());
        if (!$value) {
            msg::showMsg('O campo Editora deve ser preenchido corretamente.'
                . '<script>focusOn("editora");</script>', 'danger');
            return $this;
        }
    }

    protected function validateEdicao()
    {
        $value = v::stringType()->length(null, 20)->validate($this->getEdicao());
        if (!$value) {
            msg::showMsg('O campo Edição deve ser preenchido corretamente.'
                . '<script>focusOn("edicao");</script>', 'danger');
            return $this;
        }
    }

    protected function validateIsbn()
    {
        $value = v::stringType()->length(null, 45)->validate($this->getIsbn());
        if (!$value) {
            msg::showMsg('O campo ISBN deve ser preenchido corretamente.'
                . '<script>focusOn("isbn");</script>', 'danger');
            return $this;
        }
    }

    protected function validateSinopse()
    {
        $value = v::stringType()->length(1, 65535)->validate($this->getSinopse());
        if (!$value) {
            msg::showMsg('O campo Sinopse deve ser preenchido corretamente.'
                . '<script>focusOn("sinopse");</script>', 'danger');
            return $this;
        }
    }

    protected function validatePalavrasChave()
    {
        $value = v::stringType()->notEmpty()->length(1, 100)->validate($this->getPalavrasChave());
        if (!$value) {
            msg::showMsg('O campo Palavras Chaves deve ser preenchido corretamente.'
                . '<script>focusOn("palavras_chave");</script>', 'danger');
            return $this;
        }
    }

    protected function validateNumeroPagias()
    {
        $value = v::intVal()->notEmpty()->length(1, 4)->validate($this->getNumeroPagias());
        if (!$value) {
            msg::showMsg('O campo Quantidade de Páginas deve ser preenchido corretamente.'
                . '<script>focusOn("numero_pagias");</script>', 'danger');
            return $this;
        }
    }

    protected function validateLink($id)
    {
        if (file_exists('files_uploads/' . $id . '.pdf') && !$this->getLink()) {
            return true;
        }

        $value = v::url()->notEmpty()->validate($this->getLink());
        if (!$value) {
            msg::showMsg('É necessário fornecer uma URL válida para o campo <strong>Link</stron>.'
                . '<script>focusOn("link");</script>', 'danger', false);
            
            return false;
        }

        return true;
    }

    protected function validateIdiomasId()
    {
        $value = v::intVal()->notEmpty()->length(1, 11)->validate($this->getIdiomasId());
        if (!$value) {
            msg::showMsg('O campo Idiomas deve ser preenchido corretamente.'
                . '<script>focusOn("idiomas_id");</script>', 'danger');
            return $this;
        }
    }

    protected function validateCategoriasId()
    {
        $value = v::intVal()->notEmpty()->length(1, 11)->validate($this->getCategoriasId());
        if (!$value) {
            msg::showMsg('O campo Categorias deve ser preenchido corretamente.'
                . '<script>focusOn("categorias_id");</script>', 'danger');
            return $this;
        }
    }

    protected function validateTiposId()
    {
        $value = v::intVal()->notEmpty()->length(1, 11)->validate($this->getTiposId());
        if (!$value) {
            msg::showMsg('O campo Tipo Publicação deve ser preenchido corretamente.'
                . '<script>focusOn("tipos_id");</script>', 'danger');
            return $this;
        }
    }

}
