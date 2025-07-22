<?php
 
namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Filament\Forms\Components\Section;

 
class EditProfile extends BaseEditProfile
{
    protected static string $view = 'filament.pages.auth.edit-profile';
    protected static string $layout = 'filament-panels::components.layout.index';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Editar Informações')  
                ->columns(2)           
                ->schema([
                    $this->getNameFormComponent(),
                    $this->getEmailFormComponent(),
                    $this->getPasswordFormComponent(),
                    $this->getPasswordConfirmationFormComponent(),
                    Fieldset::make('settings')
                    ->label('Configuração')
                    ->schema([
                        ColorPicker::make('settings.color')
                        ->label('Cor Primária do Sistema')
                        ->columnSpanFull()
                        ->inlineLabel()
                        ->rule(function () {
                            return function ($attribute, $value, $fail) {
                                // Verifica se é um valor hexadecimal
                                if (preg_match('/^#([a-fA-F0-9]{3}|[a-fA-F0-9]{6})$/', $value)) {
                                    return true;
                                }

                                // Verifica se é um valor RGB
                                if (preg_match('/^rgb\((\d{1,3}), (\d{1,3}), (\d{1,3})\)$/', $value)) {
                                    return true;
                                }

                                $fail('O valor da cor deve estar em formato hexadecimal ou RGB.');
                            };
                        })// função para probir a entrada se não for hexadecimal ou se não for rgb
                        ->formatStateUsing(fn (?string $state): string => $state ?? config('filament.theme.colors.primary')),
                    ])// Cria um layout onde irá mudar a cor Primária do sistema
                ]) 
            ]);
    }
}