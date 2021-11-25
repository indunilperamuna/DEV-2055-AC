<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use App\Models\ProviderContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::query()
                     ->get()
                     ->map(function ($provider){
                        return ['slug' => $provider->slug,
                                'trading_name' => $provider->trading_name,
                                'abn' => $provider->abn,
                                'address' => $provider->address,
                                'status' => $provider->status];
                     });

        return inertia('Providers/Index', ['providers' => $providers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Providers/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProviderRequest $request)
    {
        $companyName = $request->input('company_name');
        $tradingName = $request->input('trading_name');
        $abn = $request->input('abn');
        $address = $request->input('address');

        $pcContactName = $request->input('pc_name');
        $pcContactEmail = $request->input('pc_email');
        $pcContactPhone = $request->input('pc_phone');

        $scContactName = $request->input('sc_name');
        $scContactEmail = $request->input('sc_email');
        $scContactPhone = $request->input('sc_phone');

        $provider = Provider::create(['company_name' => $companyName,
                                      'trading_name' => $tradingName,
                                      'abn' => $abn,
                                      'address' => $address]);

        if(isset($pcContactName)){
            $primaryContact = new ProviderContact(['type' => 'primary',
                                                    'name' => $pcContactName,
                                                    'email' => $pcContactEmail,
                                                    'phone' => $pcContactPhone]);
            $provider->contacts()->save($primaryContact);
        }

        if(isset($scContactName)){
            $secondaryContact = new ProviderContact(['type' => 'secondary',
                                                     'name' => $scContactName,
                                                     'email' => $scContactEmail,
                                                     'phone' => $scContactPhone]);

            $provider->contacts()->save($secondaryContact);
        }

        return redirect('/providers')->with('successMessage', 'Provider Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return inertia('Providers/Edit', ['provider' => new ProviderResource($provider)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProviderRequest $request, Provider $provider)
    {

        $companyName = $request->input('company_name');
        $tradingName = $request->input('trading_name');
        $abn = $request->input('abn');
        $address = $request->input('address');

        $pcContactName = $request->input('pc_name');
        $pcContactEmail = $request->input('pc_email');
        $pcContactPhone = $request->input('pc_phone');

        $scContactName = $request->input('sc_name');
        $scContactEmail = $request->input('sc_email');
        $scContactPhone = $request->input('sc_phone');

        $provider->company_name = $companyName;
        $provider->trading_name = $tradingName;
        $provider->abn = $abn;
        $provider->address =  $address;

        $provider->save();

        $provider->contacts()->delete();

        if(isset($pcContactName)){
            $primaryContact = new ProviderContact(['type' => 'primary',
                                                    'name' => $pcContactName,
                                                    'email' => $pcContactEmail,
                                                    'phone' => $pcContactPhone]);

            $provider->contacts()->save($primaryContact);
        }

        if(isset($scContactName)){
            $secondaryContact = new ProviderContact(['type' => 'secondary',
                                                      'name' => $scContactName,
                                                      'email' => $scContactEmail,
                                                      'phone' => $scContactPhone]);

            $provider->contacts()->save($secondaryContact);
        }

        return redirect('/providers')->with('successMessage', 'Provider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect('/providers')->with('successMessage', 'Provider Deleted Successfully');
    }
}
