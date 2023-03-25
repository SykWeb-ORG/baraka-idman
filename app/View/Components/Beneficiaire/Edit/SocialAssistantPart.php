<?php

namespace App\View\Components\Beneficiaire\Edit;

use Illuminate\View\Component;

class SocialAssistantPart extends Component
{
    public $couvertures;
    public $drogue_types;
    public $services;
    public $violence_types;
    public $zones;
    public $cases;
    public $beneficiaire;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($couvertures, $drogueTypes, $services, $violenceTypes, $beneficiaire, $zones, $cases)
    {
        $this->couvertures = $couvertures;
        $this->drogue_types = $drogueTypes;
        $this->services = $services;
        $this->violence_types = $violenceTypes;
        $this->zones = $zones;
        $this->cases = $cases;
        $this->beneficiaire = $beneficiaire;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.beneficiaire.edit.social-assistant-part');
    }
}
