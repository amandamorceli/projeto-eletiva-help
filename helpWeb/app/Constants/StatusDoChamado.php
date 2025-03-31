<?php

namespace App\Constants;

enum StatusChamado: int
{
    case Criado = 1;
    case Em_Atendimento = 2;
    case Pausado = 3;
    case Excluido = 4;
    case Finalizado = 5;
}
