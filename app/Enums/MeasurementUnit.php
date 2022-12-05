<?php

namespace App\Enums;

enum MeasurementUnit: string
{
  case Pieces = 'pcs';

  case Milligram = 'mg';
  case Gram = 'gr';
  case Kilogram = 'kg';

  case Milliliter = 'ml';
  case Liter = 'ltr';
  case Kiloliter = 'kl';

  public function locale(): string
  {
    return match ($this) {
      MeasurementUnit::Pieces => 'Pieces',

      MeasurementUnit::Milligram => 'Miligram',
      MeasurementUnit::Gram => 'Gram',
      MeasurementUnit::Kilogram => 'Kilogram',

      MeasurementUnit::Milliliter => 'Mililiter',
      MeasurementUnit::Liter => 'Liter',
      MeasurementUnit::Kiloliter => 'Kiloliter',
    };
  }
}
