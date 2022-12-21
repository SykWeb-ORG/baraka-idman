<?php

namespace App\View\Components\Beneficiaire;

use Illuminate\View\Component;

class SocialAssistantPart extends Component
{
    public $couvertures;
    public $drogue_types;
    public $services;
    public $violence_types;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($couvertures, $drogueTypes, $services, $violenceTypes)
    {
        $this->couvertures = $couvertures;
        $this->drogue_types = $drogueTypes;
        $this->services = $services;
        $this->violence_types = $violenceTypes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.beneficiaire.social-assistant-part');
    }
}
