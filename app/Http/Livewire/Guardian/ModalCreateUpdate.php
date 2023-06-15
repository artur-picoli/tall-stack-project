<?php

namespace App\Http\Livewire\Guardian;


use App\Http\Livewire\Guardian\Traits\ModalCreateUpdatePropertiesRulesValidationTrait;
use App\Models\Guardian;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class ModalCreateUpdate extends Component
{
    use WithFileUploads, Actions, ModalCreateUpdatePropertiesRulesValidationTrait;

    protected $listeners = [
        'openModal',
        'closeModal',
        'newPhoto',
        'edit'
    ];

    public function mount()
    {
        $this->arrDocumentType  = [
            ['name' => 'CPF', 'id' => 1],
            ['name' => 'RG', 'id' => 2],
            ['name' => 'Outro', 'id' => 3],
        ];
    }

    public function openModal()
    {
        $this->modalCreateUpdate = true;
    }

    public function closeModal()
    {
        $this->resetExcept('arrDocumentType', 'resetInputFile');
        $this->resetErrorBag();
        $this->resetInputFile++;
    }

    public function updatedDocumentType()
    {
        $this->reset('identification_document');
        $this->validateOnly('document_type');
        $this->resetErrorBag('identification_document');
    }

    public function newPhoto()
    {
        $this->reset('photo', 'editPhoto');
    }

    public function updatedPhoto()
    {
        $this->validateOnly('photo');
    }

    public function updatedEditPhoto()
    {
        $this->validateOnly('editPhoto');
    }

    public function save()
    {
        if ($this->guardianId) {
            return $this->update($this->guardianId);
        }

        $validated = $this->validate();

        $validated['photo'] = optional($validated['photo'])->store('photos');

        Guardian::create($validated);

        $this->notification([
            'title'       => 'Responsável salvo!',
            'description' => 'Novo responsável criado com sucesso! ;)',
            'icon'        => 'success'
        ]);

        $this->resetModalAfterSaveOrUpdateAndRefreshList();
    }

    public function edit(Guardian $guardian)
    {
        $this->fill([
            'guardianId' => $guardian->id,
            'name' => $guardian->name,
            'email' => $guardian->email,
            'phone' => $guardian->phone,
            'currentPhoto' => $guardian->photo,
            'identification_document' => $guardian->identification_document,
            'document_type' => $guardian->getRawOriginal('document_type'),
            'modalCreateUpdate' => true
        ]);
    }

    public function update($id)
    {
        $validated = $this->validate();

        $guardian = Guardian::find($id);

        if ($validated['editPhoto']) {
            if ($guardian->photo && Storage::exists($guardian->photo)) {
                Storage::delete($guardian->photo);
            }
            $validated['photo'] = $validated['editPhoto']->store('photos');
        }

        $guardian->fill(array_filter($validated));

        if ($guardian->isDirty()) {
            $guardian->save();
        }

        $this->notification([
            'title'       => 'Responsável salvo!',
            'description' => 'Responsável editado com sucesso! ;)',
            'icon'        => 'success'
        ]);

        $this->resetModalAfterSaveOrUpdateAndRefreshList();
    }

    public function resetModalAfterSaveOrUpdateAndRefreshList()
    {
        $this->resetExcept('arrDocumentType');
        $this->resetErrorBag();
        $this->resetInputFile++;
        $this->emitTo('guardian.guardians','refresh');
    }

    public function render()
    {
        return view('livewire.guardian.modal-create-update');
    }
}
