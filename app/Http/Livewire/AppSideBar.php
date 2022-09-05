<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AppSideBar extends Component
{
	public $progress =0;
	protected $listeners = ['IncreamentProgress'];
    
    public function render()
    {
    	$sessionProgress = \Session::get('progress');
    	$this->progress = ($sessionProgress == null) ? 0: $sessionProgress;
    	//dd($this->progress);
        return view('livewire.app-side-bar');
    }

    public function IncreamentProgress(){
    	$this->progress = \Session::get('progress');
    }
}
