<?php

namespace App\Filament\Clusters\Mappings\Resources;

use App\Filament\Clusters\Mappings;
use App\Filament\Clusters\Mappings\Resources\RamalResource\Pages;
use App\Filament\Clusters\Mappings\Resources\RamalResource\RelationManagers;
use App\Models\Ramal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RamalResource extends Resource
{
    protected static ?string $model = Ramal::class;

    protected static ?string $navigationIcon = 'cisco';
    protected static ?string $modelLabel = 'Ramal';
    protected static ?string $pluralModelLabel = 'Ramals';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?string $cluster = Mappings::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ramal')
                    ->label('Ramal')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ramal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListRamals::route('/'),
            'create' => Pages\CreateRamal::route('/create'),
            'edit' => Pages\EditRamal::route('/{record}/edit'),
        ];
    }
}
