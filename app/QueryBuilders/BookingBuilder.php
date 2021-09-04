<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class BookingBuilder extends Builder
{
  //
  public function whereBetweenDates($from, $to): self
  {
    return $this->where('to', '>=', $from)->where('from', '<=', $to);
  }
}
