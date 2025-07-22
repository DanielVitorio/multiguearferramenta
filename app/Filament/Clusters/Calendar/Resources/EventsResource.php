<?php

namespace App\Filament\Clusters\Calendar\Resources;

use App\Filament\Clusters\Calendar;
use App\Filament\Clusters\Calendar\Resources\EventsResource\Pages;
use App\Filament\Clusters\Calendar\Resources\EventsResource\RelationManagers;
use App\Models\Events;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventsResource extends Resource
{
    protected static ?string $model = Events::class;

    protected static ?string $navigationIcon = 'event-list';
    protected static ?string $modelLabel = 'Evento';
    protected static ?string $pluralLabel = 'Eventos';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?string $cluster = Calendar::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\ColorPicker::make('color')
                    ->label('Cor')
                    ->required(),
                Forms\Components\TagsInput::make('assign')
                    ->label('Atibuir para')
                    ->required(),
                Forms\Components\DateTimePicker::make('start_at')
                    ->label('Inicia em')
                    ->native(false)
                    ->required(),
                Forms\Components\DateTimePicker::make('end_at')
                    ->label('Finaliza em')
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
                Forms\Components\RichEditor::make('content')
                    ->label('Conteúdo')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('Título')
                    ->searchable(),
                Tables\Columns\TextColumn::make('responsible')
                    ->label('Responsável')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_at')
                    ->label('Início')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_at')
                    ->label('Fim')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvents::route('/create'),
            'view' => Pages\ViewEvents::route('/{record}/view'),
            'edit' => Pages\EditEvents::route('/{record}/edit'),
        ];
    }
}
