<?php

namespace App\Filament\Clusters\Ticonnect\Resources;

use App\Filament\Clusters\Ticonnect;
use App\Filament\Clusters\Ticonnect\Resources\TiconnectUpdateResource\Pages;
use App\Filament\Clusters\Ticonnect\Resources\TiconnectUpdateResource\RelationManagers;
use App\Models\TiconnectUpdate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TiconnectUpdateResource extends Resource
{
    protected static ?string $model = TiconnectUpdate::class;

    protected static ?string $navigationIcon = 'update';
    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $navigationLabel = 'Versão e Atualização';

    protected static ?string $cluster = Ticonnect::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('path')
                    ->label('Caminho de Atualização')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('version')
                    ->label('Versão Atual')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('path')
                    ->label('Caminho de Atualização')
                    ->searchable(),
                Tables\Columns\TextColumn::make('version')
                    ->label('Versão Atual')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_by')
                    ->label('Atualizado por')
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
            'index' => Pages\ListTiconnectUpdates::route('/'),
            'create' => Pages\CreateTiconnectUpdate::route('/create'),
            'edit' => Pages\EditTiconnectUpdate::route('/{record}/edit'),
        ];
    }
}
