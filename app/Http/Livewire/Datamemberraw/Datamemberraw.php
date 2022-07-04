<?php

namespace App\Http\Livewire\Datamemberraw;

use Livewire\Component;
use App\Models\Datamemberraw as Datamemberraws;

class Datamemberraw extends Component
{
    public $datamemberraws, $id_member, $no_hp, $status_cek_data;

    public $updateDatamemberraw = false; 
    
    //     public function mount($updateCategory)
    // {
    //     $this->updateCategory = $updateCategory;
    // }

    protected $listeners = [
        'deleteDatamemberraw'=>'destroy'
    ];    
    
    // Validation Rules
    protected $rules = [
        'id_member'=>'required',
        'no_hp'=>'required',
        'status_cek_data'=>'required'
    ];    
    
    public function render()
    {
        
        $this->datamemberraws = Datamemberraws::select('id_member','no_hp','status_cek_data')->get();
        return view('livewire.datamemberraw.datamemberraw');


    }    public function resetFields(){
        $this->id_member = '';
        $this->no_hp = '';
        $this->status_cek_data = '';
    }    
    
    public function store()
    {        
        // Validate Form Request
        $this->validate();        
        try{
            // Create Category
            Datamemberraws::create([
                'id_member'=>$this->id_member,
                'no_hp'=>$this->no_hp,
                'status_cek_data'=>$this->status_cek_data
            ]);
    
            // Set Flash Message
            session()->flash('success','Datamemberraw Created Successfully!!');            // Reset Form Fields After Creating Category
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            session()->flash('error','Something goes wrong while creating Datamemberraw!!');            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
    }    
    
    public function edit($id){

        $datamemberraw = Datamemberraws::findOrFail($id);
        $this->id_member = $datamemberraw->id_member;
        $this->no_hp = $datamemberraw->no_hp;
        $this->status_cek_data = $datamemberraw->status_cek_data;
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
            Datamemberraws::find($this->id)->fill([
                'id_member'=>$this->id_member,
                'no_hp'=>$this->no_hp,
                'status_cek_data'=>$this->status_cek_data
            ])->save();            
            session()->flash('success','Datamemberraw Updated Successfully!!');
    
            $this->cancel();

        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while updating Datamemberraw!!');
            $this->cancel();
        }
    }    
    
    public function destroy($id)
    {
        try{
            Datamemberraws::find($id)->delete();
            session()->flash('success',"Datamemberraw Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong while deleting Datamemberraw!!");
        }
    }
}
