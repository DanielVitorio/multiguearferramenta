<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RedirectedMachineResource\Pages;
use App\Filament\Resources\RedirectedMachineResource\RelationManagers;
use App\Models\Consultants;
use App\Models\RedirectedMachine;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;


class RedirectedMachineResource extends Resource
{
    protected static ?string $model = RedirectedMachine::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $modelLabel = 'Maquinas Redirecionadas e Livres';
    protected static ?string $pluralModelLabel = 'Maquinas Redirecionadas e Livres';
    protected static ?string $navigationGroup = 'Base HomeOffice';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->extraAttributes(['class' => 'bg-gray-50'])
                ->columns(3)
                ->schema([
                Forms\Components\TextInput::make('address')
                    ->label('Endereço')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('hostname')
                    ->label('Hostname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('operating_system')
                    ->label('Sistema Operacional')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->label('Localização')
                    ->required()
                    ->maxLength(255),
                Select::make('follow-up')
                    ->options([
                        'VOZ' => 'VOZ',
                        'DIGITAL' => 'DIGITAL',
                    ])
                    ->label('Seguimento')
                    ->required()
                    ->native(false),
                Select::make('status')
                    ->options([
                        'DISPONIVEL' => 'DISPONIVEL',
                        'OCUPADO' => 'OCUPADO',
                    ])
                    ->label('Status')
                    ->required()
                    ->native(false),
                Select::make('disk')
                    ->options([
                        'HD' => 'HD',
                        'SSD' => 'SSD',
                    ])
                    ->label('Disco')
                    ->required()
                    ->native(false),
                Forms\Components\TextInput::make('site')
                    ->label('Site')
                    ->required()
                    ->maxLength(255),
                Select::make('morning')
                    ->label('Manhã')
                    ->native(false)
                    ->searchable()
                    ->options(function () {
                        return Consultants::where('shift', 'MANHÃ')->pluck('name'); //retorna na tabela apenas quem é do turno da manhã
                    }),
                Select::make('afternoon')
                    ->label('Tarde')
                    ->native(false)
                    ->searchable()
                    ->options(function () {
                        return Consultants::where('shift', 'TARDE')->pluck('name'); //retorna na tabela apenas quem é do turno da tarde
                    }),
                Select::make('night')
                    ->label('Noite')
                    ->native(false)
                    ->searchable()
                    ->options(function () {
                        return Consultants::where('shift', 'NOITE')->pluck('name'); //retorna na tabela apenas quem é do turno da noite
                    }),
            ])
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
                Tables\Columns\TextColumn::make('address')
                    ->label('Endereço')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hostname')
                    ->label('Hostname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('operating_system')
                    ->label('Sistema Operacional')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Localização')
                    ->searchable(),
                Tables\Columns\TextColumn::make('follow-up')
                    ->label('Seguimento')
                    ->searchable(),
                Tables\Columns\TagsColumn::make('status')
                    ->label('Status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('disk')
                    ->label('Disco')
                    ->searchable(),
                Tables\Columns\TextColumn::make('site')
                    ->label('Site')
                    ->searchable(),
                Tables\Columns\TextColumn::make('morning')
                    ->label('Manhã')
                    ->searchable(),
                Tables\Columns\TextColumn::make('afternoon')
                    ->label('Tarde')
                    ->searchable(),
                Tables\Columns\TextColumn::make('night')
                    ->label('Noite')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->label('Visualizar'),
                Tables\Actions\EditAction::make()
                ->label('Editar'),
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
            'index' => Pages\ListRedirectedMachines::route('/'),
            'create' => Pages\CreateRedirectedMachine::route('/create'),
            'edit' => Pages\EditRedirectedMachine::route('/{record}/edit'),
        ];
    }
}
