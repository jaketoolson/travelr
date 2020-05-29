<?php

namespace Orion\Travelr\Models;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginator extends LengthAwarePaginator
{
    /**
     * @var int|null
     */
    public $next_page;

    public function toArray(): array
    {
        $this->next_page = $this->nextPage();

        $array = parent::toArray();
        $array['next_page'] = $this->nextPage();

        return $array;
    }

    public function nextPage():? int
    {
        return ($this->lastPage() > $this->currentPage()) ? $this->currentPage + 1 : null;
    }
}
