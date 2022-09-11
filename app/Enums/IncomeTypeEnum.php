<?php

namespace App\Enums;

enum IncomeTypeEnum: int
{
    case Salary = 1;
    case Dividends = 2;
    case Interest = 3;
    case Rental = 4;
    case Other = 5;
}
