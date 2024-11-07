<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modalForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $modalTitle,
        public $modalId,
        public $modalType,
        public $formAction,
        public $spoofMethod,
        public $params,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-form');
    }
}
