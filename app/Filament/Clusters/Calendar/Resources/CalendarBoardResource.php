<?php

namespace App\Filament\Clusters\Calendar\Resources;

use App\Filament\Clusters\Calendar;
use App\Filament\Clusters\Calendar\Resources\CalendarBoardResource\Pages;
use App\Filament\Clusters\Calendar\Resources\CalendarBoardResource\RelationManagers;
use App\Models\CalendarBoard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CalendarBoardResource extends Resource
{
    protected static ?string $model = CalendarBoard::class;

    protected static ?string $navigationIcon = 'calendar';
    protected static ?string $modelLabel = 'Calendário';
    protected static ?string $pluralLabel = 'Calendários';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?string $cluster = Calendar::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('annotation')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('annotation')
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
            'index' => Pages\ListCalendarBoards::route('/'),
            'create' => Pages\CreateCalendarBoard::route('/create'),
            'edit' => Pages\EditCalendarBoard::route('/{record}/edit'),
        ];
    }
}
