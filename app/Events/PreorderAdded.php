<?php

namespace App\Events;

use App\Preorder;
use Illuminate\Queue\SerializesModels;

class PreorderAdded
{
    use SerializesModels;

    public $preorder;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Preorder $preorder)
    {
        $this->preorder = $preorder;
    }

}
