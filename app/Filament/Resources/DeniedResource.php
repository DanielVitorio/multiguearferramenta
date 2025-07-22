<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\TiAdministration;
use App\Filament\Resources\DeniedResource\Pages;
use App\Filament\Resources\DeniedResource\RelationManagers;
use App\Models\Denied;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeniedResource extends Resource
{
    protected static ?string $model = Denied::class;
    protected static ?string $cluster = TiAdministration::class;


    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';
    protected static ?string $modelLabel = 'Acessos Negados';
    protected static ?string $pluralModelLabel = 'Acessos Negados';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('Data'),
                Tables\Columns\TextColumn::make('Name')
                ->label('Nome')
                ->searchable(),
                Tables\Columns\TextColumn::make('machine')
                ->label('Localização')
                ->searchable(),
                Tables\Columns\TextColumn::make('logged_in_user')
                ->label('Usuário Logado')
                ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('Data')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('machine')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logged_in_user')
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
            'index' => Pages\ListDenieds::route('/'),
            'create' => Pages\CreateDenied::route('/create'),
            'edit' => Pages\EditDenied::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
       return false;
    } //para remover o botão de criar
}
