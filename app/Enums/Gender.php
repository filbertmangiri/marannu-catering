<?php

namespace App\Enums;

enum Gender: string
{
  case Male = 'male';
  case Female = 'female';

  public function locale(): string
  {
    return match ($this) {
      Gender::Male => 'Pria',
      Gender::Female => 'Wanita',
    };
  }
}
