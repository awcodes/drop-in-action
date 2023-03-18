<?php

namespace Awcodes\DropInAction\Forms\Components\Actions;

use Filament\Forms\Components\Actions\Action as BaseAction;

class Action extends BaseAction
{
    protected string $view = 'forms::button';

    public function iconButton(): static
    {
        $this->view('forms::icon-button');

        return $this;
    }
}
