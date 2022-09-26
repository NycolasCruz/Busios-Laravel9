<?php

namespace App\Enums;

enum IncomeTypeEnum: int
{
    case LESS_10000 = 1;
    case BETWEEN_10000_AND_50000 = 2;
    case MORE_50000 = 3;

    public function getDescription() {
        return match($this) {
            IncomeTypeEnum::LESS_10000 => 'Menos que 10.000',
            IncomeTypeEnum::BETWEEN_10000_AND_50000 => 'Entre 10.000 e 50.000',
            IncomeTypeEnum::MORE_50000 => 'Mais que 50.000',
        };
    }
}

// documentation
// IncomeTypeEnum::cases()->value pra pegar todos os valores num loop
// IncomeTypeEnum::LESS_10000->value pra pegar um valor do caso do enum
// IncomeTypeEnum::LESS_10000->getDescription() pra pegar a descrição do caso do enum
// IncoeTypeEnum::tryFrom($value)->getDescription() pra pegar a descrição do caso do enum a partir de um valor
