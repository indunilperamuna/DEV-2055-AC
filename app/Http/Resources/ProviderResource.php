<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = ['slug' => $this->slug,
                 'company_name' => $this->company_name,
                 'trading_name' => $this->trading_name,
                 'abn' => $this->abn,
                 'address' => $this->address,
                 'status' => $this->status];

        return array_merge($data, $this->getContacts($this->contacts));
    }

    private function getContacts($contacts){

        $data = ['pc_name' => '',
                 'pc_email' => '',
                 'pc_address' => '',
                 'sc_name' => '',
                 'sc_email' => '',
                 'sc_address' => ''];

        foreach ($contacts as $contact) {
            if($contact->type == 'primary' ){
                $data['pc_name'] = $contact->name;
                $data['pc_email'] = $contact->email;
                $data['pc_phone'] = $contact->phone;
            }else{
                $data['sc_name'] = $contact->name;
                $data['sc_email'] = $contact->email;
                $data['sc_phone'] = $contact->phone;
            }
        }

        return $data;
    }
}
