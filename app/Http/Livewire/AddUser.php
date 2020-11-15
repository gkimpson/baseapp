<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class AddUser extends Component
{
    use WithFileUploads;
    public $name = "Kevin McKee";
    public $email = "kevin@lc.com";
    public $department = 'information_technology';
    public $title = "Instructor";
    public $photo;
    public $status = 1;
    public $role = 'admin';

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $this->photo->store('photos');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'department' => 'required|string',
            'title' => 'required|string',
            'status' => 'required|boolean',
            'role' => 'required|string',
        ]);

    }

    public function render()
    {
        return view('livewire.add-user');
    }
}
