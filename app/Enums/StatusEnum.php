<?php

namespace App\Enums;
 
enum StatusEnum:string {
    case Aguardando_Pagamento = 'Aguardando pagamento';
    case Paga = 'Paga';
    case Cancelada = 'Cancelada';
}