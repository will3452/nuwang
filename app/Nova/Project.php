<?php

namespace App\Nova;

use App\Models\Project as ModelsProject;
use App\Nova\Actions\MarkAsComplete;
use App\Nova\Actions\StartProject;
use App\Nova\Filters\FilterStatus;
use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Pdmfc\NovaCards\Info;
use SLASH2NL\NovaBackButton\NovaBackButton;

class Project extends Resource
{

    public static $group = 'Project management';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Project::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */

    public function title()
    {
        return "$this->name - $this->type";
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'type',
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
            Tabs::make('Project Details', [
                'Project Info' => [

                    Text::make('Name')
                        ->required(),

                    Text::make('Alias'),

                    Number::make('Price')
                        ->hideWhenUpdating()
                        ->rules('required')
                        ->sortable(),

                    Select::make('Type')
                        ->options([
                            'web' => 'web',
                            'android' => 'android',
                            'ios' => 'ios',
                            'web and android' => 'web and android',
                            'web and ios' => 'web and ios',
                            'cross-platform (all)' => 'cross-platform (all)',
                        ]),

                    Text::make('Status')->exceptOnForms(),
                ],
                'Client Info' => [
                    Trix::make('clients')->alwaysShow(),
                ],
                'Project Timeline' => [
                    Date::make('Start date', 'start_at')
                        ->exceptOnForms()
                        ->hideFromIndex(),

                    Date::make('End date (team)', 'end_at')
                        ->exceptOnForms()
                        ->hideFromIndex()
                    ,
                    Date::make('Deadline(client)', 'deadline')
                        ->hideFromIndex()
                        ->nullable(),

                    Date::make('Estimated Date', 'estimated_day')
                        ->hideFromIndex()
                        ->help('maximum days of development is 12 days only.')
                        ->nullable(),
                ],
            ])->withToolbar(),
            Tabs::make('relations', [
                BelongsToMany::make('users onboard', 'users', User::class),
                HasMany::make('Revenues'),
                HasMany::make('Expenses'),
            ]),

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
        $model = ModelsProject::find($request->resourceId);
        $cards = [

            (new NovaBackButton())
                ->onlyOnDetail(),

        ];
        if (!$model) {
            return $cards;
        }

        $cards[] = $model->revenues()->sum('amount') >= $model->price ? (new Info())->success('This project is already paid!')
            ->onlyOnDetail() : (new Info())->warning('This project has running balance!')->onlyOnDetail();

        return $cards;

    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            FilterStatus::make(),
        ];
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
        return [
            (new StartProject()),
            (new MarkAsComplete()),
        ];

    }
}
