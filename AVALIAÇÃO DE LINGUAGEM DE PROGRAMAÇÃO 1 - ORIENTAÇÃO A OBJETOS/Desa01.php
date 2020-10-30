<?php
class criptografia
{
    private $senha;

    private function letra($string)
    {
        return (strlen(preg_replace("/[^A-Za-z]/", "", $string)) == 1) ? true : false;
    }

    private function SeparaSenha($string)
    {
        $this->senha = array();
        for ($i = 0; $i < strlen($string); $i++) {
            array_push($this->senha, $string[$i]);
        }
    }

    private function cripto1($string)
    {
        $this->SeparaSenha($string);
        $cripto = '';
        foreach ($this->senha as $caracter) {
            if ($this->letra($caracter)) {
                $caracter = chr(ord($caracter) + 3);
            }
            $cripto.=$caracter;
            $cripto = $caracter . $cripto;
        }
        return $cripto;
    }

    private function cripto2($string)
    {
        $midTexto   = floor(strlen($string) / 2);
        $strCripto2 = substr($string, 0, $midTexto);
        for ($i = $midTexto; $i < strlen($string); $i++) {
            $strCripto2 .= chr(ord(substr($string, $i, 1)) - 1);
        }
        return $strCripto2;
    }

    public function criptoSenha($string)
    {
        $novaSenha = $this->cripto1($string);
        return $this->cripto2($novaSenha);
    }
}

$des01 = new criptografia();
$senhaOriginal = 'Texto #3';
echo "Senha '$senhaOriginal' criptografada :'" . $des01->criptoSenha($senhaOriginal) . "'";
