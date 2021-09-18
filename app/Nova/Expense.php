<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use SLASH2NL\NovaBackButton\NovaBackButton;

class Expense extends Resource
{

    public function authorizedToUpdate(Request $request)
    {
        return auth()->id() == $this->user_id;
    }

    public function authorizedToDelete(Request $request)
    {
        return auth()->id() == $this->user_id;
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }

    public static $group = 'Transactions management';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Expense::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'created_at';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'created_at',
        'amount',
        'purpose',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Date::make('Date', 'created_at')
                ->exceptOnForms()
                ->sortable(),

            BelongsTo::make('User')
                ->exceptOnForms()
                ->required(),

            BelongsTo::make('Project')
                ->nullable(),

            Number::make('Amount')
                ->required()
                ->step(0.1),

            Textarea::make('Details / Purpose', 'purpose')
                ->required(),

            Image::make('Receipt/Document', 'document'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            (new NovaBackButton())
                ->onlyOnDetail(),
        ];

    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
