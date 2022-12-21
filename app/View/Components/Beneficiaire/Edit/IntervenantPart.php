<?php

namespace App\View\Components\Beneficiaire\Edit;

use Illuminate\View\Component;

class IntervenantPart extends Component
{
    public $beneficiaire;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($beneficiaire)
    {
        $this->beneficiaire = $beneficiaire;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.beneficiaire.edit.intervenant-part');
    }
}
