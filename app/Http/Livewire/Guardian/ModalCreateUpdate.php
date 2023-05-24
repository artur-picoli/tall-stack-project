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
        $this->validateOnly('documentType');
        $this->resetErrorBag('identification_document');
    }

    public function newPhoto()
    {
        $this->reset('photo', 'editPhoto');
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|mimes:jpg,png|max:10000',
        ]);
    }

    public function updatedEditPhoto()
    {
        $this->validate([
            'editPhoto' => 'nullable|mimes:jpg,png|max:10000',
        ]);
    }

    public function save()
    {
        if ($this->guardianId) {
            return $this->update($this->guardianId);
        }
        $this->validate();

        Guardian::create([
            'document_type' => $this->documentType,
            'identification_document' => $this->identification_document,
            'name' => $this->name,
            'photo' => optional($this->photo)->store('photos'),
            'phone' => $this->phone,
            'email' => $this->email
        ]);

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
            'documentType' => $guardian->getRawOriginal('document_type'),
            'modalCreateUpdate' => true
        ]);
    }

    public function update($id)
    {
        $this->validate();

        $guardian = Guardian::find($id);

        if ($this->editPhoto) {
            if ($guardian->photo && Storage::exists($guardian->photo)) {
                Storage::delete($guardian->photo);
            }
            $guardian->photo = $this->editPhoto->store('photos');
        }

        $guardian->name = $this->name;
        $guardian->email = $this->email;
        $guardian->phone = $this->phone;
        $guardian->email = $this->email;
        $guardian->document_type = $this->documentType;
        $guardian->identification_document = $this->identification_document;


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
        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.guardian.modal-create-update');
    }
}
