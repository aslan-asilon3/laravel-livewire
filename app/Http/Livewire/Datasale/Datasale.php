<?php

namespace App\Http\Livewire\Datasale;

use Livewire\Component;
use App\Models\Datasale as Datasales;

class Datasale extends Component
{
    public $datasales, $id_member, $batch, $no_hp, $tanggal, $source, $recipient, $status_member, $status_cek_is_member;

    public $updateDatasale = false; 
    
    //     public function mount($updateCategory)
    // {
    //     $this->updateCategory = $updateCategory;
    // }

    protected $listeners = [
        'deleteDatasale'=>'destroy'
    ];    
    
    // Validation Rules
    protected $rules = [
        'id_member'=>'required',
        'batch'=>'required',
        'no_hp'=>'required',
        'tanggal'=>'required',
        'source'=>'required',
        'recipient'=>'required',
        'status_member'=>'required',
        'status_cek_is_member'=>'required',
    ];    
    
    public function render()
    {
        
        $this->datasales = Datasales::select('id_member','batch','no_hp','tanggal','source','recipient','status_member','status_cek_is_member')->get();
        return view('livewire.datasale.datasale');


    }    public function resetFields(){
        $this->id_member = '';
        $this->batch = '';
        $this->no_hp = '';
        $this->tanggal = '';
        $this->source = '';
        $this->recipient = '';
        $this->status_member = '';
        $this->status_cek_is_member = '';
    }    
    
    public function store()
    {        
        // Validate Form Request
        $this->validate();        
        try{
            // Create Category
            Datasales::create([
                'id_member'=>$this->id_member,
                'batch'=>$this->batch,
                'no_hp'=>$this->no_hp,
                'tanggal'=>$this->tanggal,
                'source'=>$this->source,
                'recipient'=>$this->recipient,
                'status_member'=>$this->status_member,
                'status_cek_is_member'=>$this->status_cek_is_member,
            ]);
    
            // Set Flash Message
            session()->flash('success','Datasale Created Successfully!!');            // Reset Form Fields After Creating Category
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            session()->flash('error','Something goes wrong while creating Datasale!!');            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
    }    
    
    public function edit($id){

        $datasale = Datasales::findOrFail($id);
        $this->id_member = $datasale->id_member;
        $this->batch = $datasale->batch;
        $this->no_hp = $datasale->no_hp;
        $this->tanggal = $datasale->tanggal;
        $this->source = $datasale->source;
        $this->recipient = $datasale->recipient;
        $this->status_member = $datasale->status_member;
        $this->status_cek_is_member = $datasale->status_cek_is_member;
        $this->updateDatamember = true;
    }    
    
    
    public function cancel()
    {
        $this->updateDatamember = false;
        $this->resetFields();
    }    
    
    public function update()
    {        
        // Validate request
        $this->validate();        
        try{            
            // Update category
            Datasales::find($this->id)->fill([
                'id_member'=>$this->id_member,
                'batch'=>$this->batch,
                'no_hp'=>$this->no_hp,
                'tanggal'=>$this->tanggal,
                'source'=>$this->source,
                'recipient'=>$this->recipient,
                'status_member'=>$this->status_member,
                'status_cek_is_member'=>$this->staus_cek_is_member,
            ])->save();            
            session()->flash('success','Datasale Updated Successfully!!');
    
            $this->cancel();

        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while updating Datasale!!');
            $this->cancel();
        }
    }    
    
    public function destroy($id)
    {
        try{
            Datasales::find($id)->delete();
            session()->flash('success',"Datasale Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong while deleting Datasale!!");
        }
    }
}
