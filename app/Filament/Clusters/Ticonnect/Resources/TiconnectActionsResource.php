<?php

namespace App\Filament\Clusters\Ticonnect\Resources;

use App\Filament\Clusters\Ticonnect;
use App\Filament\Clusters\Ticonnect\Resources\TiconnectActionsResource\Pages;
use App\Filament\Clusters\Ticonnect\Resources\TiconnectActionsResource\RelationManagers;
use App\Models\TiconnectActions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TiconnectActionsResource extends Resource
{
    protected static ?string $model = TiconnectActions::class;

    protected static ?string $navigationIcon = 'click';
    protected static ?string $navigationLabel = 'Histórico de ações';
    protected static ?string $modelLabel = 'Histórico de ações';
    protected static ?string $pluralModelLabel = 'Histórico de ações';
    protected static ?string $navigationGroup = 'Históricos';

    protected static ?string $cluster = Ticonnect::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('actions')
                    ->label("Ação")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user')
                    ->label("Usuário")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('logged_in_user')
                    ->label("Usuário Local")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label("Endereço Local")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('remote_address')
                    ->label("Endereço Remoto")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('date')
                    ->label("Data")
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('actions')
                    ->label("Ação")
                    ->searchable(),
                Tables\Columns\TextColumn::make('user')
                    ->label("Usuário")
                    ->searchable(),
                Tables\Columns\TextColumn::make('logged_in_user')
                    ->label("Usuário Local")
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label("Endereço Local")
                    ->searchable(),
                Tables\Columns\TextColumn::make('remote_address')
                    ->label("Endereço Remoto")
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->label("Data")
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTiconnectActions::route('/'),
        ];
    }
}
