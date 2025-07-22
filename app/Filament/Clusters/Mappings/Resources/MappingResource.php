<?php

namespace App\Filament\Clusters\Mappings\Resources;

use App\Filament\Clusters\Mappings;
use App\Filament\Clusters\Mappings\Resources\MappingResource\Pages;
use App\Filament\Clusters\Mappings\Resources\MappingResource\RelationManagers;
use App\Models\Mapping;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MappingResource extends Resource
{
    protected static ?string $model = Mapping::class;

    protected static ?string $navigationIcon = 'operation';
    protected static ?string $navigationLabel = 'Opareção';
    protected static ?string $pluralLabel = 'Opareção';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?string $cluster = Mappings::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ramal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ramal_cisco')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('hostname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('system')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('domain')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ram')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('disk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('disk_mark')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('disk_space')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('processor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ramal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ramal_cisco')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hostname')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('system')
                    ->searchable(),
                Tables\Columns\TextColumn::make('domain')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('disk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('disk_mark')
                    ->searchable(),
                Tables\Columns\TextColumn::make('disk_space')
                    ->searchable(),
                Tables\Columns\TextColumn::make('processor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
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
            'index' => Pages\ListMappings::route('/'),
            'edit' => Pages\EditMapping::route('/{record}/edit'),
        ];
    }
}
