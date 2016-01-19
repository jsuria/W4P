<?php

namespace W4P\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use W4P\Http\Requests;
use W4P\Http\Controllers\Controller;
use W4P\Models\Tier;

use Session;
use Validator;
use Redirect;
use View;

class AdminTierController extends Controller
{
    public function index()
    {
        // Get all tiers
        $tiers = Tier::all()->sortBy('pledge');
        return View::make('backoffice.tiers.index')->with('tiers', $tiers);
    }

    public function create()
    {
        return View::make('backoffice.tiers.edit')
            ->with('data', [])
            ->with('new', true);
    }

    public function store()
    {
        $success = true;
        $errors = [];

        // Validate
        $validator = Validator::make(
            Input::all(),
            [
                'tierValue' => 'required|numeric|unique:tier,pledge',
                'tierDescription' => 'required|min:4',
            ]
        );

        // Check if the validator fails
        if (!$validator->fails()) {
            // Save the tier
            Tier::create([
                'pledge' => Input::get('tierValue'),
                'description' => Input::get('tierDescription'),
            ]);
            Session::flash('info', "A tier was successfully created.");
        } else {
            // Validation has failed. Set success to false. Set validator messages
            $success = false;
            $errors = $validator->messages();
        }

        if ($success) {
            return Redirect::route('admin::tiers');
        } else {
            return Redirect::back()->withErrors($errors)->withInput(Input::all());
        }
    }

    public function edit($id)
    {
        $tier = Tier::find($id);
        return View::make('backoffice.tiers.edit')
            ->with('data', [
                "tierValue" => $tier->pledge,
                "tierDescription" => $tier->description,
            ])
            ->with('id', $id)
            ->with('new', false);
    }

    public function update($id)
    {
        $success = true;
        $errors = [];

        $tierValueValidation = 'required|numeric|unique:tier,pledge,' . $id;

        // Validate
        $validator = Validator::make(
            Input::all(),
            [
                'tierValue' => $tierValueValidation,
                'tierDescription' => 'required|min:4',
            ]
        );

        // Check if the validator fails
        if (!$validator->fails()) {
            // Save the tier
            Tier::find($id)->update([
                'pledge' => Input::get('tierValue'),
                'description' => Input::get('tierDescription'),
            ]);
            Session::flash('info', "The tier was successfully updated.");
        } else {
            // Validation has failed. Set success to false. Set validator messages
            $success = false;
            $errors = $validator->messages();
        }

        if ($success) {
            return Redirect::route('admin::tiers');
        } else {
            return Redirect::back()->withErrors($errors)->withInput(Input::all());
        }
    }

    public function delete($id)
    {
        Tier::find($id)->delete();
        // TODO: Add flash message
        return Redirect::route('admin::tiers');
    }
}
