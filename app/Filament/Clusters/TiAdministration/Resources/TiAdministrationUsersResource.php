<?php

namespace App\Filament\Clusters\TiAdministration\Resources;

use App\Filament\Clusters\TiAdministration;
use App\Filament\Clusters\TiAdministration\Resources\TiAdministrationUsersResource\Pages;
use App\Filament\Clusters\TiAdministration\Resources\TiAdministrationUsersResource\RelationManagers;
use App\Models\TiAdministrationUsers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TiAdministrationUsersResource extends Resource
{
    protected static ?string $model = TiAdministrationUsers::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
        // Define o rótulo singular e plural do modelo para exibição na interface
        protected static ?string $modelLabel = 'Users';
        protected static ?string $pluralModelLabel = 'Users';

    protected static ?string $cluster = TiAdministration::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('username')
                    ->label('Usuário')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->afterStateUpdated(function ($component, $state) { //aqui uma função para criptografar para o MD5
                        if ($state) {
                            $component->state(md5($state));
                        }
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('username')
                    ->label('Usuário')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTiAdministrationUsers::route('/'),
            'create' => Pages\CreateTiAdministrationUsers::route('/create'),
            'edit' => Pages\EditTiAdministrationUsers::route('/{record}/edit'),
        ];
    }
}
