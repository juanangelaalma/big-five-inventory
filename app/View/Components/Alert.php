<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    private $messages = [
        "success" => "Sukses",
        "warning" => "Warning",
        "error" => "Telah terjadi kesalahan",
    ];

    public $type = "";
    public $message = "";

    public function __construct($type = "success", $message = "") {
        $this->type = $type;
        if(!$message) {
            $this->message = $this->messages[$type];
        } else {
            $this->message = $message;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
