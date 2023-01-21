<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class EditForm extends Component
{
    public $user;

    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|unique:users,email,' . $this->user->id,
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate($this->rules());

        $editUser = $this->validate();

        $this->user->update($editUser);
        
        return redirect()->route('profile.edit')->with('success', 'User updated successfully.');
    }

    public function render()
    {
        return view('profile.components.edit-form');
    }
}