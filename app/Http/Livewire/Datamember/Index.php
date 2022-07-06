<?php

namespace App\Http\Livewire\Datamember;

use Livewire\Component;
use App\Models\Datamember as Datamembers;

class Index extends Component
{
    public $datamembers, $id_member, $no_hp;

    public $updateDatamember = false; 
    

    protected $listeners = [
        'deleteDatamember'=>'destroy'
    ];    
    
    // Validation Rules
    protected $rules = [
        'id_member'=>'required',
        'no_hp'=>'required'
    ];    
    
    public function render()
    {
        
        $this->datamembers = Datamembers::select('id','id_member','no_hp')->get();
        return view('livewire.datamember.index');


    }  

    
    public function resetFields(){
        $this->id_member = '';
        $this->no_hp = '';
    }    
    
    public function store()
    {        
        // Validate Form Request
        $this->validate();        
        try{
            // Create Data member
            Datamembers::create([
                'id_member'=>$this->id_member,
                'no_hp'=>$this->no_hp
            ]);
    
            // Set Flash Message
            session()->flash('success','Datamember Created Successfully!!');            // Reset Form Fields After Creating Data member
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            session()->flash('error','Something goes wrong while creating Datamember!!');            // Reset Form Fields After Creating Data member
            $this->resetFields();
        }
    }    
    
    public function edit($id){

        $datamember = Datamembers::findOrFail($id);
        $this->id_member = $datamember->id_member;
        $this->no_hp = $datamember->no_hp;
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
            // Update Data member
            Datamembers::find($this->id)->fill([
                'id_member'=>$this->id_member,
                'no_hp'=>$this->no_hp
            ])->save();            
            session()->flash('success','Datamember Updated Successfully!!');
    
            $this->cancel();

        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while updating Datamember!!');
            $this->cancel();
        }
    }    
    
    public function destroy($id){
        try{
            Datamembers::find($id)->delete();
            session()->flash('success',"Data member Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong while deleting Data member!!");
        }
    }
}
