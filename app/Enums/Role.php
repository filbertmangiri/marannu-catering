<?php

namespace App\Enums;

enum Role: string
{
  case User = 'user';
  case Employee = 'employee';
  case Moderator = 'moderator';
  case Admin = 'admin';

  public function level(): int
  {
    return match ($this) {
      Role::User => 0,
      Role::Employee => 1,
      Role::Moderator => 2,
      Role::Admin => 3,
    };
  }
}
